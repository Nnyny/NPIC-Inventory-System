@extends('house::layouts.master')
@section('content')
    <br>
    <h1>House Details</h1>
    <br>
    <table class = "table table-bordered">
        <tr>
            <td>House Number: {{$house->house_num}}</td>
            <!-- <td>{{$house->house_num}}</td> -->
        </tr>
        <tr>
            <td>Street: {{$house->street}}</td>
        </tr>
        <tr>
            <td>Country: {{$house->country}}</td>
        </tr>
    </table>
    <a class="btn btn-secondary" href="{{route('house.index')}}">Back</a>
@endsection