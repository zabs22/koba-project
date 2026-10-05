<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class SiteTest extends TestCase
{
    /**
     * @return array<string, array{string}>
     */
    public static function pages(): array
    {
        return [
            'home' => ['/'],
            'our story' => ['/our-story'],
            'menu' => ['/menu'],
            'cakes' => ['/cakes'],
            'order' => ['/order-a-cake'],
            'experience' => ['/experience'],
            'locations' => ['/locations'],
            'contact' => ['/contact'],
        ];
    }

    #[DataProvider('pages')]
    public function test_public_pages_render(string $uri): void
    {
        $this->get($uri)
            ->assertOk()
            ->assertSee('<h1', false)
            ->assertSee('application/ld+json', false);
    }

    public function test_home_has_brief_seo_metadata(): void
    {
        $this->get('/')
            ->assertSee('<title>KOBA Patisserie &amp; Bakery | Addis Ababa</title>', false)
            ->assertSee('property="og:image"', false);
    }

    public function test_sitemap_lists_public_pages(): void
    {
        $this->get('/sitemap.xml')
            ->assertOk()
            ->assertHeader('Content-Type', 'application/xml')
            ->assertSee(route('order'), false);
    }

    public function test_cake_order_validates(): void
    {
        $this->postJson('/order-a-cake', [
            'phone' => '12',
            'cake' => 'not-a-cake',
            'date' => '2020-01-01',
        ])
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['name', 'phone', 'cake', 'size', 'branch', 'date'])
            ->assertJsonPath('errors.name.0', 'Your name is required.');
    }

    public function test_custom_cake_requires_instructions(): void
    {
        $this->postJson('/order-a-cake', $this->order(['cake' => 'custom']))
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['notes']);
    }

    public function test_cake_order_is_accepted(): void
    {
        $this->postJson('/order-a-cake', $this->order())
            ->assertOk()
            ->assertJson(['ok' => true]);
    }

    public function test_cake_order_works_without_javascript(): void
    {
        $this->from('/order-a-cake')
            ->post('/order-a-cake', $this->order())
            ->assertRedirect('/order-a-cake')
            ->assertSessionHas('status');
    }

    public function test_contact_message_is_accepted(): void
    {
        $this->postJson('/contact', [
            'name' => 'Abel',
            'email' => 'abel@example.com',
            'topic' => 'events',
            'message' => 'We would like to host a small gathering.',
        ])->assertOk();
    }

    /**
     * @param  array<string, string>  $overrides
     * @return array<string, string>
     */
    private function order(array $overrides = []): array
    {
        return [
            'name' => 'Abel',
            'phone' => '+251 911 000 000',
            'cake' => 'trio',
            'size' => 'large',
            'branch' => '4-killo',
            'date' => now()->addDays(3)->toDateString(),
            ...$overrides,
        ];
    }
}
