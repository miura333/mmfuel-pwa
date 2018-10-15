@extends('layout')
@section('content')
<div class="appHeader">
    <div class="appHeaderTitle">
        <table border="0" width="100%">
            <tr>
                <td width="20%"><a class="linkBackButtonText" href="/{{$carId}}">Back</a></td>
                <td width="60%">History</td>
                <td width="20%"></td>
            </tr>
        </table>
    </div>
</div>
<div class="appHeaderBorder"></div>
@foreach ($records as $record)
<div class="historyCell">
    <div class="historyCellColl1">
        <table border="0" width="100%">
            <tr>
                <td width="5%"></td>
                <td width="45%">{{date('Y/m/d', $record->date)}}</td>
                <td width="45%" class="historyTextFuelRate">{{$record->fuel_rate}} km/l</td>
                <td width="5%"></td>
            </tr>
        </table>
    </div>
    <div class="historyCellColl2">
        <table border="0" width="100%">
            <tr>
                <td width="5%"></td>
                <td width="30%">{{$record->trip}} km</td>
                <td width="30%" class="historyTextFuel">{{$record->fuel}} l</td>
                <td width="30%" class="historyTextPrice">{{$record->price_of_fuel}} yen/l</td>
                <td width="5%"></td>
            </tr>
        </table>
    </div>
</div>
<div class="appHeaderBorder"></div>
@endforeach

@endsection
