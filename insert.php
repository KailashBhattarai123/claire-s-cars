<?php

	function insertEnquiry($enquiry, $enquiryData) {
		$isValid = true;

		if ($enquiryData['name'] == '') {
			$isValid = false;
		}

		if ($enquiryData['email'] == '') {
			$isValid = false;
		}

		if ($enquiryData['telephone'] == '') {
			$isValid = false;
		}

		if ($enquiryData['enquiry'] == '') {
			$isValid = false;
		}

		if ($isValid) {
			$enquiry->save($enquiryData);
		}

		return $isValid;
	}