<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMM</title>
</head>
<body>
    <div class="header">
        <h1>@yield('title')</h1>
    </div>
    <h2 class="menutitle">@yield('menutitle')</h2>
    <div class="content">
    @yield('content')
    </div>
    <div class="footer">
    @yield('footer')
    </div>
</body>
</html>