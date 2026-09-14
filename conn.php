<?php

$serverName = "DESKTOP-CB56Q1C";

$connectionOptions = array(
    "Database" => "store_foodapp",
    "TrustServerCertificate" => true
);

$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die("<pre>" . print_r(sqlsrv_errors(), true) . "</pre>");
}

// echo "Database Connected Successfully";

?>