<!doctype html>
<html lang="ja">
  <head>
    <title>Laravelチュートリアル</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body class="p-3">
  <h2>メンバー確認</h2>
  <br>
    @if (count($men_all_list) < 1)
      <h5>男性を1人以上登録してください</h5>
      <p><a href="/list" class="btn btn-primary">戻る</a></p>

    @elseif (count($women_all_list) < 1)
      <h5>女性を1人以上登録してください</h5>
      <p><a href="/list" class="btn btn-primary">戻る</a></p>

    @else
      <h5>男性参加者</h5>

      @foreach ($men_all_list as $men)
      <!-- <div class="card mb-2">
        <div class="card-body"> -->
          <h6 class="card-title">{{ $men->name }}</h6>
        <!-- </div> -->
      <!-- </div> -->
      @endforeach
      <br>
      <h5>女性一覧</h5>
      @foreach ($women_all_list as $women)
      <!-- <div class="card mb-2">
        <div class="card-body"> -->
          <h6 class="card-title">{{ $women->name }}</h6>
        <!-- </div>
      </div> -->
      @endforeach

      <p><a href="/men_correct/{{ $men_all_list->first()->value('id') }}" class="btn btn-primary">スタート</a></p>
 

    @endif

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
