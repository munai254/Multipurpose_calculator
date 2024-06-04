<!-- index.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <h1 >MULTIPURPOSE CALCULATOR</h1>
<style>
    body {
        font-family: Arial, sans-serif;
        display:flex;
        justify-content:center;
        align-items: center;
        height: 100vh;
        background-color: #d9dfeb;
    }
    form {
        background: green;
        padding: 50px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    input, select, button {
        margin: 10px 0;
        padding: 10px;
        width: 100%;
        box-sizing: border-box;
    }
    h1 {
        margin-bottom: 20px;
    }
</style>



</head>
<body>
          <form action="calc.php" method="post">
        <input type="number" name="num1" step="any" required>
        <select name="operation">
            <option value="add">Addition</option>
            <option value="subtract">Subtraction</option>
            <option value="multiply">Multiplication</option>
            <option value="divide">Division</option>
            <option value="exponent">Exponentiation</option>
            <option value="percentage">Percentage</option>
            <option value="sqrt">Square Root</option>
            <option value="logarithm">Logarithm</option>
        </select>
        <input type="number" name="num2" step="any">
        <button type="submit">Calculate</button>
    </form>
    <!-- calculate.php -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST['num1'];
    $operation = $_POST['operation'];
    $num2 = isset($_POST['num2']) ? $_POST['num2'] : null;

    $result = null;

    switch ($operation) {
        case 'add':
            $result = $num1 + $num2;
            break;
        case 'subtract':
            $result = $num1 - $num2;
            break;
        case 'multiply':
            $result = $num1 * $num2;
            break;
        case 'divide':
            if ($num2 != 0) {
                $result = $num1 / $num2;
            } else {
                $result = "Cannot divide by zero";
            }
            break;
        case 'exponent':
            $result = pow($num1, $num2);
            break;
        case 'percentage':
            $result = ($num1 / 100) * $num2;
            break;
        case 'sqrt':
            $result = sqrt($num1);
            break;
        case 'logarithm':
            if ($num1 > 0) {
                $result = log($num1);
            } else {
                $result = "Logarithm undefined for non-positive values";
            }
            break;
        default:
            $result = "Invalid operation";
    }

    echo "<h1>Result: $result</h1>";
}
?>

</body>
</html>
