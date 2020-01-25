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
        {{isset($tag)?"Edit Tag":"Create Tag"}}

    </div>
    <div class="card-body">
        <form action="{{isset($tag)?route('tags.update',$tag->id):route('tags.store')}}"
            method="post">
            @csrf
            @if (isset($tag))
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{isset($tag)?$tag->name:""}}">
            </div>
            <div class="form-group">
                <input type="submit" value="{{isset($tag)?"Update":"Add"}}" class="btn btn-success">
            </div>
        </form>
    </div>

</div>

@endsection
