@extends('master')
@section('content')
<br>
<h1>Category</h1>
<br>
<a class = "btn btn-primary" href = "{{ url('/category/create') }}">Create New</a>
<br><br>
@if(Session::has('category_delete'))
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Primary!</strong> {!! session('category_delete') !!}
    </div>
@endif  
<table class="table table-striped task-table">
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Edit</th>
        <th>Delete</th>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>
                {{ $category->id }}
            </td>
            <td>
                <a href="{{ url('/category/' . $category->id) }}">{!! $category->cat_name !!}</a>
            </td>
            <td>
                {!! $category-> cat_des !!}
            </td>
            <td><a class="btn btn-primary" href="{!! url('category/' . $category->id . '/edit') !!}">Edit</a></td>
            <td>
                {!! Form::open(array('url'=>'/category/'. $category->id, 'method'=>'DELETE')) !!}
                {!! csrf_field() !!}
                {!! method_field('DELETE') !!}
                <button class="btn btn-danger delete">Delete</button>
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

