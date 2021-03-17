<?php

  /**
  Delete student from course
  */

  require "config.php";
  require "common.php";

  if(isset($_POST["submit"])) {
    //if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();    
    try {
      $connection = new PDO($dsn, $user, $password, $options);
        
      $studentID = $_POST["submit"];
        
      $sql = "DELETE FROM registeredCourses 
             WHERE studentID = :studentID";
        
      $statement = $connection->prepare($sql);
      $statement->bindValue(':studentID', $studentID);
      $statement->execute();
        
      $success = "Student successfully removed from course.";
    }  catch (PDOException $error) {
       echo $sql . "<br>" . $error->getMessage(); 
    }
  }

  try {
    $connection = new PDO($dsn, $user, $password, $options);
      
    $sql = "SELECT * 
           FROM registeredCourses";
      
    $statement = $connection->prepare($sql);
    $statement->execute();
      
    $result = $statement->fetchAll();
  } catch (PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
  ?>

  <?php require "header.php"; ?>

  <h2>Cancel course</h2>

  <?php if ($success) echo $success; ?>

  <form method="post">
    <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
    <table>
      <thead>
        <tr>
          <th>CourseID</th>
          <th>StudentID</th>
          <th>Cancel</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($result as $row) : ?>
          <tr>
            <td><?php echo $row["courseID"]; ?></td>
            <td><?php echo $row["studentID"]; ?></td>
            <td><button type="submit" name="submit" value="<?php echo $row["studentID"]; ?>">Cancel</button></td>
          </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </form>

  <a href="index.php">Return to home</a>

  <?php require "footer.php"; ?>