<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BusinessDaysTest extends TestCase
{
    public function testSmoke()
    {
        $response = $this->json('GET', 'api/v1/businessDates/getBusinessDateWithDelay?initialDate=2018-12-12T10:10:10Z&delay=3');
        $response->assertStatus(200);

        $response = $this->json('POST', 'api/v1/businessDates/getBusinessDateWithDelay', ['initialDate' => '2018-12-12T10:10:10Z', 'delay' => 3], []);
        $response->assertStatus(200);
    }

    public function testGetBusinessDateWithDelayShouldBeValid()
    {
        $response = $this->json('GET', 'api/v1/businessDates/getBusinessDateWithDelay');
        $response->assertStatus(422);
        $response = $this->json('GET', 'api/v1/businessDates/getBusinessDateWithDelay?initialDate=test&delay=1');
        $response->assertStatus(422);
        $response = $this->json('GET', 'api/v1/businessDates/getBusinessDateWithDelay?initialDate=2018-12-12T10:10:10Z&delay=test');
        $response->assertStatus(422);

        $response = $this->json('POST', 'api/v1/businessDates/getBusinessDateWithDelay', ['initialDate' => 'test', 'delay' => 3], []);
        $response->assertStatus(422);
        $response = $this->json('POST', 'api/v1/businessDates/getBusinessDateWithDelay', ['initialDate' => '2018-12-12T10:10:10Z', 'delay' => 'test'], []);
        $response->assertStatus(422);
    }
}
