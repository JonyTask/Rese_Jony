@extends('layouts.share')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/del_confirm.css') }}">
@endsection

@section('main')
<div class="container">
    <p class="confirm_text">以下の予約を削除しますか？</p>
    <div class="reserve_card">
        <table class="reserve_table">
            <tr class="reserve_line">
                <th class="reserve_header">Shop</th>
                <td class="reserve_detail">{{ $reserve->gourmets->name }}</td>
            </tr>
            <tr class="reserve_line">
                <th class="reserve_header">Date</th>
                <td class="reserve_detail">{{ $reserve->reserve_date }}</td>
            </tr>
            <tr class="reserve_line">
                <th class="reserve_header">Time</th>
                <td class="reserve_detail">{{ $reserve->reserve_time }}</td>
            </tr>
            <tr class="reserve_line">
                <th class="reserve_header">Number</th>
                <td class="reserve_detail">{{ $reserve->number }}人</td>
            </tr>
        </table>
    </div>
    <div class="form_flex">
        <form action="/Mypage/Reserve/Delete" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $reserve->id }}"  readonly>
            <button class="delete_button">🗑️削除する</button>
        </form>
        <a class="to_back" href="/Mypage">削除しない</a>
    </div>
</div>
@endsection