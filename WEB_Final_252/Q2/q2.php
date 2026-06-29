<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
    <form action=""method ="POST">

    
    Attendees: <input type="number" name="input1"><br><br>
    Seat Capacity: <input type="number" name="input2"><br><br>
    Ticket Price: <input type="number" name="input3"><br><br>

    <button name="submit">submit</button>

    </form>

    <?php
        if(isset($_POST['submit'])){
            $attendees= (int)$_POST['input1'];
            $seat_capacity= (int)$_POST['input2'];
            $ticket_price= (int)$_POST['input3'];

            $total_Screen= ceil($attendees/$seat_capacity);

            $empty_seat = ($total_Screen*$seat_capacity)-$attendees;

            $wasted_money =$empty_seat*$ticket_price;

            echo "Total screen....Empty Seat.... Wasted Money";
            echo "<br>";

            echo "$total_Screen";
            echo "---";
            echo "$empty_seat";
            echo "---";
            echo "$wasted_money";


        }

    ?>
</body>
</html>