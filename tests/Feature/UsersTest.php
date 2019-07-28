<?php

namespace Tests\Feature;

use App\Profile;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersTest extends TestCase
{
    use RefreshDatabase;

    /** @test * */
    function user_can_view_profile_page()
    {
        $user = factory(User::class)->create();
        $this->get($user->path())
            ->assertOk()
            ->assertSee($user->login)
            ->assertSee($user->postsCount())
            ->assertSee($user->followersCount())
            ->assertSee($user->followingCount())
            ->assertSee($user->description);
    }
}
