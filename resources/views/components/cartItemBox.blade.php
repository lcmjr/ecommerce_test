<table class="table table-bordered mt-3">
    <tr>
        <th>Produto</th>
        <th>Preço</th>
        <th>Quantidade</th>
        <th>Foto</th>
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
            <td class="text-center"><img width="150" height="150" class="img-thumbnail"
                                         src="images/{{$product['photo']}}" alt="{{$product['name']}}"/></td>
        </tr>
    @endforeach
    <tr>
        <td colspan="3">Total:</td>
        <td>{{money_format("%.2n",$total)}}</td>
    </tr>
</table>
