@extends('layouts.helloapp')

@section('title', 'PMM')

@section('menutitle', 'プロジェクト編集ページ')

@section('content')
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/project/update" method="POST">
        @csrf
        <input type="hidden" name='id' value="{{ $project->id }}">

        <label for="title">プロジェクト名</label>
        <input type="text" name="title" id="title" value="{{ $project->title }}">

        <label for="overview">サービス概要</label>
        <textarea name="overview" rows="6" cols="40" id="overview">{{ $project->overview }}</textarea>

        <label for="skill">必要スキル</label>
        <input type="text" name="skill" id="skill" value="{{ $project->skill }}">

        <label for="start_date">開発開始</label>
        <input type="date" name="start_date" id="start_date" value="{{ $project->start_date }}">

        <label for="end_date">開発終了</label>
        <input type="date" name="end_date" id="end_date" value="{{ $project->end_date }}">

        <label for="recruitment">募集人数</label>
        <input type="number" name="recruitment" min="1" max="5" id="recruitment" value="{{ $project->recruitment }}">

        <label for="status">ステータス</label>
        <select name="status" id="status">
            <option value="未着手">未着手</option>
            <option value="進行中">進行中</option>
            <option value="完了">完了</option>
        </select>

        <label for="link">サイトリンク</label>
        <input type="text" name="link" id="link" value="{{ $project->link }}">

        <label for="price">価格</label>
        <input type="number" name="price" min="1" max="5000000" id="price" value="{{ $project->price }}">

        <input type="submit" value="更新する" class="btn btn-primary" onclick="return confirm('更新しますか？')">
    </form>
@endsection