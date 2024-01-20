@extends('house::layouts.master')
@section('content')
<br>
<h1>House</h1>
<br>
<a class = "btn btn-primary" href = "{{ url('/house/create') }}">Create New</a>
    <form
        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>
<!-- <br><br>
{{ Form::open(array('url'=>'/search','method'=>'get')) }}
        <div class="input-group">
            {{ Form::text('keyword',$keyword ?? '', array('placeholder'=>'Search', 'class'=>'form-control')) }}
            <span class="input-group-btn">
                {{ Form::submit('search',array('class'=>'btn btn-primary')) }}
            </span>
        </div>
{{ Form::close() }}

<br><br> -->
@if(Session::has('house_delete'))
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Primary!</strong> {!! session('product_delete') !!}
    </div>
@endif
@if (count($houses) > 0)
<div class="panel panel-default">
    <div class="panel-body">
        <table class="table table-striped task-table">
            <thead>
                <th>ID</th>
                <th>House Number</th>
                <th>Street</th>
                <th>Country</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
            <tbody>
                @foreach ($houses as $house)
                <tr>
                    <td>
                    <div>{{ $house->id }}</div>
                    </td>
                    <td>
                        <a href="{{url('/house/'.$house->id)}}">{{ $house-> house_num }}</a>
                    </td>
                    <td>
                        <div>{{ $house->street }}</div>
                    </td>
                    <td>
                        <div>{{ $house->country }}</div>
                    </td>


                    <td><a href="{!! url('house/' . $house->id . '/edit') !!}">Edit</a></td>


                    <td>
                        {!! Form::open(array('url'=>'/house/'. $house->id, 'method'=>'DELETE')) !!}
                        {!! csrf_field() !!}
                        {!! method_field('DELETE') !!}
                        <i class="fa-solid fa-trash-can"></i>
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- <script>
    $(".delete").click(function() {
        var form = $(this).closest('form');
        $('<div></div>').appendTo('body')
            .html('<div><h6> Are you sure ?</h6></div>')
            .dialog({
                modal: true,
                title: 'Delete message',
                zIndex: 10000,
                autoOpen: true,
                width: 'auto',
                resizable: false,
                buttons: {
                    Yes: function() {
                        $(this).dialog('close');
                        form.submit();
                    },
                    No: function() {
                        $(this).dialog("close");
                        return false;
                    }
                },
                close: function(event, ui) {
                    $(this).remove();
                }
            });
        return false;
    });
</script> -->
@endif
@endsection
