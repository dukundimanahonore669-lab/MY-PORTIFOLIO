<?php
$serverName = "DESKTOP-2MCPM45\\SQLEXPRESS";

$connectionOptions = array(
    "Database" => "CountryDB",
    "Uid" => "",
    "PWD" => ""
);

$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn == false) {
    die(print_r(sqlsrv_errors(), true));
}

// Read data from the HTML form
$CountryId = $_POST["CountryId"];
$CountryName = $_POST["CountryName"];
$Continent = $_POST["Continent"];
$Currency = $_POST["Currency"];

// Insert into SQL Server
$sql = "INSERT INTO Country (CountryId, CountryName, Continent, Currency)
        VALUES (?, ?, ?, ?)";

$params = array($CountryId, $CountryName, $Continent, $Currency);

$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt) {
    echo "Data saved successfully!";
} else {
    die(print_r(sqlsrv_errors(), true));
}

sqlsrv_close($conn);
?>