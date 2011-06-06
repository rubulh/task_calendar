<?php
if(isset($_GET['huh']))
{
echo"<fieldset><h1>FORBIDDEN</h1></fieldset>";
echo"<hr><hr><hr><h1>could not fetch mysql username and password</h1><hr><hr><hr><h2>did you enter correct mysql user name and password in the page /var/www/task_calendar/thekey.php</h2><hr><hr><h1>enter correct mysql user name and password in the page /var/www/task_calendar/thekey.php</h1>";
}

else
{
?>






<div align=center>
<h2>
This is the introduction page of the application.
<br>
<hr>
<h1>
this calendar application will allow you to manage and keep up with your daily tasks
<br>
</h1>
<pre>
if anything went wrong during the installation contact<b>rubulhaloi2007@gmail.com</b> for troubleshooting.
</pre>
</div>
<fieldset align=center>
<h2>
<a href="http://localhost/task_calendar/pag2.php/">
HOMEPAGE
</a>
</h2>
</fieldset>

<?php
}

?>
