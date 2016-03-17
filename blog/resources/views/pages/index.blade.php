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
    <!--my CSS-->
    <link rel="stylesheet" href="/css/layout.css">
    <title>Marco Gil - Blog</title>
  </head>
  <body>
    <div class="header">
      <h1>Marco Gil</h1>
      <p><em>frase bastante sexy sobre cenas e viagens e assim</em></p>
    </div>
    <div class="container">@if (Session::has('success'))
      <div role="alert" class="alert alert-success"><strong>Successo: </strong>{{ Session::get('success') }}</div>@endif
      @if (count($errors) > 0)
      <div role="alert" class="alert alert-danger"><strong>Erros:</strong>
        <ul>@foreach ($errors->all() as $error)
          <li>{{ $error }}</li>@endforeach
        </ul>
      </div>@endif
    </div>
    <div id="content">
      <div class="row">
        <div class="col-md-12">
          <div class="featured">
            <h1>Em destaque</h1>
            <p class="lead">Esta publicação está em destaque. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus perferendis cupiditate quod perspiciatis? Debitis sequi deserunt soluta, provident quo. Dolor mollitia quos illum magnam at quas, consectetur sed totam aspernatur!</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-9">
          <div class="posts-wrap">
            <div class="post">
              <h2>Publicação 1</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, neque, quae. Voluptatum dolorum mollitia omnis cum quidem iste, autem magnam deleniti, quibusdam dolorem, ratione officiis, reiciendis enim aliquid adipisci repellendus.</p>
              <div class="criado-por">
                <p> <em>por [utilizador], em [data/hora].</em></p>
              </div>
              <hr>
            </div>
            <div class="post">
              <h2>Publicação 2</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum quos blanditiis nostrum, officia saepe fugiat ullam eius, illo sint fugit dolor assumenda ex rem est quisquam aliquam perspiciatis quis, libero?</p>
              <div class="criado-por">
                <p> <em>por [utilizador], em [data/hora].</em></p>
              </div>
              <hr>
            </div>
            <div class="post">
              <h2>Publicação 3</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, neque, quae. Voluptatum dolorum mollitia omnis cum quidem iste, autem magnam deleniti, quibusdam dolorem, ratione officiis, reiciendis enim aliquid adipisci repellendus.</p>
              <div class="criado-por">
                <p> <em>por [utilizador], em [data/hora].</em></p>
              </div>
              <hr>
            </div>
            <div class="post">
              <h2>Publicação 4</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, neque, quae. Voluptatum dolorum mollitia omnis cum quidem iste, autem magnam deleniti, quibusdam dolorem, ratione officiis, reiciendis enim aliquid adipisci repellendus.</p>
              <div class="criado-por">
                <p> <em>por [utilizador], em [data/hora].</em></p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="sidebar">
            <div class="most-recent">
              <h4>Mais recentes</h4>
              <ul>
                <li><a href="#">Publicação 1</a></li>
                <li><a href="#">Publicação 2</a></li>
                <li><a href="#">Publicação 3</a></li>
                <li><a href="#">Publicação 4</a></li>
              </ul>
            </div>
            <div class="categories">
              <h4>Categorias</h4>
              <ul>
                <li><a href="#">Categoria 1</a></li>
                <li><a href="#">Categoria 2</a></li>
                <li><a href="#">Categoria 3</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="footer"></div>
  </body>
</html>