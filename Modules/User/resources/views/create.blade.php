@extends('master')
@section('content')
    <br><h1>Create New User</h1>
    @if(Session::has('user_create'))
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Primary!</strong> {!! session('user_create') !!}
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
    {!! Form::open(['url' => 'user']) !!}
    {!! Form::label('user_name', 'Name: ') !!}
    {!! Form::text('user_name', '',array('class'=>'form-control')) !!}
    <br>
    {!! Form::label('user_pass', 'Password: ') !!}
    {!! Form::text('user_pass', '',array('class'=>'form-control')) !!}
    <br>
    {!! Form::label('user_gender', 'Gender: ') !!}
    {!! Form::text('user_gender', '',array('class'=>'form-control')) !!}
    <br>
    {!! Form::label('user_phone', 'Phone: ') !!}
    {!! Form::text('user_phone', '',array('class'=>'form-control')) !!}
    <br>
    <div>
        {!! Form::submit('Create',array('class'=> 'btn btn-primary')) !!}
        <a class="btn btn-secondary" href="{{route('user.index')}}">Back</a>
        {!! Form::close() !!}
    </div>
@endsection