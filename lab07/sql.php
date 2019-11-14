<!DOCTYPE html>
<html lang="en">
  <head>
    <title> SQL </title>
  </head>
  <body>
    <form action="sql.php" method="get">
      DB name: <input type="text" name="name"/>
      SQL query: <input type="text" name="query"/>
      <input type="submit" value="submit"/>
    </form>

    <?php
    $dbname = $_GET["name"];
    $query = $_GET["query"];
    if ($dbname != null) {
      try {
          $db = new PDO("mysql:dbname=$dbname;host=localhost", 'root', 'root');
      } catch (PDOException $e){
          exit("Database error.");
      }
    }
    if ($query != null){
      $rows = $db->query("$query");

      foreach ($rows as $key => $row) {
        for ($i=0; $i < count($row) ; $i++) {
          echo $row[$i];
          echo "<br />";
        }
      }


    }
    ?>
  </body>
</html>
