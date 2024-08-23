{{--<x-guest-layout>--}}
{{--    <form method="POST" action="{{ route('register') }}">--}}
{{--        @csrf--}}

{{--        <!-- Name -->--}}
{{--        <div>--}}
{{--            <x-input-label for="name" :value="__('Name')" />--}}
{{--            <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />--}}
{{--            <x-input-error :messages="$errors->get('name')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Email Address -->--}}
{{--        <div class="mt-4">--}}
{{--            <x-input-label for="email" :value="__('Email')" />--}}
{{--            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autocomplete="username" />--}}
{{--            <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Password -->--}}
{{--        <div class="mt-4">--}}
{{--            <x-input-label for="password" :value="__('Password')" />--}}

{{--            <x-text-input id="password" class="block w-full mt-1"--}}
{{--                            type="password"--}}
{{--                            name="password"--}}
{{--                            required autocomplete="new-password" />--}}

{{--            <x-input-error :messages="$errors->get('password')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Confirm Password -->--}}
{{--        <div class="mt-4">--}}
{{--            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />--}}

{{--            <x-text-input id="password_confirmation" class="block w-full mt-1"--}}
{{--                            type="password"--}}
{{--                            name="password_confirmation" required autocomplete="new-password" />--}}

{{--            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <div class="flex items-center justify-end mt-4">--}}
{{--            <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">--}}
{{--                {{ __('Already registered?') }}--}}
{{--            </a>--}}

{{--            <x-primary-button class="ms-4">--}}
{{--                {{ __('Register') }}--}}
{{--            </x-primary-button>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--</x-guest-layout>--}}

@extends('frontEnd.master')
@section('title')
    Login
@endsection
@section('content')
    <div class="login-page-container py-5">
        <div class="login-page">
            <div class="form login-form" style="max-width: 500px;">
                <form class="register-form_ text-center" method="post" action="{{route('register')}}" >
                    @csrf
                    <h2 class="form-title">Register Now</h2>
                    <p>CREATE YOUR ACCOUNT</p>
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" placeholder="name"/>
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="text" name="email" placeholder="email address"/>
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="password"/>
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="password" name="password_confirmation" placeholder="confirm password"/>
                    </div>

                    <button class="btn default-btn" type="submit">Create</button>
                    <p class="message mt-3">Already registered? <a href="#">Sign In</a></p>
                </form>

                <form method="POST" class="text-center" action="{{route('login')}}" style="display: none">
                    @csrf
                    <h2 class="form-title">WELCOME BACK</h2>
                    <p>Please login to continue.</p>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="email"/>
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="password"/>
                    </div>

                    <button type="submit" class="btn default-btn">Register</button>
                    <p class="message mt-3">Existing Member? <a href="{{route('login')}}">Login</a></p>
                    <p class="" style="margin: 15px 0 0;color: #b3b3b3;font-size: 12px;">Forget password? <a href="{{url('/')}}">Reset</a></p>
                </form>
            </div>
        </div>
    </div>
@endsection
