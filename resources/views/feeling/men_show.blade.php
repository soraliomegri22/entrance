<!doctype html>
<html lang="ja">
  @extends('layouts.layout')
  <body class="p-3">
  @section('content')
  <center>
  <body class="p-3">
    <h1>登録削除</h1>
 
    <form method="post" action="/men_delete">
      {{ csrf_field() }}
      <input type="hidden" class="form-control" name="id" value="{{ $men_lists->id }}">
      <div class="form-group">
        <label for="titleInput">名前</label>
        <input type="text" readonly class="form-control" id="titleInput" name="title" value="{{ $men_lists->name }}" style="max-width: 30rem;">
      </div>
      <button type="submit" class="btn btn-primary">削除</button>
    </form>
 
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>