<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title>Poranan Form</title>

<style>
@import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600&display=swap');

/* 🌈 RGB พื้นหลัง */
body{
    margin:0;
    min-height:100vh;
    font-family:'Orbitron', sans-serif;
    background:
        linear-gradient(270deg,
            #ff0000,
            #ff9900,
            #ffff00,
            #00ff00,
            #00ffff,
            #0000ff,
            #ff00ff,
            #ff0000
        );
    background-size:800% 800%;
    animation: rgbMove 12s linear infinite;
}

/* RGB animation */
@keyframes rgbMove{
    0%{background-position:0% 50%;}
    100%{background-position:100% 50%;}
}

/* 🌟 Emoji background */
body::before{
    content:"🔥 ⚡ 💻 🎮 🌈 ";
    position:fixed;
    inset:0;
    font-size:40px;
    opacity:0.08;
    pointer-events:none;
    animation: emojiFloat 20s linear infinite;
}

/* Emoji ลอย */
@keyframes emojiFloat{
    from{transform:translateY(0);}
    to{transform:translateY(-200px);}
}

/* 🧱 กล่อง Neon */
.box{
    width:620px;
    margin:70px auto;
    padding:30px;
    background:rgba(0, 0, 0, 0.65);
    border-radius:16px;
    box-shadow:
        0 0 15px #00ffff50,
        0 0 30px #ff00ff52;
    color:white;
}

/* หัวข้อ */
h2{
    text-align:center;
    color:#00ffff;
    text-shadow:0 0 10px #00ffff;
    letter-spacing:3px;
}

/* label */
label{
    margin-top:14px;
    display:block;
    color:#ffddff;
}

/* input */
input, textarea, select{
    width:100%;
    margin-top:6px;
    padding:10px;
    border:none;
    border-radius:8px;
    background:#111;
    color:#00ffff;
    font-family:'Orbitron', sans-serif;
}

/* radio checkbox */
.inline{
    margin-top:6px;
}
.inline input{
    width:auto;
}

/* ปุ่ม RGB */
.btn{
    text-align:center;
    margin-top:25px;
}
.btn input{
    width:140px;
    padding:10px;
    border:none;
    border-radius:30px;
    font-family:'Orbitron', sans-serif;
    cursor:pointer;
    background: linear-gradient(90deg,#ff00ff,#00ffff,#ffff00);
    background-size:300%;
    animation: btnRGB 3s linear infinite;
}

@keyframes btnRGB{
    0%{background-position:0%;}
    100%{background-position:100%;}
}
</style>
</head>

<body>
<div class="box">
<h2>🚀 DATA RECORDING 🚀</h2>

<form method="post" action="from2.php">

<label>👤 USERNAME</label>
<input type="text" name="user">

<label>🔐 PASSWORD</label>
<input type="password" name="Pwd">

<label>🏠 ADDRESS</label>
<textarea name="address"></textarea>

<label>⚧ GENDER</label>
<div class="inline">
    <input type="radio" name="gender" value="Male"> Male
    <input type="radio" name="gender" value="Female"> Female
</div>

<label>🎯 HOBBY</label>
<div class="inline">
    <input type="checkbox" name="Hobby[]" value="อ่านหนังสือ"> 📚book
    <input type="checkbox" name="Hobby[]" value="ดูทีวี"> 📺TV
</div>

<label>☕ BEVERAGE</label>
<select name="beverage">
    <option>ICED TEA</option>
    <option>LEMON TEA</option>
    <option>COFFEE</option>
</select>

<div class="btn">
    <input type="submit" name="save" value="SAVE">
    <input type="reset" value="CANCEL">
</div>

</form>
</div>
</body>
</html>



