<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BaseBallChart.</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    
    <link rel="stylesheet" href="{{ secure_asset('css/materialize.min.css') }}"> 
    <link rel="stylesheet" href="{{ secure_asset('css/footer.css') }}"> 
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    
    <script src="js/echarts.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="js/materialize.min.js"></script>
    
  </head>
  <body>
      
  @yield('content')
  
  <ul id="slide-out" class="sidenav">
    <li><a class="subheader">CENTRAL LEAGUE</a></li>
    <li><a class="waves-effect" href="carp.list?season=2018">広島東洋カープ</a></li>
    <li><a class="waves-effect" href="#!">阪神タイガース</a></li>
    <li><a class="waves-effect" href="#!">東京ヤクルトスワローズ</a></li>
    <li><a class="waves-effect" href="#!">読売ジャイアンツ</a></li>
    <li><a class="waves-effect" href="#!">横浜DeNAベイスターズ</a></li>
    <li><a class="waves-effect" href="#!">中日ドラゴンズ</a></li>
    <li><div class="divider"></div></li>
    <li><a class="subheader">PACIFIC LEAGUE</a></li>
    <li><a class="waves-effect" href="#!">福岡ソフトバンクホークス</a></li>
    <li><a class="waves-effect" href="#!">千葉ロッテマリーンズ</a></li>
    <li><a class="waves-effect" href="#!">日本ハムファイターズ</a></li>
    <li><a class="waves-effect" href="#!">東北楽天イーグルス</a></li>
    <li><a class="waves-effect" href="#!">埼玉西武ライオンズ</a></li>
    <li><a class="waves-effect" href="#!">オリックスバファローズ</a></li>
  </ul>

  <!--ページトップスクロール-->
  <p id="page-top"><a href="#wrap"><i class="fas fa-sort-up" style="font-size: 160%; color: white; padding-top: 20px; margin-bottom: -20px;"></i></a></p>

  <footer class="z-depth-2 footer_pc">
  <div class="container">
    <div class="footer_flex">   
      <div class="flex">
        <img src="favicon.ico">
        <h4>{!! link_to_route('home', 'トップページへ') !!}</h4>
      </div>
      <div>
        <h4 style="text-align: left;">球団別選手一覧</h4> 
        <hr>
        <div class="list_flex">
          <div class="c_league">
            <div class="subheader">CENTRAL LEAGUE</div>
            <div><a href="carp.list?season=2018">広島東洋カープ</a></div>
            <div>阪神タイガース</div>
            <div>東京ヤクルトスワローズ</div>
            <div>読売ジャイアンツ</div>
            <div>横浜DeNAベイスターズ</div>
            <div>中日ドラゴンズ</div>
          </div>
          <div class="p_league">
            <div class="subheader">PACIFIC LEAGUE</div>
            <div>福岡ソフトバンクホークス</div>
            <div>千葉ロッテマリーンズ</div>
            <div>日本ハムファイターズ</div>
            <div>東北楽天イーグルス</div>
            <div>埼玉西武ライオンズ</div>
            <div>オリックスバファローズ</div>
          </div>
        </div>
      </div>
    </div>
  <div class="regulation"><a href="#">お問い合わせ・利用規約</a></div>
  <div class="container copyright">
  © 2018 BaseBallChart. All rights reserved.
  </div>
  </footer>
  <footer class="z-depth-2 footer_sp">
    <div class="container">
      <div class="flex">
        <img src="favicon.ico">
        <h4>{!! link_to_route('home', 'トップページへ') !!}</h4>
      </div>
      <div class="flex">
        <img src="images/bar_icon.png" style="margin-right: -6px;">
      　<h4><a href="#" data-target="slide-out" class="sidenav-trigger">球団別選手リスト</a></h4>
      </div>
      <div class="regulation"><a href="#">お問い合わせ・利用規約</a></div>
    </div>  
    <div class="container copyright">
    © 2018 BaseBallChart. All rights reserved.
    </div>
  </footer>
  </body>
</html>