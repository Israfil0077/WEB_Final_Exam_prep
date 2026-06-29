<?php
    $conn = new mysqli("127.0.0.1","root","","uiutech_final", 3306);


    $query1 = "SELECT PerformanceRating,COUNT(EmployeeID) as total_no
    FROM employee_final
    GROUP BY PerformanceRating;" ;


    $store = $conn-> query($query1);


    while($show= $store->fetch_assoc())
        {
        echo $show['PerformanceRating']."----".$show['total_no']."<br>";
    
    
        }

    
    $query2="UPDATE employee_final
    SET PerformanceRating ='C'
    WHERE Salary<40000 AND PerformanceRating!='D';";

    $store = $conn-> query($query2);

    $query3="UPDATE employee_final
    SET Salary= Salary+5000
    WHERE Salary>50000 AND Salary+5000<60000;";

    $store = $conn-> query($query3);


    $query4="SELECT DepartmentName,COUNT(EmployeeID) as total_emp
    FROM employee_final
    GROUP BY DepartmentName
    ORDER BY total_emp DESC;";

    $store = $conn-> query($query4);

        while($show= $store->fetch_assoc())
        {
        echo $show['DepartmentName']."----".$show['total_emp']."<br>";
   
        }



?>