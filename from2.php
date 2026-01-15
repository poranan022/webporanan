<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title>Poranan</title>

<style>
body{
    background: linear-gradient(120deg,#ffecd2,#fcb69f);
    font-family: Arial;
}

.result{
    width:500px;
    margin:50px auto;
    background:white;
    padding:25px;
    border-radius:15px;
    box-shadow:0 10px 20px rgba(0,0,0,0.2);
}

h2{
    text-align:center;
    color:#ff7a18;
}

.back{
    margin-top:20px;
    text-align:center;
}

.back input{
    padding:10px 25px;
    border:none;
    border-radius:20px;
    background:#36d1dc;
    color:white;
    cursor:pointer;
}
</style>
</head>

<body>

<div class="result">
<h2>📋 ข้อมูลที่คุณกรอก</h2>

<?php
if(isset($_POST['save'])){
    echo "<b>Username:</b> ".$_POST['user']."<br>";
    echo "<b>Password:</b> ".$_POST['Pwd']."<br>";
    echo "<b>Address:</b> ".$_POST['address']."<br>";
    echo "<b>Gender:</b> ".$_POST['gender']."<br>";

    echo "<b>Hobby:</b> ";
    if(!empty($_POST['Hobby'])){
        foreach($_POST['Hobby'] as $h){
            echo $h." ";
        }
    }
    echo "<br>";

    echo "<b>Beverage:</b> ".$_POST['beverage']."<br>";
}
?>

<div class="back">
<form action="from1.php">
    <input type="submit" value="Back">
</form>
</div>

</div>

</body>
</html>

