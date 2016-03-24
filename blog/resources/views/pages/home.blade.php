@extends('layout')

@section('scripts')
  <!--infinitescroll-->
  <script src="/js/infinitescroll/infinitescroll.js"></script>
  <!--my js-->
  <script src="/js/functions.js"></script>
@endsection

@section('title', '- Blog')

@section('content')
  <section class="content">
    <div class="featured">
      <hr>
      <div class="img-wrap">
        <img src="/img/featured-temp.jpg" alt="Publicação em destaque">
      </div>
      <hr>
      <div class="featured-post-wrap">
        <h2>Pelas ruas de Amesterdão</h2>
        <p>As ruas de Amesterdão são na sua maioria compostas por bicicletas, ou veículos de duas rodas. Mas esta é uma via de carros e tram´s...tive por isso a sorte de apanhar Roger a pedalar pela vida e pela cidade.</p>
        <a href="#" class="read-more">Ler mais</a>
      </div>
    </div>
    <div class="posts-wrap">
      <div class="posts">

        @foreach ($posts as $post)
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
              <p>{{ $post->body }}</p>
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
        @endforeach
        {!! $posts->render() !!}
      </div>
      <div class="sidebar">
        <p>Publicações recentes</p>
        <ul>
          @foreach ($recent_posts as $post)
            <a href="#">
              <li>{{ $post->title }}</li>
            </a>
          @endforeach
        </ul>
        <hr>
        <p>Arquivo</p>
        <ul>
          @foreach($archives as $archive=>$arc)
            <a href="#">
              <li>{{ $archive }}</li>
            </a>
          @endforeach
        </ul>
      </div>
    </div>
  </section>

@endsection
