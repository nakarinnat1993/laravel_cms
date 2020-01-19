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
        {{isset($category)?"Edit Category":"Create Category"}}

    </div>
    <div class="card-body">
        <form action="{{isset($category)?route('categories.update',$category->id):route('categories.store')}}"
            method="post">
            @csrf
            @if (isset($category))
                @method('PUT')
            @endif


            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{isset($category)?$category->name:""}}">
            </div>
            <div class="form-group">
                <input type="submit" value="{{isset($category)?"Update":"Add"}}" class="btn btn-success">
            </div>
        </form>
    </div>

</div>

@endsection
