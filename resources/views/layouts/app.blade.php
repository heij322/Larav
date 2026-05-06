<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Фермерский магазин</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary-green: #6ab04c; /* Основной зеленый */
            --light-green: #badc58;   /* Светло-зеленый для акцентов */
            --bg-color: #f4f9f1;      /* Цвет фона сайта */
            --white: #ffffff;
            --text-color: #333;
            --shadow: 0 4px 15px rgba(0,0,0,0.05);
        }

        body {
            font-family: 'Nunito', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        nav {
            background: var(--white);
            padding: 15px 5%;
            box-shadow: var(--shadow);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            font-size: 24px;
            font-weight: 800;
            color: var(--primary-green);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-links {
            display: flex;
            gap: 25px;
            align-items: center;
        }

        .nav-links a {
            text-decoration: none;
            color: #555;
            font-weight: 600;
            transition: color 0.2s;
        }

        .nav-links a:hover {
            color: var(--primary-green);
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
            flex: 1;
        }

        .btn {
            display: inline-block;
            background: var(--primary-green);
            color: white;
            padding: 10px 20px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(106, 176, 76, 0.4);
            color: white;
        }
        
        .btn-outline {
            background: transparent;
            border: 2px solid var(--primary-green);
            color: var(--primary-green);
        }
        
        .btn-outline:hover {
            background: var(--primary-green);
            color: white;
        }

        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .product-card {
            background: var(--white);
            border-radius: 20px;
            padding: 20px;
            text-align: center;
            box-shadow: var(--shadow);
            transition: transform 0.3s;
            position: relative;
            overflow: hidden;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-img-placeholder {
            width: 100%;
            height: 150px;
            background: #eee;
            border-radius: 15px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #aaa;
            font-size: 40px;
        }

        .product-card h3 {
            margin: 10px 0 5px;
            font-size: 18px;
        }

        .product-card .price {
            color: var(--primary-green);
            font-weight: 800;
            font-size: 20px;
            margin-bottom: 15px;
        }

        /* --- СЕКЦИИ ГЛАВНОЙ --- */
        .hero-section {
            background: white;
            padding: 40px;
            border-radius: 30px;
            margin-bottom: 40px;
            text-align: center;
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
        }

        .hero-section h1 {
            color: var(--primary-green);
            font-size: 32px;
        }

        .features {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
            margin: 50px 0;
            text-align: center;
        }
        
        .feature-item {
            background: white;
            padding: 20px;
            border-radius: 20px;
            width: 220px;
            box-shadow: var(--shadow);
        }
        
        .feature-item i {
            font-size: 30px;
            color: var(--light-green);
            margin-bottom: 10px;
        }

        /* --- ФУТЕР --- */
        footer {
            background: white;
            padding: 20px;
            text-align: center;
            margin-top: auto;
            border-top: 1px solid #eee;
            color: #777;
            font-size: 14px;
        }

        /* Сообщения об успехе */
        .alert {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 10px;
            text-align: center;
            font-weight: 600;
        }

        @media (max-width: 768px) {
            nav { flex-direction: column; gap: 15px; }
            .nav-links { flex-wrap: wrap; justify-content: center; }
        }
    </style>
</head>
<body>

    <nav>
        <a href="/" class="logo">
            <i class="fas fa-leaf"></i> ФермерШоп
        </a>
        
        <div class="nav-links">
            <a href="/catalog"><i class="fas fa-th-large"></i> Каталог</a>
            <a href="{{ route('about') }}"><i class="fas fa-info-circle"></i> О нас</a>
            <a href="/cart" style="font-size: 20px;"><i class="fas fa-shopping-basket"></i></a>

            @auth
                @if(auth()->user()->is_admin)
                    <a href="/admin" style="color: #d35400;"><i class="fas fa-cog"></i> Админ</a>
                @endif
                <a href="/myself"><i class="fas fa-user"></i> Кабинет</a>
                
                <form action="/logout" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" style="background:none; border:none; cursor:pointer; font-weight:600; color:#555; font-size:16px;">
                        <i class="fas fa-sign-out-alt"></i> Выход
                    </button>
                </form>
                @else
                    <a href="/login"
                       class="btn btn-outline"
                       style="padding: 8px 15px; color: #000 !important; border-color: #000;">
                        Войти
                    </a>
                @endauth
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>

    <footer>
    </footer>

</body>
</html>
