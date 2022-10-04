@extends('layout.app')
@section('title','Análise Sono - Resultado')
@section('apresentacao')
    <p>Veja se você está dormindo o suficiente.</p>
@endsection
@section('content')
    <div>
        <h2>{{$resultadosono["nome"]}}</h2>
        <p>Idade: {{$resultadosono["idade"]}}</p>
        <p>Análise Sono: {{$resultadosono["horas"]}} horas - {{$resultadosono["classificacaosono"]}}</p>
    </div>
@endsection