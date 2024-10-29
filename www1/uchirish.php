<?php //header('Content-Type: text/html; charset=utf-8');

if(isset($_GET['NoteId']))
{
include("db.php");
$NoteId=$_GET['NoteId'];
$REG_NOM=$_GET['REG_NOM'];

$sql = "DELETE FROM [statuz].[dbo].[notedetails]  WHERE NoteId='$NoteId'";
$result2 = sqlsrv_query($con, $sql);

$sql = "DELETE FROM [statuz].[dbo].[notetrans]  WHERE NoteId='$NoteId'";
$result2 = sqlsrv_query($con, $sql);

$sql = "DELETE FROM [statuz].[dbo].[notices]  WHERE NoteId='$NoteId'";
$result2 = sqlsrv_query($con, $sql);

}



echo "<meta http-equiv='Refresh' content='0; URL=obrabt.php?reg_nom=$REG_NOM'>";
?>

