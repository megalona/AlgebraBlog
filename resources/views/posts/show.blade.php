@extends('layouts.master')

@section('content')

    <div class="blog-post">
        <h2 class="blog-post-title">{{ $post->title }}</h2>  
     <p class="blog-post-meta">January 1, 2019 by <a href="#">Megica</a></p>
         
        <p>{{ $post->body}}</p>
      </div>

@endsection



