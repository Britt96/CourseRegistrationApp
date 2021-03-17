<?php

  /**
  View available courses
  */

  require "config.php";
  require "common.php";

  try {
    $connection = new PDO($dsn, $user, $password, $options);
      
    $sql = "SELECT * 
           FROM courses";
      
    $statement = $connection->prepare($sql);
    $statement->execute();
      
    $result = $statement->fetchAll();
  } catch (PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
?>

<?php require "header.php" ?>

<h2>Available Courses</h2>

<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Course Name</th>
      <th>Start Time</th>
      <th>End Time</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($result as $row) : ?>
      <tr>
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo $row["name"]; ?></td>
        <td><?php echo $row["startTime"]; ?></td>
        <td><?php echo $row["endTime"]; ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a href="index.php">Return to home</a>

<?php require "footer.php" ?>