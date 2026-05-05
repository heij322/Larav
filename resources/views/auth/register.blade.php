@extends('layouts.app')

@section('content')
<div class="auth-container">
    <div class="auth-card auth-card-wide">
        <div class="auth-header">
            <div class="auth-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="8.5" cy="7" r="4"></circle>
                    <line x1="20" y1="8" x2="20" y2="14"></line>
                    <line x1="23" y1="11" x2="17" y2="11"></line>
                </svg>
            </div>
            <h1 class="auth-title">Создание аккаунта</h1>
            <p class="auth-subtitle">Присоединяйтесь к нам и покупайте свежие фермерские продукты</p>
        </div>

        @if($errors->any())
            <div class="alert alert-error">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
                <div class="error-list">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            </div>
        @endif

        <form action="/register" method="POST" class="auth-form">
            @csrf
            
            <div class="form-row">
                <div class="form-group">
                    <label for="name">Ваше имя</label>
                    <div class="input-wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <input type="text" id="name" name="name" placeholder="Иван Иванов" value="{{ old('name') }}" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <div class="input-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                    <input type="email" id="email" name="email" placeholder="example@mail.ru" value="{{ old('email') }}" required>
                </div>
            </div>

            <div class="form-row two-cols">
                <div class="form-group">
                    <label for="password">Пароль</label>
                    <div class="input-wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                        <input type="password" id="password" name="password" placeholder="Минимум 6 символов" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Повторите</label>
                    <div class="input-wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Повторите пароль" required>
                    </div>
                </div>
            </div>

           

            <button type="submit" class="btn btn-primary btn-block">
                <span>Создать аккаунт</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="8.5" cy="7" r="4"></circle>
                    <line x1="20" y1="8" x2="20" y2="14"></line>
                    <line x1="23" y1="11" x2="17" y2="11"></line>
                </svg>
            </button>
        </form>

        <div class="auth-footer">
            <p>Уже есть аккаунт? <a href="/login">Войти</a></p>
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

.auth-card-wide {
    max-width: 500px;
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
    align-items: flex-start;
    gap: 12px;
    font-size: 14px;
}

.alert svg {
    flex-shrink: 0;
    margin-top: 2px;
}

.alert-error {
    background: #fee;
    color: #c0392b;
    border: 1px solid #fadbd8;
}

.error-list {
    margin: 0;
}

.error-list p {
    margin: 4px 0;
}

.error-list p:first-child {
    margin-top: 0;
}

.error-list p:last-child {
    margin-bottom: 0;
}

.auth-form {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.form-row {
    display: flex;
    gap: 16px;
}

.form-row.two-cols {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
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

.form-features {
    background: #f8fdf8;
    border-radius: 12px;
    padding: 16px 20px;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 13px;
    color: #636e72;
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

@media (max-width: 480px) {
    .auth-card {
        padding: 30px 24px;
    }
    
    .form-row.two-cols {
        grid-template-columns: 1fr;
    }
    
    .auth-title {
        font-size: 24px;
    }
}
</style>
@endsection