@extends('layouts.app')

@section('content')
<div class="auth-container">
    <div class="auth-card">
        <div class="auth-header">
            <div class="auth-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
            </div>
            <h1 class="auth-title">Вход в систему</h1>
            <p class="auth-subtitle">Добро пожаловать в магазин фермерских продуктов</p>
        </div>

        @if($errors->any())
            <div class="alert alert-error">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <form action="/login" method="POST" class="auth-form">
            @csrf
            
            <div class="form-group">
                <label for="email">Email</label>
                <div class="input-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                    <input type="email" id="email" name="email" placeholder="example@mail.ru" required>
                </div>
            </div>

            <div class="form-group">
                <label for="password">Пароль</label>
                <div class="input-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                    <input type="password" id="password" name="password" placeholder="Введите пароль" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-block">
                <span>Войти</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
            </button>
        </form>

        <div class="auth-footer">
            <p>Нет аккаунта? <a href="/register">Зарегистрироваться</a></p>
        </div>
    </div>
</div>

<style>
.auth-container {
    min-height: calc(100vh - 200px);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px 20px;
    background: linear-gradient(135deg, #f8fdf8 0%, #e8f5e8 100%);
}

.auth-card {
    background: #ffffff;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(106, 176, 76, 0.15);
    padding: 40px;
    width: 100%;
    max-width: 420px;
    animation: slideUp 0.5s ease-out;
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.auth-header {
    text-align: center;
    margin-bottom: 32px;
}

.auth-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #6ab04c 0%, #58a03a 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    color: white;
    box-shadow: 0 8px 25px rgba(106, 176, 76, 0.35);
}

.auth-title {
    font-size: 28px;
    font-weight: 700;
    color: #2d3436;
    margin: 0 0 8px;
}

.auth-subtitle {
    color: #636e72;
    font-size: 14px;
    margin: 0;
}

.alert {
    padding: 14px 16px;
    border-radius: 10px;
    margin-bottom: 24px;
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: 14px;
}

.alert-error {
    background: #fee;
    color: #c0392b;
    border: 1px solid #fadbd8;
}

.alert-success {
    background: #e8f8e8;
    color: #27ae60;
    border: 1px solid #c8e6c8;
}

.auth-form {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.form-group label {
    font-size: 14px;
    font-weight: 600;
    color: #2d3436;
}

.input-wrapper {
    position: relative;
    display: flex;
    align-items: center;
}

.input-wrapper svg {
    position: absolute;
    left: 14px;
    color: #b2bec3;
    pointer-events: none;
}

.input-wrapper input {
    width: 100%;
    padding: 14px 14px 14px 46px;
    border: 2px solid #e0e0e0;
    border-radius: 12px;
    font-size: 15px;
    transition: all 0.3s ease;
    background: #fafafa;
}

.input-wrapper input:focus {
    outline: none;
    border-color: #6ab04c;
    background: #ffffff;
    box-shadow: 0 0 0 4px rgba(106, 176, 76, 0.1);
}

.input-wrapper input::placeholder {
    color: #b2bec3;
}

.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 14px 28px;
    border: none;
    border-radius: 12px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-primary {
    background: linear-gradient(135deg, #6ab04c 0%, #58a03a 100%);
    color: white;
    box-shadow: 0 4px 15px rgba(106, 176, 76, 0.35);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(106, 176, 76, 0.45);
}

.btn-primary:active {
    transform: translateY(0);
}

.btn-block {
    width: 100%;
}

.auth-footer {
    text-align: center;
    margin-top: 28px;
    padding-top: 24px;
    border-top: 1px solid #f0f0f0;
}

.auth-footer p {
    color: #636e72;
    font-size: 14px;
    margin: 0;
}

.auth-footer a {
    color: #6ab04c;
    font-weight: 600;
    text-decoration: none;
    transition: color 0.3s ease;
}

.auth-footer a:hover {
    color: #58a03a;
    text-decoration: underline;
}
</style>
@endsection