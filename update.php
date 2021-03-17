<link rel="stylesheet" type="text/css" href="courseRegStyle.css">
<?php

  require "config.php";
  require "common.php";

  try {
    $connection = new PDO($dsn, $user, $password, $options);
      
    $sql = "SELECT * FROM courses;";
    $sql2 = "SELECT * FROM students;";
    $sql3 = "SELECT * FROM registeredCourses";
      
    $statement = $connection->prepare($sql);
    $statement2 = $connection->prepare($sql2);
    $statement3 = $connection->prepare($sql3);
    $statement->execute();
    $statement2->execute();
    $statement3->execute();
      
    $result = $statement->fetchAll();
    $result2 = $statement2->fetchAll();
    $result3 = $statement3->fetchAll();
  } catch (PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
?>

<h2>Courses</h2>

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

<h2>Students</h2>

<table>
  <thead>
    <tr>
      <th>ID</th> 
      <th>First Name</th>
      <th>Last Name</th> 
      <th>Email</th> 
    </tr>  
  </thead>
  <tbody>
    <?php foreach ($result2 as $row) : ?>
    <tr>
      <td><?php echo $row["id"]; ?></td>
      <td><?php echo $row["firstname"]; ?></td> 
      <td><?php echo $row["lastname"]; ?></td> 
      <td><?php echo $row["email"]; ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<h2>Registered Courses</h2>

<table>
  <thead>
    <th>CourseID</th>
    <th>StudentID</th>
  </thead>
  <tbody>
    <?php foreach ($result3 as $row) : ?>
    <tr>
      <td><?php echo $row["courseID"]; ?></td>
      <td><?php echo $row["studentID"]; ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<a href="index.php">Return to home</a>

<?php require "footer.php"; ?>