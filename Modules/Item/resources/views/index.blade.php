@extends('master')
@section('content')
<br>
<h1>Item</h1>
<br>
<a class = "btn btn-primary" href = "{{ url('/item/create') }}">Create New</a>
<br><br>
{{ Form::open(array('url'=>'/searchItem','method'=>'get')) }}
        <div class="input-group">
            {{ Form::text('keyword',$keyword ?? '', array('placeholder'=>'Search', 'class'=>'form-control')) }}
            <span class="input-group-btn">
                {{ Form::submit('search',array('class'=>'btn btn-primary')) }}
            </span>
        </div>
{{ Form::close() }}

<br><br>
@if(Session::has('item_delete'))
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Primary!</strong> {!! session('product_delete') !!}
    </div>
@endif
@if (count($items) > 0)
<div class="panel panel-default">
    <div class="panel-body">
        <table class="table table-striped task-table">
            <thead>
                <th>ID</th>
                <th>Item Code</th>
                <th>Image</th>
                <th>Name</th>
                <th>Category</th>
                <th>Qty</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td>
                    <div>{{ $item->id }}</div>
                    </td>
                    <td>
                        <a href="{{url('/item/'.$item->id)}}">{{ $item-> item_code }}</a>
                    </td>
                    <td>
                        <div>{{ Html::image('/pic/'.$item->item_img, $item->item_name, array('width'=>'60')) }}</div>
                        
                    </td>
                    <td>
                        <div>{{ $item->item_name }}</div>
                    </td>
                    <td>
                        <div>{{ $item->category->cat_name }}</div>
                    </td>
                    <td>
                        <div>{{ $item->item_qty }}</div>
                    </td>
                    <td>
                        <div>{{ $item->item_des }}</div>
                    </td>


                    <td><a class="btn btn-primary" href="{!! url('item/' . $item->id . '/edit') !!}">Edit</a></td>


                    <td>
                        {!! Form::open(array('url'=>'/item/'. $item->id, 'method'=>'DELETE')) !!}
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

<!-- Pagination -->
{{ $items->links('pagination::bootstrap-5');}}

<script>
    $(".delete").click(function() {
        var form = $(this).closest('form');
        $('<div></div>').appendTo('body')
            .html('<div><h6> Are you sure you want to delete?</h6></div>')
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
</script>
@endif
@endsection

