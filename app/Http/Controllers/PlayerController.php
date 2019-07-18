<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogPost;
use Illuminate\Http\Request;
use App\Player;
use Illuminate\Support\Facades\Validator;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('players.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogPost $request)
    {
        //

        $player = $request->validated();
        $image = str_random(5) . "_" . $player['image']->getClientOriginalName();
        $player['image']->move('upload/player', $image);
        $player['image'] = $image;
        Player::create($player);

        return redirect('players/add')->with('thongbao', 'Create player success');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        $ply = Player::find($id);
        return view('players.edit', ['ply' => $ply]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBlogPost $request, $id)
    {
        //
        $player = Player::find($id);
        $request = $request->validated();
        $image = str_random(5) . "_" . $request['image']->getClientOriginalName();
        $request['image']->move('upload/player', $image);
        $request['image'] = $image;
        $player->update($request);

        return redirect()->route('edit', ['id'=>$id])->with('thongbao', 'Update player success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $ply = Player::find($id);
        $ply->delete();

        return redirect('home')->with('thongbao', 'Delete player success');
    }
}
