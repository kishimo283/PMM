@extends('layouts.helloappcompany')

@section('title', 'PMM')

@section('menutitle', '完成プロジェクト一覧')

@section('content')
    <p><a href="/company/top">トップページへ戻る</a></p>
    <div class="buffer-project"></div>
    @foreach($projects as $project)
        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8 content-info"><a href="/company/complete/{{ $project->id }}">
                    <h3>プロジェクト名</h3>
                    <p>{{ $project->title }}</p>
                </div></a>
            </div>
        </div>
    @endforeach
@endsection