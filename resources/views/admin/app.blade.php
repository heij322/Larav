<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Админ-панель</title>
    <style>
        body { font-family: sans-serif; margin: 0; background: #f4f4f4; }
        .sidebar { width: 250px; background: #333; color: white; height: 100vh; position: fixed; padding-top: 20px; }
        .sidebar a { display: block; color: white; padding: 15px; text-decoration: none; }
        .sidebar a:hover { background: #555; }
        .content { margin-left: 260px; padding: 20px; }
        .btn { background: #007bff; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; border: none; cursor: pointer; }
        .btn-danger { background: #dc3545; }
        .btn-success { background: #28a745; }
        table { width: 100%; background: white; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        th { background: #eee; }
    </style>
</head>
<body>
    <div class="sidebar">
        <h3 style="text-align:center;">Админка</h3>
        <a href="{{ route('admin.index') }}">Главная</a>
        <a href="{{ route('admin.products') }}">Товары</a>
        <a href="{{ route('admin.orders') }}">Заказы</a>
        <a href="/" target="_blank">На сайт &rarr;</a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выход</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
    </div>

    <div class="content">
        @if(session('success'))
            <div style="background:#d4edda; padding:10px; margin-bottom:20px;">{{ session('success') }}</div>
        @endif
        
        @yield('content')
    </div>
</body>
</html>