<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pitcher_stat;

class CarpPitchersController extends Controller
{
    public function indexPitchers()
    {   
        $season = $_GET['season']; //選手リンクにセットした選手seasonを取得
        
        $pitcher_stats = Pitcher_stat::where('season', $season)->orderBy('number', 'asc')->get();
        
        $strikeouts_values = Pitcher_stat::where('season', $season)->orderBy('strikeout', 'desc')->limit(10)->select('strikeout')->get()->toArray();
        $strikeouts_ids_values = Pitcher_stat::where('season', $season)->orderBy('strikeout', 'desc')->limit(10)->select('id')->get()->toArray();
        $strikeouts_names_values = Pitcher_stat::where('season', $season)->orderBy('strikeout', 'desc')->limit(10)->select('name')->get()->toArray();
        
        $eras_values = Pitcher_stat::where('season', $season)->orderBy('era', 'asc')->limit(10)->select('era')->get()->toArray();
        $eras_ids_values = Pitcher_stat::where('season', $season)->orderBy('era', 'asc')->limit(10)->select('id')->get()->toArray();
        $eras_names_values = Pitcher_stat::where('season', $season)->orderBy('era', 'asc')->limit(10)->select('name')->get()->toArray();
        
        $strikeouts = array_column( $strikeouts_values, 'strikeout' ); //データベースのデータを配列にする
        $strikeouts_ids = array_column( $strikeouts_ids_values, 'id' ); 
        $strikeouts_names_space = array_column( $strikeouts_names_values, 'name' );
        $strikeouts_names = str_replace("　", " ", $strikeouts_names_space); //スペースを半角に
        
        $eras = array_column( $eras_values, 'era' );
        $eras_ids = array_column( $eras_ids_values, 'id' );
        $eras_names_space = array_column( $eras_names_values, 'name' );
        $eras_names = str_replace("　", " ", $eras_names_space);
        
        $data = [
            'strikeouts' => $strikeouts,
            'strikeouts_ids' => $strikeouts_ids,
            'strikeouts_names' => $strikeouts_names,
            'eras' => $eras,
            'eras_ids' => $eras_ids,
            'eras_names' => $eras_names,
            'pitcher_stats' => $pitcher_stats,
        ];
        
        return view('carp.pitchers', $data);
    }

    public function indexPitcher()
    {   
        $id = $_GET['id']; //選手リンクにセットした選手idを取得
        $pitcher_stats = Pitcher_stat::where('id', $id)->get();
        
        $name = $_GET['name'];
        $pitcher_stats_seasons = Pitcher_stat::where('name', $name)->orderBy('season', 'desc')->get();
        
        $data = [
            'pitcher_stats' => $pitcher_stats,
            'pitcher_stats_seasons' => $pitcher_stats_seasons,
        ];
        
        return view('carp.pitcher', $data);
    }
    
    public function indexCreate_p_stats()
    {
        $pitcher_stats = Pitcher_stat::all();
        
        $data = [
            'pitcher_stats' => $pitcher_stats,
        ];
        
        return view('carp.create_p_stats', $data);
    }
    
    public function store(Request $request)
    {
        $pitcher_stats = new Pitcher_stat;
        $pitcher_stats->team = $request->team;
        $pitcher_stats->season = $request->season;
        $pitcher_stats->number = $request->number;
        $pitcher_stats->name = $request->name;
        $pitcher_stats->kana = $request->kana;
        $pitcher_stats->dob = $request->dob;
        $pitcher_stats->old = $request->old;
        $pitcher_stats->join = $request->join;
        $pitcher_stats->years = $request->years;
        $pitcher_stats->height = $request->height;
        $pitcher_stats->weight = $request->weight;
        $pitcher_stats->p = $request->p;
        $pitcher_stats->b = $request->b;
        $pitcher_stats->position = $request->position;
        $pitcher_stats->home = $request->home;
        $pitcher_stats->blood = $request->blood;
        $pitcher_stats->salary = $request->salary;
        $pitcher_stats->career = $request->career;
        $pitcher_stats->draft = $request->draft;
        $pitcher_stats->title = $request->title;
        $pitcher_stats->team_id = $request->team_id;
        $pitcher_stats->siai_s = $request->siai_s;
        $pitcher_stats->win = $request->win;
        $pitcher_stats->loss = $request->loss;
        $pitcher_stats->save = $request->save;
        $pitcher_stats->hold = $request->hold;
        $pitcher_stats->hp = $request->hp;
        $pitcher_stats->p_comp = $request->p_comp;
        $pitcher_stats->shutout = $request->shutout;
        $pitcher_stats->nowalk = $request->nowalk;
        $pitcher_stats->r_win = $request->r_win;
        $pitcher_stats->batters = $request->batters;
        $pitcher_stats->inning = $request->inning;
        $pitcher_stats->hit_allowed = $request->hit_allowed;
        $pitcher_stats->hr_allowed = $request->hr_allowed;
        $pitcher_stats->give_walk = $request->give_walk;
        $pitcher_stats->k_en = $request->k_en;
        $pitcher_stats->hit_batter = $request->hit_batter;
        $pitcher_stats->strikeout = $request->strikeout;
        $pitcher_stats->wild_pitch = $request->wild_pitch;
        $pitcher_stats->balk = $request->balk;
        $pitcher_stats->run_allowed = $request->run_allowed;
        $pitcher_stats->earned_run = $request->earned_run;
        $pitcher_stats->era = $request->era;
        $pitcher_stats->whip = $request->whip;
        $pitcher_stats->qs = $request->qs;
        $pitcher_stats->hit_allowed_ave = $request->hit_allowed_ave;
        $pitcher_stats->hr_allowed_ave = $request->hr_allowed_ave;
        $pitcher_stats->strikeout_ave = $request->strikeout_ave;
        $pitcher_stats->give_ave = $request->give_ave;
        $pitcher_stats->save();
        
        return redirect('carp.create');
    }
    
    public function destroy($id)
    {
        $pitcher_stat = \App\Pitcher_stat::find($id);

        $pitcher_stat->delete();
 
        return redirect()->back();
    }
    
}
