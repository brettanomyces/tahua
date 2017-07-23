<?php

namespace Tests;

use App\Tag;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TagControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function testRetrieveAll()
    {
        factory(Tag::class, 5)->create();

        $response = $this->json('GET', 'api/tags');
        $response->assertStatus(200);
        $json = $response->json();

        $this->assertCount(5, $json);
    }

    public function testRetrieveAllWhenQueryParameterIncludedThenFilterResults()
    {
        factory(Tag::class, 2)->create();
        $tag = Tag::first();

        $response = $this->json('GET', "api/tags?q={$tag['name']}");
        $response->assertStatus(200);
        $json = $response->json();

        $this->assertCount(1, $json);
        $this->assertEquals($tag['name'], $json[0]['name']);
    }
}
