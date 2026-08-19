@extends('apotek.layout')

@section('title', 'Admin Login | Apotek Alfa Group')

@section('content')
    <main class="auth-container">
        <div class="auth-box">
            <div class="auth-header">
                <img src="{{ asset('apotek alfa group logo.png') }}" alt="Logo">
                <h1>Admin Login</h1>
            </div>

            @if ($errors->any())
                <div class="alert alert-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('auth.login') }}" class="auth-form">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="adminapotekalfa@alfa.com" required autofocus>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan password" required>
                </div>

                <div class="form-group checkbox">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Ingat saya</label>
                </div>

                <button type="submit" class="btn btn-primary btn-login">Login</button>
            </form>

            <div class="auth-footer">
                <a href="{{ route('home') }}">← Kembali ke Home</a>
            </div>
        </div>
    </main>
@endsection
