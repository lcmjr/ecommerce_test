@extends('layouts.app')

@section('content')
    <h1 class="text-center">Carrinho</h1>
    <div class="container">
        @if(is_array($cart) && !empty($cart))
            <table class="table table-bordered">
                <tr>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Foto</th>
                    <th>Adicionar</th>
                    <th>Remover</th>
                </tr>
                @php
                $total = 0;
                @endphp
                @foreach($cart as $id => $product)
                    @php
                    $total += $product['quantity'] *$product['price'];
                    @endphp
                    <tr>
                        <td><a href="{{route('product',['product'=>$id])}}">{{$product['name']}}</a></td>
                        <td>{{money_format("%.2n",$product['price'])}}</td>
                        <td>{{$product['quantity']}}</td>
                        <td class="text-center"><img width="150" height="150" class="img-thumbnail" src="images/{{$product['photo']}}" alt="{{$product['name']}}"/></td>
                        <td><a href="{{route('cart_add',['product'=>$id])}}" class="btn btn-primary">+ Carrinho</a></td>
                        <td><a href="{{route('cart_remove',['product'=>$id])}}" class="btn btn-danger">Remover do Carrinho</a></td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="5">Total:</td>
                    <td>{{money_format("%.2n",$total)}}</td>
                </tr>
            </table>
            <div class="text-center"><a href="{{route('order_close')}}" class="btn btn-success">Fechar o pedido</a></div>
        @else
            <p class="alert alert-info">Nenhum Produto Adicionado ao Carrinho</p>
        @endif
    </div>
@stop
