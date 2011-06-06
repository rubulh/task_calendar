<?php   
require_once("/var/www/task_calendar/thekey.php");
?>


<?php
$task=$_POST['task'];
$time=getdate();
$on_date="$time[mday]-$time[mon]-$time[year]";
$on_time="$time[hours]-$time[minutes]-$time[seconds]";
$priorityfinal=$_POST['priorityfinal'];
$chart=$_POST['chart'];
$target=$_POST['target'];
if($chart==$target){header("Location:http://localhost/task_calendar/droppag.php?chart=$chart&message=the initial and final list cannot be the same !");}

?>



<?php 
if($task=='add')
{
 if(!((trim($_POST['subject'])!="") &&(trim($_POST['description'])!="")))
 {
 header("Location:http://localhost/task_calendar/addpag.php/?message=you cannot leave the subject (or) description field blank !&chart=$chart");
 }
 else
 {
 $subject=$_POST['subject'];
 $description=$_POST['description'];
 $priority=$_POST['priority'];
 $due_date_year=$_POST['due_date_year'];
 $due_date_month=$_POST['due_date_month'];
 $due_date_day=$_POST['due_date_day'];
 if($due_date_month==2)
{
if($due_date_day==29 || $due_date_day==30)
$due_date_day==28;
if($due_date_day==31)
$due_date_day==28;
}
if($due_date_month==4 || $due_date_month==6 )
{
if($due_date_day==31)
$due_date_day==30;
}
if($due_date_month==9 || $due_date_month==11 )
{
if($due_date_day==31)
$due_date_day==30;
}

 $due_date="$due_date_day-$due_date_month-$due_date_year";
 $due_time_hours=$_POST['due_time_hours'];
 $due_time_minutes=$_POST['due_time_minutes'];
 $due_time_seconds=$_POST['due_time_seconds'];
 $due_time="$due_time_hours-$due_time_minutes-$due_time_seconds";
 }
}



if($task=='remove' || $task=='drop')
{
$kick=$_POST['kick'];
$cn=mysqli_connect('localhost',$user,$pass,'calendar') or die('something wentcon wrong</h1><h2>go back and fix it');

   $query="select * from $chart where kick=$kick";
   $result=mysqli_query($cn,$query) or die('something wentquer wrong</  h1><h2>go back and fix it');
   $row=mysqli_fetch_row($result);
   $subject=$row[2];
   $description=$row[3];
   $due_date=$row[7];
   $due_time=$row[6];
   $on_time=$row[4];
   $on_date=$row[5];
   $kick=$row[0];
   $priority=$row[1];

}
?>
<h1>
you chose to "<?=$task?>" this entry 
<?php 


   switch ($task) 
   {
    case "add":
        echo "into";
        break;
    case "remove":
        echo "from";
        break;
    case "drop":
        echo "from";
        break;
   }
?> the '<?=$chart?>'

<?php   if($task=='drop') {echo"  to the $target'";}  ?></h1>
<br>


<h2>SUBJECT:"<?=$subject?>"</h2>
<br>
<h2>DESCRIPTION:<br>
<fieldset>
"<?=$description?>"
</fieldset><br>
</h2>
<br>
<h2>due time=<?=$due_time?></h2>
<br>
<h2>due date=<?=$due_date?></h2>
<br>
<h2>priority=<?=$priority?></h2>
<br>
<?php
   if($task=='remove' || $task=='drop')
   {

?>
<br>
<h2>time added=<?=$on_time?></h2>
<br>
<h2>date added=<?=$on_date?></h2>


<?php
   }
  if($task=='drop')
  {echo"<hr><h2>new table:$target<br>priority:$priorityfinal</h2><hr>";}
?>
</div>
<div>

<pre>

  <?php if($task=='add')
  {?>
  <fieldset>
  <a href="http://localhost/task_calendar/confirm.php?subject=<?=$subject?>&description=<?=$description?>&task=<?=$task?>&chart=<?=$chart?>&priority=<?=$priority?>&due_date=<?=$due_date?>&due_time=<?=$due_time?>">
  confirm
  </a>
  </fieldset>
  <fieldset>
  <a href="http://localhost/task_calendar/addpag.php?subject=<?=$subject?>&description=<?=$description?>&task=<?=$task?>&chart=<?=$chart?>&priority=<?=$priority?>&due_date_year=<?=$due_date_year?>&due_date_month=<?=$due_date_month?>&due_date_day=<?=$due_date_day?>&due_time_hours=<?=$due_time_hours?>&due_time_minutes=<?=$due_time_minutes?>">
  edit
  </a>
  </fieldset>

<?php
   }
  if($task=='remove' || $task=='drop')
   {
?>
   <fieldset>
<a href="http://localhost/task_calendar/confirm.php?task=<?=$task?>&chart=<?=$chart?>&kick=<?=$kick?><?php if((isset($priorityfinal) && isset($target))){?>&target=<?=$target?>&priorityfinal=<?=$priorityfinal?>  <?php }?>">
confirm
</a>
  </fieldset>
  <fieldset>
<?php
         if($task=='remove')
         {

         ?><a href="http://localhost/task_calendar/rempag.php?chart=<?=$chart?>">
edit
         </a>
<?php
         }
?>
<?php
        if($task=='drop')
        {

        ?><a href="http://localhost/task_calendar/droppag.php?chart=<?=$chart?>">
edit
</a>
<?php
        }
?>

</fieldset>


<?
    }
?>

</pre>

</form>
</div>
