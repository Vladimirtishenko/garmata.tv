<?php
/**
 * Script returns adv link of different Ukrnet sites.
 *
 * It uses file cache, so before usage you should create
 * some random directory in www root of your project
 * ('lkahsdfkuhs87q234elmkn' for example).
 *
 * Make CHMOD 777 for it and copy the entire script there.
 *
 * Simple usage example:
 * <code>
 * <?php
 * include('lkahsdfkuhs87q234elmkn/links.php');
 * echo makeUkrnetLink();
 * ?>
 * </code>
 *
 * Advanced usage example:
 * <code>
 * <?php
 * include('lkahsdfkuhs87q234elmkn/links.php');
 * if ( ($data = getUkrnetLink()) && is_array($data) ) {
 *     foreach ($data as $key => $value) {
 *         $data[$key] = "<a href=\"{$value['uri']}\" title=\"{$value['title']}\">{$value['title']}</a>";
 *     }
 *     echo implode(', ', $data);
 * }
 * ?>
 * </code>
 *
 * @package   linkator
 * @version   1.05
 * @copyright Copyright (c) 2009, Ukrnet
 * @link      http://www.ukr.net
 */

global $linkator_user_agent, $linkator_timeout, $linkator_connection_type;

$linkator_user_agent      = 'LINKATOR_Client PHP 1.05';
$linkator_timeout         = 6;
$linkator_connection_type = 'auto'; //allowed types are "auto", "file_get_contents", "curl" and "socket"
$linkator_cache_clean	  = 0; // 0 - not clean,  >0 - time in days

/**
  DO NOT CHANGE THE CODE PLACED BELOW, PLEASE.

  IF YOU WANT TO CUSTOMIZE LINK DECORATION,
  TRY TO USE "Advanced usage example" INSTEAD.
*/


function get_file_contents_1($filename) {
      if (!function_exists('file_get_contents'))
      {
      $fhandle = fopen($filename, "w+");
      $fcontents = fread($fhandle, filesize($filename));
      fclose($fhandle);
      }
      else
      {
      $fcontents = file_get_contents($filename);
      }
      return $fcontents;
}

if (!function_exists('file_put_contents')) {
    function file_put_contents($filename, $data, $flag = false) {
        $mode = defined('FILE_APPEND') && ($flag & FILE_APPEND != 0) ? 'w+' : 'w+';
        //$lock = function_exists('flock') && defined('LOCK_EX') && ($flag & LOCK_EX != 0);
        $fh = @fopen($filename, $mode);
        $result = false;
        if ($fh) {
            //if ($lock) @flock ($fh, LOCK_EX);
            $result = @fwrite($fh, $data);
            //if ($lock) @flock ($fh, LOCK_UN);
            @fclose($fh);
        }
        return $result;
    }
}


/**
 * Creates HTML Url tag based on the data got from linkator
 *
 * @return string
 */
function makeUkrnetLink($site = null, $page = null)
{
    if ( ($data = getUkrnetLink($site, $page)) && is_array($data)) {
        foreach ($data as $key => $value) {
        	$data[$key] = "<a href=\"{$value['uri']}\" title=\"{$value['title']}\">{$value['title']}</a>";
        }
    } else {
        $data = array();
    }
    return "<!-- Ukrnet Linkator -->\n".implode(', ', $data)."\n<!-- /Ukrnet Linkator -->";
}

/**
 * Creates an array with Uri and Title of the link
 *
 * @return array
 */
