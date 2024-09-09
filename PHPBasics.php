<!-- E. Wilber 9/9/2024 -->
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP, HTML, and JavaScript Integration</title>
</head>
<body>

    <!-- Assignment Name in an h1 Element -->
    <h1>2-1: PHP Basics</h1>

    <?php
        // PHP Variable for Name
        $yourName = "Erin Wilber";

        // Display Name in h2 Element
        echo "<h2>Your Name: $yourName</h2>";

        // Variables for Number Operations
        $number1 = 10;
        $number2 = 20;
        $total = $number1 + $number2;

        // Displaying the Values of the Variables
        echo "<p>Number 1: $number1</p>";
        echo "<p>Number 2: $number2</p>";
        echo "<p>Total (Number 1 + Number 2): $total</p>";

        // PHP Array with Programming Languages
        $languages = array("PHP", "HTML", "JavaScript");

        // Convert PHP Array to JavaScript Array
        echo "<script>";
        echo "var jsLanguages = [];";
        foreach ($languages as $language) {
            echo "jsLanguages.push('$language');";
        }
        echo "</script>";
    ?>

    <!-- JavaScript to Display Array Values -->
    <script>
        // Display the values of the JavaScript array on the page
        var output = "<h3>Programming Languages:</h3><ul>";
        for (var i = 0; i < jsLanguages.length; i++) {
            output += "<li>" + jsLanguages[i] + "</li>";
        }
        output += "</ul>";

        // Append to the body
        document.body.innerHTML += output;
    </script>

</body>
</html>