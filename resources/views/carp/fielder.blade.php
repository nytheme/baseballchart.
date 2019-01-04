@extends('layouts.head')

@section('content')
  <link rel="stylesheet" href="{{ secure_asset('css/carp/fielders.css') }}"> 
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
            @foreach ($statistics as $statistic)
            <div class="col s12">
              <h3><img src="images/carp_logo.png">{{ $statistic->name }}</h3>
            </div>
            <div class="col s12 m6 selector">
                <!-- Dropdown Structure -->
                <div class="z-depth-1">
                  <ul class="select z-depth-1">
                    <div class="box_close">
                      <div><h6>Season</h6></div>
                      <i class="material-icons trigger select_close_btn">close</i>
                    </div>
                    @foreach ($statistics_seasons as $statistics_season)
                    <li><a href="carp.fielder?id={{ $statistics_season->id }}&name={{ $statistics_season->name }}">{{ $statistics_season->season }}</a></li>
                    @endforeach
                  </ul>
                </div>
                <p class="label">Season</p><br>
                <div class="trigger box">
                  <div>
                    <p style="font-size: 1.2em;">{{ $statistic->season }}年</p>
                  </div>
                  <div>
                    <i class="material-icons">arrow_drop_down</i>
                  </div>
                </div>
              <hr>
            </div><!--.selector-->
            <div class="col s12 m6 selector">
              @php 
                  $dob = substr_replace(str_replace("-", "月", (substr_replace($statistic->dob, '年', 4, -5))), '日', 14);  //dobの'-'を年月にし、末尾に'日'を入れる
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
            <h4>打撃成績</h4>
            <tbody>
              <tr>
                <th class="tooltipped" data-position="top" data-tooltip="打率：数字が大きい程、ヒットを打つ確率が高い">打率</th>
                <th class="tooltipped" data-position="top" data-tooltip="安打(数)：ヒットの数">安打</th>
                <th class="tooltipped" data-position="top" data-tooltip="本塁打(数)：ホームランの数">本塁打</th>
                <th class="tooltipped" data-position="top" data-tooltip="打点：安打・犠牲打・四死球などによって自軍にもたらした得点">打点</th>
                <th class="tooltipped" data-position="top" data-tooltip="盗塁：走者が守備側のすきをついて次の塁へ進むこと">盗塁</th>
                <th class="tooltipped" data-position="top" data-tooltip="四球(数)：フォアボールによって出塁した数">四球</th>
                <th class="tooltipped" data-position="top" data-tooltip="OPS：出塁率と長打率とを足し合わせた値">OPS</th>
              </tr>
              <tr class="tr">
                @php
                  $da_ave = strval(sprintf("%.3f",$statistic->da_ave));  //変数の数値を文字列に sprintfで末尾が０でも表示
                  $da_ave_removed = ltrim($da_ave, '0');  //文字列の頭の[0]を削除
                  $ops = strval(sprintf("%.3f",$statistic->ops));  //変数の数値を文字列に
                  $ops_removed = ltrim($ops, '0'); //一の位が０のときに、非表示にする
                @endphp
                <td>{!! $da_ave_removed !!}</td><td>{!! $statistic->hit !!}</td><td>{!! $statistic->hr !!}</td>
                <td>{!! $statistic->rbi !!}</td><td>{!! $statistic->steal !!}</td><td>{!! $statistic->walk !!}</td><td>{!! $ops_removed !!}</td>
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
            <th>身長</th><td>{{ $statistic->height }}cm</td>
          </tr>
          <tr>
            <th>体重</th><td>{{ $statistic->weight }}kg</td>
          </tr>
          <tr>
            <th>血液型</th><td>{{ $statistic->blood }}</td>
          </tr>
          <tr>
            <th>出身地</th><td>{{ $statistic->home }}</td>
          </tr>
          <tr>
            <th>ドラフト</th><td>{{ $statistic->join }}年　{{ $statistic->draft }}</td>
          </tr>
          <tr>
            <th>経歴</th><td>{{ $statistic->career }}</td>
          </tr>
          <tr>
            <th>タイトル</th><td>{{ $statistic->title }}</td>
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
                <th>年<br><br>度</th><th>球<br><br>団</th><th>試<br><br>合</th><th>打<br><br>席</th><th>打<br><br>数</th><th>得<br><br>点</th>
                <th>安<br><br>打</th><th>二<br>塁<br>打</th><th>三<br>塁<br>打</th><th>本<br>塁<br>打</th><th>塁<br><br>打</th><th>打<br><br>点</th>
                <th>盗<br><br>塁</th><th>盗<br>塁<br>死</th><th>犠<br><br>打</th><th>犠<br><br>飛</th><th>四<br><br>球</th><th>敬<br><br>遠</th>
                <th>死<br><br>球</th><th>三<br><br>振</th><th>併<br>殺<br>打</th><th>打<br><br>率</th><th>出<br>塁<br>率</th><th>長<br>打<br>率</th><th>O<br>P<br>S</th>
              </tr>
              @foreach ($statistics_seasons as $statistics_season)
              @php 
                  $da_aves = ltrim(strval(sprintf("%.3f",$statistics_season->da_ave)), 0);  //strvalで変数の数値を文字列に sprintfで末尾が０でも表示 ltrimで頭の０を削除
                  $o_b_aves = ltrim(strval(sprintf("%.3f",$statistics_season->o_b_ave)), 0);
                  $sl_aves = ltrim(strval(sprintf("%.3f",$statistics_season->sl_ave)), 0);
                  $opses = ltrim(strval(sprintf("%.3f",$statistics_season->ops)), 0);
              @endphp
              <tr>
                <td>{{ $statistics_season->season }}</td><td>{{ $statistics_season->team }}</td><td>{{ $statistics_season->siai_s }}</td><td>{{ $statistics_season->dasek_s }}</td><td>{{ $statistics_season->da_s }}</td><td>{{ $statistics_season->score }}</td>
                <td>{{ $statistics_season->hit }}</td><td>{{ $statistics_season->two_h }}</td><td>{{ $statistics_season->three_h }}</td><td>{{ $statistics_season->hr }}</td><td>{{ $statistics_season->rui_h }}</td><td>{{ $statistics_season->rbi }}</td>
                <td>{{ $statistics_season->steal }}</td><td>{{ $statistics_season->c_steal }}</td><td>{{ $statistics_season->s_hit }}</td><td>{{ $statistics_season->s_fly }}</td><td>{{ $statistics_season->walk }}</td><td>{{ $statistics_season->k_en }}</td>
                <td>{{ $statistics_season->hbp }}</td><td>{{ $statistics_season->s_out }}</td><td>{{ $statistics_season->d_play }}</td><td>{{ $da_aves }}</td><td>{{ $o_b_aves }}</td><td>{{ $sl_aves }}</td><td>{{ $opses }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div><!--.modal-content-->
      </div><!--.modal-->
    <script>
      var raderChart = echarts.init(document.getElementById('rader'));
      var data = [
          ['{!! $statistic->da_ave !!}','{!! $statistic->hit !!}','{!! $statistic->hr !!}','{!! $statistic->rbi !!}','{!! $statistic->steal !!}','{!! $statistic->walk !!}','{!! $statistic->ops !!}'],
      ];
      var lineStyle = {
          normal: {
              width: 1,
              opacity: 0.5
          }
      };
      // specify chart configuration item and data
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
                  {name: '打率', max: 0.35},
                  {name: '安打', max: 170},
                  {name: '本塁打', max: 40},
                  {name: '打点', max: 110},
                  {name: '盗塁', max: 40},
                  {name: '四球', max: 100},
                  {name: 'OPS', max: 1.1},
                  
                  
                  
              ],
              shape: 'circle',
              splitNumber: 3,
              name: {
                  textStyle: {
                      color: '#222'
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