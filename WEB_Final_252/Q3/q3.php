<?php
$conn = new mysqli("127.0.0.1", "root", "", "sundarban", 3306);

$query1 = "SELECT CategoryName, SUM(Revenue) AS total_rev
FROM sales_data
GROUP BY CategoryName;";

$store = $conn->query($query1);

while ($show = $store->fetch_assoc()) {
    echo $show['CategoryName'] . " --- " . $show['total_rev'] . "<br>";
}

$query2 = "UPDATE sales_data
SET CategoryName = 'Low performing'
WHERE Revenue < 40000;";

$conn->query($query2);

$query3 = "UPDATE sales_data
SET Revenue = Revenue + Revenue * 0.1
WHERE Revenue > 70000;";

$conn->query($query3);

$query4 = "SELECT CategoryID, COUNT(SaleID) AS total_no
FROM sales_data
GROUP BY CategoryID;";

$store = $conn->query($query4);

while ($show = $store->fetch_assoc()) {
    echo $show['CategoryID'] . " --- " . $show['total_no'] . "<br>";
}
?>
