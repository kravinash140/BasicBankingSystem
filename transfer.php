<?php

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $sender = $_POST['sender'];
        $receiver = $_POST['receiver'];
        $cardnumber = $_POST['card'];
        $expirymonth = $_POST['month'];
        $expiryyear = $_POST['year'];
        $cvv = $_POST['cvv'];
        $amount = $_POST['amount'];
        
        require 'db.php';
        $query = "SELECT * FROM `users` WHERE `id` = $sender";
        $result = mysqli_query($conn, $query);
        $row1 = mysqli_fetch_array($result);

        $query = "SELECT * FROM `users` WHERE `id` = $receiver";
        $result = mysqli_query($conn, $query);
        $row2 = mysqli_fetch_array($result);
        
        if($amount > $row1['balance']) 
        {
            
            echo '<script type="text/javascript">';
            echo ' alert("Insufficient Balance........")';  
            echo '</script>';
             echo "<script type='text/javascript'>";
            echo 'window.location.href = "index.php";';
            echo "</script>";
        }
        else if($amount == 0)
        {
    
            echo "<script type='text/javascript'>";
            echo "alert('Sorry! Zero value cannot be transferred........')";
            echo "</script>";
             echo "<script type='text/javascript'>";
            echo 'window.location.href = "index.php";';
            echo "</script>";
        }
        else
        {
        
        $newbalance = $row1['balance'] - $amount;
        $query = "UPDATE `users` SET `balance` = $newbalance WHERE `id` = $sender";
        mysqli_query($conn, $query);
             
        $newbalance = $row2['balance'] + $amount;
        $query = "UPDATE `users` SET `balance` = $newbalance WHERE `id` = $receiver";
        mysqli_query($conn, $query);
        
        $sendername = $row1['name'];
        $receivername = $row2['name'];
        
        $query = "INSERT INTO transfers (sender, receiver, cardnumber, expirymonth, expiryyear, cvv, amount) VALUES(?,?,?,?,?,?,?);";
        $stmnt = mysqli_prepare($conn,$query);
        mysqli_stmt_bind_param($stmnt, "sssssss" , $sendername, $receivername, $cardnumber, $expirymonth, $expiryyear, $cvv, $amount);

        mysqli_stmt_execute($stmnt);
        
        echo "<script type='text/javascript'>";
        echo "alert('Transaction Successful.')";
        echo "</script>";
        echo "<script type='text/javascript'>";
        echo 'window.location.href = "all-customers.php";';
        echo "</script>";
        }

    }else{
        header("Location: index.php");
    }

?>