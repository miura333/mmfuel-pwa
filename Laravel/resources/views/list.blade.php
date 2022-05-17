@extends('layout')
@section('content')
<div class="appHeader">
    <div class="appHeaderTitle">
        <table border="0" width="100%">
            <tr>
                <td width="20%"><a class="linkBackButtonText" href="/{{$returnCarId}}">Back</a></td>
                <td width="60%">List</td>
                <td width="20%"><a class="linkBackButtonText" href="/add/car">Add</a></td>
            </tr>
        </table>
    </div>
</div>
<div class="appHeaderBorder"></div>
@foreach ($cars as $car)
<div class="historyCell">
    <div class="carlistCellColl"><a class="linkButtonText" href="/{{$car->id}}">{{$car->car_name}}</a></div>
</div>
<div class="appHeaderBorder"></div>
@endforeach
@endsection
