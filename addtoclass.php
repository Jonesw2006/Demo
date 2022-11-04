<?php
header("Refresh:2; url= pupildoessubject.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
try{
    include_once('connection.php');
    array_map("htmlspecialchars",$_POST);

    $stmt = $conn->prepare("INSERT INTO Tblpupilstudies (SubjectID,UserId,classposition,classgrade,exammark,comment)VALUES (:SubjectID, :UserID, null,null,null,null)");
	$stmt->bindParam(':SubjectID', $_POST["subject"]);
	$stmt->bindParam(':UserID', $_POST["student"]);
	$stmt->execute();
}
catch(PDOException $e)
{
    echo "error".$e->getMessage();
}
$conn=null;
?>