<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <form action="" method="POST">
        input1: <input type="number" name="input1"><br><br>
        input2: <input type="number" name="input2"><br><br>
        input3: <input type="number" name="input3"><br><br>
        <button name="submit">Submit</button>
    </form>
    <?php
        if(isset($_POST['submit'])){
            $input1 = (int)$_POST['input1'];
            $input2 = (int)$_POST['input2'];
            $input3 = (int)$_POST['input3'];
            // --- logic here ---
            echo "<table border='1'>";
            echo "<tr>
                    <th>Input1</th>
                    <th>Input2</th>
                    <th>Input3</th>
                    <th>Output1</th>
                    <th>Output2</th>
                    <th>Output3</th>
                    </tr>";
            echo "<tr>
                    <td>$input1</td>
                    <td>$input2</td>
                    <td>$input3</td>
                    <td>$output1</td>
                    <td>$output2</td>
                    <td>$output3</td>
                    </tr>";
            echo "</table>";
        }
    ?>
</body>
</html>