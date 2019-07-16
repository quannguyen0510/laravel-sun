<?php

namespace App\Http\Controllers;

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
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'birthday' => 'required',
            'gender' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect('players/add')
                ->withErrors($validator)
                ->withInput();
        }

        $player = new Player;
        $player->name = $request->name;
        $player->birthday = $request->birthday;
        $player->gender = $request->gender;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $image = str_random(4) . "_" . $name;
            while (file_exists('upload/player' . $image)) {
                $image = str_random(4) . "_" . $name;
            }
            $file->move('upload/player', $image);
            $player->image = $image;
        } else {
            $player->image = "";
        }

        $player->save();

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
        $ply = Player::find($id);
        return view('players.edit', ['ply' => $ply]);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'birthday' => 'required',
            'gender' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect('players/edit/'.$id)
                ->withErrors($validator)
                ->withInput();
        }

        $player = Player::find($id);
        $player->name = $request->name;
        $player->birthday = $request->birthday;
        $player->gender = $request->gender;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $image = str_random(4) . "_" . $name;
            while (file_exists('upload/player' . $image)) {
                $image = str_random(4) . "_" . $name;
            }
            $file->move('upload/player', $image);
            $player->image = $image;
        } else {

        }

        $player->save();

        return redirect('players/edit/'.$id)->with('thongbao', 'Update player success');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}
