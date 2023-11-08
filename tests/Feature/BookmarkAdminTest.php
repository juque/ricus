<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Inertia\Testing\AssertableInertia;
use App\Models\User;
use App\Models\Bookmark;

class BookmarkAdminTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_list_bookmark_in_admin(): void
    {
        $bookmark = Bookmark::factory()->create();

        $this->actingAs($user = User::factory()->create());

        $response = $this->get('/dashboard');

        $response->assertInertia(
            fn (AssertableInertia $page) => $page
                ->component('Bookmark/Index')
                ->has('bookmark',1)
        );
        //$response->assertSee($bookmark->title);
    }
}
