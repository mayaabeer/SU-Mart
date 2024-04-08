<?php
include('menu.php');
    $servername = "localhost";
    $username = "Joshua";
    $password = "password"; 
    $database = "shopping"; 
    
    $conn = new mysqli($servername, $username, $password, $database);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $tosearch=$_POST['tosearch'];
    $query = "select * from products where ";
    $query_fields = Array();
    $sql = "SHOW COLUMNS FROM products";
    $columnlist = mysqli_query($conn, $sql) or die(mysql_error());
    while($arr = mysqli_fetch_array($columnlist, MYSQLI_ASSOC)) {
        extract($arr);
        $query_fields[] = $Field . " like('%" . $tosearch . "%')";
    }
    $query .= implode(" OR ", $query_fields);
    $results = mysqli_query($conn, $query) or die(mysql_error());
    echo "<table border=\"0\">";
    $x=1;
    echo "<tr>";
    while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
        if ($x <= 3)
        {
            $x=$x + 1;
            extract($row);
            echo "<td style=\"padding-right:15px;\">";
            echo "<a href=itemdetails.php?itemcode=$item_code>";
            echo '<img src=' . $imagename . ' style="max-width:220px;max-height:240px;width=auto;height=auto;"></img><br/>';
            echo $item_name . '<br/>';
            echo "</a>";
            echo '$'.$price .'<br/>';
            echo "</td>";
        }
        else {
            $x=1;
            echo "</tr><tr>";
        }
    }
    echo "</table>";
    ?>