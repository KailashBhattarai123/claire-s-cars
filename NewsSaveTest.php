<?php

require 'testfiles/newssave.php';
require 'testfiles/newsmockdatabase.php';

class NewsSaveTest extends \PHPUnit_Framework_TestCase
{

	public function testValidData(){
		$newssave = new NewsMockDatabaseTable();

		$dataValid = [
			'title' => 'Discount',
			'special_offer' => '10% discount of mercedes',
			'bank_holiday' => '04-20',
			'closing_time' => '04-30',
			'posted_by' => 'kailash'
		];

		$validData = savenews($newssave, $dataValid);

		$this->assertTrue($validData);
		$this->assertTrue($newssave->dataValid);
	}

	public function testInValidData(){
		$newssave = new NewsMockDatabaseTable();

		$dataValid = [
			'title' => '',
			'special_offer' => '10% discount of mercedes',
			'bank_holiday' => '04-20',
			'closing_time' => '04-30',
			'posted_by' => 'kailash'
		];

		$validData = savenews($newssave, $dataValid);

		$this->assertFalse($validData);
	}
	public function testInValidData2(){
		$newssave = new NewsMockDatabaseTable();

		$dataValid = [
			'title' => 'Discount',
			'special_offer' => '10% discount of mercedes',
			'bank_holiday' => '',
			'closing_time' => '04-30',
			'posted_by' => 'kailash'
		];

		$validData = savenews($newssave, $dataValid);

		$this->assertFalse($validData);
	}
	public function testInValidData3(){
		$newssave = new NewsMockDatabaseTable();

		$dataValid = [
			'title' => 'Discount',
			'special_offer' => '10% discount of mercedes',
			'bank_holiday' => '04-20',
			'closing_time' => '',
			'posted_by' => 'kailash'
		];

		$validData = savenews($newssave, $dataValid);

		$this->assertFalse($validData);
	}
	public function testInValidData4(){
		$newssave = new NewsMockDatabaseTable();

		$dataValid = [
			'title' => 'Discount',
			'special_offer' => '10% discount of mercedes',
			'bank_holiday' => '04-20',
			'closing_time' => '04-30',
			'posted_by' => ''
		];

		$validData = savenews($newssave, $dataValid);

		$this->assertFalse($validData);
	}

	public function testInValidData5(){
		$newssave = new NewsMockDatabaseTable();

		$dataValid = [
			'title' => 'Discount',
			'special_offer' => '',
			'bank_holiday' => '04-20',
			'closing_time' => '04-30',
			'posted_by' => 'kailash'
		];

		$validData = savenews($newssave, $dataValid);

		$this->assertFalse($validData);
	}
}

