@extends('base/layout')

@section('conteudo')
<br>
<div class="row">  
    <div class="col-md-3">
        <a class="dashboard-stat bg-warning" href="{{route('usuarios')}}">
            <span class="number counter">1</span>
            <span class="name">Usuários</span>
            <span class="bg-icon"><i class="fa fa-users"></i></span>
        </a>
    </div>
</div>
@stop