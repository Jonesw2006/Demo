<!DOCTYPE html>
<html>
<head>
    <title>User Options</title>
</head>
<body>

<form action="showoptions.php"  method = "post">

  <!--Creates a drop down list-->
  Student:<select name="Name">

  <?php
    include_once('connection.php');
    $stmt = $conn->prepare("SELECT tblsubjects.Subjectname as sn FROM Tblpupilstudies 
    INNER JOIN tblsubjects 
    ON tblsubjects.SubjectID=tblpupilstudies.SubjectID 
    WHERE UserID=:selecteduser");

    $stmt->bindParam(':selecteduser', $_POST["Name"]);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
            echo($row["sn"]."<br>");
    }
    ?>	
</select>

  <input type="submit" value="View options">
</form>

</body>
</html>
