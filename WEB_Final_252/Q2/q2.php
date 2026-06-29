<!DOCTYPE html>
<html lang="en">
<head></head>
<body>
    <form action="" method="POST">
        Attendees: <input type="number" name="input1"><br><br>
        Seat Capacity: <input type="number" name="input2"><br><br>
        Ticket Price: <input type="number" name="input3"><br><br>
        <button name="submit">Submit</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $attendees     = (int)$_POST['input1'];
        $seat_capacity = (int)$_POST['input2'];
        $ticket_price  = (int)$_POST['input3'];

        $total_screen = ceil($attendees / $seat_capacity);
        $empty_seat   = ($total_screen * $seat_capacity) - $attendees;
        $wasted_money = $empty_seat * $ticket_price;

        echo "<table border='1'>";
        echo "<tr>
                <th>Attendees</th>
                <th>Seat Capacity</th>
                <th>Ticket Price</th>
                <th>Total Screens</th>
                <th>Empty Seats</th>
                <th>Wasted Money</th>
              </tr>";
        echo "<tr>
                <td>$attendees</td>
                <td>$seat_capacity</td>
                <td>$ticket_price</td>
                <td>$total_screen</td>
                <td>$empty_seat</td>
                <td>$wasted_money</td>
              </tr>";
        echo "</table>";
    }
    ?>
</body>
</html>
