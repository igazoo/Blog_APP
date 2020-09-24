<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    protected $user;
    protected $password = 'i-love-laravel';


    public function setUp(): void
    {
        parent::setUp();

        //テストユーザー作成　毎回作成する手間を省く
        $this->user = factory(User::class)->create(['password' => bcrypt($this->password)]);
    }

    //ログイン認証テスト

    public function testLogin()
    {

        //作成したテストユーザーのemailとpassで認証リクエスト
        $response = $this->post(route('login'), [
            'email' => $this->user->email,
            'password' => $this->password,
        ]);

        //リクエスト送信後、正しくリダイレクト処理されることを確認
        $response->assertRedirect('/home');

        //指定したユーザーが認証されていることを確認
        $this->assertAuthenticatedAs($this->user);
    }

    public function testLogout(): void
    {
        //actionAsヘルパで現在認証ずみのユーザーを指定する
        $response = $this->actingAs($this->user);

        //ログアウトページへリクエストを送信
        $response->post(route('logout'));

        //ユーザー認証がされていないことを確認
        $this->assertGuest();
    }
}
