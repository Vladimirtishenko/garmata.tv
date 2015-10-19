<?php
$mysql_host = 'localhost';
$mysql_username = 'garmata';
$mysql_password = 'qwedsazxc123';
$mysql_database = 'garmata';
header('Content-type: text/xml; charset=utf-8');

$rss = new SimpleXMLElement('<rss xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:atom="http://www.w3.org/2005/Atom"></rss>'); 
$rss->addAttribute('version', '2.0');
$rss->addAttribute('encoding', 'UTF-8');
$channel = $rss->addChild('channel');

$atom = $rss->addChild('atom:atom:link'); //add atom node
$atom->addAttribute('href', 'http://val.ua'); //add atom node attribute
$atom->addAttribute('rel', 'self');
$atom->addAttribute('type', 'application/rss+xml');

$title = $rss->addChild('title','Garmata.tv'); //title of the feed
$description = $rss->addChild('description','Інтернет-телебачення Чернігова'); //feed description
$link = $rss->addChild('link','http://garmata.tv'); //feed site
$language = $rss->addChild('language','ua_UA'); //language

//Create RFC822 Date format to comply with RFC822
$date_f = date("D, d M Y H:i:s T", time());
$build_date = gmdate(DATE_RFC2822, strtotime($date_f)); 
$lastBuildDate = $rss->addChild('lastBuildDate',$date_f); //feed last build date

//connect to MySQL - mysqli(HOST, USERNAME, PASSWORD, DATABASE);
$mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);

//Output any connection error
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}
mysql_query("SET NAMES 'utf8'"); 
mysql_query("SET collation_connection='utf8_general_ci'"); 
mysql_query("SET collation_server='utf8_general_ci'"); 
mysql_query("SET character_set_client='utf8'"); 
mysql_query("SET character_set_connection='utf8'"); 
mysql_query("SET character_set_results='utf8'"); 
mysql_query("SET character_set_server='utf8'"); 
$results = $mysqli->query("SELECT `id`, `title_uk`, `description_uk`, `date` FROM news ORDER BY id desc LIMIT 0,50");

if($results){ //we have records 
	while($row = $results->fetch_object()) //loop through each row
	{
		$item = $rss->addChild('item'); //add item node
		$title = $item->addChild('title', $row->title_uk); //add title node under item
		$link = $item->addChild('link', 'http://garmata.tv/uk/'. $row->id.".html"); //add link node under item
		$guid = $item->addChild('guid', 'http://garmata.tv/uk/'. $row->id.".html"); //add guid node under item
		$guid->addAttribute('isPermaLink', 'false'); //add guid node attribute
		
		$description = $item->addChild('description', '<![CDATA['. htmlentities($row->description_uk) . ']]>'); //add description
		
		$date_rfc = gmdate(DATE_RFC2822, strtotime($row->date));
		$item = $item->addChild('pubDate', $date_rfc); //add pubDate node
	}
}
echo $rss->asXML(); //output XML