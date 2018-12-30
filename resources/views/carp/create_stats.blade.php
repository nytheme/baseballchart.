<?php
//ライブラリロード
    require_once '../vendor/autoload.php';

    //use
    use Goutte\Client;

    //インスタンス生成
    $client = new Client();
    
    $url = $_GET['url'];

    //取得とDOM構築
    $crawler = $client->request('GET', $url);
    $number = preg_replace('/[^0-9]/', '', $crawler->filter('h2')->text());
    $name = strstr(substr(preg_replace('/[0-9]/', '', $crawler->filter('h2')->text()), 1), "(", true); //preg_replaceで文字列から数値のみを切り出す
    $kana = trim(trim(strstr($crawler->filter('h2')->text(), "("), "("), ")"); //trimで"()"を削除
    $dob = str_replace("年","", str_replace("日","", str_replace("月","", $crawler->filter('.player-info > tr > td')->text()))); 
    $p = mb_substr($crawler->filter('.player-info > tr > td')->eq(1)->text(), 0, 1);
    $b = mb_substr($crawler->filter('.player-info > tr > td')->eq(1)->text(), 2, 1);
    $old = str_replace("歳","", $crawler->filter('.player-info > tr')->eq(1)->filter('td')->text());
    $position = $crawler->filter('.player-info > tr')->eq(1)->filter('td')->eq(1)->text();
    $years = str_replace("年目", "", $crawler->filter('.player-info > tr')->eq(2)->filter('td')->eq(0)->text());
    $join = 2018-$years;
    $home = $crawler->filter('.player-info > tr')->eq(2)->filter('td')->eq(1)->text();
    $height = str_replace("cm", "", $crawler->filter('.player-info > tr')->eq(3)->filter('td')->eq(0)->text());
    $blood = $crawler->filter('.player-info > tr')->eq(3)->filter('td')->eq(1)->text();
    $weight = str_replace("kg", "", $crawler->filter('.player-info > tr')->eq(4)->filter('td')->eq(0)->text());
    $salary = preg_replace('/[^0-9]/', '', $crawler->filter('.player-info > tr')->eq(4)->filter('td')->eq(1)->text());
    $career = $crawler->filter('.player-info > tr')->eq(5)->filter('td')->eq(0)->text();
    $draft = $crawler->filter('.player-info > tr')->eq(6)->filter('td')->eq(0)->text();
    $title = $crawler->filter('.player-info > tr')->eq(7)->filter('td')->eq(0)->text();
    
    $siai_s = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(0)->text();
    $dasek_s = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(1)->text();
    $da_s = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(2)->text();
    $score = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(3)->text();
    $hit = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(4)->text();
    $two_h = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(5)->text();
    $three_h = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(6)->text();
    $hr = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(7)->text();
    $rui_h = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(8)->text();
    $rbi = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(9)->text();
    $steal = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(10)->text();
    $c_steal = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(11)->text();
    $s_hit = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(12)->text();
    $s_fly = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(13)->text();
    $walk = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(14)->text();
    $k_en = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(15)->text();
    $hbp = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(16)->text();
    $s_out = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(17)->text();
    $d_play= $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(18)->text();
    $da_ave = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(19)->text();
    $o_b_ave = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(20)->text();
    $sl_ave = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(21)->text();
    $ops = $crawler->filter('.stats')->eq(1)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(0)->text();
    $hr_ave = $crawler->filter('.stats')->eq(1)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(12)->text();
    $s_out_ave = $crawler->filter('.stats')->eq(1)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(13)->text();
    $walk_ave = $crawler->filter('.stats')->eq(1)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(14)->text();
    
    $url = []
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
  <div class="container">
    <div class="row">
      <div class="col s12 m6">
        {!! link_to_route('home', 'ホーム') !!}
        <a href="carp.list?season=2018">選手一覧</a>
        <h4>選手登録フォーム（野手）</h4>
          {!! Form::model($statistics, ['route' => 'statistic.store']) !!}
            <div>
              {!! Form::label('チーム') !!}
              {!! Form::text('team', '広島') !!}
            </div>
            <h3 style="color: red;">年度選択を忘れずに</h3>
            <div>
              {!! Form::label('年度') !!}
              {!! Form::select('season', ['2018'=>'2018','2017'=>'2017','2016'=>'2016','2015'=>'2015','2014'=>'2014']) !!}
            </div>
            <div>
              {!! Form::label('背番号') !!}
              {!! Form::text('number', $number) !!}
            </div>
            <div>
              {!! Form::label('選手名') !!}
              {!! Form::text('name', $name) !!}
            </div>
            <div>
              {!! Form::label('仮名') !!}
              {!! Form::text('kana', $kana) !!}
            </div>
            <h3 style="color: red;">処理を忘れずに</h3>
            <div>
              {!! Form::label('DOB') !!}
              {!! Form::text('dob', $dob) !!}
            </div>
            <div>
              {!! Form::label('年齢') !!}
              {!! Form::text('old', $old) !!}
            </div>
            <div>
              {!! Form::label('入団年') !!}
              {!! Form::text('join', $join) !!}
            </div>
            <div>
              {!! Form::label('何年目') !!}
              {!! Form::text('years', $years) !!}
            </div>
            <div>
              {!! Form::label('身長') !!}
              {!! Form::text('height', $height) !!}
            </div>
            <div>
              {!! Form::label('体重') !!}
              {!! Form::text('weight', $weight) !!}
            </div>
            <div>
              {!! Form::label('投') !!}
              {!! Form::text('p', $p ) !!}
            </div>
            <div>
              {!! Form::label('打') !!}
              {!! Form::text('b', $b ) !!}
            </div>
            <div>
              {!! Form::label('ポジション') !!}
              {!! Form::text('position', $position) !!}
            </div>
            <div>
              {!! Form::label('出身') !!}
              {!! Form::text('home', $home) !!}
            </div>
            <div>
              {!! Form::label('血液型') !!}
              {!! Form::text('blood', $blood) !!}
            </div>
            <div>
              {!! Form::label('年棒') !!}
              {!! Form::text('salary', $salary) !!}
            </div>
            <div>
              {!! Form::label('経歴') !!}
              {!! Form::text('career', $career) !!}
            </div>
            <div>
              {!! Form::label('ドラフト') !!}
              {!! Form::text('draft', $draft) !!}
            </div>
            <div>
              {!! Form::label('タイトル') !!}
              {!! Form::text('title', $title) !!}
            </div>
            <div>
              {!! Form::label('チームID') !!}
              {!! Form::select('team_id', ['1'=>'広島']) !!}
            </div>
            <div>
              {!! Form::label('試合数') !!}
              {!! Form::text('siai_s', $siai_s) !!}
            </div>
            <div>
              {!! Form::label('打席数') !!}
              {!! Form::text('dasek_s', $dasek_s) !!}
            </div>
            <div>
              {!! Form::label('打数') !!}
              {!! Form::text('da_s', $da_s) !!}
            </div>
            <div>
              {!! Form::label('得点') !!}
              {!! Form::text('score', $score) !!}
            </div>
            <div>
              {!! Form::label('安打') !!}
              {!! Form::text('hit', $hit) !!}
            </div>
            <div>
              {!! Form::label('二塁打') !!}
              {!! Form::text('two_h', $two_h) !!}
            </div>
            <div>
              {!! Form::label('三塁打') !!}
              {!! Form::text('three_h', $three_h) !!}
            </div>
            <div>
              {!! Form::label('本塁打') !!}
              {!! Form::text('hr', $hr) !!}
            </div>
            <div>
              {!! Form::label('塁打') !!}
              {!! Form::text('rui_h', $rui_h) !!}
            </div>
            <div>
              {!! Form::label('打点') !!}
              {!! Form::text('rbi', $rbi) !!}
            </div>
            <div>
              {!! Form::label('盗塁') !!}
              {!! Form::text('steal', $steal) !!}
            </div>
            <div>
              {!! Form::label('盗塁刺') !!}
              {!! Form::text('c_steal', $c_steal) !!}
            </div>
            <div>
              {!! Form::label('犠牲打') !!}
              {!! Form::text('s_hit', $s_hit) !!}
            </div>
            <div>
              {!! Form::label('犠牲飛') !!}
              {!! Form::text('s_fly', $s_fly) !!}
            </div>
            <div>
              {!! Form::label('四球') !!}
              {!! Form::text('walk', $walk) !!}
            </div>
            <div>
              {!! Form::label('敬遠') !!}
              {!! Form::text('k_en', $k_en) !!}
            </div>
            <div>
              {!! Form::label('死球') !!}
              {!! Form::text('hbp', $hbp) !!}
            </div>
            <div>
              {!! Form::label('三振') !!}
              {!! Form::text('s_out', $s_out) !!}
            </div>
            <div>
              {!! Form::label('併殺打') !!}
              {!! Form::text('d_play', $d_play) !!}
            </div>
            <div>
              {!! Form::label('打率') !!}
              {!! Form::text('da_ave', $da_ave) !!}
            </div>
            <div>
              {!! Form::label('出塁率') !!}
              {!! Form::text('o_b_ave', $o_b_ave) !!}
            </div>
            <div>
              {!! Form::label('長打率') !!}
              {!! Form::text('sl_ave', $sl_ave) !!}
            </div>
            <div>
              {!! Form::label('OPS') !!}
              {!! Form::text('ops', $ops) !!}
            </div>
            <div>
              {!! Form::label('本塁打率') !!}
              {!! Form::text('hr_ave', $hr_ave) !!}
            </div>
            <div>
              {!! Form::label('三振率') !!}
              {!! Form::text('s_out_ave', $s_out_ave) !!}
            </div>
            <div>
              {!! Form::label('四球率') !!}
              {!! Form::text('walk_ave', $walk_ave) !!}
            </div>
          {!! Form::submit('登録') !!}
          {!! Form::close() !!}
      </div>
    </div>
  </div>
</body>
</html>