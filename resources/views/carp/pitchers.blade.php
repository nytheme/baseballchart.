@extends('layouts.head')

@section('content')
  <link rel="stylesheet" href="{{ secure_asset('css/carp/pitchers.css') }}"> 
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
                <li><span class="pointer">{!! link_to_route('carp.list', '選手一覧') !!}</span></li>
                <li><span class="pointer">{!! link_to_route('carp.pitchers', '投手成績') !!}</span></li>
                <li><span class="pointer">{!! link_to_route('carp.fielders', '打者成績') !!}</span></li>
              </ul>
            </div>
            <div class="header_menu_sp">
              <a data-target="slide-out" class="waves-effect waves-light sidenav-trigger btn-floating btn-large red darken-3"><i class="material-icons">menu</i></a>
            </div>
          </div>  
        </div>
      </div>
    </header>
    
    <ul id="slide-out" class="sidenav">
      <li><a class="subheader">MENU</a></li>
      <li>{!! link_to_route('carp.list', '選手一覧') !!}</li>
      <li>{!! link_to_route('carp.pitchers', '投手成績') !!}</li>
      <li>{!! link_to_route('carp.fielders', '打者成績') !!}</li>
    </ul>
    <div class="container teams">
      <div class="row">
        <div class="col s12 m6 z-depth-0">
          <h3 class="carp z-depth-0"><img src="images/carp_logo.png">広島東洋カープ 投手成績</h3>
        </div>   
        <div class="col s12 m6 z-depth-0">  
          <div class="input-field">
            <select>
              <optgroup label="Season">
                <option value="1">2018年</option>
              </optgroup>
            </select>
            <label>Season</label>
          </div><!--.input-field-->
        </div>  
      </div><!--.container-->
    </section><!--.top-->
        
    <section class="middle">
    <div class="container barChart z-depth-1"> 
      <div class="row">
        <div class="col s12 m12">
          <h4>奪三振 TOP10</h4>
          <div class="barChart_pc">
            <div id="barChart_hr"></div>
          </div>
        </div>
        <div class="barChart_sp col s12">
          <div id="barChart_hr_sp"></div>
        </div>
      </div><!--.row-->
    </div><!--.container-->  

    <div class="container section_sp"> 
      <div class="row">    
        <div class="col s12 m6 table_sp">
          <table>
            <tr><th colspan="3">セリーグ 奪三振ランキング</th></tr>
            <tr><td><img src="images/crown1.png" class="crown_sp">菅野 智之</td><td>巨人</td><td>200</td></tr>
            <tr><td><img src="images/crown2.png" class="crown_sp">大瀬良 大地</td><td>広島</td><td>159</td></tr>
            <tr><td><img src="images/crown3.png" class="crown_sp">東 克樹</td><td>DeNA</td><td>155</td></tr>
          </table>
        </div><!--.col s12-->  
        <div class="col s12 m6 table_sp">
          <table>
            <tr><th colspan="3">パリーグ 奪三振ランキング</th></tr>
            <tr><td><img src="images/crown1.png" class="crown_sp">則本 昂大</td><td>楽天</td><td>187</td></tr>
            <tr><td><img src="images/crown2.png" class="crown_sp">千賀 滉大</td><td>ソフトバンク</td><td>163</td></tr>
            <tr><td><img src="images/crown3.png" class="crown_sp">岸 孝之</td><td>楽天</td><td>159</td></tr>
          </table>
        </div><!--.col s12-->
      </div><!--.row-->
    </div><!--.container-->
      
    <!--<div class="container barChart z-depth-1"> 
      <div class="row">
        <div class="col s12 m12">
          <h4>防御率 TOP10</h4>
          <div class="barChart_pc">
            <div id="barChart_era"></div>
          </div>  
        </div>
        <div class="barChart_sp col s12">
          <div id="barChart_era_sp"></div>
        </div>
      </div><!--.row-->
    <!--</div><!--.container-->
        
    <!--<div class="container section_sp"> 
      <div class="row">    
        <div class="col s12 m6 table_sp">
          <table>
            <tr><th colspan="3">セリーグ 防御率ランキング（先発投手）</th></tr>
            <tr><td><img src="images/crown1.png" class="crown_sp">菅野 智之</td><td>巨人</td><td>2.14</td></tr>
            <tr><td><img src="images/crown2.png" class="crown_sp">東 克樹</td><td>DeNA</td><td>2.45</td></tr>
            <tr><td><img src="images/crown3.png" class="crown_sp">大瀬良 大地</td><td>広島</td><td>2.62</td></tr>
          </table>
        </div><!--.col s12-->  
        <!--<div class="col s12 m6 table_sp">
          <table>
            <tr><th colspan="3">パリーグ 防御率ランキング（先発投手）</th></tr>
            <tr><td><img src="images/crown1.png" class="crown_sp">岸 孝之</td><td>楽天</td><td>2.72</td></tr>
            <tr><td><img src="images/crown2.png" class="crown_sp">菊池 雄星</td><td>西武</td><td>3.08</td></tr>
            <tr><td><img src="images/crown3.png" class="crown_sp">上沢 直之</td><td>日本ハム</td><td>3.16</td></tr>
          </table>
        </div><!--.col s12-->
      <!--</div><!--.row-->
    <!--</div><!--.container-->
      
      
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
      
    </section><!--.-->
    
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
    <script>
      var barChart_hr = echarts.init(document.getElementById('barChart_hr'));
      var option = {

        color: ['#00bcd4'],
        tooltip : {
            show: false,
            trigger: 'axis',
            axisPointer : {            
                type : 'shadow'        
            }
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        xAxis : [
            {
                type : 'category',
                data : ['大瀬良','岡田','ジョンソン','九里','フランスア','一岡','野村','中崎','今村','アドゥワ',],
                axisTick: {
                    alignWithLabel: true
                },
                axisLabel: {
                  rotate: 20,
                  fontSize: 12,
                  fontWeight: 400,
                }
            }
        ],
        yAxis : [
            {
                type : 'value'
            }
        ],
        series : [
            {
                name:'奪三振',
                type:'bar',
                barWidth: '50%',
                data:[200,180,170,160,150,140,131,120,111,100],
                label: {
                        normal: {
                            show: true,
                            position: 'insideTop'
                        }
                    },
                itemStyle: {
                      normal: {
                          color: new echarts.graphic.LinearGradient(
                            0, 0, 0, 1, [{
                                    offset: 0,
                                    color: '#E0402A'
                                },
                                {
                                    offset: 0.5,
                                    color: '#D4382D'
                                },
                                {
                                    offset: 1,
                                    color: '#A12B22'
                                }
                            ]
                        )//color
                      }
                },
            }
        ]
    };
      barChart_hr.setOption(option);
      
      var barChart_hr_sp = echarts.init(document.getElementById('barChart_hr_sp'));
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
            type: 'value'
        },
        yAxis: {
            type: 'category',
            data: ['アドゥワ','今村','中崎','野村','一岡','フランスア','九里','ジョンソン','岡田','大瀬良',]
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
                data: [100,110,120,130,140,150,160,170,180,190,]
            },
           
        ]
    };
      barChart_hr_sp.setOption(option);
      
 
      
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