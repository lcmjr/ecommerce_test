<div class="mb-3 col-6 col-md-4">
    <div class="card">
        <img class="card-img-top" src="images/{{$product->image}}" alt="{{$product->name}}">
        <div class="card-body">
            <h5 class="card-title">{{$product->name}}</h5>
            <p class="card-text">
                <b>Categorias:</b> @foreach($product->categories()->get() as $category)<a href="{{route('category',['category'=>$category->id])}}">{{$category->name}}</a> @endforeach<br/>
                {{money_format("%.2n",$product->price)}}</p>
            <a href="{{route('product',['product'=>$product->id])}}" class="btn btn-primary">Detalhes</a>
            <a href="{{route('cart_add',['product'=>$product->id])}}" class="btn btn-primary">+ Carrinho</a>
        </div>
    </div>
</div>
