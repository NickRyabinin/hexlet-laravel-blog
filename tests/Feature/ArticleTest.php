<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Article;
// use Illuminate\Support\Facades\Http;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    private User $user;
    private Article $article;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->article = Article::factory()->make();
    }

    /**
     * An 'articles.index' page accessibility test.
     */
    public function test_articles_index_screen_can_be_rendered_for_authenticated_user(): void
    {
        $response = $this->actingAs($this->user)->get(route('articles.index'));

        $response->assertStatus(200);
        $response->assertSee('Create new');
    }

    public function test_articles_index_screen_can_not_be_rendered_for_guest_user(): void
    {
        $response = $this->get(route('articles.index'));

        $response->assertRedirect(route('login'));
    }

    /**
     * An 'articles.create' page accessibility test.
     */
    public function test_articles_create_screen_can_be_rendered_for_authenticated_user(): void
    {
        $response = $this->actingAs($this->user)->get(route('articles.create'));

        $response->assertStatus(200);
        $response->assertSee('Create');
    }

    public function test_articles_create_screen_can_not_be_rendered_for_guest_user(): void
    {
        $response = $this->get(route('articles.create'));

        $response->assertRedirect(route('login'));
    }

    /**
     * An 'articles.store' test.
     */
    /* public function test_articles_store_action(): void
    {
        $response = Http::withBasicAuth($this->user->email, $this->user->password)
            ->post(route('articles.store'), ['name' => $this->article->name, 'body' => $this->article->body]);

        $this->assertDatabaseHas('articles', [$this->article]);
    } */
}
