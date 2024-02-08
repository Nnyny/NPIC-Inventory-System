@extends('master')
@section('content')
<br>
<h1>User</h1>
<br>
<a class = "btn btn-primary" href = "{{ url('/user/create') }}">Create New</a>
<br><br>
{{ Form::open(array('url'=>'/search','method'=>'get')) }}
        <div class="input-group">
            {{ Form::text('keyword',$keyword ?? '', array('placeholder'=>'Search', 'class'=>'form-control')) }}
            <span class="input-group-btn">
                {{ Form::submit('search',array('class'=>'btn btn-primary')) }}
            </span>
        </div>
{{ Form::close() }}


<br><br>
@if(Session::has('user_delete'))
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Primary!</strong> {!! session('product_delete') !!}
    </div>
@endif
@if (count($users) > 0)
<div class="panel panel-default">
    <div class="panel-body">
        <table class="table table-striped task-table">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Password</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>
                    <div>{{ $user->id }}</div>
                    </td>
                    <td>
                        <div>{{ $user-> user_name }}</div>
                    </td>
                    <td>
                        <div>{{ $user->user_pass }}</div>
                    </td>
                    <td>
                        <div>{{ $user->user_gender }}</div>
                    </td>
                    <td>
                        <div>{{ $user->user_phone }}</div>
                    </td>




                    <td><a class="btn btn-primary" href="{!! url('user/' . $user->id . '/edit') !!}">Edit</a></td>




                    <td>
                        {!! Form::open(array('url'=>'/user/'. $user->id, 'method'=>'DELETE')) !!}
                        {!! csrf_field() !!}
                        {!! method_field('DELETE') !!}
                        <button class="btn btn-danger delete">Delete</button>
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

