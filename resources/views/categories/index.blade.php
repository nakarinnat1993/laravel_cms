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
        <table class="table table-bordered">
            <thead>
                <th>Id.</th>
                <th>Name</th>
            </thead>
            @foreach ($categories as $row)
            <tr>
                <td>{{$row->id}}</td>
                <td>{{$row->name}}</td>
            </tr>

            @endforeach
        </table>
    </div>
</div>
@endsection
