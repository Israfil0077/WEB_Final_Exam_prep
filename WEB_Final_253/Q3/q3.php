<?php
    $conn = new mysqli("127.0.0.1","root","","campus_library",3306);
    
    
    $query1="SELECT Status, COUNT(*) AS total_no_of_Books
    FROM book_loans
    GROUP BY Status
    HAVING COUNT(*) > 1;";

    $store = $conn-> query($query1);

    while($show=$store->fetch_assoc())
        {
        echo $show['Status']."---".$show['total_no_of_Books']."<br>";
    
        }
    

    $query2="UPDATE book_loans
    SET Status ='Grace period', PenaltyFee=0
    WHERE Status='Overdue' AND DaysOverdue<7;";

    $store = $conn-> query($query2);


    $query3="UPDATE book_loans
    SET PenaltyFee = PenaltyFee + (PenaltyFee * 0.10) 
    WHERE PenaltyFee>20.00 
    AND PenaltyFee + (PenaltyFee * 0.10)<=50;";

    $store = $conn-> query($query3);

    $query3="SELECT BookTitle,SUM(PenaltyFee) as total_Penalty_Fee
    FROM book_loans
    GROUP BY BookTitle
    ORDER BY total_Penalty_Fee DESC;";

    $store = $conn-> query($query3);

    while($show=$store->fetch_assoc())
        {
        echo $show['BookTitle']."---".$show['total_Penalty_Fee']."<br>";
    
        }

    


?>