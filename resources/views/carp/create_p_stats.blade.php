<?php
//ライブラリロード
    require_once '../vendor/autoload.php';

    //use
    use Goutte\Client;

    //インスタンス生成
    $client = new Client();
    
    $url = $_GET["url"];

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
    $salary = str_replace(",", "", str_replace("万円（推定）", "", $crawler->filter('.player-info > tr')->eq(4)->filter('td')->eq(1)->text()));
    $career = $crawler->filter('.player-info > tr')->eq(5)->filter('td')->eq(0)->text();
    $draft = $crawler->filter('.player-info > tr')->eq(6)->filter('td')->eq(0)->text();
    
    $siai_s = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(0)->text();
    $win = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(1)->text();
    $loss = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(2)->text();
    $save = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(3)->text();
    $hold = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(4)->text();
    $hp = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(5)->text();
    $p_comp = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(6)->text();
    $shutout = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(7)->text();
    $r_win = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(9)->text();
    $nowalk = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(8)->text();
    $batters = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(10)->text();
    $inning = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(11)->text();
    $hit_allowed = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(12)->text();
    $hr_allowed = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(13)->text();
    $give_walk = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(14)->text();
    $k_en = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(15)->text();
    $hit_batter = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(16)->text();
    $strikeout = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(17)->text();
    $wild_pitch = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(18)->text();
    $balk = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(19)->text();
    $run_allowed = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(20)->text();
    $earned_run = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(21)->text();
    $era = $crawler->filter('.stats')->eq(0)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(22)->text();
    $whip = $crawler->filter('.stats')->eq(1)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(0)->text();
    $hit_allowed_ave = $crawler->filter('.stats')->eq(1)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(1)->text();
    $hr_allowed_ave = $crawler->filter('.stats')->eq(1)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(2)->text();
    $strikeout_ave  = $crawler->filter('.stats')->eq(1)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(3)->text();
    $give_ave = $crawler->filter('.stats')->eq(1)->filter('tbody' > 'tr')->eq(0)->filter('td')->eq(4)->text();
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    {!! link_to_route('home', 'ホーム') !!}
    <a href="carp.list?season=2018">選手一覧</a>
    <h4>選手登録フォーム</h4>
      {!! Form::model($pitcher_stats, ['route' => 'pitcher_stat.store']) !!}
        <div>
          {!! Form::label('チーム') !!}
          {!! Form::select('team', ['1'=>'広島']) !!}
        </div>
        <h3 style="color: red;">年度選択を忘れずに</h3>
        <div>
          {!! Form::label('年度') !!}
          {!! Form::select('season', ['2018'=>'2018','2017'=>'2017','2016'=>'2016','2015'=>'2015']) !!}
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
          {!! Form::label('何年目？') !!}
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
          {!! Form::text('p', $p) !!}
        </div>
        <div>
          {!! Form::label('打') !!}
          {!! Form::text('b', $b) !!}
        </div>
        <h3 style="color: red;">{!! $position !!}（先発 or リリーフ確認！）</h3>
        <div>
          {!! Form::label('ポジション') !!}
          {!! Form::select('position', ['先発'=>'先発','リリーフ'=>'リリーフ']) !!}
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
          {!! Form::label('チームID') !!}
          {!! Form::select('team_id', ['1'=>'広島']) !!}
        </div>
        <div>
          {!! Form::label('試合数') !!}
          {!! Form::text('siai_s', $siai_s) !!}
        </div>    
        <div>
          {!! Form::label('勝利') !!}
          {!! Form::text('win', $win); !!}
        </div>
        <div>
          {!! Form::label('敗北') !!}
          {!! Form::text('loss', $loss) !!}
        </div>
        <div>
          {!! Form::label('セーブ') !!}
          {!! Form::text('save', $save) !!}
        </div>
        <div>
          {!! Form::label('ホールド') !!}
          {!! Form::text('hold', $hold); !!}
        </div>
        <div>
          {!! Form::label('HP') !!}
          {!! Form::text('hp', $hp) !!}
        </div>
        <div>
          {!! Form::label('完投') !!}
          {!! Form::text('p_comp', $p_comp) !!}
        </div>
        <div>
          {!! Form::label('完封') !!}
          {!! Form::text('shutout', $shutout) !!}
        </div>
        <div>
          {!! Form::label('無四球') !!}
           {!! Form::text('nowalk', $nowalk) !!}
        </div>
        <div>
          {!! Form::label('勝率') !!}
          {!! Form::text('r_win', $r_win) !!}
        </div>
        <div>
          {!! Form::label('打者') !!}
          {!! Form::text('batters', $batters) !!}
        </div>
        <div>
          {!! Form::label('投球回') !!}
          {!! Form::text('inning', $inning) !!}
        </div>
        <div>
          {!! Form::label('被安打') !!}
          {!! Form::text('hit_allowed', $hit_allowed) !!}
        </div>
        <div>
          {!! Form::label('被本塁打') !!}
          {!! Form::text('hr_allowed', $hr_allowed) !!}
        </div>
        <div>
          {!! Form::label('与四球') !!}
          {!! Form::text('give_walk', $give_walk) !!}
        </div>
        <div>
          {!! Form::label('敬遠') !!}
          {!! Form::text('k_en', $k_en) !!}
        </div>
        <div>
          {!! Form::label('与死球') !!}
          {!! Form::text('hit_batter', $hit_batter); !!}
        </div>
        <div>
          {!! Form::label('奪三振') !!}
          {!! Form::text('strikeout', $strikeout) !!}
        </div>
        <div>
          {!! Form::label('暴投') !!}
          {!! Form::text('wild_pitch', $wild_pitch) !!}
        </div>
        <div>
          {!! Form::label('ボーク') !!}
          {!! Form::text('balk', $balk) !!}
        </div>
        <div>
          {!! Form::label('失点') !!}
          {!! Form::text('run_allowed', $run_allowed) !!}
        </div>
        <div>
          {!! Form::label('自責点') !!}
          {!! Form::text('earned_run', $earned_run) !!}
        </div>
        <div>
          {!! Form::label('防御率') !!}
          {!! Form::text('era', $era) !!}
        </div>
        <div>
          {!! Form::label('WHIP') !!}
          {!! Form::text('whip', $whip) !!}
        </div>
        <div>
          {!! Form::label('被安打率') !!}
          {!! Form::text('hit_allowed_ave', $hit_allowed_ave) !!}
        </div>
        <div>
          {!! Form::label('被本打率') !!}
          {!! Form::text('hr_allowed_ave', $hr_allowed_ave) !!}
        </div>
        <div>
          {!! Form::label('奪三振率') !!}
          {!! Form::text('strikeout_ave', $strikeout_ave) !!}
        </div>
        <div>
          {!! Form::label('与四死率') !!}
          {!! Form::text('give_ave', $give_ave) !!}
        </div>
        <div>
          {!! Form::label('QS') !!}
          {!! Form::text('qs') !!}
        </div>
      {!! Form::submit('登録') !!}
      {!! Form::close() !!}
  </body>
</html>