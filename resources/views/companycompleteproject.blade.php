@extends('layouts.helloappcompany')

@section('title', 'PMM')

@section('menutitle', '完成プロジェクト一覧')

@section('content')
    <div class="buffer-project"></div>
    @foreach($projects as $project)
        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8" style="background-color: orange;">
                    <h3>プロジェクト名</h3>
                    <p>{{ $project->title }}</p>
                    <h3>プロジェクト開始予定日</h3>
                    <p>{{ $project->start_date }}</p>
                    <h3>プロジェクト終了予定日</h3>
                    <p>{{ $project->end_date }}</p>
                    <h3>募集人数</h3>
                    <p>{{ $project->recruitment }}人</p>
                    <h3>仕様書</h3>
                    <p><a href="/storage/{{ $project->specification }}" target="_blank">{{ $project->specification }}</a></p>
                    <p><a href="/company/complete/{{ $project->id }}">プロジェクト詳細へ</a></p>
                </div>
            </div>
        </div>
    @endforeach
@endsection