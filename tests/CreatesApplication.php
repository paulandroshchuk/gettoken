<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\TestResponse;
use PHPUnit\Framework\Assert as PHPUnit;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        $app['hash']->setRounds(4);

        TestResponse::macro('assertUnauthenticated', function ($guard = 'web') {
            if ($guard === 'api') {
                $this->assertJson([
                    'message' => 'Unauthenticated.'
                ]);
            } elseif ($guard === 'web') {
                $this->assertRedirect(route('login'));
            } else {
                PHPUnit::fail('Wrong gateway provided.');
            }
        });

        return $app;
    }
}
