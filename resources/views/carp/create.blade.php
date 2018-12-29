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
        <h4>投手登録フォーム</h4>
        <form action = "{{ route('carp.create_p_stats')}}" method = "get">
          <input type = "text" name ="url"><br/>
          <input type = "submit" value ="URL登録">
        </form>
        <h4>打者登録フォーム</h4>
        <form action = "{{ route('carp.create_stats')}}" method = "get">
          <input type = "text" name ="url"><br/>
          <input type = "submit" value ="URL登録">
        </form>
        <br>
        
      </div>
    </div>
  </div>
</body>
</html>