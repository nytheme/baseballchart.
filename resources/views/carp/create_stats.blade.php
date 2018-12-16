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
        {!! link_to_route('carp.list', '選手リスト') !!}
        <h4>選手登録フォーム</h4>
          {!! Form::model($statistics, ['route' => 'statistic.store']) !!}
            <div>
              {!! Form::label('選手id') !!}
              {!! Form::text('player_id') !!}
            </div>
            <div>
              {!! Form::label('選手名') !!}
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
               {!! Form::select('position', ['3'=>'内野手', '4'=>'外野手', '2'=>'捕手']) !!}
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
              {!! Form::label('打席数') !!}
              {!! Form::text('dasek_s') !!}
            </div>
            <div>
              {!! Form::label('打数') !!}
              {!! Form::text('da_s') !!}
            </div>
            <div>
              {!! Form::label('得点') !!}
              {!! Form::text('score') !!}
            </div>
            <div>
              {!! Form::label('安打') !!}
              {!! Form::text('hit') !!}
            </div>
            <div>
              {!! Form::label('二塁打') !!}
              {!! Form::text('two_h') !!}
            </div>
            <div>
              {!! Form::label('三塁打') !!}
              {!! Form::text('three_h') !!}
            </div>
            <div>
              {!! Form::label('本塁打') !!}
              {!! Form::text('hr') !!}
            </div>
            <div>
              {!! Form::label('塁打') !!}
              {!! Form::text('rui_h') !!}
            </div>
            <div>
              {!! Form::label('打点') !!}
              {!! Form::text('rbi') !!}
            </div>
            <div>
              {!! Form::label('盗塁') !!}
              {!! Form::text('steal') !!}
            </div>
            <div>
              {!! Form::label('盗塁刺') !!}
              {!! Form::text('c_steal') !!}
            </div>
            <div>
              {!! Form::label('犠牲打') !!}
              {!! Form::text('s_hit') !!}
            </div>
            <div>
              {!! Form::label('犠牲飛') !!}
              {!! Form::text('s_fly') !!}
            </div>
            <div>
              {!! Form::label('四球') !!}
              {!! Form::text('walk') !!}
            </div>
            <div>
              {!! Form::label('敬遠') !!}
              {!! Form::text('k_en') !!}
            </div>
            <div>
              {!! Form::label('死球') !!}
              {!! Form::text('hbp') !!}
            </div>
            <div>
              {!! Form::label('三振') !!}
              {!! Form::text('s_out') !!}
            </div>
            <div>
              {!! Form::label('併殺打') !!}
              {!! Form::text('d_play') !!}
            </div>
            <div>
              {!! Form::label('打率') !!}
              {!! Form::text('da_ave') !!}
            </div>
            <div>
              {!! Form::label('出塁率') !!}
              {!! Form::text('o_b_ave') !!}
            </div>
            <div>
              {!! Form::label('長打率') !!}
              {!! Form::text('sl_ave') !!}
            </div>
            <div>
              {!! Form::label('OPS') !!}
              {!! Form::text('ops') !!}
            </div>
          {!! Form::submit('登録') !!}
          {!! Form::close() !!}
      </div>
    </div>
  </div>
</body>
</html>