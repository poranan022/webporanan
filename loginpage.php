<?php
session_start();
include("dbconnect.php");

if(isset($_SESSION['email_mem'])){
    header("Location: searchpage.php");
    exit();
}

if(isset($_POST['submit'])){

    if(!empty($_POST['email_name']) && !empty($_POST['password_name'])){

        $email = trim($_POST['email_name']);
        $password = trim($_POST['password_name']);

        $stmt = $con->prepare("SELECT * FROM members 
                               WHERE email_mem = :email 
                               AND password_mem = :pass");

        $stmt->execute([
            ":email"=>$email,
            ":pass"=>$password
        ]);

        if($stmt->rowCount() > 0){

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $_SESSION['id_mem'] = $row['id_mem'];
            $_SESSION['name_mem'] = $row['name_mem'];
            $_SESSION['email_mem'] = $row['email_mem'];

            header("Location: searchpage.php");
            exit();
        }else{
            $error = "Email หรือ Password ไม่ถูกต้อง";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title>Login</title>

<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',sans-serif;}

body{
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(-45deg,#ff0000,#00ffff,#0066ff,#ff00ff);
    background-size:400% 400%;
    animation:rgbBG 12s ease infinite;
}

@keyframes rgbBG{
    0%{background-position:0% 50%;}
    50%{background-position:100% 50%;}
    100%{background-position:0% 50%;}
}

.login-box{
    width:350px;
    background:rgba(0,0,0,0.9);
    padding:35px;
    border-radius:15px;
    box-shadow:0 0 25px #00ffff;
    color:white;
    text-align:center;
}

h2{
    margin-bottom:20px;
    color:#00ffff;
    text-shadow:0 0 10px #00ffff;
}

input{
    width:100%;
    padding:10px;
    margin:10px 0;
    border-radius:8px;
    border:1px solid #00ffff;
    background:#111;
    color:white;
}

button{
    width:100%;
    padding:10px;
    border:none;
    border-radius:8px;
    background:linear-gradient(45deg,#00ffff,#ff00ff);
    color:white;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    transform:scale(1.05);
    box-shadow:0 0 10px #00ffff;
}

.error{
    color:#ff4444;
    margin-top:10px;
}
</style>
</head>

<body>

<div class="login-box">
<h2>เข้าสู่ระบบ</h2>

<form method="POST">
    <input type="email" name="email_name" placeholder="กรอก Email" required>
    <input type="password" name="password_name" placeholder="กรอก Password" required>
    <button type="submit" name="submit">Login</button>
</form>

<?php if(isset($error)) echo "<div class='error'>$error</div>"; ?>

</div>
</body>
</html>
