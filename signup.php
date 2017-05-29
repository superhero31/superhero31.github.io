<?php
     require "db.php";

$data = $_POST;
if(isset($data['do_signup']))
{
    //здесь регистрируем
    $errors = array();
    if(trim($data['login']) == '')
    {
        $errors[] = 'Введите логин!';
    }
    if(trim($data['email']) == '')
    {
        $errors[] = 'Введите Email!';
    }
    if(trim($data['password']) == '')
    {
        $errors[] = 'Введите пароль!';
    }
    if($data['password2'] != $data['password'])
    {
        $errors[] = 'Повторный пароль введён не верно!';
    }
    if(R::count('users', "login = ?", array($data['login']))>0)
    {
        $errors[] = 'Пользователь с таким логином уже существует!';
    }
    if(R::count('users', "email = ?", array($data['email']))>0)
    {
        $errors[] = 'Пользователь с таким email уже существует!';
    }
    
    
    if(empty($errors))
    {
        //всё хорошо, регистрируем
        $user = R::dispense('users');
        $user->login = $data['login'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        R::store($user);
        echo '<div style="color:green;">Поздравляем, вы успешно зарегистрированы!<br/>
        Можете перейти к <a href="login.php">авторизации.</a></div><hr>';
    }
    else
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
        margin-left: 55px;
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
    <p>Регистрация:</p>
</div>
<form action="signup.php" method="POST">
    <p>
       <p>Ваш логин:</p>
        <input type="text" name="login" value="<?php echo @$data['login']; ?>">
    </p>
    
     <p>
       <p>Ваш email:</p>
        <input type="email" name="email" value="<?php echo @$data['email']; ?>">
    </p>
    
    <p>
       <p>Ваш пароль:</p>
        <input type="password" name="password" value="<?php echo @$data['password']; ?>">
    </p>
    
    <p>
       <p>Введите ваш пароль ещё раз:</p>
        <input type="password" name="password2" value="<?php echo @$data['password2']; ?>">
    </p>
    
    <p>
        <button type="submit" name="do_signup">Зарегистрироваться</button>
    </p>
    
</form>
</div>
</div>
</body>