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
    <!--my CSS-->
    <link rel="stylesheet" href="/css/layout.css">
    <title>Marco Gil - Blog</title>
  </head>
  <body>
    <div class="header">
      <h1>Marco Gil</h1>
      <p><em>frase bastante sexy sobre cenas e viagens e assim</em></p>
    </div>
    <div id="content">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center">Criar nova publicação</h1>
          <hr>
        </div>
        <div class="col-md-6 col-md-offset-3">
          <div class="form-wrap">
            {!! Form::open(array('route' => 'posts.store')) !!}
            {{ Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'Título')) }}
            {{ Form::textarea('body', null, array('class'=> 'form-control', 'placeholder' => 'Publicação')) }}
            {{ Form::submit('Publicar', array('class' => 'btn btn-lg btn-block btn-success')) }}
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </body>
</html>