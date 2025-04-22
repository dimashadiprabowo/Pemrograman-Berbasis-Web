<?php
include '../config.php';
$kodemk = $_GET['kodemk'];
$conn->query("DELETE FROM matakuliah WHERE kodemk = '$kodemk'");
header("Location: index.php");
