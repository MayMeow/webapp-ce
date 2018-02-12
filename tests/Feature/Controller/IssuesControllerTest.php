<?php

namespace Tests\Feature\Controller;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Issue;
use App\User;
use App\Profile;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class IssuesController extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testShow()
    {
        $user = factory(User::class)->create();
        $issue = factory(Issue::class)->create();

        $response = $this->actingAs($user)
            ->withSession(['asd' => 'dsa'])
            ->get('/issues/' . $issue->id);
        $response->assertStatus(200);
        $response->assertSee($issue->title);
        $response->assertSee($issue->project->name);
        $response->assertSee($issue->user->profile->name);
    }
}
