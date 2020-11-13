@extends('layouts.helloapp')

@section('title', 'PMM')

@section('menutitle', 'マイページ')

@section('content')
    <button type="button" class="btn btn-primary" onclick="location.href='/mypage/edit/{{ $user->id }}'">編集</button>
    <h3>プロフィール写真</h3>
    <div style="width: 18rem; float:left; margin: 16px;">
    <img src="/storage/photos/{{ $user->photo }}" style="width:100%;"/>
    </div>
    <h3>ユーザー名</h3>
    <p>{{ $user->name }}</p>
    <h3>メールアドレス</h3>
    <p>{{ $user->email }}</p>
    <h3>自己紹介</h3>
    <p>{{ $user->introduction }}</p>
@endsection

@section('footer')
    copyright 2020 kishimoto
@endsection