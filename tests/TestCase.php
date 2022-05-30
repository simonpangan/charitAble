<?php

namespace Tests;

use App\Traits\RedirectTo;
use JMac\Testing\Traits\AdditionalAssertions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RedirectTo, AdditionalAssertions;
}
