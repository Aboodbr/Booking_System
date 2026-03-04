@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-6 col-lg-5">
        <div class="card shadow-sm p-4">
            <h3 class="text-center mb-4">Login</h3>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email --}}
                <div class="form-group mb-3">
                    <label for="email">Email address</label>
                    <input type="email" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}" required autofocus>
                    <x-input-error :messages="$errors->get('email')" />
                </div>

                {{-- Password --}}
                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password"
                        class="form-control @error('password') is-invalid @enderror" required>
                    <x-input-error :messages="$errors->get('password')" />
                </div>

                {{-- Remember Me --}}
                <div class="form-check mb-3">
                    <input type="checkbox" name="remember" id="remember" class="form-check-input">
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>

                {{-- Submit & Forgot --}}
                <div class="d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn btn-primary">Log in</button>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-decoration-none">
                            Forgot your password?
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
