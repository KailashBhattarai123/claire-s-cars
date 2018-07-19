<?php

require 'testfiles/insert.php';
require 'testfiles/enquirymockdatabase.php';

class InsertTest extends \PHPUnit_Framework_TestCase
{

	public function testValidData(){
		$enquiryinsert = new EnquiryMockDatabaseTable();

		$dataValid = [
			'name' => 'kailash bhattarai',
			'email' => 'Bhattarai.kailash1998@gmail.com',
			'telephone' => '9846062241',
			'enquiry' => 'Hello mister how do you do.'
		];

		$validData = insertEnquiry($enquiryinsert, $dataValid);

		$this->assertTrue($validData);
		$this->assertTrue($enquiryinsert->dataValid);
	}

	public function testInValidData(){
		$enquiryinsert = new EnquiryMockDatabaseTable();

		$dataValid = [
			'name' => 'kailash bhattarai',
			'email' => 'Bhattarai.kailash1998@gmail.com',
			'telephone' => '',
			'enquiry' => 'Hello mister how do you do.'
		];

		$validData = insertEnquiry($enquiryinsert, $dataValid);

		$this->assertFalse($validData);
	}
	public function testInValidData2(){
		$enquiryinsert = new EnquiryMockDatabaseTable();

		$dataValid = [
			'name' => 'kailash bhattarai',
			'email' => '',
			'telephone' => '9846062241',
			'enquiry' => 'Hello mister how do you do.'
		];

		$validData = insertEnquiry($enquiryinsert, $dataValid);

		$this->assertFalse($validData);
	}
	public function testInValidData3(){
		$enquiryinsert = new EnquiryMockDatabaseTable();

		$dataValid = [
			'name' => '',
			'email' => 'Bhattarai.kailash1998@gmail.com',
			'telephone' => '9846062241',
			'enquiry' => 'Hello mister how do you do.'
		];

		$validData = insertEnquiry($enquiryinsert, $dataValid);

		$this->assertFalse($validData);
	}
	public function testInValidData4(){
		$enquiryinsert = new EnquiryMockDatabaseTable();

		$dataValid = [
			'name' => 'kailash bhattarai',
			'email' => 'Bhattarai.kailash1998@gmail.com',
			'telephone' => '9846062241',
			'enquiry' => ''
		];

		$validData = insertEnquiry($enquiryinsert, $dataValid);

		$this->assertFalse($validData);
	}
}

