<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title>Poranan</title>

<style>
body{
    font-family: Arial, sans-serif;
    background: linear-gradient(120deg,#74ebd5,#9face6);
}

.box{
    width:600px;
    margin:50px auto;
    background:#ffffff;
    padding:25px;
    border-radius:15px;
    box-shadow:0 10px 20px rgba(0,0,0,0.2);
}

h2{
    text-align:center;
    color:#4A4A4A;
    margin-bottom:20px;
}

label{
    font-weight:bold;
    color:#333;
    margin-top:10px;
    display:block;
}

input[type=text],
input[type=password],
textarea,
select{
    width:100%;
    padding:10px;
    border-radius:8px;
    border:1px solid #ccc;
    margin-top:5px;
}

textarea{
    resize:none;
}

.inline{
    margin-top:5px;
}

.inline input{
    width:auto;
    margin-right:5px;
}

.btn{
    text-align:center;
    margin-top:20px;
}

.btn input{
    width:120px;
    padding:10px;
    border:none;
    border-radius:25px;
    font-size:15px;
    cursor:pointer;
}

.btn .save{
    background: linear-gradient(45deg,#56ab2f,#a8e063);
    color:white;
}

.btn .cancel{
    background: linear-gradient(45deg,#ff416c,#ff4b2b);
    color:white;
    margin-left:10px;
}

.btn input:hover{
    opacity:0.85;
}
</style>
</head>

<body>

<div class="box">
<h2>🌟 แบบฟอร์มสมัครสมาชิก 🌟</h2>

<form method="post" action="from2.php">

<label>Username</label>
<input type="text" name="user">

<label>Password</label>
<input type="password" name="Pwd">

<label>Address</label>
<textarea name="address" rows="4"></textarea>

<label>Gender</label>
<div class="inline">
    <input type="radio" name="gender" value="Male"> ชาย
    <input type="radio" name="gender" value="Female"> หญิง
</div>

<label>Hobby</label>
<div class="inline">
    <input type="checkbox" name="Hobby[]" value="อ่านหนังสือ"> อ่านหนังสือ
    <input type="checkbox" name="Hobby[]" value="ดูทีวี"> ดูทีวี
</div>

<label>Beverage</label>
<select name="beverage">
    <option>ICED TEA</option>
    <option>LEMON TEA</option>
    <option>COFFEE</option>
</select>

<div class="btn">
    <input type="submit" name="save" value="Save" class="save">
    <input type="reset" value="Cancel" class="cancel">
</div>

</form>
</div>

</body>
</html>

