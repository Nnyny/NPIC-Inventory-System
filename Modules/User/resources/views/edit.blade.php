@extends('master')
@section('content')
<main>
	<div class="container-fluid">
		<h1 class="mt-4">Edit User</h1>
		<div class="card mb-4">
			<div class="card-body">
            @if(Session::has('user_update'))
                <div class="alert alert-primary alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Primary!</strong> {!! session('user_update') !!}
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
                
                {!! Form::model($user , array('route' => array('user.update', $user->id), 'method'=>'PUT','files'=>'true')) !!}
                <br>
                {!! Form::label('user_name', 'Name:') !!}
                {!! Form::text('user_name',null, array('class'=>'form-control')) !!}

                {!! Form::label('user_pass', 'Password:') !!}
                {!! Form::text('user_pass',null, array('class'=>'form-control')) !!}

                {!! Form::label('user_gender', 'Gender:') !!}
                {!! Form::text('user_gender',null, array('class'=>'form-control')) !!}

                {!! Form::label('user_phone', 'Phone:') !!}
                {!! Form::text('user_phone',null, array('class'=>'form-control')) !!}
                <br>
                {!! Form::submit('Update', array('class'=>'btn btn-primary')) !!}
                <a class="btn btn-secondary" href="{!! url('/user')!!}">Back</a>
                {!! Form::close() !!}
			</div>
		</div>
	</div>
</main>
@endsection