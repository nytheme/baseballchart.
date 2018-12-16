<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Player; //テーブルplayerにアクセスできる

use App\Statistic;

class CarpListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $players = Player::all();
        
        $data = [
            'players' => $players,
        ];
        
        return view('carp.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $player = new Player;
        
        return view('carp.create',[
            'player' => $player,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
}
