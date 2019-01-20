@extends('layouts.app')

@section('content')
    <h1 class="text-center">Detalhe do pedido</h1>
    <div class="container">
        <table class="table table-bordered mt-3">
            <tr>
                <td>Nome</td>
                <td>{{$order->name}}</td>
            </tr>
            <tr>
                <td>CPF</td>
                <td>{{$order->cpf}}</td>
            </tr>
            <tr>
                <td>Telefone</td>
                <td>{{$order->phone}}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{$order->email}}</td>
            </tr>
            <tr>
                <td>CEP</td>
                <td>{{$order->zip_code}}</td>
            </tr>
            <tr>
                <td>Estado</td>
                <td>{{$order->state}}</td>
            </tr>
            <tr>
                <td>Cidade</td>
                <td>{{$order->city}}</td>
            </tr>
            <tr>
                <td>Bairro</td>
                <td>{{$order->district}}</td>
            </tr>
            <tr>
                <td>Endereço</td>
                <td>{{$order->address}}</td>
            </tr>
        </table>
        <table class="table table-bordered mt-3">
            <tr>
                <th>Produto</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Valor Total Por item</th>
            </tr>
            @php
                $total = 0;
            @endphp
            @foreach($order->orderItems as $order)
                @php
                    $total += $order->total_price;
                @endphp
                <tr>
                    <td><a href="{{route('product',$order->product_id)}}">{{$order->product->name}}</a></td>
                    <td>{{money_format('%.2n',$order->sale_price)}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{money_format("%.2n",$order->total_price)}}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3">Total:</td>
                <td>{{money_format("%.2n",$total)}}</td>
            </tr>
        </table>
        <div class="text-center"><a class="btn btn-info text-white" href="pedidos">Voltar para todos pedidos</a></div>
    </div>
@stop
