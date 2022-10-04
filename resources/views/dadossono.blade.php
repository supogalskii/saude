@extends('layout.app')
@section('title','Análise Sono')
@section('apresentacao')
    <p>Esta aplicação realização a análise do sono de uma pessoa, informando sua classificação com relação a este cálculo.</p>
@endsection
@section('content')
    <div>
        <form action="{{url('/sono')}}" method="get">
            <label id="lnome" for="nome">Nome:</label>
            <input type="text" name="nome" placeholder="Informe seu nome" required><br/>
            <label id="lidade" for="idade">Idade:</label>
            <input type="number" name="idade" placeholder="0.01 ..." required step="0.01"><br/>
            <small>Informe idade. Para menores de 1 ano use 0.01 até 0.11</small><br/>
            <label id="lhoras" for="altura">Média de horas de sono:</label>
            <input type="number" name="horas" step="1" placeholder="Numero inteiro" required><br/>
            <br/>
            <button type="submit">Enviar</button>
        </form>
    </div>
@endsection