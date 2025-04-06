<?php

namespace Kolydart\Common\Tests;

use PHPUnit\Framework\TestCase;
use Kolydart\Common\Presenter;
use Kolydart\Common\ViewHelper;

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

	/**
	 * @test
	 */
	public function presenter_proxies_to_view_helper(){
		// Test that confirm_delete_modal is proxied correctly
		$id = 'test-id';
		$message = 'Test message';
		
		$presenterResult = Presenter::confirm_delete_modal($id, $message);
		$viewHelperResult = ViewHelper::confirm_delete_modal($id, $message);
		
		$this->assertEquals($viewHelperResult, $presenterResult);
	}

}
