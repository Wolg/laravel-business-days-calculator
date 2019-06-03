<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BusinessDaysTest extends TestCase
{
    /**
     * @test
     */
    public function smoke_test()
    {
        $response = $this->get('api/v1/businessDates/getBusinessDateWithDelay?initialDate=2018-12-12T10:10:10Z&delay=3');
        $response->assertStatus(200);

        $response = $this->post('api/v1/businessDates/getBusinessDateWithDelay', ['initialDate' => '2018-12-12T10:10:10Z', 'delay' => 3], []);
        $response->assertStatus(200);
    }
}
