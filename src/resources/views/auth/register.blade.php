@extends('layouts.share')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
@endsection

@section('main')
    <div class="register_form_area">
        <div class="register_upper">
            <p class="form_title">Registration</p>
        </div>
        <div class="register_under">
            <form action="/register" class="register_form" method="post">
                @csrf
                <ul class="register_form_items">
                    <li class="register_form_item">
                        <input type="text" class="Name_Input" placeholder="Name" name="name" value="{{ old('name')}}">
                    </li>
                    <li class="register_form_item">
                        <input type="email" class="Email_Input" placeholder="Email" name="email" value="{{ old('email')}}">
                    </li>
                    <li class="login_form_item">
                        <input type="password" class="Password_Input" placeholder="Password" name="password">
                    </li>
                    <li class="register_form_item">
                        <input type="password" class="Confirmation_Input" placeholder="Password Confirmation" name="password_confirmation">
                    </li>
                </ul>
                <div class="register_submit_area">
                    <button type="submit" class="register_submit_button">登録</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('modal_link_first')
    <a class="modal_hyperlink" href="/login">Login</a>
@endsection