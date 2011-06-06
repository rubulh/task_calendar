
<html>
<body>

<?php
$priority=1;

$chart=$_GET['chart'];
$message=$_GET['message'];
if(isset($_GET['message']))
{echo "<div align=center><h1>$message</h1></div>";}



?>

<h1>add to <?=$chart?></h1>
<form method=POST action="http://localhost/task_calendar/apreview1.php">

<input type=hidden name=task size=90 maxlength=60 value="add">
<input type=hidden name=chart size=90 maxlength=60 value="<?=$chart?>">
<br>
subject
<br>
<?php
if(isset($_GET['subject']) && isset($_GET['description']))
{$subject=$_GET['subject'];$description=$_GET['description'];
$priority=$_GET['priority'];$due_date_year=$_GET['due_date_year'];$due_date_month=$_GET['due_date_month'];$due_date_day=$_GET['due_date_day'];$due_time_hours=$_GET['due_time_hours'];$due_time_minutes=$_GET['due_time_minutes'];}
?>
<input type=text name=subject size=90 maxlength=60 value="<?php echo $subject;?>"><br>
desciption<br>
<textarea name=description rows=6 cols=40 ><?php echo $description;?></textarea>
<br>
<hr>
DUE DATE
<BR>
day
<select name=due_date_day size=1 value="<?php echo $due_date_day;?>">
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
<option>7</option>
<option>8</option>
<option>9</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
<option>21</option>
<option>22</option>
<option>23</option>
<option>24</option>
<option>25</option>
<option>26</option>
<option>27</option>
<option>28</option>
<option>29</option>
<option>30</option>
<option>31</option>
</select>
month
<select name=due_date_month size=1 value="<?php echo $due_date_month;?>">
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
<option>7</option>
<option>8</option>
<option>9</option>
<option>10</option>
<option>11</option>
<option>12</option>
</select>
year
<select name=due_date_year size=1 value="<?php echo $due_date_year;?>">
<option>2011</option>
<option>2012</option>
<option>2013</option>
<option>2014</option>
<option>2015</option>
<option>2016</option>
<option>2017</option>
<option>2018</option>
<option>2019</option>
<option>2020</option>
<option>2021</option>
<option>2022</option>
<option>2023</option>
<option>2024</option>
<option>2025</option>
<option>2026</option>
<option>2027</option>
<option>2028</option>
<option>2029</option>

</select>

<br>
<hr>
DUE_TIME
<br>

hours
<select name=due_time_hours size=1 value="<?php echo $due_time_hours;?>">
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
<option>7</option>
<option>8</option>
<option>9</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
<option>21</option>
<option>22</option>
<option>23</option>
<option>24</option>
</select>
minutes
<select name=due_time_minutes size=1 value="<?=$due_time_minutes?>">
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
<option>7</option>
<option>8</option>
<option>9</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
<option>21</option>
<option>22</option>
<option>23</option>
<option>24</option>
<option>25</option>
<option>26</option>
<option>27</option>
<option>28</option>
<option>29</option>
<option>30</option>
<option>31</option>
<option>32</option>
<option>33</option>
<option>34</option>
<option>35</option>
<option>36</option>
<option>37</option>
<option>38</option>
<option>39</option>
<option>40</option>
<option>41</option>
<option>42</option>
<option>43</option>
<option>44</option>
<option>45</option>
<option>46</option>
<option>47</option>
<option>48</option>
<option>49</option>
<option>50</option>
<option>51</option>
<option>52</option>
<option>53</option>
<option>54</option>
<option>55</option>
<option>56</option>
<option>57</option>
<option>58</option>
<option>59</option>
<option>60</option>
</select>
<br>
<input type=hidden name=due_time_seconds value=00>
<hr>
priority

<input type=text name=priority size=03 maxlength=03 value="<?php echo $priority;?>"><br>
<br>
<input type=submit name=submit value=s-u-b-m-i-t>

</form>

<?php

?>
</body>
</html>
