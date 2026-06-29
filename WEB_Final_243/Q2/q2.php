<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
    <form action=""method ="POST">

    
    Number of students: <input type="number" name="input1"><br><br>
    slice per student: <input type="number" name="input2"><br><br>
    slice per pizza: <input type="number" name="input3"><br><br>

    <button name="submit">submit</button>

    </form>

    <?php
        if(isset($_POST['submit'])){
            $numberofstudents= (int)$_POST['input1'];
            $sliceperstudent= (int)$_POST['input2'];
            $sliceperpizza= (int)$_POST['input3'];


            $totalpizza = ceil(($numberofstudents*$sliceperstudent)/$sliceperpizza);

            $leftoverslice= ($totalpizza*$sliceperpizza)-($numberofstudents*$sliceperstudent);

            $wastedmoney = (1050/$sliceperpizza)*$leftoverslice;

            echo "<table border='1'>";
               echo "<tr>
                        <th>Number of students</th>
                        <th>slice per student</th>
                        <th>slice per pizza</th>
                        <th>totalpizza</th>
                        <th>leftoverslice</th>
                        <th>wastedmoney</th>
                    </tr>";
                echo "<tr>
                        <td>$numberofstudents</td>
                        <td>$sliceperstudent</td>
                        <td>$sliceperpizza</td>
                        <td>$totalpizza</td>
                        <td>$leftoverslice</td>
                        <td>$wastedmoney</td>
                    </tr>";
            echo "</table>";
            
        }

    ?>
</body>
</html>