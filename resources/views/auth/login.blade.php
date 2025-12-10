@extends('layouts.app')

@section('title', 'Login - Naterra')

@section('content')

    <!-- LLUNA (reutiliza la misma del registro) -->
    <div class="moon-box">
        <div class="moon">
            <div class="crater c1"></div>
            <div class="crater c2"></div>
            <div class="crater c3"></div>
            <div class="crater c4"></div>
            <div class="crater c5"></div>
            <div class="crater c6"></div>
            <div class="crater c7"></div>
        </div>
    </div>
    <div class="form">
        <form method="POST" action="{{ route('login') }}">
            @csrf


            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror


            <label for="password" class="form-label">Contraseña</label>
            <input type="password" id="password" name="password" required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror


            <!-- <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                    <label class="form-check-label" for="remember">Recordarme</label>
                                </div> -->

            <button type="submit" class="btn">
                <i class="fas fa-sign-in-alt me-2"></i>Iniciar Sesión
            </button>
        </form>

        @if($errors->any())
            <div class="alert alert-danger mt-3">
                @foreach($errors->all() as $error)
                    <p class="mb-0"><i class="fas fa-exclamation-triangle me-2"></i>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="footer">
            <a href="{{ route('register') }}" class="text-decoration-none">
                <i class="fas fa-user-plus me-1"></i>No tens compte? Registra't
            </a>
        </div>
    </div>
@endsection