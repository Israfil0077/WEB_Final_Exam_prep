<?php
$conn = new mysqli("127.0.0.1", "root", "", "campus_library", 3306);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Q1 — Total books per Status, only statuses with more than 1 entry
$query1 = "SELECT Status, COUNT(*) AS total_no_of_Books
           FROM book_loans
           GROUP BY Status
           HAVING COUNT(*) > 1";
$store = $conn->query($query1);
echo "<h3>Q1: Book count per Status (more than 1)</h3>";
while ($show = $store->fetch_assoc()) {
    echo $show['Status'] . " --- " . $show['total_no_of_Books'] . "<br>";
}

// Q2 — Change 'Overdue' students with DaysOverdue < 7 to 'Grace Period'
// Fix: use LOWER() to catch both 'Overdue' and 'overdue' in the DB
$query2 = "UPDATE book_loans
           SET Status = 'Grace Period', PenaltyFee = 0
           WHERE LOWER(Status) = 'overdue' AND DaysOverdue < 7";
$conn->query($query2);
echo "<br>Q2: Grace Period status updated.<br>";

// Q3 — Increase PenaltyFee by 10% for fees > 20, only if result <= 50
$query3 = "UPDATE book_loans
           SET PenaltyFee = PenaltyFee * 1.10
           WHERE PenaltyFee > 20.00
           AND (PenaltyFee * 1.10) <= 50";
$conn->query($query3);
echo "Q3: Processing charge applied.<br>";

// Q4 — Each BookTitle with total PenaltyFee, sorted highest first
$query4 = "SELECT BookTitle, SUM(PenaltyFee) AS total_Penalty_Fee
           FROM book_loans
           GROUP BY BookTitle
           ORDER BY total_Penalty_Fee DESC";
$store = $conn->query($query4);
echo "<br><h3>Q4: Penalty Fee per Book (highest first)</h3>";
while ($show = $store->fetch_assoc()) {
    echo $show['BookTitle'] . " --- " . $show['total_Penalty_Fee'] . "<br>";
}
?>
