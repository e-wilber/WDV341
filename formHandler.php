<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Basic Form Handler Example</title>
</head>

<body>
<h3>Form Name-Value Pairs</h3>
<?php

	echo "<table border='1'>";
	echo "<tr><th>Field Name</th><th>Value of Field</th></tr>";
	foreach($_POST as $key => $value)
	{
		echo '<tr>';
		echo '<td>',$key,'</td>';
		echo '<td>',$value,'</td>';
		echo "</tr>";
	} 
	echo "</table>";
	echo "<p>&nbsp;</p>";

?>
<?php
// Retrieve form data from POST request
$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];
$academicStanding = $_POST['academic_standing'];
$selectedMajor = $_POST['program'];
$emailAddress = $_POST['email'];
$comments = $_POST['comments'];

// Checkboxes (may not always be set)
$contactInfo = isset($_POST['contact_info']) ? "Please contact me with program information" : "";
$advisorContact = isset($_POST['advisor_contact']) ? "I would like to contact a program advisor" : "";

// Display the formatted confirmation message
echo "<p>Dear $firstName,</p>";

echo "<p>Thank you for your interest in DMACC.</p>";

echo "<p>We have you listed as a $academicStanding starting this fall.</p>";

echo "<p>You have declared $selectedMajor as your major.</p>";

echo "<p>Based upon your responses we will provide the following information in our confirmation email to you at $emailAddress.</p>";

if ($contactInfo || $advisorContact) {
    echo "<ul>";
    if ($contactInfo) {
        echo "<li>$contactInfo</li>";
    }
    if ($advisorContact) {
        echo "<li>$advisorContact</li>";
    }
    echo "</ul>";
}

echo "<p>You have shared the following comments which we will review:</p>";

echo "<p>$comments</p>";
?>

</body>
</html>
