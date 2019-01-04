@extends('layouts.head')

@section('content')
<link rel="stylesheet" href="{{ secure_asset('css/carp/list.css') }}"> 
  <body>
    <section class="top z-depth-1 to_slide">
    <header>
      <div class="container">
        <div class="row">
          <div class="col s12 m12 header">
            <div>
             <a href="{{URL::to('home')}}"><img src="images/logo.png" class="logo"></a>
            </div>
            <div class="header_menu_pc">
              <ul>
                <li><span class="pointer"><a href="carp.list?season=2018">選手一覧</a></span></li>
                <li><span class="pointer"><a href="carp.pitchers?season=2018">投手成績</a></span></li>
                <li><span class="pointer"><a href="carp.fielders?season=2018">打者成績</a></span></li>
                @if (Auth::check())
                    <li>{!! link_to_route('carp.create', '選手登録') !!}</li>
                    <li>{!! link_to_route('logout.get', 'ログアウト') !!}</li>
                @else
                    {{--{!! link_to_route('signup.get', '新規登録', null) !!}--}}
                    <li><a href="login">管理者ログイン</a></li>
                @endif
              </ul>
            </div>
            <div class="header_menu_sp">
              <a class="waves-effect waves-light slide-trigger btn-floating btn red darken-3 btnOpen"><i class="material-icons">menu</i></a>
              <a class="waves-effect waves-light slide-trigger btn-floating btn red darken-3 btnClose close"><i class="material-icons">close</i></a>
            </div>
          </div>  
        </div>
      </div>
      <div class="col s12 m6">
        <ul class="slideToggle">
          <h4>- MENU -</h4>
          <h3 class="h3"><a href="carp.list?season=2018">選手一覧</a></h3>
          <hr>
          <h3 class="h3"><a href="carp.pitchers?season=2018">投手成績</a></h3>
          <hr>
          <h3 class="h3"><a href="carp.fielders?season=2018">打者成績</a></h3>
          <hr>
        </ul>
      </div>
    </header>
      <div class="container">
        <div class="row">
          <div class="list">
            <div class="col s12">
              <h3><img src="images/carp_logo.png">広島東洋カープ 選手一覧</h3>
            </div>
            <div class="col s12 m6 selector">
              
              @foreach ($pitcher_stats as $pitcher_stat)
                <!-- Dropdown Structure -->
                <div class="z-depth-1">
                  <ul class="select z-depth-1">
                    <div class="box_close">
                      <div><h6>Season</h6></div>
                      <i class="material-icons trigger select_close_btn">close</i>
                    </div>
                    <li><a href="carp.list?season=2018">2018年</a></li>
                    <li><a href="carp.list?season=2017">2017年</a></li>
                  </ul>
                </div>
                <p class="label">Season</p><br>
                <div class="trigger box">
                  <div>
                    <p style="font-size: 1.2em;" >{{ $pitcher_stat->season }}年</p>
                  </div>
                  <div>
                    <i class="material-icons">arrow_drop_down</i>
                  </div>
                </div>
                <?php break; ?>
              @endforeach
              <hr>
            </div><!--.selector-->
            <div class="col s12 m6 selector">
              <!-- Dropdown Structure -->
              <div class="z-depth-1">
                <ul class="select z-depth-1">
                  <div class="box_close">
                    <div><h6>Position</h6></div>
                    <i class="material-icons trigger select_close_btn">close</i>
                  </div>
                  <li><a href="#" class="all trigger">全選手</a></li>
                  <li><a href="#" class="pitcher trigger">投手</a></li>
                  <li><a href="#" class="inFielder trigger">内野手</a></li>
                  <li><a href="#" class="outFielder trigger">外野手</a></li>
                  <li><a href="#" class="catcher trigger">捕手</a></li>
                </ul>
              </div>
              <p class="label">Position</p><br>
              <div class="trigger box">
                <div>
                  <p style="font-size: 1.2em;" id="selected">全選手</p>
                </div>
                <div>
                  <i class="material-icons">arrow_drop_down</i>
                </div>
              </div>
              <hr>
            </div><!--.selector-->
          </div><!--.list-->
        </div><!--.row-->
      </div><!--.container-->
    </section><!--.top-->
    <section class="center">
      <div class="container">
        <div class="row">
          <div class="table_pc col s12 z-depth-1">
            @if (count($pitcher_stats) > 0)
            <table class="pitcherTable">
              <tr><th colspan="11">投手</th></tr>
              <tr><th>No.</th><th>Name</th><th>DOB</th><th>Age</th><th>Years</th><th>Height</th><th>Weight</th><th>Blood</th><th>P/B</th><th>Home</th><th>Salary</th></tr>
              @foreach ($pitcher_stats as $pitcher_stat)　
                  @if ($pitcher_stat->position == "先発" || $pitcher_stat->position == "リリーフ")
                      @php
                          $name = str_replace("　", " ", $pitcher_stat->name);
                          $dob = str_replace("-", "/", $pitcher_stat->dob);
                          $salary = number_format($pitcher_stat->salary);
                      @endphp
                      <tr>
                        <td>{{ $pitcher_stat->number }}</td><td><a href="carp.pitcher?id={{ $pitcher_stat->id }}&name={{ $pitcher_stat->name }}">{{ $name }}</a></td><td>{{ $dob }}</td><td>{{ $pitcher_stat->old }}歳</td><td>{{ $pitcher_stat->years }}年目</td><td>{{ $pitcher_stat->height }}cm</td><td>{{ $pitcher_stat->weight }}kg</td><td>{{ $pitcher_stat->blood }}</td><td>{{ $pitcher_stat->p }}{{ $pitcher_stat->b }}</td><td>{{ $pitcher_stat->home }}</td><td>{{ $salary }}万円
                        @if (Auth::check())
                            {!! Form::open(['route' => ['pitcher.destroy', $pitcher_stat->id], 'method' => 'delete']) !!}
                               
                              {!! Form::submit('Delete', ['class' => 'btn']) !!}
                            {!! Form::close() !!}
                        @endif
                        </td>
                      </tr>
                  @endif
              @endforeach
            </table>  
            @endif
            @if (count($statistics) > 0)
            <table class="inFielderTable">
              <tr><th colspan="11">内野手</th></tr>
              <tr><th>No.</th><th>Name</th><th>DOB</th><th>Age</th><th>Years</th><th>Height</th><th>Weight</th><th>Blood</th><th>P/B</th><th>Home</th><th>Salary</th></tr>
              @foreach ($statistics as $statistic)　
                  @if ($statistic->position == "内野手")
                      @php
                          $name = str_replace("　", " ", $statistic->name);
                          $dob = str_replace("-", "/", $statistic->dob);
                          $salary = number_format($statistic->salary);
                      @endphp
                      <tr>
                        <td>{{ $statistic->number }}</td><td><a href="carp.fielder?id={{ $statistic->id }}&name={{ $statistic->name }}">{{ $name }}</a></td><td>{{ $dob }}</td><td>{{ $statistic->old }}歳</td><td>{{ $statistic->years }}年目</td><td>{{ $statistic->height }}cm</td><td>{{ $statistic->weight }}kg</td><td>{{ $statistic->blood }}</td><td>{{ $statistic->p }}{{ $statistic->b }}</td><td>{{ $statistic->home }}</td><td>{{ $salary }}万円
                        @if (Auth::check())
                            {!! Form::open(['route' => ['fielder.destroy', $statistic->id], 'method' => 'delete']) !!}
                               
                              {!! Form::submit('Delete', ['class' => 'btn']) !!}
                            {!! Form::close() !!}
                        @endif
                        </td>
                      </tr>
                  @endif
              @endforeach
            </table>
            <table class="outFielderTable">
              <tr><th colspan="11">外野手</th></tr>
              <tr><th>No.</th><th>Name</th><th>DOB</th><th>Age</th><th>Years</th><th>Height</th><th>Weight</th><th>Blood</th><th>P/B</th><th>Home</th><th>Salary</th></tr>
              @foreach ($statistics as $statistic)　
                  @if ($statistic->position == "外野手")
                      @php
                          $name = str_replace("　", " ", $statistic->name);
                          $dob = str_replace("-", "/", $statistic->dob);
                          $salary = number_format($statistic->salary);
                      @endphp
                      <tr>
                        <td>{{ $statistic->number }}</td><td><a href="carp.fielder?id={{ $statistic->id }}&name={{ $statistic->name }}">{{ $name }}</a></td><td>{{ $dob }}</td><td>{{ $statistic->old }}歳</td><td>{{ $statistic->years }}年目</td><td>{{ $statistic->height }}cm</td><td>{{ $statistic->weight }}kg</td><td>{{ $statistic->blood }}</td><td>{{ $statistic->p }}{{ $statistic->b }}</td><td>{{ $statistic->home }}</td><td>{{ $salary }}万円
                        @if (Auth::check())
                            {!! Form::open(['route' => ['fielder.destroy', $statistic->id], 'method' => 'delete']) !!}
                               
                              {!! Form::submit('Delete', ['class' => 'btn']) !!}
                            {!! Form::close() !!}
                        @endif
                        </td>
                      </tr>
                  @endif
              @endforeach
            </table>
            <table class="catcherTable">
              <tr><th colspan="11">捕手</th></tr>
              <tr><th>No.</th><th>Name</th><th>DOB</th><th>Age</th><th>Years</th><th>Height</th><th>Weight</th><th>Blood</th><th>P/B</th><th>Home</th><th>Salary</th></tr>
              @foreach ($statistics as $statistic)　
                  @if ($statistic->position == "捕手")
                      @php
                        //全角スペースを半角スペースに
                          $name = str_replace("　", " ", $statistic->name);
                        //生年月日の-を/に変更
                          $dob = str_replace("-", "/", $statistic->dob);
                        //年棒にカンマ
                          $salary = number_format($statistic->salary);
                      @endphp
                      <tr>
                        <td>{{ $statistic->number }}</td><td><a href="carp.fielder?id={{ $statistic->id }}&name={{ $statistic->name }}">{{ $name }}</a></td><td>{{ $dob }}</td><td>{{ $statistic->old }}歳</td><td>{{ $statistic->years }}年目</td><td>{{ $statistic->height }}cm</td><td>{{ $statistic->weight }}kg</td><td>{{ $statistic->blood }}</td><td>{{ $statistic->p }}{{ $statistic->b }}</td><td>{{ $statistic->home }}</td><td>{{ $salary }}万円
                        @if (Auth::check())
                            {!! Form::open(['route' => ['fielder.destroy', $statistic->id], 'method' => 'delete']) !!}
                               
                              {!! Form::submit('Delete', ['class' => 'btn']) !!}
                            {!! Form::close() !!}
                        @endif
                        </td>
                      </tr>
                  @endif
              @endforeach
            </table>
            @endif
        </div><!--table_pc-->  
        <div class="table_sp col s12 z-depth-1">
          @if (count($pitcher_stats) > 0)
            <table class="pitcherTable">
              <tr><th colspan="11">投手</th></tr>
              <tr><th>No.</th><th>Name</th><th>DOB</th><th>Age</th><th>Blood</th></tr>
              @foreach ($pitcher_stats as $pitcher_stat)　
                  @if ($pitcher_stat->position == "先発" || $pitcher_stat->position == "リリーフ")
                      @php
                          $name = str_replace("　", " ", $pitcher_stat->name);
                          $dob = substr(str_replace("-", "/", $pitcher_stat->dob), 5,5); //西暦を削除
                          $salary = number_format($pitcher_stat->salary);
                      @endphp
                      <tr><td>{{ $pitcher_stat->number }}</td><td><a href="carp.pitcher?id={{ $pitcher_stat->id }}&name={{ $pitcher_stat->name }}">{{ $name }}</a></td><td>{{ $dob }}</td><td>{{ $pitcher_stat->old }}歳</td><td>{{ $pitcher_stat->blood }}</td></tr>
                  @endif
              @endforeach
            </table>  
            @endif
            @if (count($statistics) > 0)
            <table class="inFielderTable">
              <tr><th colspan="11">内野手</th></tr>
              <tr><th>No.</th><th>Name</th><th>DOB</th><th>Age</th><th>Blood</th></tr>
              @foreach ($statistics as $statistic)　
                  @if ($statistic->position == "内野手")
                      @php
                          $name = str_replace("　", " ", $statistic->name);
                          $dob = substr(str_replace("-", "/", $statistic->dob), 5,5);
                          $salary = number_format($statistic->salary);
                      @endphp
                      <tr><td>{{ $statistic->number }}</td><td><a href="carp.fielder?id={{ $statistic->id }}&name={{ $statistic->name }}">{{ $name }}</a></td><td>{{ $dob }}</td><td>{{ $statistic->old }}歳</td><td>{{ $statistic->blood }}</td></tr>
                  @endif
              @endforeach
            </table>
            <table class="outFielderTable">
              <tr><th colspan="11">外野手</th></tr>
              <tr><th>No.</th><th>Name</th><th>DOB</th><th>Age</th><th>Blood</th></tr>
              @foreach ($statistics as $statistic)　
                  @if ($statistic->position == "外野手")
                      @php
                          $name = str_replace("　", " ", $statistic->name);
                          $dob = substr(str_replace("-", "/", $statistic->dob), 5,5);
                          $salary = number_format($statistic->salary);
                      @endphp
                      <tr><td>{{ $statistic->number }}</td><td><a href="carp.fielder?id={{ $statistic->id }}&name={{ $statistic->name }}">{{ $name }}</a></td><td>{{ $dob }}</td><td>{{ $statistic->old }}歳</td><td>{{ $statistic->blood }}</td></tr>
                  @endif
              @endforeach
            </table>
            <table class="catcherTable">
              <tr><th colspan="11">捕手</th></tr>
              <tr><th>No.</th><th>Name</th><th>DOB</th><th>Age</th><th>Blood</th></tr>
              @foreach ($statistics as $statistic)　
                  @if ($statistic->position == "捕手")
                      @php
                          $name = str_replace("　", " ", $statistic->name);
                          $dob = substr(str_replace("-", "/", $statistic->dob), 5,5);
                          $salary = number_format($statistic->salary);
                      @endphp
                      <tr><td>{{ $statistic->number }}</td><td><a href="carp.fielder?id={{ $statistic->id }}&name={{ $statistic->name }}">{{ $name }}</a></td><td>{{ $dob }}</td><td>{{ $statistic->old }}歳</td><td>{{ $statistic->blood }}</td></tr>
                  @endif
              @endforeach
            </table>
          @endif
        </div><!--table_sp-->
      </div><!--.row-->
    </div><!--.container-->

    <script src="js/main.js"></script>
@endsection
