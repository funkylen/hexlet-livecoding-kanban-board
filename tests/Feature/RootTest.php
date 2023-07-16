<?php

namespace Tests\Feature;

use App\Models\Card;
use App\Models\Column;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RootTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex(): void
    {
        $response = $this->get('/');

        $response->assertOk();
    }

    protected function setUp(): void
    {
        parent::setUp();

        $column = Column::factory()->create();
        Card::factory()->count(3)->for($column)->create();
    }
}
