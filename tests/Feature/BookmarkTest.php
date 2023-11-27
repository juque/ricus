<?php

namespace Tests\Feature;

use App\Models\Bookmark;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookmarkTest extends TestCase
{
    use RefreshDatabase;

    public function testListBookmarksAtHome(): void
    {
        Bookmark::factory()->count(5)->create();

        $response = $this->get('/');

        $response->assertStatus(200);

        foreach(Bookmark::all() as $bookmark) {
            $response->assertSee($bookmark->title);
        }
    }

    public function testListTagsAtHome(): void
    {
      $tags = ['tag1', 'tag2', 'tag3'];

      $bookmark = Bookmark::factory()->create();

      $bookmark->attachTags($tags);

      foreach($tags as $tag) {
        $this->assertTrue($bookmark->tags->contains('name', $tag));
      }

    }
}
