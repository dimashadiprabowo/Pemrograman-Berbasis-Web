<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Route Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

</head>
<body>
    <h1 style ="
    text-align: center;
    margin-top: 50px;
    font-family: Arial, Roboto;
    ">Flight Route Registration</h1>

    <div class="container mt-5">
    <form method = "POST">
        <div class="mb-3" style = "
        margin-top: 25px;
        margin-left: 100px;
        width: 1000px;
        ">
        <label for="exampleFormControlInput1" class="form-label">Airline Name</label>
        <input type="airplane-name" class="form-control" id="exampleFormControlInput1" name="airline" placeholder="Please input the airline name">
        </div>

        <div class="mb-3" style = "
        margin-top: 25px;
        margin-left: 100px;
        width: 1000px;
        ">
        <label for="exampleFormControlInput1" class="form-label">Departure Airport</label>
        <select class="form-select" name="departure" aria-label="Default select example">
        <option selected>Please select your departure airport</option>
        <?php
            $departure_airport = [
                "Soekarno Hatta" => 65000,
                "Husein Sastranegara" => 50000,
                "Abdul Rachman Saleh" => 40000,
                "Juanda" => 30000
            ];
            ksort($departure_airport);
                foreach ($departure_airport as $airport => $tax) {
                echo "<option value=\"$airport\">$airport</option>";
            }
        ?>
        </select>
        </div>

        <div class="mb-3" style = "
        margin-top: 25px;
        margin-left: 100px;
        width: 1000px;
        ">
        <label for="exampleFormControlInput1" class="form-label">Destination Airport</label>
        <select class="form-select" name="destination" aria-label="Default select example">
        <option selected>Please select your destination airport</option>
        <?php
            $destination_airport = [
                "Ngurah Rai" => 85000,
                "Hasanuddin" => 70000,
                "Inanwatan" => 90000,
                "Sultan Iskandar Muda" => 60000
            ];
            ksort($destination_airport);
                foreach ($destination_airport as $airport => $tax) {
                echo "<option value=\"$airport\">$airport</option>";
            }
        ?>
        </select>
        </div>

        <div class="mb-3" style = "
        margin-top: 25px;
        margin-left: 100px;
        width: 1000px;
        ">
        <label for="exampleFormControlInput1" class="form-label">Ticket Price (Rp)</label>
        <input type="number" class="form-control" id="exampleFormControlInput1" name="price" placeholder="Please input the price">
        </div>

        <div class="col-12" style ="
        margin-left: 100px;
        ">
        <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>

    <?php
    date_default_timezone_set('Asia/Jakarta');

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $airline = $_POST["airline"];
        $departure = $_POST["departure"];
        $destination = $_POST["destination"];
        $price = $_POST["price"];

        $tax_departure = $departure_airport[$departure];
        $tax_destination = $destination_airport[$destination];
        $total_tax = $tax_departure + $tax_destination;
        $total_price = $price + $total_tax;
        $date = date("d-m-Y");
        $flight_number = "FL-" . rand(1000,9999);

        echo "<div class='card mt-5'>";
        echo "<div class='card-header'><strong>Flight Registration Details</strong></div>";
        echo "<div class='card-body'>";
        echo "<p><strong>Submission Date:</strong> $date</p>";
        echo "<p><strong>Flight Number:</strong> $flight_number</p>";
        echo "<p><strong>Airline:</strong> $airline</p>";
        echo "<p><strong>Departure:</strong> $departure</p>";
        echo "<p><strong>Destination:</strong> $destination</p>";
        echo "<p><strong>Ticket Price:</strong> Rp " . number_format($price, 0, ',', '.') . "</p>";
        echo "<p><strong>Tax:</strong> Rp " . number_format($total_tax, 0, ',', '.') . "</p>";
        echo "<p><strong>Total Ticket Price:</strong> Rp " . number_format($total_price, 0, ',', '.') . "</p>";
    }
    ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>
