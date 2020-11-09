@extends('layouts.helloapp')

@section('title', 'PMM')

@section('menutitle', 'プロジェクト詳細')

@section('content')
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
        <button>プロジェクトに参加する</button>
@endsection

@section('footer')
    copyright 2020 kishimoto
@endsection