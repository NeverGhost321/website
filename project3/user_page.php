<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Автосалон Renault</title>
    <link rel="shortcut icon" href="img(header)/pngwing.com (1).png">
</head>

<body>
    <link rel="stylesheet" href="voiti.css">
    <div class="main-container">
        <header class="block">
            <ul class="header-menu horizontal-list">
                <li>
                    <a class="header-menu-tab" href="#1"><span class="icon entypo-cog scnd-font-color"></span>Настройки</a>
                </li>
                <li>
                    <a class="header-menu-tab" href="#2"><span class="icon fontawesome-user scnd-font-color"></span>Аккаунт</a>
                </li>
                <li>
                    <a class="header-menu-tab" href="main.php"><span class="icon fontawesome-user scnd-font-color"></span>Главная</a>
                </li>
            </ul>
            <div class="profile-menu">
                <?php
                session_start();
                if (isset($_SESSION['user_id'])) {
                    $user_id = $_SESSION['user_id'];

                    // Подключение к базе данных
                    $servername = "localhost";
                    $username = "root";
                    $password = "root";
                    $dbname = "users";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Запрос к базе данных для получения данных пользователя
                    $sql = "SELECT name, email FROM users WHERE id = $user_id";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $user_name = $row['name'];
                        $user_email = $row['email'];
                    } else {
                        // Обработка ситуации, если пользователя с указанным id не найдено
                        header("Location: login.php");
                        exit();
                    }

                    $conn->close();
                    ?>
                    <p>Я <a href="#26"><?= $user_email ?><span class="entypo-down-open scnd-font-color"></span></a></p>
                    <div class="profile-picture small-profile-picture">
                        <img width="40px" alt="<?= $user_name ?>" src="https://i.pinimg.com/originals/3f/4d/68/3f4d680afe477d149698fa1bf35a97ef.jpg">
                    </div>
                <?php } else { ?>
                    <!-- Здесь может быть ваш код для отображения, если пользователь не авторизован -->
                <?php } ?>
            </div>
            
        </header>

        <div class="middle-container container">
   
            <div class="profile block">
                <a class="add-button" href="#28"><span class="icon entypo-plus scnd-font-color"></span></a>
                <div class="profile-picture big-profile-picture clear">
                    <img width="150px" alt="Котенок пушистый" src="https://i.pinimg.com/originals/3f/4d/68/3f4d680afe477d149698fa1bf35a97ef.jpg">
                </div>
                <h1 class="user-name"><?= $user_name ?></h1>
                <div class="profile-description">
                </div>
            </div>
        </div>

        <div class="right-container container">
            <!-- Остальной код страницы ... -->
        </div>
    </div>
</body>
</html>
