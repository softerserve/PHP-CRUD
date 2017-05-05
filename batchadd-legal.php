<html>
<head>
<basefont face="Verdana">
</head>

<body>

<!-- standard page header begins -->

<table width="100%" cellspacing="0" cellpadding="5">

<tr>
    <td bgcolor="Navy"><font size="-1" color="White">
    <b>Legal Extract Request Management Tool - Add Mode</b></font>
    </td>
</tr>
</table>
<!-- standard page header ends -->

<?php
// form not yet submitted
// display initial form
if (!@$_POST['submit'])
{
?>
<table cellspacing="5" cellpadding="5">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<tr>
    <td valign="top"><b><font size="-1">Job ID</font></b></td>
    <td>
      <input size="15" maxlength="15" type="text" name="jobid">
    </td>
</tr>
<tr>
    <td valign="top"><b><font size="-1">Start Date (MM-DD)</font></b></td>
    <td>
      <input size="5" maxlength="5" type="text" name="startdate" value="04-01">
    </td>
</tr>
<tr>
    <td valign="top"><b><font size="-1">Start Year (YYYY)</font></b></td>
    <td>
      <input size="4" maxlength="4" type="text" name="syear" value="2002">
    </td>
</tr>
<tr>
    <td valign="top"><b><font size="-1">End Date (MM-DD)</font></b></td>
    <td>
      <input size="5" maxlength="5" type="text" name="enddate">
    </td>
</tr>
<tr>
    <td valign="top"><b><font size="-1">End Year (YYYY)</font></b></td>
    <td>
      <input size="4" maxlength="4" type="text" name="year">
    </td>
</tr>
<tr>
    <td colspan=2 valign="top"><b><font size="-1">------------------------- The four fields in the following grouping are required --------------------------------------------------------------------------------------</font></b></td>
</tr>
<tr>
    <td valign="top"><b><font size="-1">Vehicle Make</font></b></td>
    <td>
      <input size="200" maxlength="255" type="text" name="vmake">
    </td>
</tr>
<tr>
    <td valign="top"><b><font size="-1">Model Year</font></b></td>
    <td>
      <input size="125" maxlength="255" type="text" name="yr">
    </td>
</tr>
<tr>
    <td valign="top"><b><font size="-1">UCC</font></b></td>
    <td>
      <input size="200" maxlength="255" type="text" name="ucc">
    </td>
</tr>
<tr>
    <td valign="top"><b><font size="-1">Area (ALL or PAR)</font></b></td>
    <td>
      <input size="3" maxlength="3" type="text" name="area" value="ALL">
    </td>
</tr>
<tr>
    <td colspan=2 valign="top"><b><font size="-1">------------------------- The fields in the following grouping are optional --------------------------------------------------------------------------------------</font></b></td>
</tr>
<tr>
    <td valign="top"><b><font size="-1">Vehicle Line</font></b></td>
    <td>
      <input size="200" maxlength="255" type="text" name="vehline" value="ALL">
    </td>
</tr>
<tr>
    <td valign="top"><b><font size="-1">Vehicle Plant</font></b></td>
    <td>
      <input size="125" maxlength="255" type="text" name="vehplant" value="ALL">
    </td>
</tr>
<tr>
    <td valign="top"><b><font size="-1">Vehicle Engine</font></b></td>
    <td>
      <input size="125" maxlength="255" type="text" name="vehengine" value="ALL">
    </td>
</tr>
<tr>
    <td valign="top"><b><font size="-1">Vehicle Type (T or C)</font></b></td>
    <td>
      <input size="1" maxlength="1" type="text" name="vehtype" value="T">
    </td>
</tr>
<tr>
    <td colspan=2 valign="top"><b><font size="-1">---------------------------------------------------------------------------------------------------------------</font></b></td>
</tr>
<tr>
    <td colspan=2>
      <input type="Submit" name="submit" value="Add">
    </td>
</tr>
</form>
</table>
<?php
}
else
{
    // includes
    include('conf.php');
    include('functions.php');
    $dbn = $db;

    // set up error list array
    $errorList = array();
    
    $jobid = $_POST['jobid'];
    $jobtype = 'REG';
    $db = 'SIEBEL';
    $startdate = $_POST['startdate'];
    $syear = $_POST['syear'];
    $enddate = $_POST['enddate'];
    $year = $_POST['year'];
    $vmake = $_POST['vmake'];
    $yr = $_POST['yr'];
    $vehline = $_POST['vehline'];
    $vehplant = $_POST['vehplant'];
    $vehengine = $_POST['vehengine'];
    $vehtype = $_POST['vehtype'];
    $area = $_POST['area'];
    $ucc = $_POST['ucc'];
    
    // validate text input fields
    if (trim($_POST['jobid']) == '') 
    { 
        $errorList[] = 'Invalid entry: Job ID'; 
    }
    if (trim($_POST['startdate']) == '') 
    { 
        $errorList[] = 'Invalid entry: Start Date'; 
    }
    if (trim($_POST['syear']) == '') 
    { 
        $errorList[] = "Invalid entry: Start Year"; 
    }
    if (trim($_POST['enddate']) == '') 
    { 
        $errorList[] = 'Invalid entry: End Date'; 
    }
    if (trim($_POST['year']) == '') 
    { 
        $errorList[] = "Invalid entry: End Year"; 
    }
    if (trim($_POST['vmake']) == '' && trim($_POST['jobtype']) <> 'BQ') 
    { 
        $errorList[] = 'Invalid entry: Vehicle Make'; 
    }
    if (trim($_POST['yr']) == '' && trim($_POST['jobtype']) <> 'BQ') 
    {
        $errorList[] = "Invalid entry: Model Year"; 
    }
    if (trim($_POST['vehline']) == '' && trim($_POST['jobtype']) <> 'BQ') 
    {
        $errorList[] = "Invalid entry: Vehicle Line"; 
    }
    if (trim($_POST['vehplant']) == '' && trim($_POST['jobtype']) <> 'BQ') 
    {
        $errorList[] = "Invalid entry: Vehicle Plant"; 
    }
    if (trim($_POST['vehengine']) == '' && trim($_POST['jobtype']) <> 'BQ') 
    {
        $errorList[] = "Invalid entry: Vehicle Engine"; 
    }
    if (trim($_POST['vehtype']) == '') 
    {
        $errorList[] = "Invalid entry: Vehicle Type"; 
    }
    if (trim($_POST['ucc']) == ''&& trim($_POST['jobtype']) <> 'BQ') 
    { 
        $errorList[] = 'Invalid entry: UCC'; 
    }
    if (trim($_POST['area']) == '') 
    {
        $errorList[] = "Invalid entry: Area"; 
    }
        
    // set default value for contact person
    //if (trim($_POST['contact']) == '') 
    //{ 
    //    $contact = $def_contact; 
    // }
    
    // check for errors
    // if none found...
    if (sizeof($errorList) == 0)
    {
        // open database connection
        $connection = mysql_connect($host, $user, $pass) or die ('Unable to connect!');

        // select database
        mysql_select_db($dbn) or die ('Unable to select database!');

        // generate and execute query
        $query = "INSERT INTO alljobs(jobid,jobtype,entrystamp,db,startdate,syear,enddate,year,vmake,ucc,yr,vline,vplant,vengine,vehtype,area)
 VALUES('$jobid','$jobtype',NOW(),'$db','$startdate','$syear','$enddate','$year','$vmake','$ucc','$yr','$vehline','$vehplant','$vehengine','$vehtype','$area')";

        $result = mysql_query($query) or die ("Error in query: $query. " . mysql_error());

        // print result
        echo '<font size=-1>The addition was successful. <a href=batchlist-legal.php> Go back to the main menu</a>.</font>';

        // close database connection
        mysql_close($connection);
    }
    else
    {
        // errors found
        // print as list
        echo '<font size=-1>The following errors were encountered:'; 
        echo '<br>';
        echo '<ul>';
        for ($x=0; $x<sizeof($errorList); $x++)
        {
            echo "<li>$errorList[$x]";
        }
        echo '</ul></font>';
    }
}
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
