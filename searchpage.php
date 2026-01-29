<?php
session_start();
if(!isset($_SESSION['email_mem'])){
    header("Location: loginpage.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>

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
    color:white;
}

@keyframes bgMove{
    0%{background-position:0% 50%;}
    50%{background-position:100% 50%;}
    100%{background-position:0% 50%;}
}

/* Main Box */
.dashboard{
    width:420px;
    padding:35px;
    background:rgba(0,0,0,0.75);
    border-radius:18px;
    text-align:center;
    position:relative;
}

/* RGB Border */
.dashboard::before{
    content:"";
    position:absolute;
    inset:-3px;
    border-radius:20px;
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

.dashboard h2{
    margin-bottom:20px;
    text-shadow:0 0 15px cyan;
}

.info{
    margin:15px 0;
    font-size:16px;
    color:#ddd;
}

.info span{
    color:#0ff;
}

/* Buttons */
.btn{
    width:100%;
    padding:12px;
    margin-top:15px;
    border:none;
    border-radius:8px;
    font-size:16px;
    cursor:pointer;
    transition:0.3s;
}

.logout{
    background:linear-gradient(90deg,red,magenta);
    color:white;
}

.logout:hover{
    box-shadow:0 0 20px red;
    transform:scale(1.05);
}
</style>

</head>
<body>

<div class="dashboard">
    <h2>👤 USER DASHBOARD</h2>

    <div class="info">
        📧 Email : <span><?php echo $_SESSION['email_mem']; ?></span>
    </div>

    <div class="info">
        🙍 Name : <span><?php echo $_SESSION['name_mem']; ?></span>
    </div>

    <button class="btn logout" onclick="location.href='logout.php'">
        🚪 LOGOUT
    </button>
</div>

</body>
</html>
