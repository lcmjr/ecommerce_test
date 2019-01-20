@extends('layouts.app')

@section('content')
    <h1 class="text-center mb-3">Lista de pedidos</h1>
    <div class="container">
        @if(count($orders)>0)
        <table class="table table-bordered mt-3">
            <tr>
                <td>Nome</td>
                <td>CPF</td>
                <td>Telefone</td>
                <td>Email</td>
                <td>CEP</td>
                <td>Endereço</td>
                <td>Valor Total do Pedido:</td>
                <td>Detalhe</td>
            </tr>
            @foreach($orders as $order)
                <tr>
                    <td>{{$order->name}}</td>
                    <td>{{$order->cpf}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->zip_code}}</td>
                    <td>{{$order->address}}</td>
                    <td>{{money_format("%.2n",$order->totalValueItems())}}</td>
                    <td><a href="{{route('order_detail',$order->id)}}" class="btn btn-info text-white">detalhes</a></td>
                </tr>
            @endforeach
        </table>
        @else
            <div class="text-center alert alert-info"> Nenhum pedido efetuado</div>
        @endif
    </div>
@stop
