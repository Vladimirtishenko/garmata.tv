<?php
function getDayString($date)
{
    switch($date)
    {
        case 0:
            $dayName = Yii::t('main', 'Неділя');
            break;
        case 1:
            $dayName = Yii::t('main', 'Понеділок');
            break;
        case 2:
            $dayName = Yii::t('main', 'Вівторок');
            break;
        case 3:
            $dayName = Yii::t('main', 'Середа');
            break;
        case 4:
            $dayName = Yii::t('main', 'Четвер');
            break;
        case 5:
            $dayName = Yii::t('main', 'Пя\'тниця');
            break;
        case 6:
            $dayName = Yii::t('main', 'Субота');
            break;
        default:
            $dayName = Yii::t('main', 'none');
    }
    return $dayName;
}
try {
?>
<div class="weather">
        <p><img src="http://yastatic.net/weather/i/icons/svg/<?= $xml['fact']['image-v3']; ?>.svg" title="<?= $xml['fact']['weather_type']; ?>"><span><?= $xml['fact']['temperature']; ?> С&deg;</span> </p>
        <div class="dropMenu">
            <hr noshade>
            <h6><?= Yii::t('main', 'Погода в Чернігові'); ?></h6>
            <div>
                <div class="outerW">
                    <div class="today">
                        <h5 class="section-heading"><?= Yii::t('main', 'Сьогодні'); ?></h5>
                        <img src="http://yastatic.net/weather/i/icons/svg/<?= $xml['fact']['image-v3']; ?>.svg" title="<?= $xml['fact']['weather_type']; ?>">
                    </div>
                    <div class="textWeather">
                        <span><?= $xml['fact']['temperature']; ?> С&deg;</span>
                        <span><?= $xml['day'][0]['day_part'][2]['temperature-data']['avg']; ?> С&deg; &nbsp;-&nbsp; <?= $xml['day'][0]['day_part'][4]['temperature-data']['avg']; ?> С&deg;</span>
                        <span><?= $xml['yesterday']['weather_type']; ?></span>
                    </div>
                </div>

                <ul class="forThreeDay">
                    <li>
                        <span class="day"><?= getDayString(date('w', strtotime($xml['day'][1]['@attributes']['date']))); ?></span>
                        <span class="icon-weather-01">
                            <img src="http://yastatic.net/weather/i/icons/svg/<?= $xml['day'][1]['day_part'][2]['image-v3']; ?>.svg" title="<?= $xml['day'][1]['day_part'][2]['weather_type']; ?>">
                        </span>
                        <span><?= $xml['day'][1]['day_part'][2]['temperature-data']['avg']; ?> С&deg; &nbsp;-&nbsp; <?= $xml['day'][1]['day_part'][4]['temperature-data']['avg']; ?> С&deg;</span>
                    </li>
                    <li>
                        <span class="day"><?= getDayString(date('w', strtotime($xml['day'][2]['@attributes']['date']))); ?></span>
                        <span class="icon-weather-02">
                            <img src="http://yastatic.net/weather/i/icons/svg/<?= $xml['day'][2]['day_part'][2]['image-v3']; ?>.svg" title="<?= $xml['day'][2]['day_part'][2]['weather_type']; ?>">
                        </span>
                        <span><?= $xml['day'][2]['day_part'][2]['temperature-data']['avg']; ?> С&deg; &nbsp;-&nbsp; <?= $xml['day'][2]['day_part'][4]['temperature-data']['avg']; ?> С&deg;</span>
                    </li>
                    <li>
                        <span class="day"><?= getDayString(date('w', strtotime($xml['day'][3]['@attributes']['date']))); ?></span>
                        <span class="icon-weather-03">
                            <img src="http://yastatic.net/weather/i/icons/svg/<?= $xml['day'][3]['day_part'][2]['image-v3']; ?>.svg" title="<?= $xml['day'][3]['day_part'][2]['weather_type']; ?>">
                        </span>
                        <span><?= $xml['day'][3]['day_part'][2]['temperature-data']['avg']; ?> С&deg; &nbsp;-&nbsp; <?= $xml['day'][3]['day_part'][4]['temperature-data']['avg']; ?> С&deg;</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php 
        } catch (Exception $e) {
            echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
        }
    ?>