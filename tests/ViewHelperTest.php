<?php

namespace Kolydart\Common\Tests;

use PHPUnit\Framework\TestCase;
use Kolydart\Common\ViewHelper;

class ViewHelperTest extends TestCase
{
	/** 
	 * @test
	 */
	public function class_exists(){
		$this->assertTrue(class_exists(ViewHelper::class));
	}
	
	/**
	 * @test
	 */
	public function confirm_delete_modal_returns_expected_html(){
		// Test with default params
		$result = ViewHelper::confirm_delete_modal();
		$this->assertStringContainsString('modal fade', $result);
		$this->assertStringContainsString('Are you sure you want to delete this object?', $result);
		
		// Test with custom params
		$id = 'test-id';
		$message = 'Custom confirmation message';
		$result = ViewHelper::confirm_delete_modal($id, $message);
		
		$this->assertStringContainsString('id="confirm-delete' . $id . '"', $result);
		$this->assertStringContainsString($message, $result);
	}
} 