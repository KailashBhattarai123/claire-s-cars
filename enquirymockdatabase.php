<?php
	class EnquiryMockDatabaseTable {
		public $dataValid = false;

		public function save($datas){
			if ($datas['name'] == 'kailash bhattarai' && 
				$datas['email'] == "Bhattarai.kailash1998@gmail.com" &&
				$datas['telephone'] == "9846062241" &&
				$datas['enquiry'] == "Hello mister how do you do."
				) {
				
				$this->dataValid=true;
			}
		}
	}
