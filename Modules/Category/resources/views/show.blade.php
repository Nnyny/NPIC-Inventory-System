@extends('master')


@section('content')
    <br>
    <h1>Category details</h1>
    <br>
    <table class = "table table-bordered">
        <tr>
            <th>Name: {{$category->cat_name}}</th>
            <!-- <td>{{$category->name}}</td> -->
        </tr>
        <tr>
            <th>Description: {{$category->cat_des}}</th>
            <!-- <td>{{$category->description}}</td> -->
        </tr>
    </table>
    <a class="btn btn-secondary" href="{{route('category.index')}}">Back</a>
@endsection
