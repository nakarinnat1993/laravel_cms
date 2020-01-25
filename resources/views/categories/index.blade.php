@extends('layouts.app');

@section('content')
{{-- <h2>Category</h2> --}}
<div class="d-flex justify-content-end mb-2">
    <a href="{{route('categories.create')}}" class="btn btn-success">Add Category</a>
</div>

<div class="card card-default">
    <div class="card-header">
        Category
    </div>
    <div class="card-body">
        @if ($categories->count()>0)


        <table class="table table-bordered">
            <thead>
                {{-- <th>Id.</th> --}}
                <th>Name</th>
                <th>Count Posts</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
            @foreach ($categories as $row)
            <tr>
                {{-- <td>{{$row->id}}</td> --}}
                <td>{{$row->name}}</td>
                <td>{{$row->posts->count()}}</td>
                <td><a href="{{route('categories.edit',$row->id)}}" class="btn btn-warning btn-sm">Edit</a></td>
                <td>
                    <form action="{{route('categories.destroy',$row->id)}}" method="post" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                    </form>

            </tr>

            @endforeach
        </table>
        @else
            <h3>No Category</h3>
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
