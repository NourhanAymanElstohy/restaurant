@extends('laragigs-layout')

@section('content')
<x-card class="p-10 rounded max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Login
        </h2>
        <p class="mb-4">Log into your account to post gigs</p>
    </header>

    <form method="POST" action="/users/authenticate">
        @csrf

        <div class="mb-6">
            <label for="name" class="inline-block text-lg mb-2">Name</label>
            <input type="text" value="{{old('name')}}" class="border border-gray-200 rounded p-2 w-full" name="name" />
            @error('name')
                <p class="text-red 500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password" class="inline-block text-lg mb-2">
                Password
            </label>
            <input type="password" value="{{old('password')}}" class="border border-gray-200 rounded p-2 w-full" name="password" />
            @error('password')
                <p class="text-red 500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                Sign in
            </button>
        </div>

        <div class="mt-8">
            <p>
                Don't have an account?
                <a href="/register" class="text-laravel">Register</a>
            </p>
        </div>

    </form>
</x-card>
@endsection