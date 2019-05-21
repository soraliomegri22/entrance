<!doctype html>
<html lang="ja">
  @extends('layouts.layout')
  <body class="p-3">
  @section('content')
  <center>
  <h1>メンバー確認</h1>
  <br>
    @if (count($men_all_list) < 1)
      <h5>男性を1人以上登録してください</h5>
      <p><a href="/list" class="btn btn-primary">戻る</a></p>

    @elseif (count($women_all_list) < 1)
      <h5>女性を1人以上登録してください</h5>
      <p><a href="/list" class="btn btn-primary">戻る</a></p>

    @else
      <h3>--男性--</h3>
      @foreach ($men_all_list as $men)
      <div class="card text-white bg-info mb-3" style="max-width: 30rem;">
        <div class="card-body">
          <h5 class="card-title">{{ $men->name }}さん</h5>
        </div>
      </div>
      @endforeach
      <br>

      <h3>--女性--</h3>
      @foreach ($women_all_list as $women)
      <div class="card text-white alert-danger mb-3" style="max-width: 30rem;">
        <div class="card-body">
          <h5 class="card-title  text-danger">{{ $women->name }}さん </h5>
          </div>
      </div>
      @endforeach
      <br>
      <h4 class="text-secondary"> メンバーが正しければ、スタートを押してください</h4>
      <br>
      <p><a href="/men_correct/{{ $men_all_list->first()->value('id') }}" class="btn btn-danger btn-lg">スタート</a></p>
 

    @endif
    </center>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
@endsection