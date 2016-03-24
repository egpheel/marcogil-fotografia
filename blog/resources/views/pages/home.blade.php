<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <!--parsleyjs-->
    <script src="/js/parsley/parsley.js"></script>
    <script src="/js/parsley/pt-pt.js"></script>
    <link rel="stylesheet" href="/css/parsley.css">
    <!--infinitescroll-->
    <script src="/js/infinitescroll/infinitescroll.js"></script>
    <!--my CSS-->
    <link rel="stylesheet" href="/css/layout.css">
    <title>Marco Gil - Blog</title>
    <!--my js-->
    <script src="/js/functions.js"></script>
  </head>
  <body>
    <div class="header">
      <h1>Marco Gil</h1>
      <p><em>frase bastante sexy sobre cenas e viagens e assim</em></p>
    </div>
    <section class="navbar">
      <hr>
      <ul><a href="#">
          <li>Categorias</li></a><a href="#">
          <li>Crónicas</li></a><a href="#">
          <li>Sobre</li></a><a href="#">
          <li>Contacto</li></a></ul>
      <hr>
    </section>
    <div class="container">@if (Session::has('success'))
      <div role="alert" class="alert alert-success"><strong>Successo: </strong>{{ Session::get('success') }}</div>@endif
      @if (count($errors) > 0)
      <div role="alert" class="alert alert-danger"><strong>Erros:</strong>
        <ul>@foreach ($errors->all() as $error)
          <li>{{ $error }}</li>@endforeach
        </ul>
      </div>@endif
    </div>
    <section class="content">
      <div class="featured">
        <hr>
        <div class="img-wrap"><img src="/img/featured-temp.jpg" alt="Publicação em destaque"></div>
        <hr>
        <div class="featured-post-wrap">
          <h2>Pelas ruas de Amesterdão</h2>
          <p>As ruas de Amesterdão são na sua maioria compostas por bicicletas, ou veículos de duas rodas. Mas esta é uma via de carros e tram´s...tive por isso a sorte de apanhar Roger a pedalar pela vida e pela cidade.</p><a href="#" class="read-more">Ler mais</a>
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
            <div class="post-img"><img src="/img/post-temp.jpg" alt="Publicação"></div>
            <div class="post-info">
              <p>{{ $post->body }}</p>
              <ul><a href="#">
                  <li>Perspectivas</li></a><a href="#">
                  <li>Música</li></a><a href="#">
                  <li>Viver</li></a><a href="#">
                  <li>Viajar</li></a></ul>
            </div>
            <hr>
          </div>@endforeach
          {!! $posts->render() !!}
        </div>
        <div class="sidebar">
          <p>Publicações recentes</p>
          <ul>@foreach ($recent_posts as $post)<a href="#">
              <li>{{ $post->title }}</li></a>@endforeach</ul>
        </div>
      </div>
    </section>
  </body>
</html>