<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Statistic; //\App\Statistic:: で呼び出せる(\App\は省略可)

class StatisticsController extends Controller
{   
    public function index()
    {   
        $statistics = Statistic::all();
        
        $data = [
            'statistics' => $statistics,
        ];
        
        return view('carp.create_stats', $data);
    }
    
    public function create()
    {
        $statistics = new Statistics;
        
        return view('carp.create_stats',[
            'statistics' => $statistics,
        ]);
    }
    
    public function store(Request $request)
    {
        $statistic = new Statistic;
        $statistic->player_id = $request->player_id;
        $statistic->name = $request->name;
        $statistic->kana = $request->kana;
        $statistic->position = $request->position;
        $statistic->year = $request->year;
        $statistic->old = $request->old;
        $statistic->weight = $request->weight;
        $statistic->number = $request->number;
        $statistic->team_id = $request->team_id;
        $statistic->siai_s = $request->siai_s;
        $statistic->dasek_s = $request->dasek_s;
        $statistic->da_s = $request->da_s;
        $statistic->score = $request->score;
        $statistic->hit = $request->hit;
        $statistic->two_h = $request->two_h;
        $statistic->three_h = $request->three_h;
        $statistic->hr = $request->hr;
        $statistic->rui_h = $request->rui_h;
        $statistic->rbi = $request->rbi;
        $statistic->steal = $request->steal;
        $statistic->c_steal = $request->c_steal;
        $statistic->s_hit = $request->s_hit;
        $statistic->s_fly = $request->s_fly;
        $statistic->walk = $request->walk;
        $statistic->k_en = $request->k_en;
        $statistic->hbp = $request->hbp;
        $statistic->s_out = $request->s_out;
        $statistic->d_play = $request->d_play;
        $statistic->da_ave = $request->da_ave;
        $statistic->o_b_ave = $request->o_b_ave;
        $statistic->sl_ave = $request->sl_ave;
        $statistic->ops = $request->ops;
        $statistic->salary = $request->salary;
        $statistic->save();

        return redirect('carp.create_stats');//->back();
    }
    public function indexToFielder()
    {   
        $statistics = Statistic::all();
        $hrs_values = Statistic::orderBy('hr', 'desc')->limit(10)->select('hr')->get()->toArray();
        $hrs_names_values = Statistic::orderBy('hr', 'desc')->limit(10)->select('name')->get()->toArray();
        
        $hrs = array_column( $hrs_values, 'hr' );
        $hrs_names_space = array_column( $hrs_names_values, 'name' );
        $hrs_names = str_replace("　", " ", $hrs_names_space); //スペースを半角に
        //$first = $hrs[0] -> hr; //配列の一つだけを取り出したい場合
        
        $data = [
            'statistics' => $statistics,
            'hrs' => $hrs,
            'hrs_names' => $hrs_names,
            //'first' => $first
            
        ];
        
        return view('carp.fielders', $data);
    }
}
