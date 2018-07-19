<?php

	function savenews($news, $newsData) {
		$isValid = true;

		if ($newsData['special_offer'] == '') {
			$isValid = false;
		}

		if ($newsData['bank_holiday'] == '') {
			$isValid = false;
		}

		if ($newsData['closing_time'] == '') {
			$isValid = false;
		}

		if ($newsData['posted_by'] == '') {
			$isValid = false;
		}

		if ($newsData['title'] == '') {
			$isValid = false;
		}

		if ($isValid) {
			$news->save($newsData);
		}

		return $isValid;
	}