@extends('layouts.app')

@section('content')
    <h1 class="text-center mb-3">Categoria: {{$atualCategory->name}}</h1>
    <div class="container">
        <div class="row">
            <div class="col-2">@include('components.categories')</div>
            <div class="card-deck col-10">
                @foreach($products as $product)
                    @include('components.boxproduct',['product'=>$product])
                @endforeach
            </div>
        </div>
    </div>
@stop
