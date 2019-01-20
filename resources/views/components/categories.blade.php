@foreach($categories as $category)
    <a href="{{route('category',['category'=>$category->id])}}">{{$category->name}}</a><br/>
@endforeach
