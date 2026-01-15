<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title>Poranan From</title>

<style>
@import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600&display=swap');

body{
    margin:0;
    min-height:100vh;
    font-family:'Orbitron', sans-serif;
    background: linear-gradient(270deg,
        #ff0000,#ff9900,#ffff00,#00ff00,#00ffff,#0000ff,#ff00ff,#ff0000);
    background-size:800% 800%;
    animation: rgbMove 12s linear infinite;
}

@keyframes rgbMove{
    0%{background-position:0% 50%;}
    100%{background-position:100% 50%;}
}

.result{
    width:520px;
    margin:80px auto;
    padding:30px;
    background:rgba(0,0,0,0.88);
    border-radius:16px;
    box-shadow:0 0 20px #00ffff,0 0 40px #ff00ff;
    color:white;
}

h2{
    text-align:center;
    color:#00ffff;
    text-shadow:0 0 10px #00ffff;
}

.back{
    text-align:center;
    margin-top:25px;
}
.back input{
    padding:10px 35px;
    border:none;
    border-radius:30px;
    font-family:'Orbitron', sans-serif;
    cursor:pointer;
    background: linear-gradient(90deg,#ff00ff,#00ffff,#ffff00);
    background-size:300%;
    animation: btnRGB 3s linear infinite;
}

@keyframes btnRGB{
    from{background-position:0%;}
    to{background-position:100%;}
}
</style>
</head>

<body>

<div class="result">
<h2>📊 RGB DATA RESULT</h2>

<?php
if(isset($_POST['save'])){
    echo "👤 USER: ".$_POST['user']."<br>";
    echo "🔐 PASS: ".$_POST['Pwd']."<br>";
    echo "🏠 ADDRESS: ".$_POST['address']."<br>";
    echo "⚧ GENDER: ".$_POST['gender']."<br>";
    echo "🎯 HOBBY: ";
    if(!empty($_POST['Hobby'])){
        foreach($_POST['Hobby'] as $h){
            echo $h." ";
        }
    }
    echo "<br>";
    echo "You didn't press save.";
}
?>

<div class="back">
<form action="from1.php">
    <input type="submit" value="BACK">
</form>
</div>

</div>
</body>
</html>



