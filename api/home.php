<form action="login/login" method="post">

<input type="text" name="name"><br><br>

<input type="text" name="email"><br><br>

<input type="text" name="cpf"><br><br>

<input type="text" name="password"><br><br>

<input type="submit">

</form> <br><br><br><br>
<form action="login/login" method="post">

<input type="text" name="email"><br><br>

<input type="text" name="password"><br><br>

<input type="submit">

</form>

<br><br><br><br>

<?php
echo $_SESSION['message'][1];
unset($_SESSION['message']);
?>