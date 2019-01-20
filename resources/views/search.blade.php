@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mb-3">Busca por: {{$search}}</h1>
        <div class="row">
            <div class="col-2">
                <div class="col-2">@include('components.categories')</div>
            </div>
            <div class="card-deck col-10">
                @foreach($products as $product)
                    @include('components.boxproduct',['product'=>$product])
                @endforeach
            </div>
        </div>
    </div>
@stop
