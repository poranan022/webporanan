<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Logout</title>

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

/* Box */
.logout-box{
    width:380px;
    padding:35px;
    background:rgba(0,0,0,0.75);
    border-radius:18px;
    text-align:center;
    position:relative;
}

/* RGB Border */
.logout-box::before{
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

.logout-box h2{
    font-size:26px;
    margin-bottom:15px;
    text-shadow:0 0 15px cyan;
}

.logout-box p{
    color:#ddd;
    margin-bottom:20px;
}

.loader{
    width:60px;
    height:60px;
    border-radius:50%;
    border:5px solid rgba(255,255,255,0.2);
    border-top:5px solid cyan;
    animation:spin 1s linear infinite;
    margin:0 auto;
}

@keyframes spin{
    100%{transform:rotate(360deg);}
}
</style>

<script>
setTimeout(()=>{
    window.location.href = "loginpage.php";
},3000);
</script>

</head>
<body>

<div class="logout-box">
    <h2>👋 LOGOUT</h2>
    <p>ออกจากระบบเรียบร้อย<br>กำลังพากลับไปหน้า Login...</p>
    <div class="loader"></div>
</div>

</body>
</html>

