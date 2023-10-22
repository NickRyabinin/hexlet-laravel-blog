<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    /**
     * An 'articles.index' page accessibility test.
     */
    public function test_articles_index_screen_can_be_rendered_for_authenticated_user(): void
    {
        $response = $this->actingAs($this->user)->get(route('articles.index'));

        $response->assertStatus(200);
    }

    /**
     * An 'articles.create' page accessibility test.
     */
    public function test_articles_create_screen_can_be_rendered_for_authenticated_user(): void
    {
        $response = $this->actingAs($this->user)->get(route('articles.create'));

        $response->assertStatus(200);
    }
}
