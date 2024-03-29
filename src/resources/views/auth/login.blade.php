@extends('layouts.share')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
@endsection

@section('main')
    <div class="login_form_area">
        <div class="login_upper">
            <p class="form_title">Login</p>
        </div>
        <div class="login_under">
            <form action="/login" class="login_form" method="post">
                @csrf
                <ul class="login_form_items">
                    <li class="login_form_item">
                        <input type="email" class="Email_Input" placeholder="Email" name="email" value="{{ old('email')}}"><br>
                        <p class="alert">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </p>
                    </li>
                    <li class="login_form_item">
                        <input type="password" class="Password_Input" placeholder="Password" name="password"><br>
                        <p class="alert">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </p>
                    </li>
                </ul>
                <div class="login_submit_area">
                    <button type="submit" class="login_submit_button">ログイン</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('modal_link_first')
    <a class="modal_hyperlink" href="/register">Registration</a>
@endsection