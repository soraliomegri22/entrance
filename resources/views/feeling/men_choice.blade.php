<!doctype html>
<html lang="ja">
@extends('layouts.layout')
<body class="p-3">
@section('content')
    <center>
        <h1>フィーリング相手確認</h1>
        <br>
        <div class="card text-white bg-info mb-3" style="max-width: 30rem;">
            <div class="card-body">
                <h4 class="card-title">{{ $men->name }}さんの番です</h4>
            </div>
        </div>
        <h4 class="text-secondary">気になる方の優先順位を選んでください。</h4>
        <form method="post" action="/men_choice">
            {{ csrf_field() }}
            <div class="form-group form-group-lg"></div>
            <input type="hidden" class="form-control form-control-lg" name="id" value="{{ $men->id }}">
            <p>
                1番目{{ Form::select('women_id_1', $women_lists, null, ['class' => "form-control form-control-lg", 'style' => "max-width: 10rem;"]) }}</p>
            <p>
                2番目{{ Form::select('women_id_2', $women_lists, null, ['class' => "form-control form-control-lg", 'style' => "max-width: 10rem;"]) }}</p>
            <p>
                3番目{{ Form::select('women_id_3', $women_lists, null, ['class' => "form-control form-control-lg", 'style' => "max-width: 10rem;"]) }}</p>

            <p>※同じ人は選択しないでください</p>
            <button type="submit" class="btn btn-primary btn-lg">選択する</button>
        </form>
    </center>

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
