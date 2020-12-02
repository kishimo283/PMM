@extends('layouts.helloapp')

@section('title', 'PMM')

@section('menutitle', 'マイページ')

@section('content')
    <div class="mypage" style="padding: 10px;">
        <button type="button" class="btn btn-primary" onclick="location.href='/mypage/edit/{{ $user->id }}'" style="margin-bottom: 10px;">プロフィール編集</button>
        <h3>プロフィール写真</h3>
        <div style="height: 24rem; width: 18rem; float:left; margin: 16px;">
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
        @foreach($projects as $project)
        <div class="project-info">
            <h3>ステータス</h3>
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
            <button type="button" class="btn btn-primary" onclick="location.href='/project/edit/{{ $project->id }}'">プロジェクト編集</button>
        </div>
        @endforeach
    </div>

@endsection