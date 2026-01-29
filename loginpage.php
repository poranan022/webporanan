<?php
session_start();
include('dbconnect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>RGB Login</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

/* RGB Background */
body{
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(
        270deg,
        red,magenta,blue,cyan,lime,yellow,red
    );
    background-size:600% 600%;
    animation:bgMove 12s ease infinite;
}

@keyframes bgMove{
    0%{background-position:0% 50%;}
    50%{background-position:100% 50%;}
    100%{background-position:0% 50%;}
}

/* Login Box */
.login-box{
    width:350px;
    padding:30px;
    background:rgba(0,0,0,0.75);
    border-radius:16px;
    text-align:center;
    color:#fff;
    position:relative;
}

/* RGB Border */
.login-box::before{
    content:"";
    position:absolute;
    inset:-3px;
    border-radius:18px;
    background:linear-gradient(
        90deg,
        red,magenta,blue,cyan,lime,yellow,red
    );
    background-size:400%;
    animation:borderRGB 5s linear infinite;
    z-index:-1;
}

@keyframes borderRGB{
    0%{background-position:0%;}
    100%{background-position:400%;}
}

.login-box h2{
    margin-bottom:20px;
    text-shadow:0 0 15px cyan;
}

.login-box input{
    width:100%;
    padding:12px;
    margin:10px 0;
    border:none;
    border-radius:8px;
    background:#111;
    color:#fff;
    outline:none;
}

.login-box input::placeholder{
    color:#aaa;
}

.login-box button{
    width:100%;
    padding:12px;
    margin-top:15px;
    border:none;
    border-radius:8px;
    font-size:16px;
    cursor:pointer;
    background:linear-gradient(90deg,red,magenta,blue);
    color:white;
    transition:0.3s;
}

.login-box button:hover{
    box-shadow:0 0 20px cyan;
    transform:scale(1.05);
}
</style>

</head>
<body>

<div class="login-box">
    <h2>🔐 LOGIN</h2>

    <form method="POST">
        <input type="email" name="email_mem" placeholder="📧 Email" required>
        <input type="password" name="password_mem" placeholder="🔑 Password" required>
        <button type="submit" name="submit">LOGIN</button>
    </form>
</div>

<?php
if(isset($_POST['submit'])){
    $email = trim($_POST['email_mem']);
    $pass  = trim($_POST['password_mem']);

    $stmt = $con->prepare(
        "SELECT * FROM members 
         WHERE email_mem = :email AND password_mem = :pass"
    );
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':pass',$pass);
    $stmt->execute();
    $row = $stmt->fetch();

    if($row){
        $_SESSION['id_mem'] = $row['id_mem'];
        $_SESSION['name_mem'] = $row['name_mem'];
        $_SESSION['email_mem'] = $row['email_mem'];
        echo "<script>alert('เข้าสู่ระบบสำเร็จ');location='searchpage.php';</script>";
    }else{
        echo "<script>alert('Email หรือ Password ไม่ถูกต้อง');</script>";
    }
}
?>

</body>
</html>
