@extends('layouts.helloapp')

@section('title', 'PMM')

@section('menutitle', 'メインページ')

@section('content')
    <p><a href="/newproject">新規プロジェクトを立ち上げる</a></p>
    <p><a href="/complete">完成プロジェクト一覧ページ</a></p>
    <p><a href="/mypage/{{ $user->id }}">マイページ</a></p>
    @foreach($projects as $project)
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8 content-info">
                <h3>{{ $project->title }}</h3>
                <p><a href="/project/{{ $project->id }}">プロジェクト詳細へ</a></p>
            </div>
        </div>
    </div>
    @endforeach
@endsection