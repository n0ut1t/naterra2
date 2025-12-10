@extends('layouts.app')

@section('title', 'Registro - Naterra')

@section('content')
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
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        
                            <label for="name" >Nombre</label>
                            <input type="text"
                                   id="name" name="name" value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <label for="cognom" >Cognom</label>
                            <input type="text"
                                   id="cognom" name="cognom" value="{{ old('cognom') }}" required autofocus>
                            @error('cognom')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        
                            <label for="email">Email</label>
                            <input type="email"
                                   id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        

                        
                            <label for="password" >Contraseña</label>
                            <input type="password"
                                   id="password" name="password" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                       

                        
                            <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                            <input type="password" class="form-control" 
                                   id="password_confirmation" name="password_confirmation" required>
                        

                        <button type="submit" class="btn">
                            Registrarse
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
                        <a href="{{ route('login') }}" class="text-decoration-none">
                            <i class="fas fa-sign-in-alt me-1"></i>Ja tens compte? Inicia sessió
                        </a>
                    </div>
    </div>
@endsection