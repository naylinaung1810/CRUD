@extends('layout.template')

@section('title') Welcome to laravel @stop

@section('content')
    @include('partials.navbar')

    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-folder-plus"></i>
                        New Post
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('post.new')}}">
                            {{--@csrf--}}
                            {{--{{csrf_field()}}--}}
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label for="title">Post Title</label>
                                <input type="text" name="title" id="title" class="form-control @if($errors->has('title')) is-invalid @endif">
                                @if($errors->has('title')) <span class="invalid-feedback">{{$errors->first('title')}}</span> @endif
                            </div>
                            <div class="form-group">
                                <label for="content">Post Content</label>
                                <textarea class="form-control @if($errors->has('content')) is-invalid @endif" id="content" name="content"></textarea>
                                @if($errors->has('content')) <span class="invalid-feedback">{{$errors->first('content')}}</span> @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                @if(Session('info'))
                    <div class="alert alert-success">
                        {{Session('info')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                <div class="card">
                    <div class="card-header"><i class="fas fa-database"></i> Avaliable Post </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead class="table-dark">
                                <tr>
                                    <td>Id</td>
                                    <td>Title</td>
                                    <td>Content</td>
                                    <td>Created Date</td>
                                    <td>Action</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{$post->id}}</td>
                                        <td>{{$post->title}}</td>
                                        <td>{{$post->content}}</td>
                                        <td>{{$post->created_at->diffForHumans()}}</td>
                                        <td>
                                            <div class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-cogs"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item text-primary" href="{{route('post.edit',['id'=>$post->id])}}"><i class="fa fa-edit"></i> edit</a>
                                                    <a data-toggle="modal" data-target="#r{{$post->id}}" class="dropdown-item text-danger" href="#"><i class="fa fa-trash"></i> delete</a>



                                                </div>
                                            </div>
                                            {{--------------------For Modal-------------------------}}
                                            <div id="r{{$post->id}}" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">Comfirm</div>
                                                        <div class="modal-body">
                                                            <i class="fa fa-exclamation-triangle fa-4x"></i>
                                                            <hr>
                                                            <p>Are you sure want to remove id <b>{{$post->id}}</b> of post</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="{{route('post.delete',['id'=>$post->id])}}" class="btn btn-outline-primary">Agree</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$posts->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @stop