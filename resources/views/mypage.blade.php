@extends('layouts.helloapp')

@section('title', 'PMM')

@section('menutitle', 'マイページ')

@section('content')
    <button type="button" class="btn btn-primary" onclick="location.href='/mypage/edit/{{ $user->id }}'">編集</button>
    <h3>プロフィール写真</h3>
    <div style="width: 18rem; float:left; margin: 16px;">
    <img src="/storage/photos/{{ $user->photo }}" style="width:100%;"/>
    </div>
    <div class="profile-info">
        <h3>ユーザー名</h3>
        <p>{{ $user->name }}</p>
        <h3>メールアドレス</h3>
        <p>{{ $user->email }}</p>
        <h3>自己紹介</h3>
        <p>{{ $user->introduction }}</p>
    </div>
    <div class="porject-info">
        @foreach($projects as $project)
        <p>{{ $project->status }}</p>
        <h3>プロジェクト名</h3>
        <p>{{ $project->title }}</p>
        <h3>概要</h3>
        <p>{{ $project->overview }}</p>
        <h3>スキル</h3>
        <p>{{ $project->skill }}</p>
        <h3>プロジェクト開始予定日</h3>
        <p>{{ $project->start_date }}</p>
        <h3>プロジェクト終了予定日</h3>
        <p>{{ $project->end_date }}</p>
        <h3>募集人数</h3>
        <p>{{ $project->recruitment }}人</p>
        <h3>仕様書</h3>
        <p><a href="/storage/{{ $project->specification }}" target="_blank">{{ $project->specification }}</a></p>
        <button type="button" class="btn btn-primary" onclick="location.href='/project/edit/{{ $project->id }}'">編集</button>
        @endforeach
    </div>
@endsection

@section('footer')
    copyright 2020 kishimoto
@endsection