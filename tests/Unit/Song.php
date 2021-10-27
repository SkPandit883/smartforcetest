<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\PlayList;
use Illuminate\Foundation\Testing\RefreshDatabase;
class Song extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $user = User::factory()->create();
        $playlist=PlayList::factory()->create();
        $response = $this->actingAs($user,'api');
        $formData=[
            'playlist_id'=>$playlist->id,
            'song_name'=>'asdf',
            'description'=>'des'
        ];
        $response->json('POST',route('Songs.create'),$formData)->assertStatus(201)->assertJson(['data'=>$formData]);
    }
}
