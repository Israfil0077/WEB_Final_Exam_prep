<!DOCTYPE html>
<html lang="en">
<head></head>
<body>
    <form action="" method="POST">
        Attendees: <input type="number" name="input1"><br><br>
        Cost per person: <input type="number" name="input2"><br><br>
        Venue Capacity: <input type="number" name="input3"><br><br>
        <button name="submit">Submit</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $attendees      = (int)$_POST['input1'];
        $cost_per_person = (int)$_POST['input2'];
        $venue_capacity  = (int)$_POST['input3'];

        $total_venues = ceil($attendees / $venue_capacity);
        $empty_seats  = ($total_venues * $venue_capacity) - $attendees;
        $wasted_money = $empty_seats * $cost_per_person;

        echo "<table border='1'>";
        echo "<tr>
                <th>Attendees</th>
                <th>Cost per Person</th>
                <th>Venue Capacity</th>
                <th>Total Venues</th>
                <th>Empty Seats</th>
                <th>Wasted Money (BDT)</th>
              </tr>";
        echo "<tr>
                <td>$attendees</td>
                <td>$cost_per_person</td>
                <td>$venue_capacity</td>
                <td>$total_venues</td>
                <td>$empty_seats</td>
                <td>$wasted_money</td>
              </tr>";
        echo "</table>";
    }
    ?>
</body>
</html>
