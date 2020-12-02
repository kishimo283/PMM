<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMM</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="header">
        <h1><a href="/company/top">@yield('title')</a></h1>
        <h2 class="menutitle">@yield('menutitle')</h2>
    </div>
    <div class="main">
        <div class="buffer"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="content">
                        @yield('content')
                        </div>
                    </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>copyright 2020 kishimoto</p>
    </div>
</body>
</html>