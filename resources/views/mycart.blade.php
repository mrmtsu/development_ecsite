@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="">
           <h1 class="text-center font-weight-bold" style="color:#555555;  font-size:1.2em; padding:24px 0px; text-align:center; font-family: Yu Gothic,游ゴシック,YuGothic,游ゴシック体,メイリオ,Meiryo,sans-serif;">
           {{ Auth::user()->name }}さんのカートの中身</h1>

           <p class="text-center" style="text-align: center; font-weight: 600; color: red; font-family: Yu Gothic,游ゴシック,YuGothic,游ゴシック体,メイリオ,Meiryo,sans-serif;">{{ $message ?? ''}}</p><br>
           <div class="card-body" style="max-width: 1200px; margin: 0 auto; display: flex; flex-wrap: wrap;">
               
               @if($my_carts->isNotEmpty())
                   @foreach($my_carts as $my_cart)
                       <div class="mycart-main" style="width: 400px">
                        <div class="mycart_box">
                            {{$my_cart->stock->name}} <br>                                
                            {{ number_format($my_cart->stock->fee)}}円 <br>
                            <img src="/image/{{$my_cart->stock->imgpath}}" alt="" class="incart" style="width: 300px; height: 300px; margin: 10px auto 0;">
                            <br>
                            <form action="/cartdelete" method="post">
                                @csrf
                                <input type="hidden" name="delete" value="delete">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="stock_id" value="{{ $my_cart->stock->id }}">
                                <input type="submit" value="カートから削除する" id="cart-btn" style="margin: 10px auto; width: 200px;">
                            </form>
                        </div>
                       </div>
                   @endforeach
               @else
                   <p class="text-center" style="text-align: center;">カートはからっぽです。</p>
               @endif
           </div>

           <div class="text-center p-2" style="text-align: center; margin-top: 100px;">
                個数：{{$count}}個<br>
                <p style="font-size:1.2em; font-weight:bold;">合計金額:{{number_format($sum)}}円</p>  
           </div>
           <form action="/checkout" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger btn-lg text-center buy-btn" >購入する</button>
           </form>
           <a href="/" style="text-decoration: none; color: gray;">商品一覧へ</a>

           </div>
       </div>
   </div>
</div>
@endsection