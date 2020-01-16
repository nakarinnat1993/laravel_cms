@extends('layouts.app');

@section('content')

<div class="card card-default">
    @if ($errors->any())
    <div class="alert alert-danger ">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card-header">
        Create Category
    </div>
    <div class="card-body">
        <form action="{{route('categories.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" value="Add" class="btn btn-success">
            </div>
        </form>
    </div>

</div>

@endsection
