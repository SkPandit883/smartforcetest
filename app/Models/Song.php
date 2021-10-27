<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PlayList;
class Song extends Model
{
    use HasFactory;
    protected $guarded=[];
    
    public function playlist(){
        return $this->belongsTo(Playlist::class,'playlist_id');
    }

}
