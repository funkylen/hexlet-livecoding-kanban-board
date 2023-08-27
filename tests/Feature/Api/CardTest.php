<?php

namespace Tests\Feature\Api;

use App\Models\Card;
use App\Models\Column;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CardTest extends TestCase
{
    use RefreshDatabase;

    private $columns;
    private $card;

    public function testShow(): void
    {
        $response = $this->getJson(route('api.cards.show', $this->card));
        $response->assertOk();
    }

    public function testStore(): void
    {
        $body = Card::factory()
            ->for($this->columns->first())
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.cards.store'), $body);

        $response->assertCreated();

        $this->assertDatabaseHas('cards', $body);
    }

    public function testUpdate(): void
    {
        $card = Card::factory()
            ->for($this->columns->first())
            ->create();

        $body = Card::factory()
            ->for($this->columns->last())
            ->make()
            ->toArray();

        $response = $this->patchJson(route('api.cards.update', $card), $body);

        $response->assertOk();

        $this->assertDatabaseHas('cards', [
            'id' => $card->id,
            ...$body,
        ]);
    }

    public function testDestroy(): void
    {
        $card = Card::factory()
            ->for($this->columns->first())
            ->create();

        $response = $this->deleteJson(route('api.cards.update', $card));

        $response->assertNoContent();
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->columns = Column::factory()->count(2)->create();
        $this->card = Card::factory()->for($this->columns->first())->create();
    }
}
