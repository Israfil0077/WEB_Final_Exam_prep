<!DOCTYPE html>
<html>
<head>
    <title>Sales Performance</title>
</head>
<body>

<form method="POST">

    Items Sold Per Day:
    <input type="number" name="items"><br><br>

    Number of Days:
    <input type="number" name="days"><br><br>

    Target:
    <input type="number" name="target"><br><br>

    <input type="submit" name="submit" value="Submit">

</form>

<?php

if(isset($_POST['submit']))
{
    $items = (int)$_POST['items'];
    $days = (int)$_POST['days'];
    $target = (int)$_POST['target'];

    $total = $items * $days;

    if($total >= 500)
    {
        $performance = "Excellent";
    }
    elseif($total >= 300)
    {
        $performance = "Good";
    }
    elseif($total >= 150)
    {
        $performance = "Average";
    }
    else
    {
        $performance = "Poor";
    }

    if($total > $target)
    {
        $difference = $total - $target;
        $result = "Above target by ".$difference;
    }
    elseif($total < $target)
    {
        $difference = $target - $total;
        $result = "Below target by ".$difference;
    }
    else
    {
        $result = "Target met exactly (0 difference)";
    }

    echo "<h3>Result</h3>";
    echo "Total Items Sold: ".$total."<br>";
    echo "Performance: ".$performance."<br>";
    echo "Target: ".$target."<br>";
    echo "Result: ".$result;
}

?>

</body>
</html>