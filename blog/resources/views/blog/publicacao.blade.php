@extends('layout')

@section('scripts')
  <!--infinitescroll-->
  <script src="/js/infinitescroll/infinitescroll.js"></script>
  <!--my js-->
  <script src="/js/functions.js"></script>
@endsection

@section('title', '- '. $post->title)

@section('content')
  <section class="content">
    <div class="posts-wrap">
      <div class="posts">
        <div class="post">
          <div class="post-info">
            <p class="date">
              <time datetime="{{ $post->created_at->toAtomString() }}">{{ $post->date }}</time>
            </p>
            <h2>{{ $post->title }}</h2>
          </div>
          <div class="post-img">
            <img src="/img/post-temp.jpg" alt="Publicação">
          </div>
          <div class="post-info">
            <p>{!! nl2br(e($post->body)) !!}</p>
            <ul>
              <a href="#">
                <li>Perspectivas</li>
              </a>
              <a href="#">
                <li>Música</li>
              </a>
              <a href="#">
                <li>Viver</li>
              </a>
              <a href="#">
                <li>Viajar</li>
              </a>
            </ul>
          </div>
          <hr>
        </div>
      </div>
      @include('partials._sidebar')
    </div>
  </section>

@endsection
