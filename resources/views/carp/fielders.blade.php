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
            <div class="col s12">
              <h3><img src="images/carp_logo.png">広島東洋カープ 選手一覧</h3>
            </div>
            <div class="col s12 m6 selector">
              
              @foreach ($statistics as $statistic)
                <!-- Dropdown Structure -->
                <div class="z-depth-1">
                  <ul class="select z-depth-1">
                    <div class="box_close">
                      <div><h6>Season</h6></div>
                      <i class="material-icons trigger select_close_btn">close</i>
                    </div>
                    <li><a href="carp.fielders?season=2018">2018年</a></li>
                    <li><a href="carp.fielders?season=2017">2017年</a></li>
                    <li><a href="carp.fielders?season=2016">2016年</a></li>
                  </ul>
                </div>
                <p class="label">Season</p><br>
                <div class="trigger box">
                  <div>
                    <p style="font-size: 1.2em;" >{{ $statistic->season }}年</p>
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
        
    <section class="middle">
      <div class="container"> 
        <div class="row">
          <div class="col s12 m7">
            <h3 style="text-align: center;">本塁打ランキング</h3>
          </div>
          <div class="col s12 m7 barChart z-depth-1">
            <div class="flex">
              <div class="name">
                @php
                      $hr_names = str_replace("　", " ", $hrs_names); 
                @endphp
                <ul>
                  <li><a href="carp.fielder?id={{ $hrs_ids[0] }}&name={{ $hrs_names[0] }}">{{ $hr_names[0] }}</a></li><li><a href="carp.fielder?id={{ $hrs_ids[1] }}&name={{ $hrs_names[1] }}">{{ $hr_names[1] }}</a></li><li><a href="carp.fielder?id={{ $hrs_ids[2] }}&name={{ $hrs_names[2] }}">{{ $hr_names[2] }}</a></li><li><a href="carp.fielder?id={{ $hrs_ids[3] }}&name={{ $hrs_names[3] }}">{{ $hr_names[3] }}</a></li><li><a href="carp.fielder?id={{ $hrs_ids[4] }}&name={{ $hrs_names[4] }}">{{ $hr_names[4] }}</a></li><li><a href="carp.fielder?id={{ $hrs_ids[5] }}&name={{ $hrs_names[5] }}">{{ $hr_names[5] }}</a></li><li><a href="carp.fielder?id={{ $hrs_ids[6] }}&name={{ $hrs_names[6] }}">{{ $hr_names[6] }}</a></li><li><a href="carp.fielder?id={{ $hrs_ids[7] }}&name={{ $hrs_names[7] }}">{{ $hr_names[7] }}</a></li><li><a href="carp.fielder?id={{ $hrs_ids[8] }}&name={{ $hrs_names[8] }}">{{ $hr_names[8] }}</a></li><li><a href="carp.fielder?id={{ $hrs_ids[9] }}&name={{ $hrs_names[9] }}">{{ $hr_names[9] }}</a></li>
                </ul>
              </div>
              <div class="chart" id="barChart_hr"></div>
            </div><!--flex-->
          </div><!--barChart-->
          <div class="col s12 m4 offset-m1 table_runking">
            <table>
              <tr><th colspan="3">セリーグ 本塁打ランキング</th></tr>
              <tr><td><img src="images/crown1.png" class="crown_sp">ソト</td><td>DeNA</td><td>41本</td></tr>
              <tr><td><img src="images/crown2.png" class="crown_sp">丸 佳浩</td><td>広島</td><td>39本</td></tr>
              <tr><td><img src="images/crown3.png" class="crown_sp">バレンティン</td><td>ヤクルト</td><td>38本</td></tr>
            </table>
            <table>
              <tr><th colspan="3">パリーグ 本塁打ランキング</th></tr>
              <tr><td><img src="images/crown1.png" class="crown_sp">山川 穂高</td><td>西武</td><td>47本</td></tr>
              <tr><td><img src="images/crown2.png" class="crown_sp">柳田 悠岐</td><td>ソフトバンク</td><td>36本</td></tr>
              <tr><td><img src="images/crown3.png" class="crown_sp">浅村 栄斗</td><td>西武</td><td>32本</td></tr>
            </table>
          </div><!--.col s12-->
          
          <div class="col s12 m7">
            <h3 style="text-align: center;">打率ランキング</h3>
          </div>
          <div class="col s12 m7 barChart z-depth-1">
            <div class="flex">
              <div class="name">
                @php
                      $b_ave_names = str_replace("　", " ", $b_aves_names); 
                @endphp
                <ul>
                  <li><a href="carp.fielder?id={{ $b_aves_ids[0] }}&name={{ $b_aves_names[0] }}">{{ $b_ave_names[0] }}</a></li><li><a href="carp.fielder?id={{ $b_aves_ids[1] }}&name={{ $b_aves_names[1] }}">{{ $b_ave_names[1] }}</a></li><li><a href="carp.fielder?id={{ $b_aves_ids[2] }}&name={{ $b_aves_names[2] }}">{{ $b_ave_names[2] }}</a></li><li><a href="carp.fielder?id={{ $b_aves_ids[3] }}&name={{ $b_aves_names[3] }}">{{ $b_ave_names[3] }}</a></li><li><a href="carp.fielder?id={{ $b_aves_ids[4] }}&name={{ $b_aves_names[4] }}">{{ $b_ave_names[4] }}</a></li><li><a href="carp.fielder?id={{ $b_aves_ids[5] }}&name={{ $b_aves_names[5] }}">{{ $b_ave_names[5] }}</a></li><li><a href="carp.fielder?id={{ $b_aves_ids[6] }}&name={{ $b_aves_names[6] }}">{{ $b_ave_names[6] }}</a></li><li><a href="carp.fielder?id={{ $b_aves_ids[7] }}&name={{ $b_aves_names[7] }}">{{ $b_ave_names[7] }}</a></li><li><a href="carp.fielder?id={{ $b_aves_ids[8] }}&name={{ $b_aves_names[8] }}">{{ $b_ave_names[8] }}</a></li><li><a href="carp.fielder?id={{ $b_aves_ids[9] }}&name={{ $b_aves_names[9] }}">{{ $b_ave_names[9] }}</a></li>
                </ul>
              </div>
              <div class="chart" id="barChart_b_ave"></div>
            </div><!--flex-->
          </div><!--barChart-->
          <div class="col s12 m4 offset-m1 table_runking">
            <table>
              <tr><th colspan="3">セリーグ 本塁打ランキング</th></tr>
              <tr><td><img src="images/crown1.png" class="crown_sp">ソト</td><td>DeNA</td><td>41本</td></tr>
              <tr><td><img src="images/crown2.png" class="crown_sp">丸 佳浩</td><td>広島</td><td>39本</td></tr>
              <tr><td><img src="images/crown3.png" class="crown_sp">バレンティン</td><td>ヤクルト</td><td>38本</td></tr>
            </table>
            <table>
              <tr><th colspan="3">パリーグ 本塁打ランキング</th></tr>
              <tr><td><img src="images/crown1.png" class="crown_sp">山川 穂高</td><td>西武</td><td>47本</td></tr>
              <tr><td><img src="images/crown2.png" class="crown_sp">柳田 悠岐</td><td>ソフトバンク</td><td>36本</td></tr>
              <tr><td><img src="images/crown3.png" class="crown_sp">浅村 栄斗</td><td>西武</td><td>32本</td></tr>
            </table>
          </div><!--.col s12-->
          
        </div><!--.row-->
      </div><!--.container-->
      
      <div class="container raderChart z-depth-1"> 
        <div class="row">
          <div class="col s12 m6">
            <h4>チーム打撃成績</h4>
            <div class="input-field">
              <select>
                <optgroup label="Season">
                  <option value="1">2018年</option>
                </optgroup>
              </select>
              <label>Season</label>
            </div><!--.input-field-->
            <table>
              <tr><th></th><th>打率</th><th>安打</th><th>本塁打</th><th>打点</th><th>盗塁</th><th>四球</th></tr>
              <tr><th>広島</th><td>.262</td><td>1275</td><td>175</td><td>697</td><td>95</td><td>599</td></tr>
              <tr><th>セリーグ</th><td>.259</td><td>1255</td><td>138</td><td>603</td><td>72</td><td>486</td></tr>
              <tr><th>パリーグ</th><td>.253</td><td>1413</td><td>143</td><td>586</td><td>100</td><td>464</td></tr>
            </table>
          </div>
          <div class="col s12 m6">
            <div id="raderChart_team_ave"></div>
          </div>
        </div><!--.row-->
      </div><!--.container-->
    </section><!--.middle-->
  
    <script>
      var barChart = echarts.init(document.getElementById('barChart_hr'));
      var option = {

        tooltip : {
          show: false,
        },
        legend: {
            data: ['']
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        xAxis:  {
            type: 'value',
            axisTick: {
              show: false },
            axisLabel: {
              show: false },
        },
        yAxis: {
            type: 'category',
            //data: ['']
        },
        series: [
            {
                name: '',
                type: 'bar',
                stack: '',
                label: {
                    normal: {
                        show: true,
                        position: 'insideRight',
                    }
                },
                itemStyle: {
                      normal: {
                        color: {
                          colorStops: [{
                          offset: 0,
                          color: '#c6342a' // 0% 
                          }, {
                              offset: 1,
                              color: '#E5422B' // 100% 
                          }],
                        }
                      }
                },
                data: ['<?php print_r($hrs[9]); ?>','<?php print_r($hrs[8]); ?>','<?php print_r($hrs[7]); ?>','<?php print_r($hrs[6]); ?>','<?php print_r($hrs[5]); ?>','<?php print_r($hrs[4]); ?>','<?php print_r($hrs[3]); ?>','<?php print_r($hrs[2]); ?>','<?php print_r($hrs[1]); ?>','<?php print_r($hrs[0]); ?>']
            },
        ]
    };
      barChart.setOption(option);
      
      var barChart = echarts.init(document.getElementById('barChart_b_ave'));
      var b_ave = ['{{ substr(sprintf("%.3f",$b_aves[9]),1) }}','{{ substr(sprintf("%.3f",$b_aves[8]),1) }}','{{ substr(sprintf("%.3f",$b_aves[7]),1) }}','{{ substr(sprintf("%.3f",$b_aves[6]),1) }}','{{ substr(sprintf("%.3f",$b_aves[5]),1) }}','{{ substr(sprintf("%.3f",$b_aves[4]),1) }}','{{ substr(sprintf("%.3f",$b_aves[3]),1) }}','{{ substr(sprintf("%.3f",$b_aves[2]),1) }}','{{ substr(sprintf("%.3f",$b_aves[1]),1) }}','{{ substr(sprintf("%.3f",$b_aves[0]),1) }}',]
      var option = {   //substrで表示開始桁・sprintfで末尾が０でも表示されるように指定

        tooltip : {
          show: false,
        },
        legend: {
            data: ['']
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        xAxis:  {
            type: 'value',
            axisTick: {
              show: false },
            axisLabel: {
              show: false },
        },
        yAxis: {
            type: 'category',
            //data: ['ここにデータ']
        },
        series: [
            {
                name: '',
                type: 'bar',
                stack: '',
                label: {
                    normal: {
                        show: true,
                        position: 'insideRight',
                        formatter: function(data) {
                        return b_ave[data.dataIndex];
                        }
                    }
                },
                itemStyle: {
                      normal: {
                        color: {
                          colorStops: [{
                          offset: 0,
                          color: '#c6342a' // 0% 
                          }, {
                              offset: 1,
                              color: '#E5422B' // 100% 
                          }],
                        }
                      }
                },
                data: ['{{ $b_aves[9]}}','{{ $b_aves[8]}}','{{ $b_aves[7]}}','{{ $b_aves[6]}}','{{ $b_aves[5]}}','{{ $b_aves[4]}}','{{ $b_aves[3]}}','{{ $b_aves[2]}}','{{ $b_aves[1]}}','{{ $b_aves[0]}}']
            },
        ]
    };
      barChart.setOption(option);

      var raderChart = echarts.init(document.getElementById('raderChart_team_ave'));
      var lineStyle = {
          normal: {
              width: 3,
              opacity: 1
          }
      };
      var option = {
          geo: {
            left: 'left',
          },
          tooltip: {
            show: false,
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
              top: 0,
              data: ['広島', 'セリーグ', 'パリーグ'],
              textStyle: {
                  color: 'black',
                  fontSize: 12
              },
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
                  {name: '打率', max: 0.3},
                  {name: '安打', max: 1450},
                  {name: '本塁打', max: 200},
                  {name: '打点', max: 750},
                  {name: '盗塁', max: 110},
                  {name: '四球', max: 610},
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
                    color: ['rgba(0,0,0, 0.0)'],
                    shadowColor: 'rgba(100, 100, 0, 1)',
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
              name: 'リーグ',
              type: 'radar',
              lineStyle: lineStyle,
              data: [
                {
                  value : [.262,1275,175,697,95,599],
                  name: '広島',
                  itemStyle: {
                      normal: {
                          color: '#d23228'
                      }
                  }
                },
                {
                  value : [.259,1255,138,603,72,486],
                  name: 'セリーグ',
                  itemStyle: {
                      normal: {
                          color: '#009688'
                      }
                  }
                },
                {
                  value : [.253,1413,143,586,100,464],
                  name: 'パリーグ',
                  itemStyle: {
                      normal: {
                          color: '#4ab1e5'
                      }
                  }
                },
              ]
            },
          ]
      };
      raderChart.setOption(option);
    </script> 

    <script src="js/main.js"></script>
@endsection