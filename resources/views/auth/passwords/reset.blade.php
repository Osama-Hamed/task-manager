@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('password.update') }}" class="lg:w-1/2 lg:mx-auto bg-card py-12 px-16 rounded shadow">
    @csrf

    <h1 class="text-2xl font-normal mb-10 text-center">Reset Password</h1>

    <input type="hidden" name="token" value="{{ $token }}">

    <div class="field mb-6">
        <label class="label text-sm mb-2 block" for="email">Email Address</label>

        <div class="control">
            <input id="email"
            type="email"
            class="input bg-transparent border border-muted-light rounded p-2 text-xs w-full{{ $errors->has('email') ? ' border-error' : '' }}"
            name="email"
            value="{{ old('email') }}"
            required>
        </div>

        @error('email')
        <p class="text-error text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="field mb-6">
        <label class="label text-sm mb-2 block" for="password">Password</label>

        <div class="control">
            <input id="password"
            type="password"
            class="input bg-transparent border border-muted-light rounded p-2 text-xs w-full{{ $errors->has('password') ? ' border-error' : '' }}"
            name="password"
            required>
        </div>

        @error('password')
        <p class="text-error text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="field mb-6">
        <label class="label text-sm mb-2 block" for="password-confirmation">Confirm Password</label>

        <div class="control">
            <input id="password-confirmation"
            type="password"
            class="input bg-transparent border border-muted-light rounded p-2 text-xs w-full"
            name="password_confirmation"
            required>
        </div>
    </div>

    <div class="field mb-6">
        <button type="submit" class="button mr-2">
            Reset Password
        </button>
    </div>
</form>
@endsection
