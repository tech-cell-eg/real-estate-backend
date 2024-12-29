<?php

namespace Tests\Feature;

use App\Models\Property;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PropertyTest extends TestCase
{
    use RefreshDatabase;

    function test_api_properties_returns_successful() {
        $response = $this->getJson("/api/properties");

        $response->assertStatus(200);
    }

    function test_api_properties_returns_valid_data() {
        $property = Property::factory()->create(["longitude" => 1.2]);

        $response = $this->getJson("/api/properties");

        $response->assertStatus(200);
        $response->assertJson(["data" => [$property->toArray()]]);
    }

    function test_api_properties_show_returns_valid_data() {
        $property = Property::factory()->create();
        

        $response = $this->getJson("/api/properties/".$property->id);

        $response->assertStatus(200);
        $response->assertJson(["data" => $property->toArray()]);
    }


    function test_api_properties_store_returns_valid_data() {
        $response = $this->postJson("/api/properties", [
            "address" => "home",
            "city" => "egypt",
            "region" => "zagazig",
            "type" => "سكني",
            "images" => "img.png",
            "description" => "desco",
            "longitude" => 1.2,
            "latitude" => 2.1,
            "area" => 113
        ]);

        $response->assertStatus(200);
        $response->assertJson(["message" => "property added successfully!"]);
    }

    function test_api_properties_update_returns_valid_data() {
        $property = Property::factory()->create();
        $response = $this->putJson("/api/properties/".$property->id, [
            "address" => "home",
            "city" => "egypt",
            "region" => "zagazig",
            "type" => "سكني",
            "images" => "img.png",
            "description" => "desco",
            "longitude" => 1.2,
            "latitude" => 2.1,
            "area" => 113
        ]);

        $response->assertStatus(200);
        $response->assertJson(["message" => "property updated successfully!"]);
    }

    function test_api_properties_update_returns_error() {
        $property = Property::factory()->create();
        $response = $this->putJson("/api/properties/".$property->id, []);

        $response->assertStatus(422);
    }

    function test_api_properties_store_returns_invalid_message() {
        $response = $this->postJson("/api/properties", []);

        $response->assertStatus(422);
        $response->assertJsonCount(9, "errors");
    }

    function test_api_properties_store_add_in_database() {
        $response = $this->postJson("/api/properties", [
            "address" => "home",
            "city" => "egypt",
            "region" => "zagazig",
            "type" => "سكني",
            "images" => "img.png",
            "description" => "desco",
            "longitude" => 1.2,
            "latitude" => 2.1,
            "area" => 113
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseCount("properties", 1);
    }

    function test_api_properties_delete_returns_successful() {
        $property = Property::factory()->create();

        $response = $this->deleteJson("/api/properties/".$property->id);

        $response->assertStatus(200);
        $response->assertJson(["message" => "property deleted successfully!"]);
    }


}
