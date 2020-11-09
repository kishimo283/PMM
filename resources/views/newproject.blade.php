@extends('layouts.helloapp')

@section('title', 'PMM')

@section('menutitle', '新規プロジェクト投稿')

@section('content')
    <form action="/post" method="POST" enctype="multipart/form-data">
        @csrf
        <input id="user_id" name="user_id" type="hidden" value="{{ $id }}">

        <label for="title">プロジェクト名</label>
        <input type="text" name="title" id="title">

        <label for="overview">サービス概要</label>
        <textarea name="overview" rows="4" cols="40" id="overview"></textarea>

        <label for="skill">必要スキル</label>
        <input type="text" name="skill" id="skill">

        <label for="start_date">開発開始</label>
        <input type="date" name="start_date" id="start_date">

        <label for="end_date">開発終了</label>
        <input type="date" name="end_date" id="end_date">

        <label for="recruitment">募集人数</label>
        <input type="number" name="recruitment" min="1" max="5" id="recruitment">

        <label for="specification">仕様書（PDF）</label>
        <input type="file" name="specification" id="specification">

        <input type="submit" value="送信する">
    </form>
@endsection

@section('footer')
    copyright 2020 kishimoto
@endsection