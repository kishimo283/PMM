@extends('layouts.helloapp')

@section('title', 'PMM')

@section('menutitle', 'マイページ編集画面')

@section('content')
    <form action="/mypage/update" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">ユーザー名</label>
        <input type="text" name="name" id="name" value="{{ $user->name }}">

        <label for="email">メールアドレス</label>
        <input type="text" name="email" id="email" value="{{ $user->email }}">

        <label for="photo">プロフィール写真</label>
        <input type="file" name="photo" id="photo" value="{{ $user->photo }}" accept="image/png, image/jpeg">

        <label for="introduction">自己紹介</label>
        <textarea name="introduction" id="introduction" cols="30" rows="3">{{ $user->introduction }}</textarea>

        <input type="submit" class="btn btn-primary" value="更新">
    </form>
@endsection

@section('footer')
    copyright 2020 kishimoto
@endsection