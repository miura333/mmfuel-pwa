@extends('layout')
@section('content')
<div class="appHeader">
    <div class="appHeaderTitle">
        <table border="0" width="100%">
            <tr>
                <td width="20%"><a class="linkBackButtonText" href="/">Back</a></td>
                <td width="60%">Add Car</td>
                <td width="20%"><a id="btnSave" class="linkBackButtonText" href="javascript:void(0);">Save</a></td>
            </tr>
        </table>
    </div>
</div>
<div class="appHeaderBorder"></div>
{!! Form::open(['url' => 'add/car/', 'id' => 'formAdd']) !!}
<div class="historyCell">
    {!! Form::text('carName', null, ['class' => 'addInputForm addInputFormText', 'placeholder' => 'Your car name here']) !!}
</div>
<div class="appHeaderBorder"></div>
{!! Form::close() !!}

<script type="text/javascript">
$(document).ready(function () {
    $("#btnSave").on('click', function () {
        $('#formAdd').submit();
    });
});
</script>
@endsection
