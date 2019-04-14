<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

protected function disableExceptionHandling()
{
    $this->oldExceptionHandler = $this->app->make(ExceptionHandler::class);
    $this->app->instance(ExceptionHandler::class, new class extends Handler {
        public function __construct() {}
        public function report(\Exception $e) {}
        public function render($request, \Exception $e) {
            throw $e;
        }
    });
}
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
}
