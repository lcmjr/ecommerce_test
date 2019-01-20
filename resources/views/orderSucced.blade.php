@extends('layouts.app')

@section('content')
    <h1 class="text-center">Pedido <a href="{{route('order_detail',$order->id)}}">#{{$order->id}}</a> efetuado com
        sucesso</h1>
    <div class="text-center"><a href="{{route('order_detail',$order->id)}}">Detalhes do pedido</a> <a
            href="{{route('order_lists')}}">Ver Pedidos</a></div>
@stop
