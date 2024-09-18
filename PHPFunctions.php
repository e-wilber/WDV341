<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Processing Page</title>
</head>
<body>
    <?php
    // Function to format Unix Timestamp as mm/dd/yyyy
    function formatDateUS($timestamp) {
        return date('m/d/Y', $timestamp);
    }

    // Function to format Unix Timestamp as dd/mm/yyyy (international format)
    function formatDateInternational($timestamp) {
        return date('d/m/Y', $timestamp);
    }

    // Function to process string and display results
    function processString($str) {
        echo "<p>Original String: \"$str\"</p>";
        
        // Display the number of characters in the string
        echo "<p>Number of characters: " . strlen($str) . "</p>";
        
        // Trim leading and trailing whitespace
        $trimmedStr = trim($str);
        echo "<p>Trimmed String: \"$trimmedStr\"</p>";
        
        // Display string in lowercase
        echo "<p>Lowercase String: \"" . strtolower($trimmedStr) . "\"</p>";
        
        // Check if string contains "DMACC" (case-insensitive)
        if (stripos($trimmedStr, 'DMACC') !== false) {
            echo "<p>The string contains 'DMACC'.</p>";
        } else {
            echo "<p>The string does not contain 'DMACC'.</p>";
        }
    }

    // Function to format a number as a phone number (e.g., 1234567890 -> (123) 456-7890)
    function formatPhoneNumber($number) {
        $number = preg_replace("/[^0-9]/", "", $number);  // Remove any non-numeric characters
        if (strlen($number) == 10) {
            return "(".substr($number, 0, 3).") ".substr($number, 3, 3)."-".substr($number, 6);
        } else {
            return "Invalid phone number format.";
        }
    }

    // Function to format a number as US currency (e.g., 123456 -> $123,456.00)
    function formatCurrency($number) {
        return "$" . number_format($number, 2);
    }

    // Example Usage

    // Unix timestamp for testing
    $timestamp = time(); // Current time as Unix timestamp

    echo "<h3>Formatted Dates</h3>";
    echo "<p>US Format: " . formatDateUS($timestamp) . "</p>";
    echo "<p>International Format: " . formatDateInternational($timestamp) . "</p>";

    echo "<h3>String Processing</h3>";
    $testString = "  Hello DMACC Students!  ";
    processString($testString);

    echo "<h3>Phone Number Formatting</h3>";
    $phoneNumber = "1234567890";
    echo "<p>Formatted Phone Number: " . formatPhoneNumber($phoneNumber) . "</p>";

    echo "<h3>Currency Formatting</h3>";
    $currencyNumber = 123456;
    echo "<p>Formatted Currency: " . formatCurrency($currencyNumber) . "</p>";
    ?>
</body>
</html>
