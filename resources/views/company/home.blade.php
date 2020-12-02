@extends('layouts.app_company')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Company Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('ログインしています!') }}
                    <p><a href="/company/complete">プロジェクト一覧へ</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection