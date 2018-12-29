<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Player; //テーブルplayerにアクセスできる

use App\Statistic;
use App\Pitcher_stat;

class CarpListController extends Controller
{
    public function index()//statistics/pitcher_stats->player
    {   
        $season = $_GET['season']; //選手リンクにセットした選手idを取得
        
        $statistics = Statistic::where('season', $season)->orderBy('number', 'asc')->get();
        $pitcher_stats = Pitcher_stat::where('season', $season)->orderBy('number', 'asc')->get();
        //$pitcher_stats = Pitcher_stat::orderBy('number', 'asc')->get();
        
        $data = [
            'statistics' => $statistics,
            'pitcher_stats' => $pitcher_stats
        ];
        
        return view('carp.list', $data);
    } 
    
    public function indexCreate()
    {
        return view('carp.create');
    }
    
    /*public function index()//player->statistics/pitcher_stats
    {   
        $players = Player::all();
        
        $data = [
            'players' => $players,
        ];
        
        return view('carp.list', $data);
    }

    public function store(Request $request)
    {
        $player = new Player;
        $player->name = $request->name;
        $player->kana = $request->kana;
        $player->position = $request->position;
        $player->dob = $request->dob;
        $player->height = $request->height;
        $player->blood = $request->blood;
        $player->p = $request->p;
        $player->b = $request->b;
        $player->home = $request->home;
        $player->join = $request->join;
        $player->team = $request->team;
        $player->career = $request->career;
        $player->draft = $request->draft;
        $player->save();

        return redirect('carp.list');//->back();
    }*/

    public function show($id)
    {
       //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
