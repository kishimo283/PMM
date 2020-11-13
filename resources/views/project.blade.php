@extends('layouts.helloapp')

@section('title', 'PMM')

@section('menutitle', 'プロジェクト詳細')

@section('content')
    <div class="project-info">
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
    </div>
    <button type="button" class="btn btn-primary">プロジェクトに参加する</button>
    <div class="project-comments">
        <h3>コメント欄</h3>
        <form action="/comment" method="POST">
        @csrf
            <input id="user_id" name="user_id" type="hidden" value="{{ $user->id }}">
            <input id="project_id" name="project_id" type="hidden" value="{{ $project->id }}">
            <textarea name="body" id="body" cols="50" rows="3"></textarea>
            <input type="submit" value="コメントする">
        </form>
        @foreach($comments as $comment)
        <form action="{{ route('CommentDestroy', $comment->id) }}" method="post">
        @csrf
        @method('DELETE')
            <div class="comments">
                    <p>{{ $comment->body }}</p>
                    <input type="submit" value="削除">
            </div>
        </form>
        @endforeach
    </div>
@endsection

@section('footer')
    copyright 2020 kishimoto
@endsection