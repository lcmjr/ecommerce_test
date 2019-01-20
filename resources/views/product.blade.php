@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-2">
                <div class="col-2">@include('components.categories')</div>
            </div>
            <div class="col-10 row">
                <div class="col-4 ">
                    <img class="card-img-top" src="images/{{$product->image}}" alt="{{$product->name}}">
                </div>
                <div class="offset-1 col-7">
                    <h1>{{$product->name}}</h1>
                    <h3>{{money_format("%.2n",$product->price)}}</h3>
                    <h5>Categorias:</h5>
                    @foreach($product->categories()->get() as $category)<a
                        href="{{route('category',['category'=>$category->id])}}">{{$category->name}}</a> @endforeach
                    <br/><br/>
                    <h5>Características:</h5>
                    <table class="table table-bordered">
                        @foreach($product->features()->get() as $feature)
                            <tr>
                                <td>{{$feature->name}}</td>
                                <td>{{$feature->value}}</td>
                            </tr>
                        @endforeach
                    </table>
                    <a href="{{route('cart_add',['product'=>$product->id])}}" class="btn btn-primary">Adicionar ao Carrinho</a>
                </div>
                <div class="col-12">
                    <h5>Descrição:</h5>
                    {!! $product->description !!}
                </div>
            </div>
        </div>
    </div>
@stop
