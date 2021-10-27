<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Playlist;
use App\Models\Song;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' =>'santosh',
            'email' => 'skpandit659@gmail.com',
            'password' => Hash::make('12345'),
        ]);
        $playlist=Playlist::create([
            'name' =>'abcd',
        ]);
        Song::create([
            'playlist_id'=>$playlist->id,
            'song_name'=>'bejuban kabse',
            'description'=>'this song is awesome'
        ]);

    }
}
