<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <link rel="manifest" href="./manifest.json">
        <script>
        // service workerが有効なら、service-worker.js を登録します
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('./service-worker.js').then(function() { console.log('Service Worker Registered'); });
        }
        </script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="apple-mobile-web-app-status-bar-style" content="default">

        <link href="css/mmfuel-pwa.css" rel="stylesheet" type="text/css">

        <title>Laravel</title>
    </head>
    <body>
        <div class="appHeader">
            <div class="appHeaderTitle">{{$carName}}</div>
        </div>
        <div class="appHeaderBorder"></div>
        <div class="latestTitle latestAndAverageTitleText">Latest</div>
        <div class="latestValue">
            <em class="fuelValueText">{{sprintf('%.1f',$latestRate)}}</em>
            <em class="fuelUnitText">km/l</em>
        </div>
        <div class="averageTitle latestAndAverageTitleText">Average</div>
        <div class="averageValue">
            <em class="fuelValueText">{{sprintf('%.1f',$averageRate)}}</em>
            <em class="fuelUnitText">km/l</em>
        </div>
    </body>
    <script>
    $(window).on('focus', function() {
        console.log('window focused.');
        location.reload();
    });
    </script>
</html>
