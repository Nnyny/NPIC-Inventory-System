@extends('house::layouts.master')
@section('content')
    <br><h1>Create New House</h1>
    @if(Session::has('house_create'))
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Primary!</strong> {!! session('house_create') !!}
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
    {!! Form::open(['url' => 'house']) !!}
    {!! Form::label('house_num', 'House Number: ') !!}
    {!! Form::text('house_num', '',array('class'=>'form-control')) !!}
    <br>
    {!! Form::label('street', 'Street: ') !!}
    {!! Form::textarea('street', '',array('class'=>'form-control')) !!}
    <br>
    {!! Form::label('country', 'Country: ') !!}
    {!! Form::textarea('country', '',array('class'=>'form-control')) !!}
    <br>
    {!! Form::submit('Create',array('class'=> 'btn btn-primary')) !!}
    <a class="btn btn-secondary" href="{{route('house.index')}}">Back</a>
    {!! Form::close() !!}
@endsection