@extends('layouts.helloapp')

@section('title', 'PMM')

@section('menutitle', 'トップページ')

@section('content')
    @if(Auth::check())
    <p>ユーザー名：　{{ $user->name }}</p>
    <p><a href="/home">ログアウト</a></p>
    <p><a href="/main">メインページへ</a></p>
    @else
    <p>※ログインしていません（<a href="/login">ログイン</a>|<a href="/register">登録</a>）</p>
    <p>※企業の方はこちらから（<a href="/company/login">ログイン</a>|<a href="/company/register">登録</a>）</p>
    @endif
@endsection