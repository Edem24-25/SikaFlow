<?php
namespace Tests\Feature;
use Tests\TestCase;
class ExampleTest extends TestCase {
    public function test_home_page_loads(): void {
        $this->get('/')->assertStatus(200);
    }
}
