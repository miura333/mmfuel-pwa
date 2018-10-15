@extends('layout')
@section('pwa')
<link rel="manifest" href="./manifest.json">
<script>
// service workerが有効なら、service-worker.js を登録します
if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('./service-worker.js').then(function() { console.log('Service Worker Registered'); });
}
</script>
@endsection

@section('content')
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
<div class="addButtonParent">
    <div class="addHistoryButton">
        <div class="addHistoryButtonText"><a class="linkButtonText" href="http://www.example.com">add</a></div>
    </div>
</div>
<div class="historyButtonParent">
    <div class="addHistoryButton">
        <div class="addHistoryButtonText"><a class="linkButtonText" href="/history/{{$carId}}">history</a></div>
    </div>
</div>
<script>
$(window).on('focus', function() {
    console.log('window focused.');
    location.reload();
});
</script>
@endsection
