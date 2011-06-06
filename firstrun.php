<?php


if(isset($_POST['submit']) && ((isset($_POST['pass']))&&(isset($_POST['user']))))
{echo"<ul><hr>";
$pass=$_POST['pass'];
$username=$_POST['user'];
$cn=mysqli_connect(localhost,$username,$pass);
if($cn){echo"<br><li>SUCCESS:connected to mysql server<hr>";}
else{echo"<br><li>FAILURE: could not connect to mysql server<hr>";}
$querycreatedb="CREATE DATABASE calendar";
$resulquerycreatedb=mysqli_query($cn,$querycreatedb);
if($resulquerycreatedb){echo"<br><li>SUCCESS:database created in mysql server<hr>";}
else{echo"<br><li>FAILURE:could not create database in mysql server<hr>";}
$resulseldb=mysqli_select_db($cn,'calendar');
if($resulseldb){echo"<br><li>SUCCESS:database selected in mysql server<hr>";}
else{echo"<br><li>FAILURE:could not select database in mysql server<hr>";}

$anot=array('top_on_list','week','old','fortnight','schedule','vision','emergency');
foreach($anot as $dnot)
{
$tableq="CREATE TABLE $dnot(
kick INT( 3 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
priority INT( 3 ) NOT NULL ,
subject TEXT NOT NULL ,
description TEXT NOT NULL ,
on_time VARCHAR( 9 ) NOT NULL ,
on_date VARCHAR( 11 ) NOT NULL ,
due_time VARCHAR( 9 ) NOT NULL ,
due_date VARCHAR( 11 ) NOT NULL
)
 ";
$resulttab=mysqli_query($cn,$tableq);
if($resulttab){echo"<br><li>SUCCESS:table $dnot created in calendar<hr>";}
else{echo"<br><li>FAILURE:could not create table $dnot in calendar<hr>";}

}
}
?>


<body>
<h1>
if all the tasks above show SUCCESS
</h1>
<fieldset > <H3>
<br>
<a href="http://localhost/task_calendar/intro.php?use=<?=$username?>&wrd=<?=$pass?>">
CLICK HERE</a>
</fieldset> 
</H3>
<pre>
if anything went wrong during the installation contact<b>rubulhaloi2007@gmail.com</b> for troubleshooting.
</pre>

</body>
