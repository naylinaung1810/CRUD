@extends('layout.template')

@section('title') Welcome to laravel| Edit @stop

@section('content')
    @include('partials.navbar')

    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-4 offset-4">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-edit"></i>
                        Edit Post
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('post.update')}}">
                            {{--@csrf--}}
                            {{--{{csrf_field()}}--}}
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="id" value="{{$post->id}}">
                            <div class="form-group">
                                <label for="title">Post Title</label>
                                <input value="{{$post->title}}" type="text" name="title" id="title" class="form-control @if($errors->has('title')) is-invalid @endif">
                                @if($errors->has('title')) <span class="invalid-feedback">{{$errors->first('title')}}</span> @endif
                            </div>
                            <div class="form-group">
                                <label for="content">Post Content</label>
                                <textarea class="form-control @if($errors->has('content')) is-invalid @endif" id="content" name="content">{{$post->content}}</textarea>
                                @if($errors->has('content')) <span class="invalid-feedback">{{$errors->first('content')}}</span> @endif
                            </div>
                            <div class="form-group">
                                <a href="{{route('/')}}" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-outline-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @stop