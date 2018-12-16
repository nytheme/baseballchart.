@extends('layouts.head')

@section('content')
  <link rel="stylesheet" href="{{ secure_asset('css/carp/fielders.css') }}"> 
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

        <div class="col s12 m6">
          <h3 class="carp z-depth-0"><img src="images/carp_logo.png">広島東洋カープ 野手成績</h3>
        </div>   
        <div class="col s12 m6">  
          <div class="input-field">
            <select>
              <optgroup label="Season">
                <option value="1">2018年</option>
              </optgroup>
            </select>
            <label>Season</label>
          </div><!--.input-field-->
        </div>  
          <!--<div class="input-field">
            <select>
              <optgroup label="Batting">
                <option value="1">本塁打ランキング</option>
                <option value="2">打率ランキング</option>
                <option value="3">安打ランキング</option>
                <option value="4">打点ランキング</option>
                <option value="5">四球ランキング</option>
                <option value="6">盗塁ランキング</option>
                <option value="7">出塁率ランキング</option>
              </optgroup>
            </select>
            <label>Batting</label>
          </div><!--.input-field-->
          
        <!--</div><!--.col s12-->
      
        <!--<div class="col s12 m4 table_pc">
          <table>
            <tr><th colspan="4">セリーグ 本塁打ランキング</th></tr>
            <tr><td><img src="images/crown1.png" class="crown_pc"></td><td>ソト</td><td>DeNA</td><td>41本</td></tr>
            <tr><td><img src="images/crown2.png" class="crown_pc"></td><td>丸 佳浩</td><td>広島</td><td>39本</td></tr>
            <tr><td><img src="images/crown3.png" class="crown_pc"></td><td>バレンティン</td><td>ヤクルト</td><td>38本</td></tr>
          </table>
        </div><!--.col s12-->  
        
        <!--<div class="col s12 m4 table_pc">
          <table>
            <tr><th colspan="4">パリーグ 本塁打ランキング</th></tr>
            <tr><td><img src="images/crown1.png" class="crown_pc"></td><td>山川 穂高</td><td>西武</td><td>47本</td></tr>
            <tr><td><img src="images/crown2.png" class="crown_pc"></td><td>柳田 悠岐</td><td>ソフトバンク</td><td>36本</td></tr>
            <tr><td><img src="images/crown3.png" class="crown_pc"></td><td>浅村 栄斗</td><td>西武</td><td>32本</td></tr>
          </table>
        </div><!--.col s12-->
      
      </div><!--.row-->
    </div><!--.container-->
    </section><!--.top-->
        
    <section class="middle">
      <!--@if (count($statistics) > 0)
        @foreach ($statistics as $statistic)　
            {!! $statistic->player->name !!} {{-- belongsToはリレーション先が一つなのでhasManyのように回す必要がない --}}
            {!! $statistic->hr !!} 
        @endforeach
      @endif-->
    <div class="container barChart z-depth-1"> 
      <div class="row">
        <div class="col s12 m12">
          <h4>チーム本塁打 TOP10</h4>
          <div id="barChart_hr"></div>
        </div>
        <div class="barChart_hr_sp col s12 z-depth-0">
          <div id="barChart_hr_sp"></div>
        </div>
      </div><!--.row-->
    </div><!--.container-->  
        
    <div class="container section_sp z-depth-0"> 
      <div class="row">    
        <div class="col s12 m6 table_sp">
          <table>
            <tr><th colspan="3">セリーグ 本塁打ランキング</th></tr>
            <tr><td><img src="images/crown1.png" class="crown_sp">ソト</td><td>DeNA</td><td>41本</td></tr>
            <tr><td><img src="images/crown2.png" class="crown_sp">丸 佳浩</td><td>広島</td><td>39本</td></tr>
            <tr><td><img src="images/crown3.png" class="crown_sp">バレンティン</td><td>ヤクルト</td><td>38本</td></tr>
          </table>
        </div><!--.col s12-->  
        <div class="col s12 m6 table_sp">
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
                data : ['丸 佳浩', '鈴木 誠也', 'バティスタ', '菊池 涼介', '會澤', '松山 竜平', '田中 広輔', '西川 龍馬', '野間 峻祥', '安部 友裕'],
                axisTick: {
                    alignWithLabel: true
                },
                /*axisLabel: {
                  rotate: 20,
                  fontSize: 12,
                  fontWeight: 400,
                }*/
            }
        ],
        yAxis : [
            {
                type : 'value'
            }
        ],
        series : [
            {
                name:'ホームラン',
                type:'bar',
                barWidth: '50%',
                data:[39, 30, 25, 13, 13, 12, 10, 6, 5, 4],
                label: {
                        normal: {
                            show: true,
                            position: 'insideTop'
                        }
                    },
                itemStyle: {
                      normal: {
                          color: '#c6342a'
                        
                      }
                },
            }
        ]
    };
      barChart_hr.setOption(option);
      
      var barChart_hr_sp = echarts.init(document.getElementById('barChart_hr_sp'));
      var option = {

        tooltip : {
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
            data: ['安部 友裕','野間 峻祥','西川 龍馬','田中 広輔','松山 竜平', '會澤','菊池 涼介','バティスタ','鈴木 誠也','丸 佳浩']
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
                          color: '#c6342a'
                        
                      }
                },
                data: [4,5, 6,10, 12,13, 13,25, 30, 39]
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
      raderChart_team_ave.setOption(option);
    </script> 

     <script src="js/main.js"></script>
@endsection