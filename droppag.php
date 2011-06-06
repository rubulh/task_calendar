<?php   
require_once("/var/www/task_calendar/thekey.php");
?>


<?php
$chart=$_GET['chart'];

?>


<html>
<head>
<title>
drop entry
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
<h2><?php if(isset($_GET['message']))
{$message=$_GET['message'] ;echo"<hr><hr>$message<hr><hr>"; }?></h2>
<h2>
select the entry you want to drop
</h2>
<hr>
<table style="border:1;">
<tr>
<th>target chart</th>
<th>new priority</th>
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

$result=mysqli_query($cn,$query) or die('something wentquer wrong</h1><h2>go back and fix it');

$var=mysqli_affected_rows($cn) or die('something wentaffrow wrong</h1><h2>go back and fix it');

if($var)
{
while(false!=($row=mysqli_fetch_row($result)))
{ 
echo "<tr>";
?>
<form method=POST  action="http://localhost/task_calendar/apreview1.php">
<td><select name=target size=1 >
<option>top_on_list</option>
<option>week</option>
<option>fortnight</option>
<option>vision</option>
<option>emergency</option>
</select></td>
<td><input type=text size=2 maxlength=2 name=priorityfinal value=1></td>
<td>
<input type=hidden name=task value="drop">
<input type=hidden name=chart  value="<?=$chart?>">
<input type=hidden name=kick  value="<?=$row[0]?>">
<input type=submit name=submit value=drop>
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
