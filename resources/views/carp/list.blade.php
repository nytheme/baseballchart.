@extends('layouts.head')

@section('content')
<link rel="stylesheet" href="{{ secure_asset('css/carp/list.css') }}"> 
  <body>
    <section class="top z-depth-1">
    <header class="z-depth-0">
      <div class="container">
        <div class="row">
          <div class="col s12 m12 header">
            <div>
              <a href="{{URL::to('home')}}"><img src="images/logo.png" class="logo"></a>
            </div>
            <div class="header_menu_pc">
              <ul>
                <li>{!! link_to_route('carp.list', '選手一覧') !!}</li>
                <li>{!! link_to_route('carp.pitchers', '投手成績') !!}</li>
                <li>{!! link_to_route('carp.fielders', '打者成績') !!}</li>
                <li>{!! link_to_route('carp.create', '選手登録') !!}</li>
                <li>{!! link_to_route('carp.create_stats', '打者成績登録') !!}</li>
                <li>{!! link_to_route('carp.create_p_stats', '投手成績登録') !!}</li>
              </ul>
            </div>
              <a data-target="slide-out" class="waves-effect waves-light sidenav-trigger btn-floating btn-large red darken-3 menu_btn"><i class="material-icons">menu</i></a>
            
          </div>  
        </div>
      </div>
    </header>
    <div class="container">
      <div class="row">
        
          <div class="list">
            
            <div class="col s12">
              <h3><img src="images/carp_logo.png">広島東洋カープ 選手一覧</h3>
            </div>
            
            <div class="input-field col s12 m6">
              <select>
                <optgroup label="Season">
                  <option value="1">2018</option>
                </optgroup>
                <!--<optgroup label="Other">
                  <option value="4">Legends</option>
                </optgroup>-->
              </select>
              <label>Season</label>
            </div><!--.input-field-->
            
            <div class="input-field col s12 m6">
              <select>
                <optgroup label="List">
                  <option value="1">全選手</option>
                </optgroup>
              </select>
              <label>List</label>
            </div>
            </div>
            </div>
            </div>
      </section>
            
      <section class="center">

      <div class="container">
        <div class="row">
            <div class="table_pc col s12 z-depth-1">
          
            @if (count($players) > 0)
              <table>
                <tr><th colspan="11">投手</th></tr>
                <tr><th>No.</th><th>Name</th><th>DOB</th><th>Age</th><th>Years</th><th>Height</th><th>Weight</th><th>Blood</th><th>P/B</th><th>Home</th><th>Salary</th></tr>
                @foreach ($players as $player)
                  @if ($player->position == 1 || $player->position == 5 )
                    @foreach ($player->pitcher_stats as $pitcher_stat)
                      @php
                        //全角スペースを半角スペースに
                          $name = str_replace("　", " ", $player->name);
                          
                        //年齢を生年月日から算出
                          $now = date("Ymd");
                          $born = str_replace("-", "", $player->dob);
                          
                        //生年月日の-を/に変更
                          $dob = str_replace("-", "/", $player->dob);
                          
                        //年数を入団年から算出
                          $nowYear = date('Y');
                          $years = $nowYear - $player->join;
                        
                        //年棒にカンマ
                          $salary = number_format($pitcher_stat->salary);
                      @endphp
                    <tr><td>{{ $pitcher_stat->number }}</td><td><?php echo $name; ?></td><td><?php echo $dob; ?></td><td><?php echo floor(($now-$born)/10000).'歳'; ?></td><td><?php echo $years.'年'; ?></td><td>{{ $player->height }}cm</td><td>{{ $pitcher_stat->weight }}kg</td><td>{{ $player->blood }}</td><td>{{ $player->p }}{{ $player->b }}</td><td>{{ $player->home }}</td><td><?php echo $salary.'万円'; ?></td></tr>
                    @endforeach
                  @endif
                @endforeach
              </table>
              <table>
                <tr><th colspan="11">内野手</th></tr>
                <tr><th>No.</th><th>Name</th><th>DOB</th><th>Age</th><th>Years</th><th>Height</th><th>Weight</th><th>Blood</th><th>P/B</th><th>Home</th><th>Salary</th></tr>
                @foreach ($players as $player)
                  @if ($player->position == 3)
                    @foreach ($player->statistics as $statistic)
                      @php
                        //全角スペースを半角スペースに
                          $name = str_replace("　", " ", $player->name);
                          
                        //年齢を生年月日から算出
                          $now = date("Ymd");
                          $born = str_replace("-", "", $player->dob);
                          
                        //生年月日の-を/に変更
                          $dob = str_replace("-", "/", $player->dob);
                          
                        //年数を入団年から算出
                          $nowYear = date('Y');
                          $years = $nowYear - $player->join;
                        
                        //年棒にカンマ
                          $salary = number_format($statistic->salary);
                      @endphp
                    <tr><td>{{ $statistic->number }}</td><td><?php echo $name; ?></td><td><?php echo $dob; ?></td><td><?php echo floor(($now-$born)/10000).'歳'; ?></td><td><?php echo $years.'年'; ?></td><td>{{ $player->height }}cm</td><td>{{ $statistic->weight }}kg</td><td>{{ $player->blood }}</td><td>{{ $player->p }}{{ $player->b }}</td><td>{{ $player->home }}</td><td><?php echo $salary.'万円'; ?></td></tr>
                    @endforeach
                  @endif
                @endforeach
              </table>
              <table>
                <tr><th colspan="11">外野手</th></tr>
                <tr><th>No.</th><th>Name</th><th>DOB</th><th>Age</th><th>Years</th><th>Height</th><th>Weight</th><th>Blood</th><th>P/B</th><th>Home</th><th>Salary</th></tr>
                @foreach ($players as $player)
                  @if ($player->position == 4)
                    @foreach ($player->statistics as $statistic)
                      @php
                          $name = str_replace("　", " ", $player->name);
                          $now = date("Ymd");
                          $born = str_replace("-", "", $player->dob);
                          $dob = str_replace("-", "/", $player->dob);
                          $nowYear = date('Y');
                          $years = $nowYear - $player->join;
                          $salary = number_format($statistic->salary);
                      @endphp
                    <tr><td>{{ $statistic->number }}</td><td><?php echo $name; ?></td><td><?php echo $dob; ?></td><td><?php echo floor(($now-$born)/10000).'歳'; ?></td><td><?php echo $years.'年'; ?></td><td>{{ $player->height }}cm</td><td>{{ $statistic->weight }}kg</td><td>{{ $player->blood }}</td><td>{{ $player->p }}{{ $player->b }}</td><td>{{ $player->home }}</td><td><?php echo $salary.'万円'; ?></td></tr>
                    @endforeach
                  @endif
                @endforeach
              </table>
              <table>
                <tr><th colspan="11">捕手</th></tr>
                <tr><th>No.</th><th>Name</th><th>DOB</th><th>Age</th><th>Years</th><th>Height</th><th>Weight</th><th>Blood</th><th>P/B</th><th>Home</th><th>Salary</th></tr>
                @foreach ($players as $player)
                  @if ($player->position == 2)
                    @foreach ($player->statistics as $statistic)
                      @php
                          $name = str_replace("　", " ", $player->name);
                          $now = date("Ymd");
                          $born = str_replace("-", "", $player->dob);
                          $dob = str_replace("-", "/", $player->dob);
                          $nowYear = date('Y');
                          $years = $nowYear - $player->join;
                          $salary = number_format($statistic->salary);
                      @endphp
                    <tr><td>{{ $statistic->number }}</td><td><?php echo $name; ?></td><td><?php echo $dob; ?></td><td><?php echo floor(($now-$born)/10000).'歳'; ?></td><td><?php echo $years.'年'; ?></td><td>{{ $player->height }}cm</td><td>{{ $statistic->weight }}kg</td><td>{{ $player->blood }}</td><td>{{ $player->p }}{{ $player->b }}</td><td>{{ $player->home }}</td><td><?php echo $salary.'万円'; ?></td></tr>
                    @endforeach
                  @endif
                @endforeach
              </table>
              {{--<table>
                <tr><th colspan="2">全選手</th></tr>
                <tr><th>id</th><th>Name</th><tr>
                  @foreach ($players as $player)
                    <tr><th>{{ $player->id }}</th><td>{{ $player->name }}</td></tr>
                  @endforeach
              </table>--}}
            @endif
          </div><!--.table_pc-->
          
          <div class="table_sp col s12 z-depth-1">
            @if (count($players) > 0)
            <table>
              <tr><th colspan="5">投手</th></tr>
              <tr><th>No.</th><th>Name</th><th>DOB</th><th>Age</th><th>Blood</th></tr>
              @foreach ($players as $player)
                  @if ($player->position == 1 || $player->position == 5 )
                    @foreach ($player->pitcher_stats as $pitcher_stat)
                      @php
                          $name = str_replace("　", " ", $player->name);
                          $now = date("Ymd");
                          $born = str_replace("-", "", $player->dob);
                          $dob = str_replace("-", "/", $player->dob);
                      @endphp
                    <tr><td>{{ $pitcher_stat->number }}</td><td><?php echo $name; ?></td><td><?php echo $dob; ?></td><td><?php echo floor(($now-$born)/10000).'歳'; ?></td><td>{{ $player->blood }}</td></tr>
                    @endforeach
                  @endif
                @endforeach
            </table>
            <table>
              <tr><th colspan="5">内野手</th></tr>
              <tr><th>No.</th><th>Name</th><th>DOB</th><th>Age</th><th>Blood</th></tr>
              @foreach ($players as $player)
                  @if ($player->position == 3)
                    @foreach ($player->statistics as $statistic)
                      @php
                          $name = str_replace("　", " ", $player->name);
                          $now = date("Ymd");
                          $born = str_replace("-", "", $player->dob);
                          $dob = str_replace("-", "/", $player->dob);
                      @endphp
                    <tr><td>{{ $statistic->number }}</td><td><?php echo $name; ?></td><td><?php echo $dob; ?></td><td><?php echo floor(($now-$born)/10000).'歳'; ?></td><td>{{ $player->blood }}</td></tr>
                    @endforeach
                  @endif
                @endforeach
            </table>
            <table>
              <tr><th colspan="5">外野手</th></tr>
              <tr><th>No.</th><th>Name</th><th>DOB</th><th>Age</th><th>Blood</th></tr>
              @foreach ($players as $player)
                  @if ($player->position == 4)
                    @foreach ($player->statistics as $statistic)
                      @php
                          $name = str_replace("　", " ", $player->name);
                          $now = date("Ymd");
                          $born = str_replace("-", "", $player->dob);
                          $dob = str_replace("-", "/", $player->dob);
                      @endphp
                    <tr><td>{{ $statistic->number }}</td><td><?php echo $name; ?></td><td><?php echo $dob; ?></td><td><?php echo floor(($now-$born)/10000).'歳'; ?></td><td>{{ $player->blood }}</td></tr>
                    @endforeach
                  @endif
                @endforeach
            </table>
            <table>
              <tr><th colspan="5">捕手</th></tr>
              <tr><th>No.</th><th>Name</th><th>DOB</th><th>Age</th><th>Blood</th></tr>
              @foreach ($players as $player)
                  @if ($player->position == 2)
                    @foreach ($player->statistics as $statistic)
                      @php
                          $name = str_replace("　", " ", $player->name);
                          $now = date("Ymd");
                          $born = str_replace("-", "", $player->dob);
                          $dob = str_replace("-", "/", $player->dob);
                      @endphp
                    <tr><td>{{ $statistic->number }}</td><td><?php echo $name; ?></td><td><?php echo $dob; ?></td><td><?php echo floor(($now-$born)/10000).'歳'; ?></td><td>{{ $player->blood }}</td></tr>
                    @endforeach
                  @endif
                @endforeach
            </table>
            @endif
          </div><!--.table_sp-->
          
      </div><!--.row-->
    </div><!--.container-->

    <div class="container fielder">
      <div class="row">
        <div class="col s12 m6 z-depth-0 info_box">
          
          <ul id="slide-out" class="sidenav">
            
            <li>{!! link_to_route('carp.pitchers', '投手成績') !!}</li>
            <li>{!! link_to_route('carp.fielders', '打者成績') !!}</li>
            
            <li><div class="divider"></div></li>
            
            <li><a class="subheader">CENTRAL LEAGUE</a></li>
            <li><a class="waves-effect" href="#!">広島東洋カープ</a></li>
            <li><a class="waves-effect" href="#!">阪神タイガース</a></li>
            <li><a class="waves-effect" href="#!">東京ヤクルトスワローズ</a></li>
            <li><a class="waves-effect" href="#!">読売ジャイアンツ</a></li>
            <li><a class="waves-effect" href="#!">横浜DeNAベイスターズ</a></li>
            <li><a class="waves-effect" href="#!">中日ドラゴンズ</a></li>
            
            <li><a class="subheader">PACIFIC LEAGUE</a></li>
            <li><a class="waves-effect" href="#!">福岡ソフトバンクホークス</a></li>
            <li><a class="waves-effect" href="#!">千葉ロッテマリーンズ</a></li>
            <li><a class="waves-effect" href="#!">日本ハムファイターズ</a></li>
            <li><a class="waves-effect" href="#!">東北楽天イーグルス</a></li>
            <li><a class="waves-effect" href="#!">埼玉西武ライオンズ</a></li>
            <li><a class="waves-effect" href="#!">オリックスバファローズ</a></li>
          </ul>

        </div><!--.col s6-->
    
      </div>
    </div><!--.container-->
    
    <footer class="z-depth-2 footer_pc">
      <div class="container">
        <ul>
          <li><span class="pointer">{!! link_to_route('home', 'ホーム') !!}</span></li>
          <li><span class="pointer">このサイトについて</span></li>
          <li><span class="pointer">プライバシーポリシー</span></li>
          <li><span class="pointer">お問い合わせ</span></li>
        </ul>
      </div>  
      <div class="container copyright">
      © 2018 BaseBallChart. All rights reserved.
      </div>
    </footer>
    
    <footer class="z-depth-2 footer_sp">
      <div class="container">
          <p classe="font_sp"><span class="">{!! link_to_route('home', 'ホーム') !!}</span></p>
          <p classe="font_sp"><span class="">このサイトについて</span></p>
          <p classe="font_sp"><span class="">プライバシーポリシー</span></p>
          <p classe="font_sp"><span class="">お問い合わせ</span></p>
      </div>  
      <div class="container copyright">
      © 2018 BaseBallChart. All rights reserved.
      </div>
    </footer>
    
    <script src="js/main.js"></script>
@endsection