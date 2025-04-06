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
	
	/**
	 * @test
	 */
	public function generic_conceal_replaces_letters_and_digits_with_x(){
		$string = 'Test123!@#';
		$result = ViewHelper::generic_conceal($string);
		$this->assertEquals('xxxxxxx!@#', $result);
	}
	
	/**
	 * @test
	 */
	public function maskString_replaces_letters_and_digits_with_default_mask(){
		$string = 'Test123!@#';
		$result = ViewHelper::maskString($string);
		$this->assertEquals('xxxxxxx!@#', $result);
	}
	
	/**
	 * @test
	 */
	public function maskString_uses_custom_mask_character(){
		$string = 'Test123!@#';
		$result = ViewHelper::maskString($string, '*');
		$this->assertEquals('*******!@#', $result);
	}
	
	/**
	 * @test
	 */
	public function generic_conceal_calls_maskString(){
		$string = 'Sample text with 123 numbers!';
		$this->assertEquals(
			ViewHelper::maskString($string),
			ViewHelper::generic_conceal($string)
		);
	}
} 