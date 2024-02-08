@extends('master')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Create Item</h1>
        <br>
        <div class="card mb-4">
            <div class="card-body">
                @if(Session::has('item_create'))
                <div class="alert alert-primary alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Primary!</strong> {!! session('item_create') !!}
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
                <!-- It Create the new Category -->


                {!! Form::open(array('url'=>'item', 'files'=>'true')) !!}
               
                <br>
                {!! Form::label('item_code', 'Item Code:') !!}
                {!! Form::text('item_code',null, array('class'=>'form-control')) !!}

                <br>
                {!! Form::label('item_img', 'Image:') !!}
                {!! Form::file('item_img', array('class'=>'form-control')) !!}

                <br>
                {!! Form::label('item_name', 'Name:') !!}
                {!! Form::text('item_name',null, array('class'=>'form-control')) !!}

                <br>
                {!! Form::label('category_id', 'Category:') !!}
                {!! Form::select('category_id',$categories,null ,array('class'=>'form-select')) !!}

                <br>
                {!! Form::label('item_qty', 'Qty:') !!}
                {!! Form::text('item_qty',null, array('class'=>'form-control')) !!}

                <br>
                {!! Form::label('item_des', 'Description:') !!}
                {!! Form::textarea('item_des',null, array('class'=>'form-control')) !!}

                <br>    
                {!! Form::submit('Create', array('class'=>'btn btn-primary')) !!}


                <a class="btn btn-secondary" href="{!! url('/item')!!}">Back</a>


                {!! Form::close() !!}
               
            </div>
        </div>
        <div style="height: 100vh"></div>
        <div class="card mb-4">
            <div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div>
        </div>
    </div>
</main>
@endsection
