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
<title>Search Page</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: 'Segoe UI', sans-serif;
}

body{
    min-height:100vh;
    background: linear-gradient(-45deg, #ff0000, #00ffff, #0066ff, #ff00ff);
    background-size:400% 400%;
    animation: rgbBG 12s ease infinite;
    color:white;
}

@keyframes rgbBG{
    0%{background-position:0% 50%;}
    50%{background-position:100% 50%;}
    100%{background-position:0% 50%;}
}

.container{
    width:90%;
    margin:40px auto;
    background: rgba(0,0,0,0.85);
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

.search-box{
    text-align:center;
    margin-bottom:20px;
}

.search-box input[type="text"]{
    width:300px;
    padding:8px;
    border-radius:8px;
    border:1px solid #00ffff;
    background:#111;
    color:white;
}

.search-box button{
    padding:8px 15px;
    border:none;
    border-radius:8px;
    background:linear-gradient(45deg,#00ffff,#ff00ff);
    color:white;
    cursor:pointer;
    transition:0.3s;
}

.search-box button:hover{
    transform:scale(1.05);
    box-shadow:0 0 10px #00ffff;
}

.top-bar{
    margin-bottom:20px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.top-bar button{
    padding:6px 12px;
    border:none;
    border-radius:6px;
    cursor:pointer;
}

.add-btn{ background:#00cc66; color:white; }
.home-btn{ background:#0066ff; color:white; }
.logout-btn{ background:#ff0033; color:white; }

table{
    width:100%;
    border-collapse:collapse;
    text-align:center;
}

th, td{
    padding:10px;
    border:1px solid #00ffff;
}

th{
    background:#111;
    color:#00ffff;
}

tr:nth-child(even){
    background:rgba(255,255,255,0.05);
}

.action-btn{
    padding:5px 10px;
    border:none;
    border-radius:5px;
    cursor:pointer;
    background:linear-gradient(45deg,#ff00ff,#00ffff);
    color:white;
}
</style>
</head>

<body>

<div class="container">

<h2>ระบบจัดการสมาชิก</h2>

<div class="top-bar">
    <div>ยินดีต้อนรับ: <?php echo $_SESSION['name_mem']; ?></div>
    <div>
        <button class="add-btn" onclick="location.href='insertpage.php'">เพิ่มข้อมูล</button>
        <button class="home-btn" onclick="location.href='firstpage.php'">หน้าหลัก</button>
        <button class="logout-btn" onclick="location.href='logout.php'">ออกจากระบบ</button>
    </div>
</div>

<div class="search-box">
    <form method="POST">
        <input type="text" name="search" placeholder="ค้นหาชื่อ เบอร์โทร หรืออีเมล">
        <button type="submit">ค้นหา</button>
    </form>
</div>

<table>
<thead>
<tr>
    <th>ID</th>
    <th>ชื่อ</th>
    <th>เพศ</th>
    <th>เบอร์โทร</th>
    <th>Email</th>
    <th>Action</th>
</tr>
</thead>

<tbody>

<?php
include("dbconnect.php");

if(isset($_POST['search'])){
    $search = "%".$_POST['search']."%";
    $stmt = $con->prepare("SELECT * FROM members 
        WHERE name_mem LIKE :search 
        OR phone_mem LIKE :search 
        OR email_mem LIKE :search 
        ORDER BY name_mem ASC");
    $stmt->bindParam(":search",$search);
    $stmt->execute();
}else{
    $stmt = $con->prepare("SELECT * FROM members ORDER BY name_mem ASC");
    $stmt->execute();
}

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
?>

<tr>
    <td><?php echo $row['id_mem']; ?></td>
    <td><?php echo $row['name_mem']; ?></td>
    <td><?php echo ($row['sex_mem']==1) ? "ชาย" : "หญิง"; ?></td>
    <td><?php echo $row['phone_mem']; ?></td>
    <td><?php echo $row['email_mem']; ?></td>
    <td>
        <form method="POST" action="editpage.php">
            <input type="hidden" name="id_mem" value="<?php echo $row['id_mem']; ?>">
            <button class="action-btn">แก้ไข</button>
        </form>
    </td>
</tr>

<?php } ?>

</tbody>
</table>

</div>
</body>
</html>
