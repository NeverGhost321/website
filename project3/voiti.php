
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
                    <a class="header-menu-tab" href="#1"><span
                            class="icon entypo-cog scnd-font-color"></span>Настройки</a>
                </li>
                <li>
                    <a class="header-menu-tab" href="#2"><span
                            class="icon fontawesome-user scnd-font-color"></span>Аккаунт</a>
                </li>
                <li>
                    <a class="header-menu-tab" href="main.php"><span
                            class="icon fontawesome-user scnd-font-color"></span>Главная</a>
                </li>
            </ul>
            <div class="profile-menu">
                <p>Я <a href="#26"><span class="entypo-down-open scnd-font-color"></span></a></p>
                <div class="profile-picture small-profile-picture">
                    <img width="40px" alt="Котенок Пушистый"
                        src="https://i.pinimg.com/originals/3f/4d/68/3f4d680afe477d149698fa1bf35a97ef.jpg">
                </div>
            </div>
        </header>

        <div class="middle-container container">
            <div class="profile block">
                <a class="add-button" href="#28"><span class="icon entypo-plus scnd-font-color"></span></a>
                <div class="profile-picture big-profile-picture clear">
                    <img width="150px" alt="Котенок пушистый"
                        src="https://i.pinimg.com/originals/3f/4d/68/3f4d680afe477d149698fa1bf35a97ef.jpg">
                </div>
                <h1 class="user-name">Котенок Пушистый</h1>
                <div class="profile-description">
                </div>
            </div>
        </div>

        <div class="right-container container">

        <div class="account block">
    <form action="login.php" method="post">
        <h2 class="titular">Войдите в свой аккаунт</h2>
        <div class="input-container">
            <input type="text" placeholder="yourname@gmail.com" class="email text-input" name="email">
            <div class="input-icon envelope-icon-acount"><span class="fontawesome-envelope scnd-font-color"></span></div>
        </div>

        <div class="input-container">
            <input type="password" placeholder="Password" class="password text-input" name="password">
            <div class="input-icon password-icon"><span class="fontawesome-lock scnd-font-color"></span></div>
        </div>
        <button type="submit" class="sign-in button">Войти</button>
    </form>
    <p class="scnd-font-color"> У Вас нет аккаунта? <a href="register.php">Создайте!</a> </p>
</div>
        </div>
    </div>
</body>
