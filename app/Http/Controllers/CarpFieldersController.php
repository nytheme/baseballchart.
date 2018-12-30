<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Statistic;

class CarpFieldersController extends Controller
{
    public function indexFielders()
    {   
        $season = $_GET['season']; //選手リンクにセットした選手idを取得
        
        $statistics = Statistic::where('season', $season)->orderBy('number', 'asc')->get();
        $hrs_values = Statistic::where('season', $season)->orderBy('hr', 'desc')->limit(10)->select('hr')->get()->toArray();
        $hrs_ids_values = Statistic::where('season', $season)->orderBy('hr', 'desc')->limit(10)->select('id')->get()->toArray();
        $hrs_names_values = Statistic::where('season', $season)->orderBy('hr', 'desc')->limit(10)->select('name')->get()->toArray();
        
        $b_aves_values = Statistic::where('season', $season)->orderBy('da_ave', 'desc')->limit(10)->select('da_ave')->get()->toArray();
        $b_aves_ids_values = Statistic::where('season', $season)->orderBy('da_ave', 'desc')->limit(10)->select('id')->get()->toArray();
        $b_aves_names_values = Statistic::where('season', $season)->orderBy('da_ave', 'desc')->limit(10)->select('name')->get()->toArray();
        
        $hrs = array_column( $hrs_values, 'hr' ); //データベースのデータを配列にする
        $hrs_ids = array_column( $hrs_ids_values, 'id' );
        $hrs_names_space = array_column( $hrs_names_values, 'name' );
        $hrs_names = str_replace("　", " ", $hrs_names_space); //スペースを半角に
        
        $b_aves = array_column( $b_aves_values, 'da_ave' ); //データベースのデータを配列にする
        $b_aves_ids = array_column( $b_aves_ids_values, 'id' );
        $b_aves_names_space = array_column( $b_aves_names_values, 'name' );
        $b_aves_names = str_replace("　", " ", $b_aves_names_space); 
        //$first = $hrs[0] -> hr; //配列の一つだけを取り出したい場合
        
        $data = [
            'statistics' => $statistics,
            'hrs' => $hrs,
            'hrs_ids' => $hrs_ids,
            'hrs_names' => $hrs_names,
            
            'b_aves' => $b_aves,
            'b_aves_ids' => $b_aves_ids,
            'b_aves_names' => $b_aves_names,
            //'first' => $first
        ];
        
        return view('carp.fielders', $data);
    }

    public function indexFielder()
    {   
        $id = $_GET['id']; //選手リンクにセットした選手idを取得
        $statistics = Statistic::where('id', $id)->get();
        
        $name = $_GET['name'];
        $statistics_seasons = Statistic::where('name', $name)->orderBy('season', 'desc')->get();
        
        $data = [
            'statistics' => $statistics,
            'statistics_seasons' => $statistics_seasons,
        ];
        
        return view('carp.fielder', $data);
    }
    
    public function indexCreate_stats()
    {   
        $statistics = Statistic::all();
        
        $data = [
            'statistics' => $statistics,
        ];
        
        return view('carp.create_stats', $data);
    }
    
    public function store(Request $request)
    {
        $statistic = new Statistic;
        $statistic->team = $request->team;
        $statistic->season = $request->season;
        $statistic->number = $request->number;
        $statistic->name = $request->name;
        $statistic->kana = $request->kana;
        $statistic->dob = $request->dob;
        $statistic->old = $request->old;
        $statistic->join = $request->join;
        $statistic->years = $request->years;
        $statistic->height = $request->height;
        $statistic->weight = $request->weight;
        $statistic->p = $request->p;
        $statistic->b = $request->b;
        $statistic->position = $request->position;
        $statistic->home = $request->home;
        $statistic->blood = $request->blood;
        $statistic->salary = $request->salary;
        $statistic->career = $request->career;
        $statistic->draft = $request->draft;
        $statistic->title = $request->title;
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
        $statistic->hr_ave = $request->hr_ave;
        $statistic->s_out_ave = $request->s_out_ave;
        $statistic->walk_ave = $request->walk_ave;
        
        $statistic->save();

        return redirect('carp.create');//->back();
    }
    
    public function destroy($id)
    {
        $statistic = \App\Statistic::find($id);

        $statistic->delete();
 
        return redirect()->back();
    }
}
