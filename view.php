<?php   
require_once("/var/www/task_calendar/thekey.php");
?>

<?php
$chart=$_GET['chart'];
?>

<html>
<head>
<title>
<?=$chart?>
</title>
</head>
<body>
<h1><?=$chart?></h1>
<table style="border:1;">
<tr>

<th>priority</th>
<th>time created</th>
<th>date created</th>
<th>due time</th>
<th>due date</th>
<th>subject</th>
</tr>
<?php
$cn=mysqli_connect('localhost',$user,$pass,'calendar');
$query="SELECT * FROM $chart";

$result=mysqli_query($cn,$query);

$var=mysqli_affected_rows($cn);
$counter=0;
if($var)
{
while(false!=($row=mysqli_fetch_row($result)))
{ $counter=5;
echo "<tr>";
echo"<td>$row[1]</td>";
echo"<td>$row[4]</td>";
echo"<td>$row[5]</td>";
echo"<td>$row[6]</td>";
echo"<td>$row[7]</td>";
$temp=$row[2];//var_dump($temp);
$deriv=substr($temp,0,20) or die('huh');
echo"<td>$deriv</td>";
echo"</tr>";
}
}
?>
</table>
<?php
if($counter==0)echo"$counter<hr><h2>there are no entries to display</h2><hr>";?>
<hr>
<hr>
<hr>
<div align=center>
<h1>actions</h1>
<hr>
</div>
<hr>
<div>
<pre>
<a href="http://localhost/task_calendar/addpag.php?chart=<?=$chart?>"> add</a>        <a href="http://localhost/task_calendar/removepag.php?chart=<?=$chart?>">remove</a>      <a href="http://localhost/task_calendar/droppag.php?chart=<?=$chart?>">drop</a>     <a href="http://localhost/task_calendar/pag2.php/"> home</a>
</pre>
</div>
<hr>
<hr>
<hr>

</body>
</html>



