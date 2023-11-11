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

    public function test_add_new_bookmark_successfully(): void
    {
        $tags = ['tag1', 'tag2', 'tag3'];
        $this->actingAs($user = User::factory()->create());

        $response = $this->post(route('bookmark.store'), [
            'title' => 'Example Title',
            'uri' => 'http://example.com',
            'description' => 'Example description',
            'tags' => $tags
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('bookmarks', [
            'title' => 'Example Title',
            'uri' => 'http://example.com',
            'description' => 'Example description'
        ]);

        $newRecord = Bookmark::latest()->first();
        foreach ($tags as $tag) {
            $this->assertDatabaseHas('tags', ['name->en' => $tag]);
            $this->assertTrue($newRecord->tags->contains('name', $tag));
        }

    }

}
