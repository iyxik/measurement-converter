<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calculator</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>
    <h2 class="heading">Measurement Conversion</h2>
    <form method="post">
        <h3>Temperature</h3>
        <input type="number" name="temperature" placeholder="Temperature (°Celsius)"><br><br>

        <h3>Speed</h3>
        <input type="number" name="speed" placeholder="Speed (km/h)"><br><br>

        <h3>Mass</h3>
        <input type="number" name="mass" placeholder="Mass (Kilograms)">
        <input type="number" name="grams" placeholder="Mass (Grams)"><br><br>

        <input type="submit" name="convert" value="Convert">
    </form>

    <?php
    if ($_POST['convert']) {

        /* Temperature */
        if (!empty($_POST['temperature'])) {
            $celsius = floatval($_POST['temperature']);
            $farenheit = ($celsius * 9 / 5) + 32;
            $kelvin = $celsius + 273;

            echo "<h4>Temperature Conversions:</h4>";
            echo "Fahrenheit: " . $farenheit . " °F<br>";
            echo "Kelvin: " . $kelvin . " K<br><br>";
        }

        /* Speed */
        if (!empty($_POST['speed'])) {
            $kilometer = floatval($_POST['speed']);
            $meter = $kilometer * 0.277778;
            $knot = $kilometer * 0.539957;

            echo "<h4>Speed Conversions:</h4>";
            echo "Meters per second: " . $meter . " m/s<br>";
            echo "Knots: " . $knot . " knots<br><br>";
        }

        /* kg to grams */
        if (!empty($_POST['mass'])) {
            $kilogram = floatval($_POST['mass']);
            $gram = $kilogram * 1000;
            echo "<h4>Mass (kg to grams):</h4>";
            echo $kilogram . " kg = " . $gram . " grams<br><br>";
        }

        /* grams to kg */
        if (!empty($_POST['grams'])) {
            $grams = floatval($_POST['grams']);
            $kilograms = $grams / 1000;
            echo "<h4>Mass (grams to kg):</h4>";
            echo $grams . " grams = " . $kilograms . " kg<br><br>";
        }
    }
    ?>
</body>

</html>