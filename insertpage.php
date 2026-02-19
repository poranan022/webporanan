<?php
session_start();
if(!isset($_SESSION['email_mem'])){
    header("Location: loginpage.php");
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title>Insert Member</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(-45deg,#ff0000,#00ffff,#0066ff,#ff00ff);
    background-size:400% 400%;
    animation:rgbBG 12s ease infinite;
    color:white;
}

@keyframes rgbBG{
    0%{background-position:0% 50%;}
    50%{background-position:100% 50%;}
    100%{background-position:0% 50%;}
}

.form-box{
    width:500px;
    background:rgba(0,0,0,0.9);
    padding:30px;
    border-radius:15px;
    box-shadow:0 0 25px #00ffff;
}

h2{
    text-align:center;
    margin-bottom:20px;
    color:#00ffff;
    text-shadow:0 0 10px #00ffff;
}

.form-group{
    margin-bottom:15px;
}

label{
    display:block;
    margin-bottom:5px;
}

input, select, textarea{
    width:100%;
    padding:8px;
    border-radius:8px;
    border:1px solid #00ffff;
    background:#111;
    color:white;
}

textarea{
    resize:none;
}

.button-group{
    text-align:center;
    margin-top:15px;
}

button{
    padding:8px 15px;
    border:none;
    border-radius:8px;
    cursor:pointer;
    margin:5px;
    transition:0.3s;
}

.save-btn{
    background:linear-gradient(45deg,#00ffff,#ff00ff);
    color:white;
}

.cancel-btn{
    background:#ff0033;
    color:white;
}

button:hover{
    transform:scale(1.05);
    box-shadow:0 0 10px #00ffff;
}
</style>
</head>

<body>

<div class="form-box">
<h2>เพิ่มข้อมูลสมาชิก</h2>

<form method="POST">

<div class="form-group">
<label>ชื่อ</label>
<input type="text" name="name_mem" required>
</div>

<div class="form-group">
<label>Email</label>
<input type="email" name="email_mem" required>
</div>

<div class="form-group">
<label>Password</label>
<input type="password" name="password_mem" required>
</div>

<div class="form-group">
<label>เพศ</label>
<select name="sex_mem">
    <option value="1">ชาย</option>
    <option value="2">หญิง</option>
</select>
</div>

<div class="form-group">
<label>วันเกิด</label>
<input type="date" name="birthday_mem" required>
</div>

<div class="form-group">
<label>เบอร์โทร</label>
<input type="text" name="phone_mem" required>
</div>

<div class="form-group">
<label>ที่อยู่</label>
<textarea name="address_mem" rows="3" required></textarea>
</div>

<div class="form-group">
<label>รหัสไปรษณีย์</label>
<input type="text" name="zipcode_mem" required>
</div>

<div class="form-group">
<label>ประเทศ</label>
<input type="text" name="country_mem" required>
</div>

<div class="button-group">
<button type="submit" name="save" class="save-btn">บันทึก</button>
<button type="button" class="cancel-btn" onclick="location.href='searchpage.php'">ยกเลิก</button>
</div>

</form>
</div>

<?php
if(isset($_POST['save'])){

include("dbconnect.php");

try{

$stmt = $con->prepare("INSERT INTO members
(name_mem,email_mem,password_mem,sex_mem,birthday_mem,phone_mem,address_mem,zipcode_mem,country_mem)
VALUES
(:name,:email,:pass,:sex,:birth,:phone,:address,:zip,:country)");

$stmt->bindParam(":name",$_POST['name_mem']);
$stmt->bindParam(":email",$_POST['email_mem']);
$stmt->bindParam(":pass",$_POST['password_mem']);
$stmt->bindParam(":sex",$_POST['sex_mem']);
$stmt->bindParam(":birth",$_POST['birthday_mem']);
$stmt->bindParam(":phone",$_POST['phone_mem']);
$stmt->bindParam(":address",$_POST['address_mem']);
$stmt->bindParam(":zip",$_POST['zipcode_mem']);
$stmt->bindParam(":country",$_POST['country_mem']);

$stmt->execute();

echo "<script>alert('บันทึกข้อมูลสำเร็จ');</script>";
echo "<script>location.href='searchpage.php';</script>";

}catch(PDOException $e){
    echo "<script>alert('เกิดข้อผิดพลาด');</script>";
}

}
?>

</body>
</html>
