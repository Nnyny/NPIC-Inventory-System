@extends('master')
@section('content')
<main>
    <div class="container-fluid">
        <h1>Show item</h1>
        <div class="card">
            <div class="card-body">
                <p>Item code: {{$item->item_code}}</p>
                <div>{!! Html::image('/pic/'.$item->item_img, $item->item_name, array('width'=>'300')) !!}</div>
                <p>Name: {{$item->item_name}}</p>
                <p>Category: {{$item->category->cat_name}}</p>
                <p>Qty: {{$item->item_qty}}</p>
                <p>Description: {{$item->item_des}}</p>
                
            </div>
        </div>
        <br>
        <a class="btn btn-secondary" href="{{url('/item')}}">Back</a>
    </div>
</main>
@endsection
