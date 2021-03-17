<?php 

  /**
    Enrolls student in course
  */

   require "config.php";
   require "common.php";

  if (isset($_POST['submit'])) {
    if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();
    
  try {
    $connection = new PDO($dsn, $user, $password, $options);
      
    $studentID = $_POST['studentID'];
    $courseID = $_POST['courseID'];
      
    $sql = "INSERT INTO registeredCourses (courseID, studentID)
           VALUES ('$courseID', '$studentID')";
      
    $statement = $connection->prepare($sql);
    $statement->execute();
      
    $success = "Student successfully enrolled in course.";
        
    } catch (PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
    }
  } 
?>

<?php require "header.php"; ?>

  <?php if (isset($_POST['submit']) && $statement) : ?>
    <blockquote><?php echo "Student successfully enrolled." ?></blockquote>
  <?php endif; ?>

  <h2>Register for Course</h2>

  <?php if ($success) echo $success; ?>
  
  <div style="margin-left:auto;margin-right:auto;width:150px;">
    <form method="post" id="register">
      <label for="courseID">Course ID</label>
      <input type="text" name="courseID" id="courseID" style="margin-bottom:15px!important;">
      <label for="studentID">Student ID</label>
      <input type="text" name="studentID" id="studentID" style="margin-bottom:15px!important;">
      <input type="submit" name="submit" value="Submit" style="align-content:right;">
    </form>
  </div>

  <a href="index.php">Return to home</a>

<?php require "footer.php"; ?>