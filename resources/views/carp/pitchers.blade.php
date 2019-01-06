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
            <div class="col s12">
              <h3><img src="images/carp_logo.png">広島東洋カープ 投手成績</h3>
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
                    <li><a href="carp.pitchers?season=2018">2018年</a></li>
                    <li><a href="carp.pitchers?season=2017">2017年</a></li>
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
                    <div><h6>Runking</h6></div>
                    <i class="material-icons trigger select_close_btn">close</i>
                  </div>
                  <li><a href="#" class="all_p_runking_trigger">全ランキング</a></li>
                </ul>
              </div>
              <p class="label">Runking</p><br>
              <div class="trigger box">
                <div>
                  <p style="font-size: 1.2em;" id="selected">全ランキング</p>
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
            <h3 style="text-align: center;">奪三振ランキング</h3>
          </div>
          <div class="col s12 m7 barChart z-depth-1">
            <div class="flex">
              <div class="name">
                @php
                      $strikeout_names = str_replace("　", " ", $strikeouts_names); 
                @endphp
                <ul>
                  <li><a href="carp.pitcher?id={{ $strikeouts_ids[0] }}&name={{ $strikeouts_names[0] }}">{{ $strikeout_names[0] }}</a></li><li><a href="carp.pitcher?id={{ $strikeouts_ids[1] }}&name={{ $strikeouts_names[1] }}">{{ $strikeout_names[1] }}</a></li><li><a href="carp.pitcher?id={{ $strikeouts_ids[2] }}&name={{ $strikeouts_names[2] }}">{{ $strikeout_names[2] }}</a></li><li><a href="carp.pitcher?id={{ $strikeouts_ids[3] }}&name={{ $strikeouts_names[3] }}">{{ $strikeout_names[3] }}</a></li><li><a href="carp.pitcher?id={{ $strikeouts_ids[4] }}&name={{ $strikeouts_names[4] }}">{{ $strikeout_names[4] }}</a></li><li><a href="carp.pitcher?id={{ $strikeouts_ids[5] }}&name={{ $strikeouts_names[5] }}">{{ $strikeout_names[5] }}</a></li><li><a href="carp.pitcher?id={{ $strikeouts_ids[6] }}&name={{ $strikeouts_names[6] }}">{{ $strikeout_names[6] }}</a></li><li><a href="carp.pitcher?id={{ $strikeouts_ids[7] }}&name={{ $strikeouts_names[7] }}">{{ $strikeout_names[7] }}</a></li><li><a href="carp.pitcher?id={{ $strikeouts_ids[8] }}&name={{ $strikeouts_names[8] }}">{{ $strikeout_names[8] }}</a></li><li><a href="carp.pitcher?id={{ $strikeouts_ids[9] }}&name={{ $strikeouts_names[9] }}">{{ $strikeout_names[9] }}</a></li>
                </ul>
              </div>
              <div class="chart" id="barChart_strikeout"></div>
            </div>  
          </div><!--col s12 m6-->
          <div class="col s12 m4 offset-m1 table_runking">
            <table>
              <tr><th colspan="3">セリーグ 奪三振ランキング</th></tr>
              <tr><td><img src="images/crown1.png" class="crown_sp">菅野 智之</td><td>巨人</td><td>200</td></tr>
              <tr><td><img src="images/crown2.png" class="crown_sp">大瀬良 大地</td><td>広島</td><td>159</td></tr>
              <tr><td><img src="images/crown3.png" class="crown_sp">東 克樹</td><td>DeNA</td><td>155</td></tr>
            </table>
            <table>
              <tr><th colspan="3">パリーグ 奪三振ランキング</th></tr>
              <tr><td><img src="images/crown1.png" class="crown_sp">則本 昂大</td><td>楽天</td><td>187</td></tr>
              <tr><td><img src="images/crown2.png" class="crown_sp">千賀 滉大</td><td>ソフトバンク</td><td>163</td></tr>
              <tr><td><img src="images/crown3.png" class="crown_sp">岸 孝之</td><td>楽天</td><td>159</td></tr>
            </table>
        　</div><!--col s12 m4-->
        </div><!--.row-->
      </div><!--.container-->
   
      <div class="container"> 
        <div class="row">
          <div class="col s12 m7">
            <h3 style="text-align: center;">防御率ランキング</h3>
          </div>
          <div class="col s12 m7 barChart z-depth-1">
            <div class="flex">
              <div class="name">
                @php
                      $era_names = str_replace("　", " ", $eras_names); 
                @endphp
                <ul>
                  <li><a href="carp.pitcher?id={{ $eras_ids[0] }}&name={{ $eras_names[0] }}">{{ $era_names[0] }}</a></li><li><a href="carp.pitcher?id={{ $eras_ids[1] }}&name={{ $eras_names[1] }}">{{ $era_names[1] }}</a></li><li><a href="carp.pitcher?id={{ $eras_ids[2] }}&name={{ $eras_names[2] }}">{{ $era_names[2] }}</a></li><li><a href="carp.pitcher?id={{ $eras_ids[3] }}&name={{ $eras_names[3] }}">{{ $era_names[3] }}</a></li><li><a href="carp.pitcher?id={{ $eras_ids[4] }}&name={{ $eras_names[4] }}">{{ $era_names[4] }}</a></li><li><a href="carp.pitcher?id={{ $eras_ids[5] }}&name={{ $eras_names[5] }}">{{ $era_names[5] }}</a></li><li><a href="carp.pitcher?id={{ $eras_ids[6] }}&name={{ $eras_names[6] }}">{{ $era_names[6] }}</a></li><li><a href="carp.pitcher?id={{ $eras_ids[7] }}&name={{ $eras_names[7] }}">{{ $era_names[7] }}</a></li><li><a href="carp.pitcher?id={{ $eras_ids[8] }}&name={{ $eras_names[8] }}">{{ $era_names[8] }}</a></li><li><a href="carp.pitcher?id={{ $eras_ids[9] }}&name={{ $eras_names[9] }}">{{ $era_names[9] }}</a></li>
                </ul>
              </div>
              <div class="chart" id="barChart_era"></div>
            </div><!--flex-->
          </div><!--barChart-->
          <div class="col s12 m4 offset-m1 table_runking">
            <table>
              <tr><th colspan="3">セリーグ 防御率ランキング（先発投手）</th></tr>
              <tr><td><img src="images/crown1.png" class="crown_sp">菅野 智之</td><td>巨人</td><td>2.14</td></tr>
              <tr><td><img src="images/crown2.png" class="crown_sp">東 克樹</td><td>DeNA</td><td>2.45</td></tr>
              <tr><td><img src="images/crown3.png" class="crown_sp">大瀬良 大地</td><td>広島</td><td>2.62</td></tr>
            </table>
            <table>
              <tr><th colspan="3">パリーグ 防御率ランキング（先発投手）</th></tr>
              <tr><td><img src="images/crown1.png" class="crown_sp">岸 孝之</td><td>楽天</td><td>2.72</td></tr>
              <tr><td><img src="images/crown2.png" class="crown_sp">菊池 雄星</td><td>西武</td><td>3.08</td></tr>
              <tr><td><img src="images/crown3.png" class="crown_sp">上沢 直之</td><td>日本ハム</td><td>3.16</td></tr>
            </table>
          </div><!--.col s12-->
        </div><!--.row-->
      </div><!--.container-->
      <div class="container raderChart z-depth-1"> 
        <div class="row">
          <div class="col s12 m6">
            <h4>チーム投手成績</h4>
            <div class="input-field">
              <select>
                <optgroup label="Season">
                  <option value="1">2018年</option>
                </optgroup>
              </select>
              <label>Season</label>
            </div><!--.input-field-->
            <table>
              <tr><th></th><th>防御率</th><th>セーブ</th><th>ホールド</th><th>奪三振</th><th>WHIP</th><th>QS</th></tr>
              <tr><th>広島</th><td>4.12</td><td>38</td><td>98</td><td>1041</td><td>1.41</td><td>45.45</td></tr>
              <tr><th>セリーグ</th><td>4.10</td><td>34</td><td>98</td><td>1064</td><td>1.37</td><td>43.82</td></tr>
              <tr><th>パリーグ</th><td>3.90</td><td>35.5</td><td>103</td><td>1014</td><td>1.31</td><td>48.83</td></tr>
            </table>
          </div>
          <div class="col s12 m6">
            <div id="raderChart_team_ave"></div>
          </div>
        </div><!--.row-->
      </div><!--.container-->
    </section><!--.middle-->
    <script>
      var barChart = echarts.init(document.getElementById('barChart_strikeout'));
      var option = {

        tooltip : {
            show: false,
            trigger: 'axis',
            axisPointer : {            
                type : 'shadow'        
            }
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
            //data: ['<?php print_r($strikeouts_names[9]); ?>','<?php print_r($strikeouts_names[8]); ?>','<?php print_r($strikeouts_names[7]); ?>','<?php print_r($strikeouts_names[6]); ?>','<?php print_r($strikeouts_names[5]); ?>','<?php print_r($strikeouts_names[4]); ?>','<?php print_r($strikeouts_names[3]); ?>','<?php print_r($strikeouts_names[2]); ?>','<?php print_r($strikeouts_names[1]); ?>','<?php print_r($strikeouts_names[0]); ?>',]
        },
        series: [
            {
                name: '',
                type: 'bar',
                stack: '',
                label: {
                    normal: {
                        show: true,
                        position: 'insideRight'
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
                data: ['<?php print_r($strikeouts[9]); ?>','<?php print_r($strikeouts[8]); ?>','<?php print_r($strikeouts[7]); ?>','<?php print_r($strikeouts[6]); ?>','<?php print_r($strikeouts[5]); ?>','<?php print_r($strikeouts[4]); ?>','<?php print_r($strikeouts[3]); ?>','<?php print_r($strikeouts[2]); ?>','<?php print_r($strikeouts[1]); ?>','<?php print_r($strikeouts[0]); ?>',]
            },
           
        ]
    };
      barChart.setOption(option);

      var barChart = echarts.init(document.getElementById('barChart_era'));
      //チャートに表示する数字を整形するため、変数に。sprintfで末尾が０でも表示
      var era = ['{{ sprintf("%.2f",$eras[9]) }}','{{ sprintf("%.2f",$eras[8]) }}','{{ sprintf("%.2f",$eras[7]) }}','{{ sprintf("%.2f",$eras[6]) }}','{{ sprintf("%.2f",$eras[5]) }}','{{ sprintf("%.2f",$eras[4]) }}','{{ sprintf("%.2f",$eras[3]) }}','{{ sprintf("%.2f",$eras[2]) }}','{{ sprintf("%.2f",$eras[1]) }}','{{ sprintf("%.2f",$eras[0]) }}',]
      var option = {

        tooltip : {
            show: false,
            trigger: 'axis',
            axisPointer : {            
                type : 'shadow'        
            }
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
            //data: ['<?php print_r($eras_names[9]); ?>','<?php print_r($eras_names[8]); ?>','<?php print_r($eras_names[7]); ?>','<?php print_r($eras_names[6]); ?>','<?php print_r($eras_names[5]); ?>','<?php print_r($eras_names[4]); ?>','<?php print_r($eras_names[3]); ?>','<?php print_r($eras_names[2]); ?>','<?php print_r($eras_names[1]); ?>','<?php print_r($eras_names[0]); ?>',]
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
                            return era[data.dataIndex];
                        },
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
                data: [10-'<?php print_r($eras[9]); ?>',10-'<?php print_r($eras[8]); ?>',10-'<?php print_r($eras[7]); ?>',10-'<?php print_r($eras[6]); ?>',10-'<?php print_r($eras[5]); ?>',10-'<?php print_r($eras[4]); ?>',10-'<?php print_r($eras[3]); ?>',10-'<?php print_r($eras[2]); ?>',10-'<?php print_r($eras[1]); ?>',10-'<?php print_r($eras[0]); ?>',]
            },
        ]
    };
      barChart.setOption(option);
      
      var raderChart_team_ave = echarts.init(document.getElementById('raderChart_team_ave'));
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
                  {name: '防御率', max: 1.2},
                  {name: 'Save', max: 43},
                  {name: 'Hold', max: 115},
                  {name: '奪三振', max: 1200},
                  {name: 'WHIP', max: 1.9},
                  {name: 'QS', max: 55},
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
                  value : [5-4.12,38,98,1041,3-1.41,45.45],
                  name: '広島',
                  itemStyle: {
                      normal: {
                          color: '#d23228'
                      }
                  }
                },
                {
                  value : [5-4.10,34,98,1064,3-1.37,43.82],
                  name: 'セリーグ',
                  itemStyle: {
                      normal: {
                          color: '#009688'
                      }
                  }
                },
                {
                  value : [5-3.90,35.5,103,1014,3-1.31,48.83],
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
      raderChart_team_ave.setOption(option);
    </script> 
    <script src="js/main.js"></script>
@endsection