@extends('layouts.share')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/detail.css') }}">
@endsection

@section('main')
    <div class="container">
        <div class="left_container">
            <div class="title_section">
                <a href="/" class="back_page">＜</a>
                <h2 class="gourmet_title">{{ $gourmet->gourmet_name }}</h2>
            </div>
            <div class="image_container">
                <img class="gourmet_image" src="assets/image/{{$gourmet->image_path}}">
            </div>
            <div class="tag_area">
                <span class="gourmet_area_tag">#{{ $gourmet->areas->gourmet_area }}</span>
                <span class="gourmet_genre_tag">#{{ $gourmet->genres->gourmet_genre }}</span>
            </div>
            <p class="gourmet_content_tag">
                {{ $gourmet->gourmet_content }}
            </p>
        </div>
        <div class="right_container">
            <form action="detail/reserve" method="post">
                @csrf
                <input name="gourmet_id" value="{{ $gourmet->id }}" type="hidden">
                <div class="reserve_area">
                    <div class="reserve_upper">
                        <h2 class="reserve_title">予約</h2>
                        <div class="reserve_input_area">
                            <div class="date_error_and_input">
                                <input class="input_reserve_date" type="date" name="reserve_date" id="date" value="{{ old('reserve_date') }}">
                                <div class="error_message">
                                    @error('reserve_date')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="time_error_and_select">
                                <select class="select_reserve_time" name="reserve_time" id="time" value="{{ old('reserve_time') }}">
                                    <option value="" hidden>選択してください</option>
                                    <option value="17:00:00">17:00:00</option>
                                    <option value="18:00:00">18:00:00</option>
                                    <option value="19:00:00">19:00:00</option>
                                    <option value="20:00:00">20:00:00</option>
                                    <option value="21:00:00">21:00:00</option>
                                    <option value="22:00:00">22:00:00</option>
                                </select>
                                <div class="error_message">
                                    @error('reserve_time')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="number_error_and_select">
                                <select class="select_reserve_number" name="reserve_number" id="number" value="{{ old('reserve_number') }}">
                                    <option value="" hidden>選択してください</option>
                                    <option value="1">1人</option>
                                    <option value="2">2人</option>
                                    <option value="3">3人</option>
                                    <option value="4">4人</option>
                                    <option value="5">5人</option>
                                    <option value="6">6人</option>
                                    <option value="7">7人</option>
                                    <option value="8">8人</option>
                                    <option value="9">9人</option>
                                    <option value="10">10人</option>
                                </select>
                                <div class="error_message">
                                    @error('reserve_number')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="reserve_confirm">
                            <table class="confirmation_table">
                                <tr class="confirmation_line">
                                    <th class="confirmation_header">Shop</th>
                                    <td class="confirmation_detail">{{ $gourmet->gourmet_name }}</td>
                                </tr>
                                <tr class="confirmation_line">
                                    <th class="confirmation_header">Date</th>
                                    <td class="confirmation_detail" id="confirmation_date"></td>
                                </tr>
                                <tr class="confirmation_line">
                                    <th class="confirmation_header">Time</th>
                                    <td class="confirmation_detail" id="confirmation_time"></td>
                                </tr>
                                <tr class="confirmation_line">
                                    <th class="confirmation_header">Number</th>
                                    <td class="confirmation_detail" id="confirmation_number"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="reserve_bottom">
                        <button class="reserve_submit" type="submit">予約する</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('assets/javascript/ReserveAutoFill.js') }}"></script>
@endsection

@section('modal_link_first')
    <a class="modal_hyperlink" href="/">Home</a>
@endsection

@section('modal_link_second')
    <a class="modal_hyperlink" href="/register">Registration</a>
@endsection

@section('modal_link_third')
    <a class="modal_hyperlink" href="/login">Login</a>
@endsection