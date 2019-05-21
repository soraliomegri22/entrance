<!doctype html>
<html lang="ja">
    @extends('layouts.layout')
    <body class="p-3">
    @section('content')
    <center>
    <h1>feeling確認</h1>
    <h5>{{ $feeling_women->name }}さんで間違いありまんか？</h5>

    <p><a href="/{{ $next }}" class="btn btn-primary">間違いありません</a> <p>
    <p><a href="javascript:void(0);" onclick="window.history.back();" class="btn btn-danger">間違えたので戻る</a> <p>
 
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>