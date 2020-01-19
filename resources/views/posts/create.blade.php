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
        {{isset($post)?"Edit Post":"Create Post"}}

    </div>
    <div class="card-body">
        <form action="{{isset($post)?route('posts.update',$post->id):route('posts.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @if (isset($post))
            @method('PUT')
            @endif
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control"
                    value="{{isset($post)?$post->title:""}}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" class="form-control"
                    value="{{isset($post)?$post->description:""}}">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control">{{isset($post)?$post->content:""}}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image">
            </div>
            <div class="form-group">
                <input type="submit" value="{{isset($post)?"Update":"Add"}}" class="btn btn-success">
            </div>
        </form>
    </div>

</div>

@endsection
