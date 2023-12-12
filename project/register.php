 <?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "users2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $regemail = $_POST["regemail"];
    $regname = $_POST["regname"];
    $regpassword = $_POST["regpass"];
    $regpasshash = password_hash($regpassword, PASSWORD_DEFAULT);

    // Добавляем данные в базу данных
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, hashpass) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $regname, $regemail, $regpassword, $regpasshash);

    if ($stmt->execute()) {
        echo "Регистрация прошла успешно!";
    } else {
        echo "Ошибка: " . $stmt->error;
    }

    $stmt->close();
}

// Предполагая, что $userInput содержит пароль, введенный пользователем
$userInputPassword = $_POST["regpass"];

// Получаем хеш из базы данных для сравнения
$stmt = $conn->prepare("SELECT hashpass FROM users WHERE email = ?");
$stmt->bind_param("s", $regemail);

$userInputEmail = $_POST["regemail"];

$stmt->execute();
$stmt->bind_result($dbHash);

if ($stmt->fetch() && password_verify($userInput, $dbHash)) {
    echo "Пароли совпадают!";
} else {
    echo "Ошибка: Пароли не совпадают.";
}

$stmt->close();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Material Compact Login Animation</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900&subset=latin,latin-ext">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="materialContainer">
    <div class="box">
      <div class="title">Вход</div>
      <form action="login.php" method="post">
        <div class="input">
          <label for="email">Email</label>
          <input type="email" name="email" id="email">
          <span class="spin"></span>
        </div>
        <div class="input">
          <label for="name">Имя пользователя</label>
          <input type="text" name="name" id="name">
          <span class="spin"></span>
        </div>
        <div class="input">
          <label for="pass">Пароль</label>
          <input type="password" name="pass" id="pass">
          <span class="spin"></span>
        </div>
        <div class="button login">
          <button type="submit"><span>Продолжить</span> <i class="fa fa-check"></i></button>
        </div>
      </form>
      <a href="" class="pass-forgot">Забыли свой пароль?</a>
    </div>

    <div class="overbox">
      <div class="material-button alt-2"><span class="shape"></span></div>
      <div class="title">Регистрация</div>
      <form action="register.php" method="post">
        <div class="input">
          <label for="regemail">Email</label>
          <input type="email" name="regemail" id="regemail">
          <span class="spin"></span>
        </div>
        <div class="input">
          <label for="regname">Имя пользователя</label>
          <input type="text" name="regname" id="regname">
          <span class="spin"></span>
        </div>
        <div class="input">
          <label for="regpass">Пароль</label>
          <input type="password" name="regpass" id="regpass">
          <span class="spin"></span>
        </div>
        <div class="input">
          <label for="reregpass">Повтор пароля</label>
          <input type="password" name="reregpass" id="reregpass">
          <span class="spin"></span>
        </div>
        <div class="button">
          <button type="submit"><span>Продолжить</span></button>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="js/index.js"></script>
</body>
</html>
