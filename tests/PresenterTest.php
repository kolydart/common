<?php

namespace Kolydart\Common\Tests;

use PHPUnit\Framework\TestCase;
use Kolydart\Common\Presenter;

class PresenterTest extends TestCase
{
	/** 
	 * @test
	 */
	public function unit_test_is_active(){

		$this->assertTrue(true);

	}

	/** 
	 * @test
	 */
	public function class_exists(){

		$this->assertTrue(class_exists(Presenter::class));

	}

}
