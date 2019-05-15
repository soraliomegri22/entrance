<!doctype html>
<html lang="ja">
  <head>
    <title>Laravelチュートリアル</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body class="p-3">
  <h2>登録画面</h2>
    <h4>男性リスト一覧</h4>
    <p><a href="/men_create" class="btn btn-primary">新規追加</a></p>
 
    @foreach ($men_lists as $men_list)
    <div class="card mb-2">
      <div class="card-body">
        <h6 class="card-title">{{ $men_list->name }}</h6>
        <!-- <h6 class="card-subtitle mb-2 text-muted">{{ $men_list->updated_at }}</h6> -->
        <!-- <p class="card-text">{{ $men_list->body }}</p&gt -->
        <a href="/men_edit/{{ $men_list->id }}" class="card-link">修正</a>
        <a href="/men_delete/{{ $men_list->id }}" class="card-link">削除</a>
      </div>
    </div>
    @endforeach

    <h4>女性リスト一覧</h4>
    <p><a href="/women_create" class="btn btn-primary">新規追加</a></p>
 
    @foreach ($women_lists as $women_list)
    <div class="card mb-2">
      <div class="card-body">
        <h6 class="card-title">{{ $women_list->name }}</h6>
        <!-- <h6 class="card-subtitle mb-2 text-muted">{{ $men_list->updated_at }}</h6> -->
        <!-- <p class="card-text">{{ $men_list->body }}</p&gt -->
        <a href="/women_edit/{{ $women_list->id }}" class="card-link">修正</a>
        <a href="/women_delete/{{ $women_list->id }}" class="card-link">削除</a>
      </div>
    </div>
    @endforeach
 
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
