@extends('layouts.authenticate')
@section('content')
<div class="login-area">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="login-form">
                <div class="logo">
                    <a href="{{ url('/') }}"><img src="/logo.jpg" alt="image" width="35%"></a>
                </div>

                <h2>Certitude</h2>

                <form method="POST" action="{{ route('login') }}">
                	@csrf
                    <div class="form-group">
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email">
                        <span class="label-title"><i class='bx bx-user'></i></span>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                        <span class="label-title"><i class='bx bx-lock'></i></span>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="remember-forgot">
                            <label class="checkbox-box">Remember me
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span class="checkmark"></span>
                            </label>
							@if (Route::has('password.request'))
                            	<a href="{{ route('password.request') }}" class="forgot-password">Forgot password?</a>
                            @endif
                        </div>
                    </div>

                    <button type="submit" class="login-btn">Login</button>

                    <p class="mb-0">Don’t have an account? <a href="{{ route('register') }}">Sign Up</a></p>
                </form>
            </div>
        </div>
    </div>
</div>
@stop