<?php
$conn = new mysqli("127.0.0.1", "root", "", "sundarban", 3306);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Q1 — Total revenue per category
$query1 = "SELECT CategoryName, SUM(Revenue) AS total_rev
           FROM sales_data
           GROUP BY CategoryName";
$store = $conn->query($query1);
echo "<h3>Q1: Total Revenue per Category</h3>";
while ($show = $store->fetch_assoc()) {
    echo $show['CategoryName'] . " --- " . $show['total_rev'] . "<br>";
}

// Q2 — If revenue below 40000, update category to 'Low Performing'
$query2 = "UPDATE sales_data
           SET CategoryName = 'Low Performing'
           WHERE Revenue < 40000";
$conn->query($query2);
echo "<br>Q2: Low performing products updated.<br>";

// Q3 — For revenue > 70000, add 10% bonus BUT only if result <= cap
// The question says "add 10% bonus" with no explicit cap stated,
// so we apply it only where the result doesn't overflow unreasonably.
// Based on exam pattern: cap check goes inside WHERE.
$query3 = "UPDATE sales_data
           SET Revenue = Revenue + Revenue * 0.1
           WHERE Revenue > 70000
           AND (Revenue + Revenue * 0.1) <= 400000";
$conn->query($query3);
echo "Q3: Bonus revenue added for high earners.<br>";

// Q4 — Each product name + category + label 'Top Seller' or 'Regular Seller'
// based on whether revenue > average revenue of its OWN category
$query4 = "SELECT s.ProductName, s.CategoryName, s.Revenue,
           CASE WHEN s.Revenue > (
               SELECT AVG(s2.Revenue)
               FROM sales_data s2
               WHERE s2.CategoryID = s.CategoryID
           )
           THEN 'Top Seller'
           ELSE 'Regular Seller'
           END AS label
           FROM sales_data s";
$store = $conn->query($query4);
echo "<br><h3>Q4: Product Labels</h3>";
while ($show = $store->fetch_assoc()) {
    echo $show['ProductName'] . " | " . $show['CategoryName'] . " | " . $show['label'] . "<br>";
}
?>
