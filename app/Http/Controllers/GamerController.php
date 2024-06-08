<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gamer;

class GamerController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $gamers = Gamer::get();
        return response()->json($gamers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $gamer = new Gamer();
        $gamer->id_tg = $request->id_tg;
        $gamer->amount = 0;
        $gamer->energy = 1000;
        $gamer->energy_hour = 1000;
        $gamer->refs = "";
        $gamer->save();
        if($request->ref)
        {
            $this->update_ref($request);
        }
        return response()->json($gamer);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $gamer = Gamer::where("id_tg", $id)->first();
        return response()->json($gamer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(!$request->func) return response()->json(["message" => "Not FunC"]);
        if($request->func == "amount"){
            $gamer = Gamer::where("id_tg", $id)->first();
            $gamer->amount = $request->amount;
            $gamer->save();
            return response()->json($gamer);
        }else if($request->func == "energy"){
            $gamer = Gamer::where("id_tg", $id)->first();
            $gamer->energy = $gamer->energy + $gamer->energy_hour;
            $gamer->save();
            return response()->json($gamer);
        }
    }

    public function update_ref($request) {
        $gamer = Gamer::where("id_tg", $request->ref)->first();
        $gamer->energy_hour = $gamer->energy_hour + 100;
        $gamer->save();
        return response()->json($gamer);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gamer::destroy($id);
        return response() -> json(['message' => "Deleted"]);
    }
}
