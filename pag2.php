<?php   
require_once("/var/www/task_calendar/thekey.php");
?>


<?php
$time=getdate();
$on_date="$time[mday]-$time[mon]-$time[year]";
$on_time="$time[hours]-$time[minutes]-$time[seconds]";
$cn=mysqli_connect('localhost',$user,$pass,'calendar') or die('something wentcon wrong</h1><h2>go back and fix it');
?>


<html>
<head>
</head>
<body>
<h1>
introduction page
</h1>
<div>
<ul>
<li>to see yesterday finished
<li>to see yesterday continuing
<li>to see todays due<li>to see pending
<li>to see today overwork

</ul>
</div>
<hr>
<hr>
<div>
<h2><pre> date:<?= $on_date?>                        time:<?= $on_time?></pre></h2>
<hr><hr>
<DIV ALIGN=CENTER>
<h1 style="font-size:2.5em;"><form method=POST action="http://localhost/task_calendar/rearrange.php"><input type=submit name=rearrange value="R E A R R A N G E "></form></h1>
</DIV>
<hr><hr>
<div>
<h2><pre><a href="http://localhost/task_calendar/view.php?chart=top_on_list">top on_list</a>                     <a href="http://localhost/task_calendar/addpag.php?chart=top_on_list">add</a>                     <a href="http://localhost/task_calendar/removepag.php?chart=top_on_list">remove</a>                 <a href="http://localhost/task_calendar/droppag.php?chart=top_on_list">drop to another list</a></pre></h2>
<br>
<ol>

<?php
$query="SELECT * FROM top_on_list";
$result=mysqli_query($cn,$query);

$var=mysqli_affected_rows($cn);
$i=0;
if($var)
{
while(false!=($row=mysqli_fetch_row($result)))
{$i=$i+1;
if($i==5)break;

echo"<li>$row[2]</li>";
}
}
if($i==0){echo"<br>no entries in here !<br>";}
?>
</ol>
</div>


<hr><hr>
<div>
<h2><pre><a href="http://localhost/task_calendar/view.php?chart=schedule">schedule</a>             <a href="http://localhost/task_calendar/addpag.php?chart=schedule">add</a>                      <a href="http://localhost/task_calendar/removepag.php?chart=schedule">remove</a>                 <a href="http://localhost/task_calendar/droppag.php?chart=schedule">drop to another list</a></pre></h2>
<br>
<ol>
<?php
$query="SELECT * FROM schedule";
$result=mysqli_query($cn,$query);

$var=mysqli_affected_rows($cn) ;
$i=0;
if($var)
{
while(false!=($row=mysqli_fetch_row($result)))
{$i=$i+1;
if($i==5)break;

echo"<li>$row[2]</li>";
}
}
if($i==0){echo"<br>no entries in here !<br>";}
?>
</ol>
</div>



<hr><hr>

<div>
<h2><pre><a href="http://localhost/task_calendar/view.php?chart=week">pending from this week</a>             <a href="http://localhost/task_calendar/addpag.php?chart=week">add</a>                      <a href="http://localhost/task_calendar/removepag.php?chart=week">remove</a>                 <a href="http://localhost/task_calendar/droppag.php?chart=week">drop to another list</a></pre></h2>
<br>
<ol>
<?php
$query="SELECT * FROM week";
$result=mysqli_query($cn,$query);

$var=mysqli_affected_rows($cn) ;
$i=0;
if($var)
{
while(false!=($row=mysqli_fetch_row($result)))
{$i=$i+1;
if($i==5)break;

echo"<li>$row[2]</li>";
}
}
if($i==0){echo"<br>no entries in here !<br>";}
?>
</ol>
</div>
<hr><hr>
<div>
<h2><pre><a href="http://localhost/task_calendar/view.php?chart=fortnight">pending from fortnight</a>            <a href="http://localhost/task_calendar/addpag.php?chart=fortnight">add</a>                      <a href="http://localhost/task_calendar/removepag.php?chart=fortnight">remove</a>                 <a href="http://localhost/task_calendar/droppag.php?chart=fortnight">drop to another list</a></pre></h2>
<br>
<ol>
<?php
$query="SELECT * FROM fortnight";
$result=mysqli_query($cn,$query);

$var=mysqli_affected_rows($cn);
$i=0;
if($var)
{
while(false!=($row=mysqli_fetch_row($result)))
{$i=$i+1;
if($i==5)break;

echo"<li>$row[2]</li>";
}
}
if($i==0){echo"<br>no entries in here !<br>";}
?>
</ol>
</div>
<hr><hr>
<div>
<h2><pre><a href="http://localhost/task_calendar/view.php?chart=old">old</a>             <a href="http://localhost/task_calendar/addpag.php?chart=old">add</a>                      <a href="http://localhost/task_calendar/removepag.php?chart=old">remove</a>                 <a href="http://localhost/task_calendar/droppag.php?chart=old">drop to another list</a></pre></h2>
<br>
<ol>
<?php
$query="SELECT * FROM old";
$result=mysqli_query($cn,$query);

$var=mysqli_affected_rows($cn) ;
$i=0;
if($var)
{
while(false!=($row=mysqli_fetch_row($result)))
{$i=$i+1;
if($i==5)break;

echo"<li>$row[2]</li>";
}
}
if($i==0){echo"<br>no entries in here !<br>";}
?>
</ol>
</div>




<hr><hr>
<div>
<h2><pre><a href="http://localhost/task_calendar/view.php?chart=vision">vision needs</a>          <a href="http://localhost/task_calendar/addpag.php?chart=vision">add</a>                <a href="http://localhost/task_calendar/removepag.php?chart=vision">remove</a>                <a href="http://localhost/task_calendar/droppag.php?chart=vision">drop to another list</a></pre></h2>
<br>
<ol>
<?php
$query="SELECT * FROM vision";
$result=mysqli_query($cn,$query);

$var=mysqli_affected_rows($cn);
$i=0;
if($var)
{
while(false!=($row=mysqli_fetch_row($result)))
{$i=$i+1;
if($i==5)break;

echo"<li>$row[2]</li>";
}

}
if($i==0){echo"<br>no entries in here !<br>";}
?>
</ol>
</div>
<hr><hr>
<h2><pre><a href="http://localhost/task_calendar/view.php?chart=emergency">emergency needs</a>               <a href="http://localhost/task_calendar/addpag.php?chart=emergency">add</a>              <a href="http://localhost/task_calendar/rempag.php?chart=emergency">remove</a>                 <a href="http://localhost/task_calendar/droppag.php?chart=emergency">drop to another list</a></pre></h2>
<br>
<ol>
<?php
$query="SELECT * FROM emergency";
$result=mysqli_query($cn,$query);

$var=mysqli_affected_rows($cn);
$i=0;
if($var)
{
while(false!=($row=mysqli_fetch_row($result)))
{$i=$i+1;
if($i==5)break;

echo"<li>$row[2]</li>";
}
}
if($i==0){echo"<br>no entries in here !<br>";}
?>
</ol>
</div>
</body>
</html>