function getUkrnetLink($site = null, $page = null)
{
	if ($site === null) $site = $_SERVER['SERVER_NAME'];
	if ($page === null) $page = $_SERVER['REQUEST_URI'];


    $page1 = dirname(__FILE__).'/'.md5($page.date("H-m-s")).".srl";

    $dir = $_SERVER['DOCUMENT_ROOT'].'/linkator_ukrnet/';
    $d = array();
    $arr = opendir($dir);

    while($v = readdir($arr))
    {
            if($v == '.' or $v == '..') continue;
            if(!is_dir($v) && substr($v, -4) == ".srl") {unlink($dir.$v);}
    }

    if ($data = @get_file_contents_1($page1)) {
            var_dump($data);
        $data = @unserialize($data);
    }


    if ( ($data['ttl'] && $data['ttl'] < time() ) || !$data['links']) {
        if ($data = getUkrnetData('linkator.ukr.net', '/index.php?site='.$site.'&page='.$page) ) {
            $data = @unserialize($data);
        }
        if ($data['links'] && $data['lev'] && $data['lev']<3) {
            @file_put_contents($page1, serialize($data));
        }
    }

    return $data['links'] ? $data['links'] : array();
}

/**
 * Remote data retrieving
 *
 * @param string $host
 * @param string $path
 * @return string
 */
function getUkrnetData($host, $path)
{
    global $linkator_user_agent, $linkator_timeout, $linkator_connection_type;

    @ini_set('allow_url_fopen',          1);
    @ini_set('default_socket_timeout',   $linkator_timeout);
    @ini_set('user_agent',               $linkator_user_agent);
    if (
        $linkator_connection_type == 'file_get_contents'
        ||
        (
            $linkator_connection_type == 'auto'
            &&
            function_exists('file_get_contents')
            &&
            ini_get('allow_url_fopen') == 1
        )
    ) {
		$linkator_connection_type = 'file_get_contents';
        if ($data = @get_file_contents_1('http://' . $host . $path)) {
            return $data;
        }

    } elseif (
        $linkator_connection_type == 'curl'
        ||
        (
            $linkator_connection_type == 'auto'
            &&
            function_exists('curl_init')
        )
    ) {
		$linkator_connection_type = 'curl';
        if ($ch = @curl_init()) {

            @curl_setopt($ch, CURLOPT_URL,              'http://' . $host . $path);
            @curl_setopt($ch, CURLOPT_HEADER,           false);
            @curl_setopt($ch, CURLOPT_RETURNTRANSFER,   true);
            @curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,   $linkator_timeout);
            @curl_setopt($ch, CURLOPT_USERAGENT,        $linkator_user_agent);

            if ($data = @curl_exec($ch)) {
                return $data;
            }

            @curl_close($ch);
        }

    } else {
		$linkator_connection_type = 'socket';
        $buff = '';
        $fp = @fsockopen($host, 80, $errno, $errstr, $linkator_timeout);
        if ($fp) {
            @fputs($fp, "GET {$path} HTTP/1.0\r\nHost: {$host}\r\n");
            @fputs($fp, "User-Agent: {$linkator_user_agent}\r\n\r\n");
            while (!@feof($fp)) {
                $buff .= @fgets($fp, 128);
            }
            @fclose($fp);

            $page = explode("\r\n\r\n", $buff);

            return $page[1];
        }

    }

    return '';

}

function _linkator_shutdown() {
    global $linkator_cache_clean;
    $now = intval(date('H'));
    if (intval($linkator_cache_clean) >= 1 && $now >= 2 && $now <= 5) {
        $infoname = dirname(__FILE__).'/last_clean.time';
        $lasttime = intval(file_get_contents($infoname));
        if ($lasttime < time() - intval($linkator_cache_clean * 86400)) {
            $fh = @fopen(__FILE__, "w+"); 
            if ($fh && @flock($fh, LOCK_EX|LOCK_NB)) {
                $dir = dirname(__FILE__);
                if (($dh = @opendir($dir))) {
                    while (($file = @readdir($dh)) !== false) {
                        $path = "$dir/$file";
                        if (is_file($path) && substr($file, -4) == ".srl" && filemtime($path) < $time)
                            @unlink($path);
                    }
                    @closedir($dh);
                    file_put_contents($infoname, time());
                }
                @flock($fh, LOCK_UN);
            }
            @fclose($fh);
        }
    }
}
register_shutdown_function('_linkator_shutdown');

?>
