<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class PostTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {

        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function testIndex()
    {
        $response = $this->get('/posts');

        $response->assertStatus(200)->assertViewIs('posts.index');
    }

    public function testCreate()
    {
        $response = $this->get('/posts/create');
        $response->assertStatus(200)->assertViewIs('posts.create');
    }

    public function testEdit()
    {
        $response = $this->get('/posts/1/edit');
        $response->assertStatus(200)->assertViewIs('posts.edit');
    }
    public function testShow()
    {
        $response = $this->get('/posts/1');
        $response->assertStatus(200)->assertViewIs('posts.show');
    }

    //postのcreate動作確認
    public function testPostModel()
    {


        $post = factory(Post::class)->create();



        $data = $post->toArray();

        print_r($data);

        $this->assertDatabaseHas('posts', $data);
        $post->delete();
        $this->assertDatabaseMissing('posts', $data);
    }
}
