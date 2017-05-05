<html>
<head>
<basefont face="Verdana">
</head>

<body>

<!-- standard page header begins -->

<table width="100%" cellspacing="0" cellpadding="5">
<tr>
    <td bgcolor="Navy"><font size="-1" color="White">
    <b>Legal Extract Request Management Tool - Browse Mode</b></font>
    </td>
</tr>
</table>
<!-- standard page header ends -->

<?php
// includes
include('conf.php');
include('functions.php');
$dbn = $db;

// check for record ID
if ((!isset($_GET['id']) || trim($_GET['id']) == '')) 
{ 
  die('Missing record ID!'); 
}

// open database connection
$connection = mysql_connect($host, $user, $pass) or die ('Unable to connect!');

// select database
mysql_select_db($dbn) or die ('Unable to select database!');

// generate and execute query
$id = $_GET['id'];
$query = "SELECT jobid,jobtype,entrystamp,updatestamp,db,startdate,syear,enddate,year,vmake,ucc,yr,vline,vplant,vengine,status,vehtype,area FROM alljobs WHERE jid = '$id'";

$result = mysql_query($query) 
or die ("Error in query: $query. " . mysql_error());

// get resultset as object
$row = mysql_fetch_object($result);

// print details
if ($row)
{
?>
<table cellspacing="5" cellpadding="5">
<tr>
    <td valign="top"><b><font size="-1">Job ID</font></b></td>
    <td>
      <input size="15" maxlength="15" type="text" name="jobid" value="<?php echo $row->jobid; ?>">
    </td>
</tr>
<tr>
    <td valign="top"><b><font size="-1">Job Type</font></b></td>
    <td>
      <input size="6" maxlength="6" type="text" name="jobtype" value="<?php echo $row->jobtype; ?>">
    </td>
</tr>
<tr>
    <td valign="top"><b><font size="-1">Entry Stamp</font></b></td>
    <td>
      <input size="25" maxlength="25" type="text" name="entrystamp" value="<?php echo $row->entrystamp; ?>">
    </td>
</tr>
<tr>
    <td valign="top"><b><font size="-1">Last Updated</font></b></td>
    <td>
      <input size="25" maxlength="25" type="text" name="updatestamp" value="<?php echo $row->updatestamp; ?>">
    </td>
</tr>
<tr>
    <td valign="top"><b><font size="-1">Database</font></b></td>
    <td>
      <input size="6" maxlength="6" type="text" name="db" value="<?php echo $row->db; ?>">
    </td>
</tr>
<tr>
    <td valign="top"><b><font size="-1">Start Date (MM-DD)</font></b></td>
    <td>
      <input size="5" maxlength="5" type="text" name="startdate" value="<?php echo $row->startdate; ?>">
    </td>
</tr>
<tr>
    <td valign="top"><b><font size="-1">Start Year (YYYY)</font></b></td>
    <td>
      <input size="4" maxlength="4" type="text" name="syear" value="<?php echo $row->syear; ?>">
    </td>
</tr>
<tr>
    <td valign="top"><b><font size="-1">End Date (MM-DD)</font></b></td>
    <td>
      <input size="5" maxlength="5" type="text" name="enddate" value="<?php echo $row->enddate; ?>">
    </td>
</tr>
<tr>
    <td valign="top"><b><font size="-1">End Year (YYYY)</font></b></td>
    <td>
      <input size="4" maxlength="4" type="text" name="year" value="<?php echo $row->year; ?>">
    </td>
</tr>
<tr>
    <td colspan=2 valign="top"><b><font size="-1">---------------------------------------------------------------------------------------------------------------</font></b></td>
</tr>
<tr>
    <td valign="top"><b><font size="-1">Vehicle Make</font></b></td>
    <td>
      <input size="200" maxlength="255" type="text" name="vmake" value="<?php echo $row->vmake; ?>">
    </td>
</tr>
<tr>
    <td valign="top"><b><font size="-1">Model Year</font></b></td>
    <td>
      <input size="125" maxlength="255" type="text" name="yr" value="<?php echo $row->yr; ?>">
    </td>
</tr>
<tr>
    <td valign="top"><b><font size="-1">UCC</font></b></td>
    <td>
      <input size="200" maxlength="255" type="text" name="ucc" value="<?php echo $row->ucc; ?>">
    </td>
</tr>
<tr>
    <td valign="top"><b><font size="-1">Area</font></b></td>
    <td>
      <input size="3" maxlength="3" type="text" name="area" value="<?php echo $row->area; ?>">
    </td>
</tr>
<tr>
    <td colspan=2 valign="top"><b><font size="-1">---------------------------------------------------------------------------------------------------------------</font></b></td>
</tr>
<tr>
    <td valign="top"><b><font size="-1">Vehicle Line</font></b></td>
    <td>
      <input size="200" maxlength="255" type="text" name="vehline" value="<?php echo $row->vline; ?>">
    </td>
</tr>
<tr>
    <td valign="top"><b><font size="-1">Vehicle Plant</font></b></td>
    <td>
      <input size="125" maxlength="255" type="text" name="vehplant" value="<?php echo $row->vplant; ?>">
    </td>
</tr>
<tr>
    <td valign="top"><b><font size="-1">Vehicle Engine</font></b></td>
    <td>
      <input size="125" maxlength="255" type="text" name="vehengine" value="<?php echo $row->vengine; ?>">
    </td>
</tr>
<tr>
    <td valign="top"><b><font size="-1">Vehicle Type (T or C)</font></b></td>
    <td>
      <input size="1" maxlength="1" type="text" name="vehtype" value="<?php echo $row->vehtype; ?>">
    </td>
</tr>
<tr>
    <td colspan=2 valign="top"><b><font size="-1">---------------------------------------------------------------------------------------------------------------</font></b></td>
</tr>
<tr>
    <td valign="top"><b><font size="-1">Batch Job Status</font></b></td>
    <td>
      <input size="9" maxlength="9" type="text" name="status" value="<?php echo $row->status; ?>">
    </td>
</tr>
</table>
<?php
}
else
{
?>
      <p>
      <font size="-1">The detail for that Job ID cannot be located.</font>
<?php
}

// close database connection
mysql_close($connection);
?>

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
