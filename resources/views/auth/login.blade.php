@extends('layouts.app')

@section('content')
    <div class="container" align="center">
        <div class="card" style="width:400px">
            <h1 class="card-header">{{ __('Welcome back!') }}</h1>

            <form method="POST" action="/login">
                @csrf

                <!-- Email -->
                <div class="mb-3" style="max-width: 320px">
                    <label for="EmailForm" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="EmailForm" placeholder="mail@example.com"
                        value="{{ old('email') }}" class="input input-bordered @error('email') input-error @enderror"
                        required autofocus>
                </div>
                @error('email')
                    <div class="label -mt-4 mb-2">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </div>
                @enderror

                <!-- Password -->
                <div class="mb-3" style="max-width: 320px">
                    <label for="PasswordForm" class="form-label">Password</label>
                    <input type="password" name="password" placeholder="••••••••" id="PasswordForm" class="form-control"
                        class="input input-bordered @error('password') input-error @enderror" required>
                    </label>
                    @error('password')
                        <div class="label -mt-4 mb-2">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </div>
                    @enderror
                    <br>
                    <!-- Remember Me -->
                    <div>
                        <label class="label cursor-pointer justify-start">
                            <input type="checkbox" name="remember" class="checkbox">
                            <span class="label-text ml-2">Remember me</span>
                        </label>
                    </div>
                    <br>
                    <!-- Submit Button -->
                    <div align="center" class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-sm w-full">
                            Sign In
                        </button>
                    </div>
            </form>

            <div align="center" class="divider">OR</div>
            <p class="text-center text-sm">
                Don't have an account?
                <a href="/register" class="link link-primary">Register</a>
            </p>
        </div>
    </div>
    </div>
@endsection