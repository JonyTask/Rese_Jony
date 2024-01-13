@extends('layouts.share')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/mypage.css') }}">
@endsection

@section('main')
    <h1 class="user_name" id="name_regulation">{{ $user_name }}さん</h1>
    <div class="container">
        <div class="left_container">
            <h2 class="reserve_title">予約状況</h2>
            @if (session('message'))
                <div class="alert">
                    {{ session('message') }}
                </div>
            @endif
            <div class="reserve_cards_area">
                @php
                    $counts = 1;
                @endphp
                @foreach($reserves as $reserve)
                    <div class="reserve_card">
                        <p class="reserve_number">予約{{ $counts }}</p>
                        <a href="{{ route('delete.confirm',['reserve' => $reserve->id]) }}" class="deny_introduction">☒</a>
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
                    @php
                        $counts++;
                    @endphp
                @endforeach
            </div>
        </div>
        <div class="right_container">
            <h2 class="favorite_title">お気に入り店舗</h2>
            <div class="favorite_gourmets_area">
                @foreach($gourmets as $gourmet)
                    <div class="favorite_gourmet_card">
                        <img class="gourmet_image" src="assets/image/{{$gourmet->image_path}}">
                        <div class="gourmet_card_bottom">
                            <p class="gourmet_name">{{ $gourmet->name }}</p>
                            <span class="area_tag">#{{ $gourmet->areas->gourmet_area }}</span>
                            <span class="genre_tag">#{{ $gourmet->genres->gourmet_genre }}</span>
                            <div class="flex-area">
                                <form class="view_detail" method="get" action="/Detail">
                                    @csrf
                                    <input type="hidden" name="gourmet_id" value="{{ $gourmet->id }}" readonly>
                                    <button class="detail_button" type="submit">詳しく見る</button>
                                </form>
                                <form action="/AddFavorite" method="post">
                                    @csrf
                                    <input type="hidden" name="gourmet_id" value="{{ $gourmet->id }}" readonly>
                                    <button type="submit" class="heart heart_favorite_state"></button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/javascript/Regulation.js') }}"></script>
@endsection


@section('modal_link_first')
    <a class="modal_hyperlink" href="/">Home</a>
@endsection

@section('modal_link_second')

@endsection