@extends('layouts.app');

@section('content')
{{-- <h2>Category</h2> --}}
<div class="d-flex justify-content-end mb-2">
    <a href="{{route('tags.create')}}" class="btn btn-success">Add Tags</a>
</div>

<div class="card card-default">
    <div class="card-header">
        Tag
    </div>
    <div class="card-body">
        @if ($tags->count()>0)


        <table class="table table-bordered">
            <thead>
                {{-- <th>Id.</th> --}}
                <th>Name</th>
                <th>Count Posts</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
            @foreach ($tags as $row)
            <tr>
                {{-- <td>{{$row->id}}</td> --}}
                <td>{{$row->name}}</td>
                <td>{{$row->posts->count()}}</td>
                <td><a href="{{route('tags.edit',$row->id)}}" class="btn btn-warning btn-sm">Edit</a></td>
                <td>
                    <form action="{{route('tags.destroy',$row->id)}}" method="post" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                    </form>

            </tr>

            @endforeach
        </table>
        @else
            <h3>No Tags</h3>
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
