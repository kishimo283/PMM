@extends('layouts.helloapp')

@section('title', 'PMM')

@section('menutitle', '完成プロジェクト一覧')

@section('content')
    <p><a href="/newproject">新規プロジェクトを立ち上げる</a></p>
    <p><a href="/main">メインページへ戻る</a></p>
    <p><a href="/mypage/{{ $user->id }}">マイページ</a></p>
    <div class="buffer-project"></div>
    @foreach($projects as $project)
        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8 content-info">
                    <h3>{{ $project->title }}</h3>
                    <p><a href="/complete/{{ $project->id }}">プロジェクト詳細へ</a></p>
                </div>
            </div>
        </div>
    @endforeach
@endsection