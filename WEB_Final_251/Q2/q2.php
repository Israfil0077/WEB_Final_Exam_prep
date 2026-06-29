<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
    <form action=""method ="POST">

    
    Attendees: <input type="number" name="input1"><br><br>
    Cost per person: <input type="number" name="input2"><br><br>
    Venue Capacity: <input type="number" name="input3"><br><br>

    <button name="submit">submit</button>

    </form>

    <?php
        if(isset($_POST['submit'])){
            $attendees= (int)$_POST['input1'];
            $cost_per_person= (int)$_POST['input2'];
            $venue_capacity= (int)$_POST['input3'];

            $Total_Venues = ceil($attendees/$venue_capacity);
            echo $Total_Venues;
            echo"----";

            $empty_seats = ($Total_Venues*$venue_capacity)-$attendees;
            echo $empty_seats;
            echo"----";

            $wasted_money= $empty_seats*$cost_per_person;
            echo $wasted_money;


            
        }

    ?>
</body>
</html>