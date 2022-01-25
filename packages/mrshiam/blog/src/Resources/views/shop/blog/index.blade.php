@extends('shop::layouts.master')

@section('page_title')
    Package Blog
@stop

@section('content-wrapper')

    <div class="main">
        <div class="row">
            <div class="col-md-8 offset-3">
                <h2>Blogs</h2>
                <hr>
                @foreach($blogs as $blog)
                <div class="post-preview">
                    <a href="{{route('shop.blog.show',$blog->id)}}">
                        <h2 class="post-title">{{$blog->blog_title}}</h2>
                    </a>
                    <p class="post-meta">
                        Posted by
                        <a href="#">{{$blog->writer_name}}</a>
                        on {{$blog->created_at}}
                    </p>
                </div>
                @endforeach
            </div>


        </div>
    </div>

@stop