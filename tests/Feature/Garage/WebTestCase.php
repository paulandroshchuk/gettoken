<?php

namespace Tests\Feature\Garage;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class WebTestCase extends TestCase
{
    use WithFaker, ModelFactories, DatabaseTransactions;
}
