<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$link = mysqli_connect('localhost','HNDSOFTSA16','GdPZUFCJ6V','HNDSOFTSA16');

//if(!$link){
//
//die('Could not  connect to MySQL: ' .mysqli_error());
//
//}
////echo 'Connection OK';
//echo "Connect Successfully. Host info: " . mysqli_get_host_info($link);



//$sql = "CREATE TABLE IF NOT EXISTS users (
//user_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
//first_name VARCHAR(20) NOT NULL,
//last_name VARCHAR(40) NOT NULL,
//email VARCHAR(60) NOT NULL,
//pass VARCHAR(256) NOT NULL,
//card_number VARCHAR(20) NOT NULL,
//exp_month VARCHAR(2) NOT NULL,
//exp_year INT (4)NOT NULL,
//cvv INT (3) NOT NULL,
//reg_date DATETIME NOT NULL,
//PRIMARY KEY (user_id),
//UNIQUE (email)
//)";

//if(mysqli_query($link, $sql)){
//    echo "Table created successfully.";
//} else{
//    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
//}

//$sql = "INSERT INTO users (first_name, last_name, email) VALUES ('Andrew', 'Forrest', 'forrestandrew7@gamil.com')";
//if(mysqli_query($link, $sql)){
//    echo "Records inserted successfully.";
//} else{
//    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
//}

//$sql = "SELECT * FROM users";
//if($result = mysqli_query($link, $sql)){
//    if(mysqli_num_rows($result) > 0){
//        echo "<table>";
//            echo "<tr>";
//                echo "<th>id</th>";
//                echo "<th>first_name</th>";
//                echo "<th>last_name</th>";
//                echo "<th>email</th>";
//            echo "</tr>";
//        while($row = mysqli_fetch_array($result)){
//            echo "<tr>";
//                echo "<td>" . $row['id'] . "</td>";
//                echo "<td>" . $row['first_name'] . "</td>";
//                echo "<td>" . $row['last_name'] . "</td>";
//                echo "<td>" . $row['email'] . "</td>";
//            echo "</tr>";
//        }
//        echo "</table>";
//        // Free result set
//        mysqli_free_result($result);
//    } else{
//        echo "No records matching your query were found.";
//    }
//} else{
//    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
//}
// 
// Close connection
mysqli_close($link);
?>

