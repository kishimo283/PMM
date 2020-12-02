@extends('layouts.helloappcompany')

@section('title', 'PMM')

@section('menutitle', '完成プロジェクト詳細')

@section('content')
    <div class="project-info">
        <p>{{ $project->status }}</p>
        <h3>プロジェクト名</h3>
        <p>{{ $project->title }}</p>
        <h3>発案者</h3>
        <p><!--<a href="/mypage/{{ $originater->id }}">-->{{ $originater->name }}</a></p>
        <h3>リンク</h3>
        <p><a href="{{ $project->link }}">{{ $project->link }}</a></p>
        <h3>概要</h3>
        <p>{{ $project->overview }}</p>
        <h3>仕様書</h3>
        <p><a href="/storage/{{ $project->specification }}" target="_blank">{{ $project->specification }}</a></p>
        <h3>価格</h3>
        <p>{{ $project->price }}円</p>
    </div>
@endsection