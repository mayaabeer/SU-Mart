<?php
include('menu.php');
$servername = "localhost";
$username = "root";
$password = ""; 
$database = "shopping"; 
    
    $conn = new mysqli($servername, $username, $password, $database);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
 $code=$_REQUEST['itemcode'];
 $query = "SELECT item_code, item_name, description, imagename, price FROM products " . "where item_code like '$code'";
 $results = mysqli_query($conn, $query) or die(mysql_error());
 $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
 extract($row);
 echo "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"5\">";
 echo "<tr><td style=\"padding: 3px;\" rowspan=\"6\">";
 echo '<img src=img/' . $imagename . ' style="max-width:200px;max-height:260px; width:auto;height:auto;"></img></td>';
 echo "<td colspan=\"2\" align=\"left\" style=\"font-family:verdana; font-size:150%;\"><b>";
 echo $item_name;
 echo "</b></td></tr><tr><td colspan=\"2\"><table><tr><td>";
 $itemname=urlencode($item_name);
 $itemprice=$price;
 $itemdescription=$description;
 $pfquery = "SELECT feature1, feature2, feature3, feature4, feature5, feature6 FROM productfeatures " . "where item_code like '$code'";                                        
 $pfresults = mysqli_query($conn, $pfquery) or die(mysql_error());
 $pfrow = mysqli_fetch_array($pfresults, MYSQLI_ASSOC);
 extract($pfrow);
 echo $feature1;
 echo "</td><td style=\"padding-left: 20px;\">";
 echo $feature2;
 echo "</td></tr><tr><td>";
 echo $feature3;
 echo "</td><td style=\"padding-left: 20px;\">";
 echo $feature4;
 echo "</td></tr><tr><td>";
 echo $feature5;
 echo "</td><td style=\"padding-left: 20px;\">";
 echo $feature6;
 echo "</td></tr><tr>";
 echo "<form method=\"POST\" action=\"cart.php?action=add&icode=$item_code&iname=$itemname&iprice=$itemprice\">";
 echo "<td colspan=\"2\" style=\"font-family:verdana; font-size:150%;\">";
 echo " Quantity: <input type=\"text\" name=\"quantity\" size=\"2\">&nbsp;&nbsp; &nbsp;Price: " . $itemprice;
 echo "</td></tr><tr><td  colspan=\"2\"><input type=\"submit\" name=\"buynow\" value=\"Buy Now\" style=\"font-size:150%;\">";
 echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"submit\" name=\"addtocart\" value=\"Add To Cart\" style=\"font-size:150%;\"></td>";
 echo "</form>";
 echo "</tr></table></table>";
 echo "<p  style=\"font-size:140%;\">Description</p>";
 echo $itemdescription;
 ?>