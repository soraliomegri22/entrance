<!doctype html>
<html lang="ja">
<center>
  @extends('layouts.layout')
  <body class="p-3">
  <h1>結果発表</h1>
  <br>
  @foreach ($feeling_success as $user)
    <div class="text-white alert alert-danger mb-2" style="max-width: 30rem;">
      <div class="card-body">
        <h4>
          <span class="text-danger">{{ $user['men'] }} </span>さん &
          <span class="text-info">{{ $user['women'] }}</span>さん
        </h4>
      </div> 
    </div>
  @endforeach
  <br>
  <h4 class="text-secondary"> おめでとうございます！</h4>
  <br>
  <p><a href="/list" class="btn btn-primary btn-lg">TOPに戻る</a></p>

 
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>