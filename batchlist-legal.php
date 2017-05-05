<html>
<head>
<basefont face="Verdana">
</head>

<body>

<!-- standard page header begins -->
<!--<p>&nbsp;<p> -->

<table width="100%" cellspacing="0" cellpadding="5">
<!--<tr>
    <td></td>
</tr>-->
<tr>
    <td bgcolor="Navy"><font size="-1" color="White">
    <b>Legal Extract Request Management Tool</b></font>
    </td>
</tr>
</table>
<font size="-2"><a href="batchadd-legal.php">Add New Extract Request</a></font>
<!-- standard page header ends -->

<?php
// includes
include('conf.php');
$dbn = $db;
// include('functions.php'); do not need this function

// open database connection
$connection = mysql_connect($host, $user, $pass) or die ('Unable to connect!');

// select database
mysql_select_db($dbn) or die ('Unable to select database!');

// generate and execute query
$query = "SELECT jid, jobid, jobtype, entrystamp, db, status FROM alljobs ORDER BY jid DESC";

$result = mysql_query($query) or die ("Error in query: $query. " . mysql_error());

// if records present
if (mysql_num_rows($result) > 0)
{
      // iterate through resultset
      // print title with links to edit and delete scripts
      ?>
      <table width="100%" cellspacing="0" cellpadding="5">
      <tr>
      <td width=300><font size="-2"><b>Job ID</b></font></td> 
      <td width=50><font size="-2"><b>Job Type</b></font></td>
      <td width=130><font size="-2"><b>Entered</b></font></td>
      <td width=150><font size="-2"><b>Status</b></font></td>
      </tr>
      <?php
      while($row = mysql_fetch_object($result))
      {
      ?>
      <tr>
      <td width=300><font size="-2"><a href="batchstory-legal.php?id=<?php echo $row->jid; ?>"><?php echo $row->jobid; ?></font></td> 
      <td width=50><font size="-2"><?php echo $row->jobtype; ?></font></td>
      <td width=130><font size="-2"><?php echo $row->entrystamp; ?></font></td>
      <td width=150><font size="-2"><?php echo $row->status; ?></font></td>
      <td><font size="-2"><a href="batchedit-legal.php?id=<?php echo $row->jid; ?>">edit</a> | <a href="batchdelete-legal.php?id=<?php echo $row->jid; ?>">delete</a></font></td>
      </tr>
      <?php
      }
?>
</table>
<?php
}
// if no records present
// display message
else
{
?>
      <font size="-1">There are no extract requests currently available to display!</font><p>
<?php
}

// close connection
mysql_close($connection);
?>
<font size="-2"><a href="batchadd-legal.php">Add New Extract Request</a></font>

<!-- standard page footer begins -->
<p>
<table width="100%" cellspacing="0" cellpadding="5">
<tr>
    <td align="center"><font size="-2">
    </td>
</tr>
</table>
<!-- standard page footer ends -->

</body>
</html>
