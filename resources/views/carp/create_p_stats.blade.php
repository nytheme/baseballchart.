<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    {!! link_to_route('home', 'ホーム') !!}
    {!! link_to_route('carp.list', '選手リスト') !!}
    <h4>選手登録フォーム</h4>
      {!! Form::model($pitcher_stats, ['route' => 'pitcher_stat.store']) !!}
        <div>
          {!! Form::label('id') !!}
          {!! Form::text('player_id') !!}
        </div>
        <div>
          {!! Form::label('名前') !!}
          {!! Form::text('name') !!}
        </div>
        <div>
          {!! Form::label('仮名') !!}
          {!! Form::text('kana') !!}
        </div>
        <div>
          {!! Form::label('年度') !!}
          {!! Form::select('year', ['2018'=>'2018']) !!}
        </div>
        <div>
          {!! Form::label('背番号') !!}
          {!! Form::text('number') !!}
        </div>
        <div>
          {!! Form::label('年齢') !!}
          {!! Form::text('old') !!}
        </div>
        <div>
          {!! Form::label('体重') !!}
          {!! Form::text('weight') !!}
        </div>
        <div>
          {!! Form::label('ポジション') !!}
           {!! Form::select('position', ['1'=>'先発','5'=>'リリーフ']) !!}
        </div>
        <div>
          {!! Form::label('年棒') !!}
          {!! Form::text('salary') !!}
        </div>
        <div>
          {!! Form::label('チーム') !!}
          {!! Form::select('team_id', ['1'=>'広島']) !!}
        </div>
        <div>
          {!! Form::label('試合数') !!}
          {!! Form::text('siai_s') !!}
        </div>    
        <div>
          {!! Form::label('勝利') !!}
          {!! Form::text('win'); !!}
        </div>
        <div>
          {!! Form::label('敗北') !!}
          {!! Form::text('loss') !!}
        </div>
        <div>
          {!! Form::label('セーブ') !!}
          {!! Form::text('save') !!}
        </div>
        <div>
          {!! Form::label('ホールド') !!}
          {!! Form::text('hold'); !!}
        </div>
        <div>
          {!! Form::label('HP') !!}
          {!! Form::text('hp') !!}
        </div>
        <div>
          {!! Form::label('完投') !!}
          {!! Form::text('p_comp') !!}
        </div>
        <div>
          {!! Form::label('完封') !!}
          {!! Form::text('shutout') !!}
        </div>
        <div>
          {!! Form::label('無四球') !!}
           {!! Form::text('nowalk') !!}
        </div>
        <div>
          {!! Form::label('勝率') !!}
          {!! Form::text('r_win') !!}
        </div>
        <div>
          {!! Form::label('打者') !!}
          {!! Form::text('batters') !!}
        </div>
        <div>
          {!! Form::label('投球回') !!}
          {!! Form::text('inning') !!}
        </div>
        <div>
          {!! Form::label('被安打') !!}
          {!! Form::text('hit_allowed') !!}
        </div>
        <div>
          {!! Form::label('被本塁打') !!}
          {!! Form::text('hr_allowed') !!}
        </div>
        <div>
          {!! Form::label('与四球') !!}
          {!! Form::text('give_walk') !!}
        </div>
        <div>
          {!! Form::label('敬遠') !!}
          {!! Form::text('k_en') !!}
        </div>
        <div>
          {!! Form::label('与死球') !!}
          {!! Form::text('hit_batter'); !!}
        </div>
        <div>
          {!! Form::label('奪三振') !!}
          {!! Form::text('strikeout') !!}
        </div>
        <div>
          {!! Form::label('暴投') !!}
          {!! Form::text('wild_pitch') !!}
        </div>
        <div>
          {!! Form::label('ボーク') !!}
          {!! Form::text('balk') !!}
        </div>
        <div>
          {!! Form::label('失点') !!}
          {!! Form::text('run_allowed') !!}
        </div>
        <div>
          {!! Form::label('自責点') !!}
          {!! Form::text('earned_run') !!}
        </div>
        <div>
          {!! Form::label('防御率') !!}
          {!! Form::text('era') !!}
        </div>
        <div>
          {!! Form::label('WHIP') !!}
          {!! Form::text('whip') !!}
        </div>
        <div>
          {!! Form::label('QS') !!}
          {!! Form::text('qs') !!}
        </div>
      {!! Form::submit('登録') !!}
      {!! Form::close() !!}
  </body>
</html>