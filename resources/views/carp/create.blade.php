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
          {!! Form::model($player, ['route' => 'player.store']) !!}
            <div>
              {!! Form::label('名前') !!}
              {!! Form::text('name') !!}
            </div>
            <div>
              {!! Form::label('仮名') !!}
              {!! Form::text('kana') !!}
            </div>
            <div>
              {!! Form::label('守備') !!}
              {!! Form::select('position', ['1'=>'投手', '3'=>'内野手', '4'=>'外野手', '2'=>'捕手']) !!}
            </div>
            <div>
              {!! Form::label('DOB') !!}
              {!! Form::text('dob') !!}
            </div>
            <div>
              {!! Form::label('身長') !!}
              {!! Form::text('height') !!}
            </div>
            <div>
              {!! Form::label('血液型') !!}
              {!! Form::select('blood', ['A型'=>'A型', 'B型'=>'B型', 'O型'=>'O型', 'AB型'=>'AB型', '不明'=>'不明']) !!}
            </div>
            <div>
              {!! Form::label('投') !!}
              {!! Form::select('p', ['右'=>'右投げ', '左'=>'左投げ']) !!}
            </div>
            <div>
              {!! Form::label('打') !!}
              {!! Form::select('b', ['右'=>'右打ち', '左'=>'左打ち', '両'=>'両打ち',]) !!}
            </div>
            <div>
              {!! Form::label('出身') !!}
              {!! Form::text('home') !!}
            </div>
            <div>
              <p>入団年は「今年」 ー 「○年目」</p>
              {!! Form::label('入団年') !!}
              {!! Form::text('join') !!}
            </div>
            <div>
              {!! Form::label('チーム') !!}
              {!! Form::select('team', ['1'=>'広島']) !!}
            </div>
            <div>
              {!! Form::label('経歴') !!}
              {!! Form::text('career') !!}
            </div>
            <div>
              {!! Form::label('ドラフト') !!}
              {!! Form::text('draft') !!}
            </div>
          {!! Form::submit('登録') !!}
          {!! Form::close() !!}
      </div>
    </div>
  </div>
</body>
</html>