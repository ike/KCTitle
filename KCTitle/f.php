<html>
<head><title>Sending...</title></head>

<style>

.heading {
	color: #777;
}

.heading a {
	color: #777;
}

</style>

<body>

<h1>Sending form real quick...</h1>

<?php
require_once('recaptchalib.php');

  $privatekey = "6LdwpckSAAAAAMRk-UxH336Bq06HnPTusZXjzC2M";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

function sendForm($s, $m) {
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		mail("kctitle@kctitle.net", $s, $m, $headers);
	}

function success($t) {
	if ($t == "order") {
		echo "<script language=javascript>window.location = \"success.php?t=order\"</script>";
	} elseif ($t == "contact") {
		echo "<script language=javascript>window.location = \"success.php?t=contact\"</script>";
	} elseif ($t == "service") {
		echo "<script language=javascript>window.location = \"success.php?t=service\"</script>";
	} else {
		echo "Hmmm... seems we're hung up somewhere. It's not your fault... would you mind calling 509-773-5804? We'll get right on it!";
	}
}

if (!$resp->is_valid) {
// What happens when the CAPTCHA was entered incorrectly
die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
     "(reCAPTCHA said: " . $resp->error . ")");
} else {

if ($_POST["f"] == 'order') {
		$out = "<html><head><title>Sending...</title></head><style>.heading {color: #777;}.heading a {color: #777}</style><body><span class=\"heading\">Hi there,<br>You just got a title/escrow order from the website. <br>------</span><br><br>";

		extract($_POST, EXTR_SKIP);

		if ($escrowRequested == "on")
			$out .= "Escrow requested.";


		# SELLER section
		$out .= "<b>Seller:</b><br>
					Name: " . $ownerName . "<br>
					Email: " . $ownerEmail . "<br>
					Phone: " . $ownerPhone . "<br>
					Address: " . $ownerAddress . "<br><br>";

		# BUYER / BORROWER section
		$out .= "<b>Buyer / Borrower:</b><br>
					Name: " . $buyerName . "<br>
					Email: " . $buyerEmail . "<br>
					Phone: " . $buyerPhone . "<br>
					Address: " . $buyerAddress . "<br><br>";

		# PROPERTY section
		$out .= "<b>Property:</b><br>
					Address: " . $propertyAddress . "<br>
					Parcel Number: " . $parcelNumber . "<br>
					Legal Description: " . $legalDescription . "<br><br>";

		# LEGAL DESCRIPTION section
		$out .= "<b>Product(s) Requested:</b><br>
					<p style=\"font-family: monospace;\">
					STD Owner............ " . $stdOwnersVal . " -- Insured by: " . $stdOwnersIns . "<br>
					Purchasers........... " . $purchasersVal . " -- Insured by: " . $purchasersIns . "<br>
					STD Mortgage......... " . $stdMortgageVal . " -- Insured by: " . $stdMortgageIns . "<br>
					EXT Mortgage......... " . $extMortgageVal . " -- Insured by: " . $extMortgageIns . "<br>
					Litigagtion.......... " . $litigationVal . " -- Insured by: " . $litigationIns . "<br>
					Trustee Sale......... " . $trusteeSaleVal . " -- Insured by: " . $trusteeSaleIns . "<br>
					Lot Book Search...... " . $lotBookSearchVal . " -- Insured by: " . $lotBookSearchIns . "<br>
					Limited.............. " . $limitedVal . " -- Insured by: " . $limitedIns . "
					</p><br><br>";

		$out .= "<b>Send Copies To:</b><br>";

		if ($sendToOwner == "on")
			$out .= "Owner";
		if ($sendToSeller == "on")
			$out .= ", Seller";
		if ($sendToListing == "on")
			$out .= ", Listing Agent";
		if ($sendToLender == "on")
			$out .= ", Lender";
		if ($sendToSelling == "on")
			$out .= ", Selling Agent";
		
		$out .= "<br><br><b>Note:</b><br>" . $note;

		$out .= "</body></html>";

		$subject = "Title/Escrow Order from " . $ownerName . " [KCTitle.net]";

		sendForm($subject, $out);

		success("order");

	} elseif ($_POST["f"] == 'contact') {

		extract($_POST, EXTR_SKIP);

		$out = "<html><style>.heading {color: #777;}.heading a {color: #777}</style><body><span class=\"heading\">Hi there,<br>You just got an email from " . $name . " (<a href=\"mailto:" . $email . "\">" . $email . "</a>) via the website. <br>------</span><br>";

		$out .= "<p style=\"font-size: 1.2em;\">" . stripslashes(nl2br($message)) . "</p>";

		$out .= "</body></html>";

		$subject = "Message from " . $name . " [KCTitle.net]";

		sendForm($subject, $out);

		success("contact");

	} elseif ($_POST["f"] == 'service') {

		extract($_POST, EXTR_SKIP);

		$out = "<html><style>.heading {color: #777;} .heading a {color: #777}</style><body><span class=\"heading\">Hi there,<br>You just got a customer service request from " . $name . " (<a href=\"mailto:" . $email . "\">" . $email . "</a>) via the website. <br>------</span><br>";

		$out .= "<b>Requester's Information</b><br><br>";

		$out .= "<b>Name:</b><br>" . $name . "<br>";
		$out .= "<b>Email:</b><br>" . $email . "<br>";
		$out .= "<b>Phone:</b><br>" . $phone . "<br><br>";

		$out .= "<b>Property Information</b><br><br>";

		$out .= "<b>Owner:</b><br>" . $owner . "<br>";
		$out .= "<b>Situs Address:</b><br>" . $situsAddress . "<br>";
		$out .= "<b>Tax Parcel:</b><br>" . $taxParcel . "<br>";
		$out .= "<b>Tax Names:</b><br>" . $taxNames . "<br>";
		$out .= "<b>Acres:</b><br>" . $acres . "<br>";
		$out .= "<b>Taxes:</b><br>" . $taxes . "<br>";
		$out .= "<b>Land:</b><br>" . $land . "<br>";
		$out .= "<b>Improvements:</b><br>" . $improvements . "<br><br>";

		$out .= "<b>Notes:</b><br>" . stripslashes(nl2br($notes));

		$out .= "</body></html>";

		$subject = "Message from " . $name . " [KCTitle.net]";

		sendForm($subject, $out);

		success("service");

	} else {
		echo "Something musta gone wrong. We're sorry. Would you mind calling 509-773-5804? We'll get right on it!";
	}

}
?>

</body>

</html>
