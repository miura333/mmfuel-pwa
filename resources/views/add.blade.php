@extends('layout')
@section('content')
<div class="appHeader">
    <div class="appHeaderTitle">
        <table border="0" width="100%">
            <tr>
                <td width="20%"><a class="linkBackButtonText" href="/{{$carId}}">Back</a></td>
                <td width="60%">Add</td>
                <td width="20%"></td>
            </tr>
        </table>
    </div>
</div>
<div class="appHeaderBorder"></div>
{!! Form::open(['url' => 'add/']) !!}
<div class="historyCell">
    {!! Form::tel('trip', null, ['class' => 'addInputForm addInputFormText', 'placeholder' => 'trip']) !!}
</div>
<div class="appHeaderBorder"></div>
<div class="historyCell">
    {!! Form::tel('fuelNumber', null, ['class' => 'addInputFormFuelNumber addInputFormText']) !!}
    .
    {!! Form::tel('fuelDecimal', null, ['class' => 'addInputFormFuelDecimal addInputFormText']) !!}
</div>
<div class="appHeaderBorder"></div>
<div class="historyCell">
    {!! Form::tel('price', null, ['class' => 'addInputForm addInputFormText', 'placeholder' => 'price']) !!}
</div>
<div class="appHeaderBorder"></div>

<div class="historyCell">
    <div class="addSubmitButtonParent">
        {!! Form::submit('登録', ['class' => 'addSubmitButton addInputFormText']) !!}
    </div>
</div>
{!! Form::close() !!}

@endsection
