<?php
session_start();
if(!isset($_SESSION['email_mem'])){
    header("Location: loginpage.php");
    exit();
}

include("dbconnect.php");

$row = null;

if(isset($_POST['id_mem'])){
    $stmt = $con->prepare("SELECT * FROM members WHERE id_mem = :id");
    $stmt->bindParam(":id", $_POST['id_mem']);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}

if(isset($_POST['save'])){

    $stmt = $con->prepare("UPDATE members SET
        name_mem=:name,
        email_mem=:email,
        password_mem=:pass,
        sex_mem=:sex,
        birthday_mem=:birth,
        phone_mem=:phone,
        address_mem=:address,
        zipcode_mem=:zip,
        country_mem=:country
        WHERE id_mem=:id");

    $stmt->execute([
        ":name"=>$_POST['name_mem'],
        ":email"=>$_POST['email_mem'],
        ":pass"=>$_POST['password_mem'],
        ":sex"=>$_POST['sex_mem'],
        ":birth"=>$_POST['birthday_mem'],
        ":phone"=>$_POST['phone_mem'],
        ":address"=>$_POST['address_mem'],
        ":zip"=>$_POST['zipcode_mem'],
        ":country"=>$_POST['country_mem'],
        ":id"=>$_POST['id_mem']
    ]);

    echo "<script>alert('อัปเดตข้อมูลสำเร็จ');</script>";
    echo "<script>location.href='searchpage.php';</script>";
    exit();
}

if(isset($_POST['del'])){

    $stmt = $con->prepare("DELETE FROM members WHERE id_mem=:id");
    $stmt->bindParam(":id", $_POST['id_mem']);
    $stmt->execute();

    echo "<script>alert('ลบข้อมูลสำเร็จ');</script>";
    echo "<script>location.href='searchpage.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title>Edit Member</title>

<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',sans-serif;}

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

.form-group{margin-bottom:15px;}

label{display:block;margin-bottom:5px;}

input, select, textarea{
    width:100%;
    padding:8px;
    border-radius:8px;
    border:1px solid #00ffff;
    background:#111;
    color:white;
}

textarea{resize:none;}

.button-group{text-align:center;margin-top:15px;}

button{
    padding:8px 15px;
    border:none;
    border-radius:8px;
    cursor:pointer;
    margin:5px;
    transition:0.3s;
}

.save-btn{background:linear-gradient(45deg,#00ffff,#ff00ff);color:white;}
.delete-btn{background:#ff0033;color:white;}
.cancel-btn{background:#666;color:white;}

button:hover{
    transform:scale(1.05);
    box-shadow:0 0 10px #00ffff;
}
</style>
</head>

<body>

<div class="form-box">
<h2>แก้ไขข้อมูลสมาชิก</h2>

<?php if($row): ?>
<form method="POST">

<input type="hidden" name="id_mem" value="<?php echo $row['id_mem']; ?>">

<div class="form-group">
<label>ชื่อ</label>
<input type="text" name="name_mem" value="<?php echo $row['name_mem']; ?>" required>
</div>

<div class="form-group">
<label>Email</label>
<input type="email" name="email_mem" value="<?php echo $row['email_mem']; ?>" required>
</div>

<div class="form-group">
<label>Password</label>
<input type="text" name="password_mem" value="<?php echo $row['password_mem']; ?>" required>
</div>

<div class="form-group">
<label>เพศ</label>
<select name="sex_mem">
    <option value="1" <?php if($row['sex_mem']==1) echo "selected"; ?>>ชาย</option>
    <option value="2" <?php if($row['sex_mem']==2) echo "selected"; ?>>หญิง</option>
</select>
</div>

<div class="form-group">
<label>วันเกิด</label>
<input type="date" name="birthday_mem" value="<?php echo $row['birthday_mem']; ?>" required>
</div>

<div class="form-group">
<label>เบอร์โทร</label>
<input type="text" name="phone_mem" value="<?php echo $row['phone_mem']; ?>" required>
</div>

<div class="form-group">
<label>ที่อยู่</label>
<textarea name="address_mem" rows="3" required><?php echo $row['address_mem']; ?></textarea>
</div>

<div class="form-group">
<label>รหัสไปรษณีย์</label>
<input type="text" name="zipcode_mem" value="<?php echo $row['zipcode_mem']; ?>" required>
</div>

<div class="form-group">
<label>ประเทศ</label>
<input type="text" name="country_mem" value="<?php echo $row['country_mem']; ?>" required>
</div>

<div class="button-group">
<button type="submit" name="save" class="save-btn">บันทึก</button>
<button type="submit" name="del" class="delete-btn" onclick="return confirm('ยืนยันการลบข้อมูล?')">ลบ</button>
<button type="button" class="cancel-btn" onclick="location.href='searchpage.php'">ยกเลิก</button>
</div>

</form>
<?php endif; ?>

</div>

</body>
</html>