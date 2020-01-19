@extends('layouts.app');

@section('content')
{{-- <h2>Category</h2> --}}
<div class="d-flex justify-content-end mb-2">
    <a href="{{route('posts.create')}}" class="btn btn-success">Add Post</a>
</div>

<div class="card card-default">
    <div class="card-header">
        Post
    </div>
    <div class="card-body">
        @if ($posts->count()>0)


        <table class="table table-bordered">
            <thead>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
            @foreach ($posts as $row)
            <tr>
                <td><img src="storage/{{$row->image}}" alt="" srcset="" width="65px"></td>
                <td>{{$row->title}}</td>
                <td>{{$row->description}}</td>
                <td><a href="{{route('posts.edit',$row->id)}}" class="btn btn-warning btn-sm">Edit</a></td>
                <td>
                    <form action="{{route('posts.destroy',$row->id)}}" method="post" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                    </form>

            </tr>

            @endforeach
        </table>
        @else
            <h3>No Post</h3>
        @endif
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.delete-form').on('submit',function(){
            if(confirm("ต้องการจะลบหรือไม่")){
                return true;
            }else{
                return false;
            }
        })
    })

</script>
@endsection
