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

        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Cache-Control" content="no-cache">

        <link rel="apple-touch-icon" href="./icon-120.png" sizes="120x120"/>
        <link rel="apple-touch-icon" href="./icon-180.png" sizes="180x180"/>

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>
    </head>
    <body>
        <div id="app">
            <transition v-bind:name="pageTransition">
                <router-view></router-view>
            </transition>
        </div>
        <script src="{{ mix('js/app.js') }}" ></script>
    </body>
</html>
