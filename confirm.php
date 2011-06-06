<?php   
require_once("/var/www/task_calendar/thekey.php");
?>

<?php
{
$chart=$_GET['chart'];
$subject=$_GET['subject'];
$task=$_GET['task'];
$description=$_GET['description'];
$time=getdate();
$on_date="$time[mday]-$time[mon]-$time[year]";
$on_time="$time[hours]-$time[minutes]-$time[seconds]";
$priority=$_GET['priority'];
$due_date=$_GET['due_date'];
$due_time=$_GET['due_time'];
$target=$_GET['target'];
$priorityfinal=$_GET['priorityfinal'];
$kick=$_GET['kick'];

}
?>


<html>
<head>
<title>
done
</title>
</head>
<body>
<?php
$cn=mysqli_connect('localhost',$user,$pass,'calendar') or die('something wentcon wrong</h1><h2>go back and fix it');



if($task=='remove' || $task=='drop')
{
$query="select * from $chart where kick=$kick";
$result=mysqli_query($cn,$query) or die('something wentquer wrong</h1><h2>go back and fix it');
$row=mysqli_fetch_row($result);
$subject=$row[2];
$description=$row[3];
$due_date=$row[7];
$due_time=$row[6];
$on_time=$row[4];
$on_date=$row[5];
$priority=$row[1];
$kick=$row[0];



}
if($task=='remove')
{
$query="delete from $chart where kick=$kick";
$result=mysqli_query($cn,$query) or die('something wentquer wrong</h1><h2>go back and fix it');
$out=mysqli_affected_rows($cn);

}
if($task=='drop')
{
$query="delete from $chart where kick=$kick";
$result=mysqli_query($cn,$query) or die('something wentquer wrong</h1><h2>go back and fix it');
$out=mysqli_affected_rows($cn);
$query1="insert into $target(priority,subject,description,on_date,on_time,due_date,due_time) values('$priorityfinal','$subject','$description','$on_date','$on_time','$due_date','$due_time')";
$result1=mysqli_query($cn,$query1) or die('something wentquer wrong</h1><h2>go back and fix it');
$out1=mysqli_affected_rows($cn);
}


if($task=="add")
{

$query2="INSERT INTO $chart(priority,subject,description, on_time, on_date,due_time,due_date) VALUES ($priority,'$subject','$description','$on_time','$on_date','$due_time','$due_date')";

$result2=mysqli_query($cn,$query2) or die(mysql_error());
$out2=mysqli_affected_rows($cn);
}

?>



<h1>
the task has been <?=$task?>ed
</h1>
<hr>
<h2>
<?php
if($task=='add')
{echo "<br> into the $chart";}
?>
</h2>
<h2>
<h2>
<?php
if($task=='remove')
{echo "<br> from the $chart";}
?>
</h2>
<h2>
<?php
if($task=='drop')
{echo "<br>from the $chart to the $target with priority=$priorityfinal";}
?>
</h2>
<hr>
<?php
echo"subject:<br><h2>$subject</h2><hr>";
echo"description:<br><h2>$description</h2><hr>";
echo"on_time:<h2>$on_time</h2><br>";
echo"on_date:<h2>$on_date</h2><br>";
echo"due_date:<h2>$due_date</h2><br>";
echo"due_time:<h2>$due_time</h2><br>";
echo"priority:<h2>$priority</h2><br><hr><hr>";
if($task=='drop')
{echo "<br><h2>target chart :$target <br>new priority=$priorityfinal<br></h2>";}
?>

<hr>
<hr>
<a href="http://localhost/task_calendar/view.php?chart=<?=$chart?>">view</a>
<br>
<hr>
<hr>
<a href="http://localhost/task_calendar/pag2.php/">home</a>
<br>

</body>
</html>
