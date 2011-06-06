<?php   
require_once("/var/www/task_calendar/thekey.php");
?>
<body>
<hr>
<hr>
<div>
<h1>
rearrangement
</h1>
</div>
<hr>
<hr>
<?php
{
$counter=0;$moral="<hr><hr>";
$arr=array('schedule','week','fortnight','old');
$cn=mysqli_connect('localhost',$user,$pass,'calendar');
   foreach($arr as $chartini)
   {
   $query="SELECT * FROM $chartini";
   $result=mysqli_query($cn,$query);
   $var=mysqli_affected_rows($cn);
     if($var)
         {
         while(false!=($row=mysqli_fetch_row($result)))
              {
              $kick=$row[0];
              $priority=$row[1];
              $description=$row[3];
              $on_time=$row[4];
              $on_date=$row[5];
              $subject=$row[2];
              $due_date=$row[7];
              $due_time=$row[6];
              $thisday=time();
              $thatday=strtotime($due_date);
              $diff=$thisday-$thatday;
              $days=($diff/86400);
if($days>0)
                {   if(($days<4.00)&&($chartini!='schedule'))
                   {
                   
                   $deriv=substr($subject,0,20) or die('huh');
                   
$on_date=$row[5];
                   $queryd="delete from $chartini where kick=$kick";
                   $result=mysqli_query($cn,$queryd);
                   $querya="insert into schedule(priority,subject,description,on_date,on_time,due_date,due_time) values(1,'$subject','$description','$on_date','$on_time','$due_date','$due_time')";
                   $result1=mysqli_query($cn,$querya);
                   $counter=$counter+1; 
                   $moral.="<hr><hr><h3>replacement number $counter</h3><hr>priority:$priority<br>subject:$deriv<br><hr>moved from $chartini to schedule<hr><hr>";

                 }
                   if((($days>4.00)&&($days<7.00))&&($chartini!='week'))
                   {
                   
                   $deriv=substr($subject,0,20) or die('huh');
                   
                   $queryd="delete from $chartini where kick=$kick";
                   $result=mysqli_query($cn,$queryd);
                   $querya="insert into week(priority,subject,description,on_date,on_time,due_date,due_time) values(1,'$subject','$description','$on_date','$on_time','$due_date','$due_time')";
                   $result1=mysqli_query($cn,$querya);
                   $counter=$counter+1; 
                   $moral.="<hr><hr><h3>replacement number $counter</h3><hr>priority:$priority<br>subject:$deriv<br><hr>moved from $chartini to week<hr><hr>";

                 }
                   if((($days>7.00)&&($days<15.00))&&($chartini!='fortnight'))
                 {

                 $deriv=substr($subject,0,20) or die('huh');
                 
                 $queryd="delete from $chartini where kick=$kick";
                 $result=mysqli_query($cn,$queryd);
                 $querya="insert into fortnight(priority,subject,description,on_date,on_time,due_date,due_time) values(1,'$subject','$description','$on_date','$on_time','$due_date','$due_time')";
                 $result1=mysqli_query($cn,$querya);
                 $counter=$counter+1; 
                 $moral.="<hr><hr><h3>replacement number $counter</h3><hr>priority:$priority<br>subject:$deriv<br><hr>moved from $chartini to fortnight<hr><hr>";



                 }


                 if(($days>15.00)&&($chartini!='old'))
                 {

                 $deriv=substr($subject,0,20) or die('huh');
                
                 $queryd="delete from $chartini where kick=$kick";
                 $result=mysqli_query($cn,$queryd);
                 $querya="insert into old(priority,subject,description,on_date,on_time,due_date,due_time) values(1,'$subject','$description','$on_date','$on_time','$due_date','$due_time')";
                 $result1=mysqli_query($cn,$querya);
                 $counter=$counter+1; 
                 $moral.="<hr><hr><h3>replacement number $counter</h3><hr>priority:$priority<br>subject:$deriv<br><hr>moved from $chartini to old<hr><hr>";



                 }



              }
              }
          }



     }
if($counter>0)
{echo"<hr><hr><hr><h1>the following entries have been rearranged</h1><hr><hr><hr>";}
echo"$moral";
}
if ($counter==0)
echo "<fieldset><h3>you list is alredy in proper sequence<br>no rearrangements required</h3></fieldset>";
?>


<h2>
<a href="http://localhost/task_calendar/pag2.php/">home</a>
</h2>
</body>


