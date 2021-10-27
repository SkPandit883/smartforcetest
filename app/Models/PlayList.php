<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Song;
class PlayList extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function songs(){
        return $this->hasMany(Song::class,'playlist_id');
    }
}
