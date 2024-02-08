@extends('master')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Edit Item</h1>
        <!-- <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/item">View all items</a></li>
            <li class="breadcrumb-item active"><a href="item/create">Create post</a></li>
        </ol> -->
        <div class="card mb-4">
            <div class="card-body">
            @if(Session::has('item_update'))
                <div class="alert alert-primary alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Primary!</strong> {!! session('item_update') !!}
                </div>
                @endif
                @if (count($errors) > 0)
                <!-- Form Error List -->
                <div class="alert alert-danger">
                    <strong>Something is Wrong</strong>
                    <br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
               
                {!! Form::model($item , array('route' => array('item.update', $item->id), 'method'=>'PUT','files'=>'true')) !!}
                
                <br>
                {!! Form::label('item_code', 'Item Code:') !!}
                {!! Form::text('item_code',null, array('class'=>'form-control')) !!}

                <br>
                {!! Form::label('item_name', 'Name:') !!}
                {!! Form::text('item_name',null, array('class'=>'form-control')) !!}
                
                <br>
                {!! Form::label('item_img', 'Image:') !!}
                {!! Form::file('item_img', array('class'=>'form-control')) !!}

                <br>
                {!! Form::label('category_id', 'Category:') !!}
                {!! Form::select('category_id',$categories,null, array('class'=>'form-control')) !!}

                <br>
                {!! Form::label('item_qty', 'Qty:') !!}
                {!! Form::text('item_qty',null, array('class'=>'form-control')) !!}


                <br>
               
                {!! Form::label('item_des', 'Description:') !!}
                {!! Form::textarea('item_des',null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::submit('Update', array('class'=>'btn btn-primary')) !!}
                <a class="btn btn-secondary" href="{!! url('/item')!!}">Back</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</main>
@endsection
