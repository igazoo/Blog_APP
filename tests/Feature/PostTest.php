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
        $post = factory(Post::class)->create();
        $id = $post->id;
        $response = $this->get('/posts/' . $id . '/edit');
        $response->assertStatus(200)->assertViewIs('posts.edit');
        $post->delete();
    }
    public function testShow()
    {
        $post = factory(Post::class)->create();
        $id = $post->id;
        //var_dump($id);
        $response = $this->get('/posts/' . $id);
        $response->assertStatus(200);
        $post->delete();
    }

    //モデルテスト
    //指定のレコードが取り出せるかをチェックする方法
    //$this->assertDatabaseHas(テーブル名, 連想配列) データが存在することを確認
    //$this->assertDatabaseMissing(テーブル名 , 連想配列) データが存在しないことを確認

    //モデルのオブジェクトを作って操作してみる方法
    //データの作成、更新、削除などの動作確認


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
