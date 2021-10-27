<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlayList;
use App\Models\Song;

class MediaController extends Controller
{
    public function createPlayList(Request $request){
        try {
            $request->validate([
                'name' => 'required',
            ]);
            $playlist = PlayList::create($request->all());
            return response()->json(['status' => 1, 'data' => $playlist, 'message' => 'data created successfully'], 201);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'error' => $th->getMessage()], 200);
        }
    }  
    public function getPlayLists(){
        try {
            $responses = PlayList::with('songs')->get();
            return response()->json(['status' => 1, 'data' => $responses], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'error' => $th->getMessage()], 200);
        }
    }   
     public function createSong(Request $request){
        try {
            $request->validate([
                'playlist_id' => 'required|integer',
                'song_name' => 'required|string',
                'description' => 'required|string',
            ]);
            $song = Song::create($request->all());
            return response()->json(['status' => 1, 'data' => $song, 'message' => 'data created successfully'], 201);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'error' => $th->getMessage()], 200);
        }
    }   
     public function getSongs($play_list_id){
        try {
            $responses = Song::with('playlist')->where('playlist_id',$play_list_id)->get();
            return response()->json(['status' => 1, 'data' => $responses], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'error' => $th->getMessage()], 200);
        }
    }
}
