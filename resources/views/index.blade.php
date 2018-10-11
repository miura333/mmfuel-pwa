<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="css/mmfuel-pwa.css" rel="stylesheet" type="text/css">

        <title>Laravel</title>
    </head>
    <body>
        <div class="appHeader">
            <div class="appHeaderTitle">HeaderText</div>
        </div>
        <div class="appHeaderBorder"></div>
        <div class="latestTitle latestAndAverageTitleText">Latest</div>
        <div class="latestValue">
            <em class="fuelValueText">12.34</em>
            <em class="fuelUnitText">km/l</em>
        </div>
        <div class="averageTitle latestAndAverageTitleText">Average</div>
        <div class="averageValue">
            <em class="fuelValueText">12.34</em>
            <em class="fuelUnitText">km/l</em>
        </div>
    </body>
</html>
