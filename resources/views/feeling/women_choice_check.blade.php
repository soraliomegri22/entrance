<!doctype html>
<html lang="ja">
@extends('layouts.layout')
<body class="p-3">
@section('content')
    <center>
        <h1>フィーリング相手確認</h1>
        <br>
        <h2>
            １番目
            <span style="color:white; background-color:#2d26ff">{{ $feeling_men_1 }}</span>
            <br>
            2番目
            <span style="color:white; background-color:#2d26ff">{{ $feeling_men_2 }}</span>
            <br>
            3番目
            <span style="color:white; background-color:#2d26ff">{{ $feeling_men_3 }}</span>
            <br>
            <span>で間違いありまんか？</span>
        </h2>
        <br>
        <p><a href="/{{ $next }}" class="btn btn-primary btn-lg">間違いありません</a>
        <p>
        <p><a href="javascript:void(0);" onclick="window.history.back();" class="btn btn-danger btn-lg">間違えたので戻る</a>
        <p>
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
</html>