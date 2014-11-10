<html>
  <head>
    <title>Book-O-Rama Search Results</title>
  </head>
  <body>
    <h1>Book-O-Rama Search Results</h1>
  <?php
    // create short variable names
    $searchtype = $_POST['searchtype'];
    $searchterm = trim($_POST['searchterm']);
    if (!$searchtype || !$searchterm) {
        echo 'You have not entered search details. Please go back and try again.';
        exit;
    }

    if (!get_magic_quotes_gpc()) {
        $searchtype = addslashes($searchtype);
        $searchterm = addslashes($searchterm);
    }

    $user = trim(file_get_contents('/home/ferry/Documents/user.conf'));
    $passwd = trim(file_get_contents('/home/ferry/Documents/passwd.conf'));
    $db = new mysqli('localhost', $user, $passwd, 'books');
    if (mysqli_connect_errno()) {
        echo 'Error: Could not connect to database. Please try again later.';
        exit;
    }

    $query = "select * from books where " . $searchtype . " like '%". $searchterm . "%'";
    //echo $query;
    $result = $db->query($query);

    $num_results = $result->num_rows;

    echo "<p>Number of books found: " . $num_results . "</p>";

    for ($i = 0; $i < $num_results; $i++) {
        $row = $result->fetch_assoc();
        echo "<p><strong>" . ($i + 1) . ". Title: ";
        echo htmlspecialchars(stripslashes($row['title']));
        echo "</strong><br />Author: ";
        echo htmlspecialchars(stripslashes($row['author']));
        echo "<br />ISBN: ";
        echo htmlspecialchars(stripslashes($row['isbn']));
        echo "<br />Price: ";
        echo htmlspecialchars(stripslashes($row['price']));
        echo "</p>";
    }

    $result->free();
    $db->close();

  ?>
  </body>
</html>
