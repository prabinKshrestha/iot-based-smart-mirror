<!DOCTYPE html>
<html>
<head>
    <title>Smart Mirror</title>
    <base href="<?php echo base_url(); ?>">
    <link rel="stylesheet" type="text/css" href="static/css/style.css">
</head>
<body>
<header>
    <h4>Smart Mirror</h4>
    <h1> Hello, <?php echo ucfirst($user['username']); ?></h1>
</header>
<div class="container">
    <div class="body-left-container">
        <section id = "time-date">
            <div id="time"></div>
            <div id="day"></div>
            <div id="date"></div>
        </section>
        <section class="main-todo">
            <div class="todo-main-header">
                <h4>TODO-List</h4>
            </div>
            <?php foreach($todo as $key=> $td): ?>
                <div class="todo-items">
                    <span class="todo-title"><?php echo $td['title']; ?></span>
                    <span class="todo-date"><?php echo date_convert($td['assign_date']); ?></span>
                </div>
            <?php endforeach ?>
        </section>
    </div>
    <div class="body-right-container">
        <div class = "weather">
            <div class="main-weather-icon">
                <img class = "weather-icon" src="static/icons/<?php echo $weather['current_icon'].".svg"; ?>" alt="Cannot find icons">
            </div>
            <div class="weather-description">
                <p id="temperature"><?php echo $weather['current_temp'] ?>&deg;C</p>
                <p id = "current-weather-des"><?php echo $weather['current_summary']; ?></p>
                <p id="temp-range">High: <?php echo $weather['max_temp'] ?>&deg;C | Low: <?php echo $weather['min_temp'] ?>&deg;C</p>
            </div>
        </div>
        <div class="daily-weather-main">
            <?php foreach($weather['getWeeklyWeather'] as $value): ?>
                <div class = "daily-weather">
                    <div class="daily-weather-icon">
                        <img class = "weather-icon-daily" src="static/icons/<?php echo $value['icon'].".svg"; ?>" alt="Cannot find icons" width="50px" height="50px">
                    </div>
                    <div class="daily-weather-description">
                        <p class="daily-weather-day"><?php echo $value['day'] ?></p>
                        <p class="daily-weather-summary"><?php echo $value['summary'] ?></p>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <div class="headlines">
            <div class="headline-main-header">
                <h4 class="headline-title">Headlines</h4>
                <span class="newspaper-title"><?php echo $newspaper; ?></span>
            </div>
            <ul class="headline-body">
                <?php foreach($headlines as $key=> $hlines): ?>
                    <li class="headline-li">
                        <span class="headline-title-topic"><?php echo word_limiter($hlines['title'],6); ?></span><br>
                        <span class="headline-detail-topic"><?php echo word_limiter($hlines['detail'],500); ?> </span>
<!--                        <span class="headline-date">--><?php //echo $hlines['date'] ?><!--</span>-->
                    </li>
                <?php endforeach ?>
            </ul>
        </div>

</div>
<script type="text/javascript" src="static/js/app.js"></script>
<script type="text/javascript" src="static/js/slider.js"></script>
<script type="text/javascript" src="static/js/static.js"></script>
<script type="text/javascript" src="static/js/slider_headline.js"></script>
    <script>
        opacityGradient('todo-items');
        // opacityGradient('headline-li');
    </script>
</body>
</html>