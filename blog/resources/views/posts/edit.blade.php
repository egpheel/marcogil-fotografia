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
      <div class="row">{!! Form::model($post, array('route' => ['posts.update', $post->id], 'method' => 'PUT')) !!}
        <div class="container-fluid">
          <div class="col-md-9">
            <div class="edit-form">
              {{ Form::text('title', null, array('class' => 'form-control input-lg', 'placeholder' => 'Título')) }}
              {{ Form::textarea('body', null, array('class' => 'form-control', 'placeholder' => 'Publicação')) }}
            </div>
          </div>
          <div class="col-md-3">
            <div class="sidebar">
              <dl>
                <dt>Criada em:</dt>
                <dd>{{ date('d M Y \à\s H:i:s', strtotime($post->created_at)) }}</dd>
              </dl>
              <dl>
                <dt>Última edição em:</dt>
                <dd>{{ date('d M Y \à\s H:i:s', strtotime($post->updated_at)) }}</dd>
              </dl>
              <hr>
              <div class="row">
                <div class="col-sm-6">{!! Html::linkRoute('posts.show', 'Cancelar', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}</div>
                <div class="col-sm-6">{{ Form::submit('Guardar', array('class' => 'btn btn-success btn-block')) }}</div>
              </div>
            </div>
          </div>
        </div>{!! Form::close() !!}
      </div>
    </div>
    <div id="footer"></div>
  </body>
</html>