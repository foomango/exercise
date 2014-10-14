<html>
<head>
  <title>Bob's Auto Parts - Order Results</title>
</head>
<body>
  <h1>Bob's Auto Parts</h1>
  <h2>Order Results</h2>
<?php
  echo "<p>Order Processed at " . date('H:i, jS F Y') . "</p>";

  $tireqty = $_POST['tireqty'];
  $oilqty = $_POST['oilqty'];
  $sparkqty = $_POST['sparkqty'];
  $totalqty = $tireqty + $oilqty + $sparkqty;
  echo "Items ordered: " . $totalqty . "<br />";

  define('TIREPRICE', 100);
  define('OILPRICE', 10);
  define('SPARKPRICE', 4);

  $totalamount = $tireqty * TIREPRICE + 
    $oilqty * OILPRICE + 
    $sparkqty * SPARKPRICE;
  echo "Subtotal: $" . number_format($totalamount, 2) . "<br />";

  $taxrate = 0.10; // local sales tax is 10%
  $totalamount = $totalamount * (1 + $taxrate);
  echo "Total including tax: $" . number_format($totalamount, 2) . "<br />";
?>

</body>
</html>
