<?php

namespace Tests\Feature;

use App\Models\Artist;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArtistTest extends TestCase
{
    use RefreshDatabase;

    /** @test
     * Check endpoint availability
     */
    public function check_first_page() {
        $response = $this->get('/api/v1/artists');
        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'first_name',
                        'last_name',
                        'email',
                        'active',
                        'created_at',
                        'updated_at',
                    ]
                ],
                'links' => [
                    'first',
                    'last',
                    'prev',
                    'next',
                ],
                'meta' => [
                    'current_page',
                    'from',
                    'last_page',
                    'path',
                    'per_page',
                    'to',
                    'total',
                    'links',
                ],
            ])
            ->assertJsonPath('meta.total', 100)
            ->assertJsonCount(25, 'data');
    }


    /** @test
     * Check email filter count
     */
    public function check_pagination()
    {
        $response = $this->get('/api/v1/artists?page=2');
        $response->assertStatus(200)
            ->assertJsonPath('meta.total', 100)
            ->assertJsonCount(25, 'data');;
    }

    /** @test
     * Check email filter count
     */
    public function check_undefined_page()
    {
        $response = $this->get('/api/v1/artists?page=5');
        $response->assertStatus(200)
            ->assertJsonPath('meta.total', 100)
            ->assertJsonCount(0, 'data');
    }

    /** @test
     * Check active filter count
     */
    public function check_active_filter()
    {
        $response = $this->get('/api/v1/artists?filter[active]=1');
        $count = Artist::query()->where('active', 1)->count();
        $response->assertStatus(200)
            ->assertJsonPath('meta.total', $count);
    }

    /** @test
     * Check active filter syntax
     */
    public function check_active_boolean_filter()
    {
        $response = $this->get('/api/v1/artists?filter[active]=false');
        $count = Artist::query()->where('active', 0)->count();
        $response->assertStatus(400);
    }

    /** @test
     * Check email filter count
     */
    public function check_email_filter()
    {
        $response = $this->get('/api/v1/artists?filter[email]=ma');
        $count = Artist::query()->where('email', 'LIKE', "%ma%")->count();
        $response->assertStatus(200)
            ->assertJsonPath('meta.total', $count);
    }
}
