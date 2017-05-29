<?php 
require "db.php"; 

$data = $_POST; 
if(isset($data['do_login'])) 
{ 
$errors = array(); 
$user = R::findOne('users', 'login = ?', array($data['login'])); 
if($user){ 

if ($data['password'] == $user->password){ 
$_SESSION['logged_user'] = $user; 
echo '<div style="color:green;">Вы успешно авторизованы!<br/> 
Можете перейти на <a href="index1.html">главную</a> страницу</div><hr>'; 
}else{ 

$errors[] = 'Неверно введен пароль!'; 
} 
} 
else{ 
$errors[] = 'Пользователь с таким логином не найден!'; 
} 
if(! empty($errors)) 
{ 
echo '<div style="color:red;">'.array_shift($errors).'</div><hr>'; 
} 
} 
?>
<style type="text/css">
     input {
	width: 280px;
	font-size: 14px;
	padding: 6px 0 4px 10px;
	border: 1px solid #cecece;
	background: #F6F6f6;
	border-radius: 8px;
      margin-left: 10px;
      
}
    button {
      font-weight: 600;
      color: white;
      text-decoration: none;
      padding: .8em 1em calc(.8em + 3px);
      border-radius: 3px;
      background: rgb(64,199,129);
      box-shadow: 0 -3px rgb(53,167,110) inset;
      transition: 0.2s;
        padding: 10px 40px;
      
} 
    button:hover { 
      background: rgb(53, 167, 110); 
    }
    button:active {
      background: rgb(33,147,90);
      box-shadow: 0 3px rgb(33,147,90) inset;
}
        .center{
        width: 300px; 
        padding: 0px; 
        margin: auto; 
        border: 3px solid rgb(64,199,129);
    } 
    .shapka{
        width: 300px;
        height: 35px;
        box-shadow: 0 -3px rgb(53,167,110) inset;
        background: rgb(64,199,129);
        margin-top: -20px;
    }
    .shapka>p{
        font-weight: 550;
        color: white;
        padding-top: 10px;
        font-size: 20px;
        text-align: center;
    }
    p{
        margin-left: 10px;
        text-align: center;
    }
    .vertical{
        margin-top: 100px;
    }
    body{
        background: url(img/fon1.jpg);
    }
</style>
<body>
<div class="vertical">
<div class="center">
<div class="shapka">
    <p>Вход:</p>
</div>
 <form action="login.php" method="POST">
    <p>
       <p>Логин:</p>
        <input type="text" name="login" value="<?php echo @$data['login']; ?>">
    </p>
    <p>
       <p>Пароль:</p>
        <input type="password" name="password" value="<?php echo @$data['password']; ?>">
    </p>
    <p>
        <button type="submit" name="do_login">Войти</button>
    </p>
</form>
</div>
</div>
</body>       

