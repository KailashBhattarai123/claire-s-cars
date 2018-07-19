<?php
	class NewsMockDatabaseTable {
		public $dataValid = false;

		public function save($datas){
			if ($datas['title'] == 'Discount' && 
				$datas['special_offer'] == "10% discount of mercedes" &&
				$datas['bank_holiday'] =="04-20" &&
				$datas['closing_time'] == "04-30" && $datas['posted_by'] == "kailash"
				) {
				
				$this->dataValid=true;
			}
		}
	}
