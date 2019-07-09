@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('password.email') }}" class="lg:w-1/2 lg:mx-auto bg-card py-12 px-16 rounded shadow">
@csrf

    @if (session('status'))
        <div class="bg-success rounded px-4 py-3 mb-4" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <h1 class="text-2xl font-normal mb-10 text-center">Reset Password</h1>

    <div class="field mb-6">
        <label class="label text-sm mb-2 block" for="email">E-mail Address</label>

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
        <button type="submit" class="button mr-2">
            Send Password Reset Link
        </button>
    </div>
</form>
@endsection
