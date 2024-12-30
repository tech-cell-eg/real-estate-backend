<?php

namespace Tests\Feature;

use App\Models\Offer;
use App\Models\Property;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OfferTest extends TestCase
{
    use RefreshDatabase;

    function test_api_offers_returns_successful(): void
    {
        $response = $this->getJson("/api/offers");

        $response->assertStatus(200);
    }

    function test_api_offers_returns_data_list(): void
    {
        Property::factory()->create();
        $data = Offer::factory(10)->create();

        $response = $this->getJson("/api/offers");

        $response->assertStatus(200);
        $response->assertJson(["data" => $data->toArray()]);
    }

    function test_api_offers_show_returns_data(): void
    {
        Property::factory()->create();
        $first = Offer::factory()->create();
        Offer::factory(10)->create();

        $response = $this->getJson("/api/offers/".$first->id);

        $response->assertStatus(200);
        $response->assertJson(["data" => $first->toArray()]);
    }

    function test_api_offers_show_returns_invalid_error(): void
    {
        Property::factory()->create();
        $first = Offer::factory()->create();
        Offer::factory(10)->create();

        $response = $this->getJson("/api/offers/20");

        $response->assertStatus(404);
    }

    function test_api_offers_store_returns_valid_data(): void
    {
        Property::factory()->create();
        $dummy_data = Offer::factory()->create();

        $response = $this->postJson("/api/offers", $dummy_data->toArray());

        $response->assertStatus(200);
        $response->assertJson(["message" => "offer added successfully!"]);
    }

    function test_api_offers_store_in_database(): void
    {
        Property::factory()->create();
        $dummy_data = Offer::factory()->create();

        $response = $this->postJson("/api/offers", $dummy_data->toArray());

        $response->assertStatus(200);
        $this->assertDatabaseCount("offers", 2);
    }

    function test_api_offers_update_returns_valid_data(): void
    {
        Property::factory()->create();
        $dummy_data = Offer::factory()->create();

        $dummy_data["price"] = 9999;

        $response = $this->putJson("/api/offers/".$dummy_data->id, $dummy_data->toArray());

        $response->assertStatus(200);
        $response->assertJson(["message" => "offer updated successfully!"]);
    }

    function test_api_offers_update_returns_invalid_error(): void
    {
        Property::factory()->create();
        $dummy_data = Offer::factory()->create();

        $dummy_data["price"] = 9999;

        $response = $this->putJson("/api/offers/".$dummy_data->id, []);

        $response->assertStatus(422);
        $response->assertJsonCount(5, "errors");
    }

    function test_api_offers_store_returns_invalid_error(): void
    {
        $response = $this->postJson("/api/offers", []);

        $response->assertStatus(422);
        $response->assertJsonCount(5, "errors");
    }

    function test_api_offers_delete_returns_successful() {
        Property::factory()->create();
        $data = Offer::factory()->create();

        $response = $this->deleteJson("/api/offers/".$data->id);

        $response->assertStatus(200);
        $response->assertJson(["message" => "offer deleted successfully!"]);
    }
}
