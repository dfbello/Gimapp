@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col">
        <h1>Clases Grupales</h1>
    </div>
</div>

<div class="row">
    <div class="col">
        <a class="btn btn-primary" href="/expense_report/create">Create a new report</a>
    </div>
</div>

<div class="row">
    <div class="col">
        <table class="table">
            <tr>
                <td>Titulo</td>
                <td>CC</td>
                <td>Valor</td>
                <td>Editar registro</td>
            </tr>
            <!--@foreach($expenseReports as $expenseReport)-->
            
            <tr>
                <td><!--{{ $expenseReport->title }}--></td>
                <td><!--{{ $expenseReport->cedula }}--></td>
                <td><!--{{ $expenseReport->valor }}--></td>
            </tr>
           <!-- @endforeach -->
        </table>
    </div>
</div>
@endsection