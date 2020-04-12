<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>{{ config('app.name', 'Laravel') }}</title>

   <!-- Scripts -->
   <script src="{{ asset('js/app.js') }}" defer></script>

   <!-- Fonts -->
   <link rel="dns-prefetch" href="//fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

   <!-- Styles -->
   <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<style>
.catImg {position: relative; display: block; margin: 0 auto; width: 100%; height: 420px; overflow: hidden; max-width: 980px; margin: 0 auto 100px; padding-bottom: 50px; letter-spacing: 0.115em;}
.imgHolder.scroll1{/* -webkit-animation: scroll1 80s linear infinite; */ animation: scroll1 50s linear infinite; position: absolute; display: block; top: 0; left: 0;}
@-webkit-keyframes scroll1{from{transform: translateX(0px)}to{transform: translateX(-274px)}}
@keyframes scroll1{from{transform: translateX(0px)}to{transform: translateX(-2000px)}}
#top-image{height:500px;}
</style>
<body>
   <div id="app">
       <div class="header">
        <nav class="navbar navbar-expand-md navbar-light  shadow-sm" id="header-list">

                <div id="nav-drawer">
                    <input id="nav-input" type="checkbox" class="nav-unshown">
                    <label id="nav-open" for="nav-input">
                        <span></span></label>
                    <label class="nav-unshown" id="nav-close" for="nav-input"></label>
                    <div id="nav-content">
                    
                        <div class="container">

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <!-- Left Side Of Navbar -->
                                <ul class="navbar-nav mr-auto">

                                </ul>

                                <!-- Right Side Of Navbar -->
                                <ul class="navbar-nav ml-auto" style="display: flex;justify-content: space-evenly;font-family: neuhan,Yu Gothic,游ゴシック,YuGothic,游ゴシック体,メイリオ,Meiryo,sans-serif;font-size: 20px;font-weight: 400;line-height: 1;">
                                    <!-- Authentication Links -->
                                    @guest
                                        <li class="nav-item" style="color: #656565; list-style:none;">
                                            <a class="nav-link" style="color: #656565; list-style:none;"  href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i></a>
                                        </li>
                                        @if (Route::has('register'))
                                            <li class="nav-item" style="color: #656565; list-style:none;">
                                                <a class="nav-link" style="color: #656565; text-decoration: none;"  href="{{ route('register') }}">{{ __('会員登録') }}</a>
                                            </li>
                                        @endif
                                    @else
                                        <li class="nav-item dropdown" style="color: #656565; list-style:none; display:flex;">
                                            <a id="navbarDropdown" style="color: #656565;  text-decoration:none;" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }} <span class="caret"></span>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}" style="color: #656565;  text-decoration:none;"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                    <i class="fas fa-sign-out-alt"></i>
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>

                                                {{-- 追加 --}}
                                                <a class="dropdown-item" href="{{ url('/mycart') }}" style="color: #656565;  text-decoration:none; display:none;">
                                                    カートを見る
                                                </a>
                                            </div>
                                        </li>
                                        {{-- 追加 --}}
                                        <a href="{{ url('/mycart') }}" >
                                            <i class="fas fa-shopping-cart" style="color: #656565; text-decoration:none;"></i>
                                        </a>
                                    @endguest

                                    <form action="{{url('/search')}}" method="GET" id="formarea" style="display: flex;">
                                    <input type="text" name="keyword" value="" placeholder="商品名で探す" style="border: none; border-radius: 0; outline: none; background: none; background-color: khaki; font-size: 12px; padding: 10px 5px; height:15px; width: 150px; margin: auto 10px; line-height: 100px;">
                                        <input type="submit" value="検索" id="submit-btn" style="display:none;">
                                        <label for="submit-btn">
                                            <i class="fas fa-search" style="color: rgb(101, 101, 101);"></i>
                                        </label>
                                    </form>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-logo">
                    <a class="navbar-brand" style="font-size:30px; color: #656565; font-family: neuhan,Yu Gothic,游ゴシック,YuGothic,游ゴシック体,メイリオ,Meiryo,sans-serif; text-decoration:none;" href="{{ url('/') }}" >SHOP</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}" style="display:none;">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                </div>
        </nav>
       </div>
       <main class="content-main">
           @yield('content')
       </main>

        <footer id="footer" class="footer">
            <div class="footer-inner">
                <div class="footer_nav">
            <div class="fat-nav">
                <div class="fat-nav__wrapper">
                <div class="fat-nav-white">
                    <div class="nav-main">
                    <div id="gnav">
                        <ul>
                        <li><a href="/">問い合わせ</a></li>
                        <li><a href="/" target="_brank">POINTカード</a></li>
                        <li class="nav_jp">
                            @guest
                                <a href="{{ route('login') }}">ログイン</a>
                                @if (Route::has('register'))
                                    <a class="nav-link" style="color: #656565;"  href="{{ route('register') }}">会員登録</a>
                                @endif
                            @else
                                 <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
                            @endguest

                        </li>
                        <li class="toggle">
                            <span class="arrow nav_jp">インフォ</span>
                            <div class="menu">
                            <ul class="menu_inner">
                                <li><a href="/Page/guide/Default.aspx">ご利用ガイド</a></li>
                                <li><a href="/Page/guide/notice.aspx">ご利用規約</a></li>
                                <li><a href="/Page/guide/disclaimer.aspx">免責事項</a></li>
                                <li><a href="/Page/guide/privacy.aspx">プライバシーポリシー</a></li>
                                <li><a href="/Page/guide/tokutei.aspx">特定商取引に基づく表示</a></li>
                                <li><a href="/Form/User/MailMagazineRegistInput.aspx">メールマガジン登録</a></li>
                                <li><a href="/" target="_brank">会社情報</a></li>
                                <li><a href="/Page/link.aspx" target="_brank">LINK</a></li>
                            </ul>
                            </div>
                        </li>
                        </ul>
                        <ul class="footerSnsNav">
                        <li>
                            <a href="/" target="_brank">
                            <i class="fab fa-instagram" style="font-size:30px;"></i>
                            </a>
                        </li>
                        <li>
                            <a href="/" target="_brank">
                            <i class="fab fa-line" style="font-size:30px;"></i>
                            </a>
                        </li>
                        <li>
                            <a href="/">
                            <i class="far fa-envelope" style="font-size:30px;"></i>
                            </a>
                        </li>
                        </ul>
                    </div>
                    </div>
                </div>
              </div>
            </div>

            <div class="text_about">
                <p>
                通販サイトです。<br>
                オフィシャルオンラインストアでは人気アイテムをすべて取り揃えております。
                </p>
                <p class="copy">© onlineshop</p>
            </div>
          <div class="modal modal-filter hide" id="modalSearch">
            <div class="modal-overlay"></div>
            <div class="modal-wrapper">
            <div class="modal-inner">
                <div id="headerSearch">

                <div class="btn-close" id="modalCloseBtn"></div>
                <!-- <a href="/Page/AdvancedSearch.aspx">詳しく検索</a> -->
                </div>

            </div>
            </div>
          </div>
        </footer>
   </div>
</body>
</html>
