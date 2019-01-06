@extends('layouts.head')

@section('content')
  <link rel="stylesheet" href="{{ secure_asset('css/carp/pitchers.css') }}"> 
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
            @foreach ($pitcher_stats as $pitcher_stat)
                @php
                      $name = str_replace("　", " ", $pitcher_stat->name ); 
                @endphp
            <div class="col s12">
              <h3><img src="images/carp_logo.png">{{ $name }}</h3>
            </div>
            <div class="col s12 m6 selector">
                <!-- Dropdown Structure -->
                <div class="z-depth-1">
                  <ul class="select z-depth-1">
                    <div class="box_close">
                      <div><h6>Season</h6></div>
                      <i class="material-icons trigger select_close_btn">close</i>
                    </div>
                    @foreach ($pitcher_stats_seasons as $pitcher_stats_season)
                    <li><a href="carp.pitcher?id={{ $pitcher_stats_season->id }}&name={{ $pitcher_stat->name }}">{{ $pitcher_stats_season->season }}</a></li>
                    @endforeach
                  </ul>
                </div>
                <p class="label">Season</p><br>
                <div class="trigger box">
                  <div>
                    <p style="font-size: 1.2em;">{{ $pitcher_stat->season }}年</p>
                  </div>
                  <div>
                    <i class="material-icons">arrow_drop_down</i>
                  </div>
                </div>
              <hr>
            </div><!--.selector-->
            <div class="col s12 m6 selector">
              @php 
                  $dob = substr_replace(str_replace("-", "月", (substr_replace($pitcher_stat->dob, '年', 4, -5))), '日', 14);  //dobの'-'を年月にし、末尾に'日'を入れる
              @endphp
              <div class="container buttons">
                <ul>
                  <li><a class="waves-effect waves-light btn-floating btn red darken-3 tooltipped modal-trigger button" data-position="top" data-tooltip="選手情報" href="#modal1"><i class="material-icons">insert_emoticon</i></a></li>
                  <li><a class="waves-effect waves-light btn-floating btn red darken-3 tooltipped modal-trigger button" data-position="top" data-tooltip="年度別成績" href="#modal2"><i class="material-icons">equalizer</i></a></li>
                </ul>
              </div>
            </div><!--.selector-->
          </div><!--.list-->
        </div><!--.row-->
      </div><!--.container-->
    </section><!--.top-->
    
    <div class="container stats z-depth-1">
      <div class="row">
        <div class="col s12 m6">
          <table class="">
            <h4>投手成績</h4>
            <tbody>
              <tr>
                <th></th><th>勝利数</th><th>防御率</th><th>奪三振</th><th>制球力</th><th class="tooltipped" data-position="top" data-tooltip="これはクオリティセーブの説明です">QS</th>
              </tr>
              <tr>
                <th></th><th>{{ $pitcher_stat->win }}</th><th>{{ $pitcher_stat->era }}</th><th>{{ $pitcher_stat->strikeout }}</th><th>{{ round((($pitcher_stat->give_walk + $pitcher_stat->hit_batter)*9/$pitcher_stat->inning),2) }}</th><th>{{ $pitcher_stat->qs}}%</th>
              </tr>
            </tbody>
          </table> 
          <br><br>
          <table>
            <tbody>
              <tr>
                <th></th><th>ホールド</th><th>セーブ</th><th>奪三振率</th><th>WHIP</th>
              </tr>
              <tr>
                <th></th><th>{{ $pitcher_stat->hold }}</th><th>{{ $pitcher_stat->save }}</th><th>{{ round(($pitcher_stat->strikeout *9/ $pitcher_stat->inning),2) }}％</th><th>{{ $pitcher_stat->whip }}</th>
              </tr>
            </tbody>
          </table>
        </div><!--,col s12 m6-->  
        <div class="col s12 m6">
          <div id="rader"></div>
        </div>
      </div><!--.row-->
    </div><!--.container-->  
    @php 
      break; 
    @endphp
    @endforeach
    <!-- Modal Structure -->
    <div id="modal1" class="modal" style="height: 500px;">
      <div class="modal-content">
        <table>
          <tr>
            <th>生年月日</th><td>{{ $dob }}</td>
          </tr>
          <tr>
            <th>身長</th><td>{{ $pitcher_stat->height }}cm</td>
          </tr>
          <tr>
            <th>体重</th><td>{{ $pitcher_stat->weight }}kg</td>
          </tr>
          <tr>
            <th>血液型</th><td>{{ $pitcher_stat->blood }}</td>
          </tr>
          <tr>
            <th>出身地</th><td>{{ $pitcher_stat->home }}</td>
          </tr>
          <tr>
            <th>ドラフト</th><td>{{ $pitcher_stat->join }}年　{{ $pitcher_stat->draft }}</td>
          </tr>
          <tr>
            <th>経歴</th><td>{{ $pitcher_stat->career }}</td>
          </tr>
          <tr>
            <th>タイトル</th><td>{{ $pitcher_stat->title }}</td>
          </tr>
          </table>
        </div><!--.modal-content-->
      </div><!--.modal-->
      <!-- Modal Structure -->
      <div id="modal2" class="modal" style="height: 900px;">
        <div class="modal-content">
          <h3>年度別打撃成績</h3>
          <table>
            <tbody>
              <tr>
                <th>年<br><br>度</th><th>球<br><br>団</th><th>試<br><br>合</th><th>勝<br>利</th><th>敗<br><br>北</th><th>セ<br>丨<br>ブ</th><th>ホ<br>丨<br>ル<br>ド</th>
                <th>H<br><br>P</th><th>完<br>投</th><th>完<br>封<br>勝</th><th>無<br>四<br>球</th><th>勝<br>率</th><th>打<br><br>者</th>
                <th>投<br>球<br>回</th><th>被<br>安<br>打</th><th>被<br>本<br>塁<br>打</th><th>与<br>四<br>球</th><th>敬<br>遠</th><th>与<br>死<br>球</th>
                <th>奪<br>三<br>振</th><th>暴<br>投</th><th>ボ<br>丨<br>ク</th><th>失<br>点</th><th>自<br>責<br>点</th><th>防<br>御<br>率</th>
              </tr>
              @foreach ($pitcher_stats_seasons as $pitcher_stats_season)
              @php 
                  $r_win = ltrim(strval(sprintf("%.3f",$pitcher_stats_season->r_win)),0);
                  $era = sprintf("%.2f", $pitcher_stats_season->era);
              @endphp
              <tr>
                <td>{{ $pitcher_stats_season->season }}</td><td>{{ $pitcher_stats_season->team }}</td><td>{{ $pitcher_stats_season->siai_s }}</td><td>{{ $pitcher_stats_season->win }}</td><td>{{ $pitcher_stats_season->loss }}</td><td>{{ $pitcher_stats_season->save }}</td><td>{{ $pitcher_stats_season->hold }}</td>
                <td>{{ $pitcher_stats_season->hp }}</td><td>{{ $pitcher_stats_season->p_comp }}</td><td>{{ $pitcher_stats_season->shutout }}</td><td>{{ $pitcher_stats_season->nowalk }}</td><td>{{ $r_win }}</td><td>{{ $pitcher_stats_season->batters }}</td><td>{{ $pitcher_stats_season->inning }}</td>
                <td>{{ $pitcher_stats_season->hit_allowed }}</td><td>{{ $pitcher_stats_season->hr_allowed }}</td><td>{{ $pitcher_stats_season->give_walk }}</td><td>{{ $pitcher_stats_season->k_en }}</td><td>{{ $pitcher_stats_season->hit_batter }}</td>
                <td>{{ $pitcher_stats_season->strikeout }}</td><td>{{ $pitcher_stats_season->wild_pitch }}</td><td>{{ $pitcher_stats_season->balk }}</td><td>{{ $pitcher_stats_season->run_allowed }}</td><td>{{ $pitcher_stats_season->earned_run }}</td><td>{{ $era }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div><!--.modal-content-->
      </div><!--.modal-->
    <script>
      var raderChart = echarts.init(document.getElementById('rader'));
      var data = [
        ['{{ $pitcher_stat->win }}',/*'{{ $pitcher_stat->qs }}',*/'{{ $pitcher_stat->strikeout }}',12-'{{ $pitcher_stat->era }}'*1.5,10-'{{ ($pitcher_stat->give_walk + $pitcher_stat->hit_batter )*9/ $pitcher_stat->inning }}','{{ $pitcher_stat->strikeout *9/ $pitcher_stat->inning }}',5-'{{ $pitcher_stat->whip }}'*1.8,'{{ $pitcher_stat->hold + $pitcher_stat->save }}'],
      ];
      var lineStyle = {
          normal: {
              width: 1,
              opacity: 0.5
          }
      };
      var option = {
          geo: {
            left: 'left',
          },
          backgroundColor: 'rgba(0,0,0,0.0)',
          title: {
              text: '',
              left: '',
              textStyle: {
                  color: '#000000',
                  fontSize: 17,
                  fontWeight: 'lighter'
              }
          },
          legend: {
              bottom: 5,
              data: ['2018年', '2017年', '2016年'],
              itemGap: 20,
              textStyle: {
                  color: '#8c8c8c',
                  fontSize: 12
              },
              selectedMode: 'single'
          },
          // visualMap: {
          //     show: true,
          //     min: 0,
          //     max: 20,
          //     dimension: 6,
          //     inRange: {
          //         colorLightness: [0.5, 0.8]
          //     }
          // },
          radar: {
              indicator: [
                  {name: '勝利数', max: 17},
                  //{name: 'QS', max: 100},
                  {name: '奪三振', max: 200},
                  {name: '防御率', max: 10},
                  {name: '制球力', max: 10},
                  {name: '奪三振率', max: 12},
                  {name: 'WHIP', max: 4},
                  {name: 'リリーフ', max: 40},
              ],
              shape: 'circle',
              splitNumber: 3,
              name: {
                  textStyle: {
                      color: '#222',
                      fontSize: 10
                  }
              },
              splitLine: {
                  lineStyle: {
                      color: [
                          'rgba(29, 49, 86, 0)', 'rgba(29, 49, 86, 0)',   //円（外→中
                          'rgba(29, 49, 86, 0.4)', 'rgba(29, 49, 86, 0.4)',
                          'rgba(29, 49, 86, 0.3)', 'rgba(29, 49, 86, 0.2)'
                      ].reverse()
                  }
              },
              splitArea: {
                  areaStyle: {
                    color: ['rgba(253, 253, 253, 0.6)'],
                    shadowColor: 'rgba(100, 100, 0, 1)',
                    //shadowBlur: 10
                }
              },
              axisLine: {
                  lineStyle: {
                      color: 'rgba(29, 49, 86, 0.4)'  //線
                  }
              }
          },
          series: [
              {
                  //name: '2018年',
                  type: 'radar',
                  lineStyle: lineStyle,
                  data: data,
                  symbol: 'none',
                  itemStyle: {
                      normal: {
                          color: '#d23228'
                      }
                  },
                  areaStyle: {
                      normal: {
                          opacity: 0.8
                      }
                  }
              },
          ]
      };
      raderChart.setOption(option);
    </script> 
    <script src="js/main.js"></script>
  </body>
@endsection