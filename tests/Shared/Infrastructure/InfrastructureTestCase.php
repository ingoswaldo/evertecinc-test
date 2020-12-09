<?php
declare(strict_types=1);


namespace Tests\Shared\Infrastructure;


use Illuminate\Database\Eloquent\Model;
use Tests\TestCase;

abstract class InfrastructureTestCase extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();

        $this->unsetModelEventDispatcher();
    }

    protected abstract function repository();

    private function unsetModelEventDispatcher()
    {
        Model::unsetEventDispatcher();
    }
}