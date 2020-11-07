@extends('layouts.helloapp')

@section('title', 'PMM')

@section('menutitle', 'トップページ')

@section('content')
    @if(Auth::check())
    <p>ユーザー名：　{{ $user->name }}</p>
    @else
    <p>※ログインしていません（<a href="/login">ログイン</a>|<a href="/register">登録</a>）</p>
    @endif
@endsection

@section('footer')
    copyright 2020 kishimoto
@endsection