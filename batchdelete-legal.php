<html>
<head>
<basefont face="Verdana">
</head>

<body>

<!-- standard page header begins -->
<!-- <p>&nbsp;<p> -->

<table width="100%" cellspacing="0" cellpadding="5">
<tr>
    <td></td>
</tr>
<tr>
    <td bgcolor="Navy"><font size="-1" color="White">
    <b>Legal Extract Request Management Tool - Delete Mode</b></font>
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
$query = "DELETE FROM alljobs WHERE jid = '$id'";
$result = mysql_query($query) or die ("Error in query: $query. " . mysql_error());

// close database connection
mysql_close($connection);

// print result
echo '<font size=-1>Deletion successful. '; 
echo '<a href=batchlist-legal.php>Go back to the main menu</a>.</font>';
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
