<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
class PlayList extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    use RefreshDatabase;
    public function play_list_create()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user,'api');
        $formData=[
            'name'=>'ranga'
        ];
        $response->json('POST',route('PlayList.create'),$formData)->assertStatus(201)->assertJson(['data'=>$formData]);
    }
}
