<!doctype html>
<html lang="ja">
@extends('layouts.layout')
<body class="p-3">
  @section('content')
  <center>
    <h1>参加者登録画面</h1>
    <br>
    <h3>--男性-- &nbsp; <a href="/men_create" class="btn btn-primary">男性追加</a></h3>

    @foreach ($men_lists as $men_list)
    <div class="card text-white bg-info mb-3" style="max-width: 30rem;">
      <div class="card-body">
        <h5 class="card-title">{{ $men_list->name }}さん </h5>
        <a href="/men_edit/{{ $men_list->id }}" class="card-link text-primary">修正</a>
        <a href="/men_delete/{{ $men_list->id }}" class="card-link text-danger">削除</a>
      </div>
    </div>
    @endforeach
    <br>
    <h3>--女性-- &nbsp; <a href="/women_create" class="btn btn-primary">女性追加</a></h3>
    @foreach ($women_lists as $women_list)
    <div class="card text-white alert-danger mb-3" style="max-width: 30rem;">
      <div class="card-body">
        <h5 class="card-title  text-danger">{{ $women_list->name }}さん</h5>
        <a href="/women_edit/{{ $women_list->id }}" class="card-link text-primary">修正</a>
        <a href="/women_delete/{{ $women_list->id }}" class="card-link text-danger">削除</a>
      </div>
    </div>
    @endforeach
    <br>
    <p><a href="/feeling_start" class="btn btn-primary btn-lg">確認画面へ</a></p>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
      integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
      crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
      integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
      crossorigin="anonymous"></script>
</body>

</html>
@endsection
</center>