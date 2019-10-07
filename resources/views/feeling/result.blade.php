<!doctype html>
<html lang="ja">
  @extends('layouts.layout')
  <body class="p-3">
  @section('content')
  <center>
  <body class="p-3">
  <h2>結果発表</h2>
    @if (count($love) === 0)
        <br>
        <h4> 残念ながらフィーリングに失敗しました</h4> 
        <p><a href="/list" class="btn btn-primary btn-lg">TOPに戻る</a></p>

    @else
        <br>
        <h3> {{ count($love) }}組のフィーリングが成功しました</h3> 
        <br>
        <p><a href="/result_details" class="btn btn-primary btn-lg">詳細を見る</a></p>
    @endif
 
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>