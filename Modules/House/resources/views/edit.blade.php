@extends('house::layouts.master')
@section('content')
<main>
	<div class="container-fluid">
		<h1 class="mt-4">Edit House</h1>
		<div class="card mb-4">
			<div class="card-body">
            @if(Session::has('house_update'))
                <div class="alert alert-primary alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Primary!</strong> {!! session('house_update') !!}
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
                
                {!! Form::model($house , array('route' => array('house.update', $house->id), 'method'=>'PUT','files'=>'true')) !!}
                <br>
                {!! Form::label('house_num', 'House Number:') !!}
                {!! Form::text('house_num',null, array('class'=>'form-control')) !!}

                {!! Form::label('street', 'Street:') !!}
                {!! Form::text('street',null, array('class'=>'form-control')) !!}

                {!! Form::label('country', 'Country:') !!}
                {!! Form::text('country',null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::submit('Update', array('class'=>'btn btn-primary')) !!}
                <a class="btn btn-secondary" href="{!! url('/house')!!}">Back</a>
                {!! Form::close() !!}
			</div>
		</div>
	</div>
</main>
@endsection