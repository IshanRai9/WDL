<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>

<link rel="stylesheet" href="./../css/login.css">

<header>
    <h1>Welcome to Froyo Fashion Store</h1>
    <nav>
      <ul>
        <li><a href="./../index.html">Home</a></li>
        <li><a href="mens.html">Mens Wear</a></li>
        <li><a href="womens.html">Womens Wear</a></li>
        <li><a href="kids.html">Kids Wear</a></li>
        <li><a href="footwear.html">Footwear</a></li>
        <li><a href="accessories.html">Accessories</a></li>
        <li><a href="onsale.html">On Sale</a></li>
        <li><a href="reviews.html">Reviews</a></li>
        <li><a href="login.php">Login</a></li>
      </ul>
    </nav>
  </header>

<body class="body">
  <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Prepare and execute the SQL query to check if the user exists
  $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
  $stmt->bind_param("ss", $email, $password);
  $stmt->execute();

  // Check if the user exists
  if ($stmt->num_rows > 0) {
    // User exists, redirect to the home page
    header("Location: index.html");
  } else {
    // User does not exist, display an error message
    echo "Invalid email or password";
  }

  // Close the statement and connection
  $stmt->close();
  $conn->close();
}
?>

    <div class="card-container">
        <img src="https://media.istockphoto.com/id/483509751/vector/frozen-yogurt-graphic.jpg?s=612x612&w=0&k=20&c=lPR1k9p_1O8cX5LSyrNSYUZFgP_ySQ3yhO2m3VYu7HU=" class="foryo-img"/>
        <p class="heading">Sign in</p>
        <p class="username-text">Email or mobile number</p>
        <input type="text email" class="username-input" required/>

        <p class="username-text">Password</p>
        <input type="password" class="password-input" required/>

        <button class="submit-btn" type="submit">Login</button>

    </div>

    <div class="register-page">
        <p class="new-cust-line">------New to Fashion Store?-----</p>
        <button class="submit"><a href="signup.html" class="link">Sign Up</a></button>
    </div>
<form action="login.php" method="post"></login.php>
</body>
</html>