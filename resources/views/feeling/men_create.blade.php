<!doctype html>
<html lang="ja">
<center>
    @extends('layouts.layout')
    <body class="p-3">
    @section('content')
  <body class="p-3">
    <h1>男性登録</h1>
  
    <form method="post" action="/men_create">
      {{ csrf_field() }}
      <div class="form-group form-group-lg">
        <label for="titleInput"><h3>お名前</h3></label>
        @if ($errors->any())
        <div class="errors">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <input type="text" class="form-control" id="titleInput" name="name" style="max-width: 30rem;">
      </div>
      <button type="submit" class="btn btn-primary">新規追加</button>
    </form>
</center>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>