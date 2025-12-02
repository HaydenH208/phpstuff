<?php
// Default result message
$resultMessage = "<span style='color:blue'>Enter a number to analyze it!</span>";
$userNumber = "";

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get user input
    $userNumber = $_POST['myNumber'] ?? '';

    // Try converting input to a number
    if (is_numeric($userNumber)) {

        $n = floatval($userNumber);
        $square = $n * $n;
        $cube   = $n * $n * $n;
        $evenOdd = ((int)$n % 2 === 0) ? "even" : "odd";

        $resultMessage = "
        <div style='color:green; margin-top:15px;'>
            <b>Results for $n:</b><br>
            Square: $square <br>
            Cube: $cube <br>
            Even/Odd: $evenOdd
        </div>
        ";

    } else {
        $resultMessage = "<span style='color:red'>Please enter a valid number!</span>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP Number Analyzer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

    <h3>PHP Number Analyzer</h3>

    <form action="" method="post">
        <label for="myNumber">Enter a number:</label>
        <input type="text" id="myNumber" name="myNumber" value="">
        <input type="submit" value="Analyze">
    </form>

    <div style="text-align:center; margin-top:20px;">
        <?= $resultMessage ?>
    </div>

</body>
</html>
