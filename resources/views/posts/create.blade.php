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
        <form action="{{isset($post)?route('posts.update',$post->id):route('posts.store')}}" method="post"
            enctype="multipart/form-data">
            @csrf
            @if (isset($post))
            @method('PUT')
            @endif
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control"
                    value="{{isset($post)?$post->title: old('title') }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" class="form-control"
                    value="{{isset($post)?$post->description:old('description')}}">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <input id="x" type="hidden" name="content" value="{{isset($post)?$post->content:old('content')}}">
                <trix-editor input="x"></trix-editor>
                {{-- <textarea name="content" id="content" class="form-control"></textarea> --}}
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image">
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" class="form-control">
                    <option value="">Select</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}"
                        @if (isset($post))
                            @if ($post->category_id==$category->id)
                                selected
                            @endif
                        @else
                            @if (old('category_id')==$category->id)
                                selected
                            @endif
                        @endif
                        >{{$category->name}}</option>

                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <label for="tag_id">Tag</label>
                <select name="tag_id[]" id="select-tag" class="form-control"  multiple>
                    @foreach ($tags as $tag)
                    <option value="{{$tag->id}}"
                        @if (isset($post))
                            @if ($post->hasTag($tag->id))
                                selected
                            @endif
                        @endif
                        >{{$tag->name}}</option>

                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="{{isset($post)?"Update":"Add"}}" class="btn btn-success">
            </div>
        </form>
    </div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
<script>
    $(document).ready(function(){
        $("#select-tag").select2();
    })
</script>
@endsection
