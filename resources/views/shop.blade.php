@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="">
       <span class="catImg">
            <span class="imgHolder scroll1" style="width: 3822px;">
                <span class="item" style="width: 1274px;"><img src="https://cdn.pixabay.com/photo/2017/12/26/09/15/woman-3040029_1280.jpg" id="top-image" style="width:1000px;"></span>
                <span class="item" style="width: 1274px;"><img src="https://cdn.pixabay.com/photo/2015/02/19/13/51/woman-642118_1280.jpg" id="top-image" style="width:1000px;"></span>
                <span class="item" style="width: 1274px;"><img src="https://cdn.pixabay.com/photo/2014/09/03/20/15/legs-434918_1280.jpg" id="top-image" style="width:1000px;"></span>
            </span>
       </span>
       <div class="mx-auto" style="max-width:980px; margin: 10px auto;">
           <h1 style="text-align:center; font-size:22px; color: #656565; font-family: toppan-bunkyu-mincho-pr6n, serif; letter-spacing: 0.115em; -webkit-font-smoothing: antialiased; font-weight: normal;">アイテムリスト</h1>
           <div class="">
               <div class="d-flex flex-row flex-wrap" style="display:flex; flex-wrap: wrap;">
           
                       @foreach($stocks as $stock)

                           
                           <div class="col-xs-6 col-sm-4 col-md-4 ">
                               <div class="mycart_box" style="text-align:center; font-size:10px; color: #656565; font-family: toppan-bunkyu-mincho-pr6n, serif; letter-spacing: 0.115em; -webkit-font-smoothing: antialiased; font-weight: normal; margin: 5px;">
                                   <img src="/image/{{$stock->imgpath}}" alt="" class="incart" style="margin: 0 auto; width:300px; height:300px;">
                                   <br>
                                   {{$stock->name}} <br>
                                   {{$stock->fee}}円<br>
                                   {{$stock->detail}} <br>

                                    {{-- 追加 --}}

                                   <form action="mycart" method="post">
                                       @csrf
                                       <input type="hidden" name="stock_id" value="{{ $stock->id }}">
                                       <input type="submit" value="カートに入れる" id="cart-btn">
                                   </form>

                                    {{-- ここまで --}}
                               </div>

                                {{-- 追加 --}}
                               <!-- <a class="text-center" href="/">商品一覧へ</a> -->
                                {{-- ここまで --}}  
 
                           </div>
                       @endforeach                    
               </div>
               <div class="text-center" style="width: 200px;margin: 20px auto;">
               {{  $stocks->links()}} 
               </div>
           </div>
       </div>
   </div>
</div>
@endsection