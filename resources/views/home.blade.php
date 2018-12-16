@extends('layouts.head')

@section('content')
  <link rel="stylesheet" href="{{ secure_asset('css/top.css') }}">
  <body class="top_page">
    <div class="top_img  z-depth-1">
      <div class="container">
        <div class="row">
          <div class="col s12 m12 header">
            <div class="logo_top_div">
              <img src="images/logo.png" class="logo_top">
            </div>
            <div class="intro">
              <p>プロ野球選手のデータをチャートで直感的に理解できるサイト</p>
            </div>
          </div>  
        </div><!--.row-->
      </div><!--.container-->
    </div><!--.top_img-->
    
    <div class="ranking">
    <div class="container"> 
      <div class="row">
        
        <div class="col s12">
          <h3 class="title">2018年度 部門別TOP5</h3>
        </div>
        
        <div class="box col s12 m12 z-depth-1">
          
          <div class="inline">
            <!--<h4><img src="images/bat_icon.png" class="check"></h4>-->
            <h4 class="h4">本塁打ランキング</h4>
          </div>
          
          <div class="box_contents">
            <div class=" z-depth-0">
              <div id="barChart_c_hr"></div>
              <div id="barChart_c_hr_sp"></div>
            </div>
    
            <div class="z-depth-0">
              <div id="barChart_p_hr"></div>
              <div id="barChart_p_hr_sp"></div>
            </div>
          </div>
        </div>
        
       
        <div class="col s12 m12">
          <h3 class="title">球団別選手データ・成績</h3>
        </div>
        
        </div><!--.row-->
      </div><!--.container-->
      </div><!--.ranking-->

  <!--<div class="tables_div z-depth-1">-->
    <div class="container data_rank z-depth-1">
      <div class="row">
        
        <!--<div class="col s12 m12">
        <h3>選手成績ランキング</h3>
        </div>
      
        <div class="col s12 m6">
          <table>
            <tr><th rowspan="2">セリーグ</th><th>打者成績</th><td>打率</td><td>本塁打</td><td>打点</td><td>盗塁</td></tr>
            <tr>                             <th>投手成績</th><td>防御率</td><td>勝利</td><td>奪三振</td><td>セーブ</td></tr>
            <tr><th rowspan="2">パリーグ</th><th>打者成績</th><td>打率</td><td>本塁打</td><td>打点</td><td>盗塁</td></tr>
            <tr>                        <th>投手成績</th><td>防御率</td><td>勝利</td><td>奪三振</td><td>セーブ</td></tr>
            <tr><th rowspan="2">両リーグ</th><th>打者成績</th><td>打率</td><td>本塁打</td><td>打点</td><td>盗塁</td></tr>
            <tr>                        <th>投手成績</th><td>防御率</td><td>勝利</td><td>奪三振</td><td>セーブ</td></tr>
          </table>
        </div>-->
        
          <div class="col s12 m6 info_table">
            <h4>セリーグ</h4>
            <table>
              <tr><th>広島</th><td>{!! link_to_route('carp.list', '選手一覧') !!}</td><td>{!! link_to_route('carp.pitchers', '投手成績') !!}</td><td>{!! link_to_route('carp.fielders', '打者成績') !!}</td></tr>
              <tr><th>阪神</th><td>選手一覧</td><td>投手成績</td><td>打者成績</td></tr>
              <tr><th>DeNA</th><td>選手一覧</td><td>投手成績</td><td>打者成績</td></tr>
              <tr><th>巨人</th><td>選手一覧</td><td>投手成績</td><td>打者成績</td></tr>
              <tr><th>中日</th><td>選手一覧</td><td>投手成績</td><td>打者成績</td></tr>
              <tr><th>ヤクルト</th><td>選手一覧</td><td>投手成績</td><td>打者成績</td></tr>
            </table>
          </div>
          
          <div class="col s12 m6 info_table">
            <h4>パリーグ</h4>
            <table>
              <tr><th>ソフトバンク</th><td>選手一覧</td><td>投手成績</td><td>打者成績</td></tr>
              <tr><th>西武</th><td>選手一覧</td><td>投手成績</td><td>打者成績</td></tr>
              <tr><th>楽天</th><td>選手一覧</td><td>投手成績</td><td>打者成績</td></tr>
              <tr><th>オリックス</th><td>選手一覧</td><td>投手成績</td><td>打者成績</td></tr>
              <tr><th>日本ハム</th><td>選手一覧</td><td>投手成績</td><td>打者成績</td></tr>
              <tr><th>ロッテ</th><td>選手一覧</td><td>投手成績</td><td>打者成績</td></tr>
            </table>
          </div>
        
      </div><!--.row-->
    </div><!--.container-->
        
    <div class="container fielder">
      <div class="row">
        <div class="col s12 m6 z-depth-0 info_box">
          
          <ul id="slide-out" class="sidenav">
            
            <li><a href="#!">トップページ</a></li>
            
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
    
    <div class="footer z-depth-1">
      <footer class="footer_text footer_pc">
        <div class="container">
          <ul>
            <li><span class="pointer">このサイトについて</span></li>
            <li><span class="pointer">プライバシーポリシー</span></li>
            <li><span class="pointer">お問い合わせ</span></li>
            {{--@if (Auth::check())
            @else
            <li>{!! link_to_route('login', '管理者ログイン') !!}</li>
            @endif
            @if (Auth::check())
            <li>{!! link_to_route('logout.get', 'ログアウト') !!}</li>
            @endif--}}
          </ul>
        </div>  
        <div class="footer-copyright">
          <div class="container copyright">
          © 2018 BaseBallChart. All rights reserved.
          </div>
        </div>
      </footer> 
    </div><!--.footer-->
    
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
      var barChart_c_hr = echarts.init(document.getElementById('barChart_c_hr'));
      var option = {
        title : {
          text: 'セリーグ',
          subtext: '',
          x:'',
          textStyle: {
            fontSize: 14
          }
        },
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
                data : ['ソト', '丸 佳浩', 'バレンティン', '筒香 嘉智', '山田 哲人'],
                axisTick: {
                    alignWithLabel: true
                },
                axisLabel: {
                  rotate: 20,
                  fontSize: 12,
                  fontWeight: 400,
                }
            },
        ],
        yAxis : [
            {
                type : 'value'
            }
        ],
        series : [
            {
                name:'本塁打',
                type:'bar',
                barWidth: '50%',
                data:[41, 39, 38, 38, 34],
                label: {
                        normal: {
                            show: true,
                            textStyle: {
                              color: '#fff',
                          },
                            position: 'insideTop'
                        }
                    },
                itemStyle: {
                  normal: {
                      color: new echarts.graphic.LinearGradient(
                            0, 0, 0, 1, [{
                                    offset: 0,
                                    color: '#52e54a'
                                },
                                {
                                    offset: 0.5,
                                    color: '#4ecc48'
                                },
                                {
                                    offset: 1,
                                    color: '#009688'
                                }
                            ]
                        )//color
                  }
                },
            }
        ]
    };
      barChart_c_hr.setOption(option);
      
      var barChart_c_hr_sp = echarts.init(document.getElementById('barChart_c_hr_sp'));
      var option = {
        title : {
          text: 'セリーグ',
          subtext: '',
          x:'',
          textStyle: {
            fontSize: 14
          }
        },
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
            data: ['山田 哲人','筒香 嘉智','バレンティン','丸 佳浩','ソト']
        },
        series: [
            {
                name: '',
                type: 'bar',
                stack: '',
                label: {
                    normal: {
                        show: true,
                        textStyle: {
                              color: '#fff',
                          },
                        position: 'insideRight'
                    }
                },
                itemStyle: {
                  normal: {
                    color: {
                      colorStops: [{
                          offset: 0,
                          color: '#009688' // 0% 
                      }, {
                          offset: 1,
                          color: '#52e54a' // 100% 
                      }],
                    }
                  }
                },
                data: [34, 38, 38, 39, 41],
            },
        ]
    };
      barChart_c_hr_sp.setOption(option);
      
      var barChart_p_hr = echarts.init(document.getElementById('barChart_p_hr'));
      var option = {
        title : {
          text: 'パリーグ',
          subtext: '',
          x:'',
          textStyle: {
            fontSize: 14
          }
        },
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
                data : ['山川 穂高', '柳田 悠岐', '松田 宣浩', '浅村 栄斗	', 'デスパイネ'],
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
                name:'本塁打',
                type:'bar',
                barWidth: '50%',
                data:[47, 36, 32, 32, 29],
                label: {
                        normal: {
                          show: true,
                          textStyle: {
                              color: '#fff',
                          },
                          position: 'insideTop'
                        }
                    },
                itemStyle: {
                      normal: {
                          color: new echarts.graphic.LinearGradient(
                            0, 0, 0, 1, [{
                                    offset: 0,
                                    color: '#09d6d0'
                                },
                                {
                                    offset: 0.5,
                                    color: '#027eff'
                                },
                                {
                                    offset: 1,
                                    color: '#0286ff'
                                }
                            ]
                        )//color
                      }
                },
            }
        ]
    };
      barChart_p_hr.setOption(option);
      
      var barChart_p_hr_sp = echarts.init(document.getElementById('barChart_p_hr_sp'));

      var option = {
        title : {
          text: 'パリーグ',
          subtext: '',
          x:'',
          textStyle: {
            fontSize: 14
          }
        },
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
            data: ['デスパイネ','浅村 栄斗','松田 宣浩','柳田 悠岐','山川 穂高']
        },
        series: [
            {
                name: '',
                type: 'bar',
                stack: '',
                label: {
                    normal: {
                        show: true,
                        textStyle: {
                              color: '#fff',
                          },
                        position: 'insideRight'
                    }
                },
                itemStyle: {
                      normal: {
                        color: {
                            colorStops: [{
                              offset: 0,
                              color: '#0286ff' // 0% 
                            }, {
                                offset: 1,
                                color: '#09d6d0' // 100% 
                            }],
                          }
                      }
                },
                data: [29, 32, 32, 36, 47]
            },
        ]
    };
      barChart_p_hr_sp.setOption(option);
    
    </script> 
      
    <script src="js/main.js"></script>
@endsection
