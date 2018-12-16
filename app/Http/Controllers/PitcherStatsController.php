<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Pitcher_stat;

class PitcherStatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pitcher_stats = Pitcher_stat::all();
        
        $data = [
            'pitcher_stats' => $pitcher_stats,
        ];
        
        return view('carp.create_p_stats', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pitcher_stats = new Pitcher_stat;
        $pitcher_stats->player_id = $request->player_id;
        $pitcher_stats->name = $request->name; 
        $pitcher_stats->kana  = $request->kana;
        $pitcher_stats->position = $request->position; 
        $pitcher_stats->number = $request->number;
        $pitcher_stats->year = $request->year;
        $pitcher_stats->team_id = $request->team_id;
        $pitcher_stats->salary = $request->salary;
        $pitcher_stats->old = $request->old;
        $pitcher_stats->weight = $request->weight;
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
        $pitcher_stats->save();
        
        return redirect('carp.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function indexToPitcher()
    {   
        //$pitcher_stats = Pitcher_stat::all();
        /*$strikeouts_values = Pitcher_stat::orderBy('strikeout', 'desc')->limit(10)->select('strikeout')->get()->toArray();
        $strikeouts_names_values = Pitcher_stat::orderBy('strikeout', 'desc')->limit(10)->select('name')->get()->toArray();
        
        $eras_values = Pitcher_stat::orderBy('era', 'asc')->limit(10)->select('era')->get()->toArray();
        $eras_names_values = Pitcher_stat::orderBy('era', 'asc')->limit(10)->select('name')->get()->toArray();
        
        $strikeouts = array_column( $strikeouts_values, 'strikeout' );
        $strikeouts_names_space = array_column( $strikeouts_names_values, 'name' );
        $strikeouts_names = str_replace("　", " ", $strikeouts_names_space); //スペースを半角に
        
        $eras = array_column( $eras_values, 'era' );
        $eras_names_space = array_column( $eras_names_values, 'name' );
        $eras_names = str_replace("　", " ", $eras_names_space);
        
        $data = [
            //'pitcher_stats' => $pitcher_stats,
            'strikeouts' => $strikeouts,
            'strikeouts_names' => $strikeouts_names,
            'eras' => $eras,
            'eras_names' => $eras_names,
        ];*/
        
        return view('carp.pitchers'/*, $data*/);
    }
}
