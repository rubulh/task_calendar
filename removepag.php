<?php
$chart=$_GET['chart'];

?>
<?php   
require_once("/var/www/task_calendar/thekey.php");
?>

<html>
<head>
<title>
remove entry
</title>
<style type="text\css">
</style>
</head>
<body>
<div>
<h1>
chart:<?=$chart?>
<br>
<hr>
</h1>
<h2>
select the entry you want to remove
</h2>
<hr>
<table style="border:1;">
<tr>

<?php   
require_once("/var/www/task_calendar/thekey.php");
?>
<th>act</th>
<th>priority</th>
<th>time created</th>
<th>date created</th>
<th>due time</th>
<th>due date</th>
<th>subject</th>

</tr>
<?php
$cn=mysqli_connect('localhost',$user,$pass,'calendar') or die('something wentcon wrong</h1><h2>go back and fix it');
$query="SELECT * FROM $chart";

$result=mysqli_query($cn,$query);

$var=mysqli_affected_rows($cn);

if($var)
{
while(false!=($row=mysqli_fetch_row($result)))
{ 
echo "<tr>";
?>
<form method=POST  action="http://localhost/task_calendar/apreview1.php">


<td>
<input type=hidden name=task value="remove">
<input type=hidden name=chart  value="<?=$chart?>">
<input type=hidden name=kick  value="<?=$row[0]?>">
<input type=submit name=submit value=remove>
</td>

</form>
<?php
echo"<td>$row[1]</td>";
echo"<td>$row[4]</td>";
echo"<td>$row[5]</td>";
echo"<td>$row[6]</td>";
echo"<td>$row[7]</td>";
$temp=$row[2];
$deriv=substr($temp,0,20) or die('huh');
echo"<td>$deriv</td>";
echo"</tr>";
}
}
?>
</table>
</div>
</body>
</html>
