<html>
<head>
<title>Book-O-Rama Book Entry Results</title>
</title>

<body>
<h1>Book-O-Rama Book Entry Results</h1>
<?php
// create short variable names
$isbn = $_POST['isbn'];
$author = $_POST['author'];
$title = $_POST['title'];
$price = $_POST['price'];

if (!$isbn || !$author || !$title || !$price) {
    echo "You have not entered all the required details.<br />"
        . "Please go back and try again.";
    exit;
}

if (!get_magic_quotes_gpc()) {
    $isbn = addslashes($isbn);
    $author = addslashes($author);
    $title = addslashes($title);
    $price = doubleval($price);
}
$user = trim(file_get_contents('/home/ferry/Documents/user.conf'));
$passwd = trim(file_get_contents('/home/ferry/Documents/passwd.conf'));

$db = new mysqli('localhost', $user, $passwd, 'books');

if (mysqli_connect_errno()) {
    echo "Error: Could not connect to database. Please try again later.";
    exit;
}

$query = "insert into books values(?, ?, ?, ?)";
$stmt = $db->prepare($query);
$stmt->bind_param("sssd", $isbn, $author, $title, $price);
$result = $stmt->execute();

if ($result) {
    echo $db->affected_rows . " book inserted into database.";
} else {
    echo "An error has occurred. The item was not added.";
}

$db->close();
?>
</body>
</html>
