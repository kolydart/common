<?php 

use kolydart\common\Presenter;
use \PHPUnit\Framework\TestCase;

class PresenterTest extends TestCase{

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
