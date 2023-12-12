
<?php
session_start();

// Проверка, авторизован ли пользователь
if (!empty($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    $username = 'Гость';  // Или любой другой текст по умолчанию
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/slider.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>

<body>
    <table border="0" width="1250" cellpadding="0" cellspacing="0" align="center" bgcolor="#a4e6e1">
        <tr>
            <td width="150" align="left">
                <img src="img/logo.png" width="30%" height="35" alt="logo">
            </td>
            <td width="200">
    <table cellpadding="5" width="100%">
    <td align="right">
    <?php
    if ($username !== 'Гость') {
        echo "Привет, " . $username . '! ';
        echo '<a href="logout.php"><button class="custom-button">Выход</button></a>';
    } else {
        echo '<button class="custom-button">Войти</button>&nbsp;<a href="register.php"><button class="custom-button">Регистрация</button></a>';
    }
    ?>
</td>
                    <tr>
   
</tr>
                </table>
            </td>
        </tr>
    </table> 

	<div class="container">
	<!--<style>
		body {
			background-image: url('https://images.wallpaperscraft.ru/image/single/piatna_fon_svet_69091_300x168.jpg');
			background-size: cover; /* Растягивает изображение на всю область фона */
		}
		</style> -->

<table border="0" width="1250" cellpadding="5" cellpadding="0" align="center" bgcolor="#62B6B7">
	<tr>
		<style>
		a {
		text-decoration: none; 
		}
		</style>
		<td align="center"><a href="index.html"><font size="3" color="black" face="Arial">Главная</font></a></td>
		<td align="center"><a href="Katalog.php"><font size="3" color="black" face="Arial">Каталог</font></a></td>
		<td align="center"><a href="sales.html"><font size="3" color="black" face="Arial">Акции</font></a></td>
		<td align="center"><a href="dostavka.html"><font size="3" color="black" face="Arial">Доставка</font></a></td>
		<td align="center"><a href="support2.html"><font size="3" color="black" face="Arial">Контакты</font></a></td>
		<td align="center"><a href="korzina.php"><font size="3" color="black" face="Arial">Корзина</font></a></td>
	</tr>
</table> 
<BR>
<table border="0" width="1250" cellpadding="5" cellpadding="0" align="center">
	<tr>
		<style>
			p {
				line-height: 1.3;
			}
            m {
                line-height: 0.1;
            }
		</style>
		
			</m>
		<td>
		<td>
            <section>
                <div class="content">
                  <div class="info">
                    <p>Join us for a fantastic <span class="movie-night">Френгейт</span> "От теплой ванны до уютного отопления, мы создаем твой дом, где царит комфорт! В нашем магазине сантехники ты найдешь все необходимое: водонагреватели для теплой воды, запорную арматуру для контроля, климатическую технику для идеальной атмосферы, котельное оборудование для эффективного отопления, насосное оборудование для стабильного давления, и радиаторы отопления для равномерного тепла. Доверь нам заботу о твоем уюте – с нами каждый градус становится особенным!"</p>
                    <button class="btn" onclick="redirectToKatalog()">Join</button>
                    
                  </div>
                  <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                      
                      <div class="swiper-slide">
                        <span>8.5</span>
                        <div>
                          <h2>Водонагреватели</h2>
                        </div>
                      </div>
              
                      <div class="swiper-slide">
                        <span>9.5</span>
                        <div>
                          <h2>Запорная арматура</h2>
                        </div>
                      </div>
              
                      <div class="swiper-slide">
                        <span>8.1</span>
                        <div>
                          <h2>Климатическая техника</h2>
                        </div>
                      </div>
              
                      <div class="swiper-slide">
                        <span>8.7</span>
                        <div>
                          <h2>Котельное оборудование</h2>
                        </div>
                    </div>
                      
                    <div class="swiper-slide">
                        <span>8.6</span>
                        <div>
                          <h2>Насосное оборудование</h2>
                        </div>
                    </div>
                      
                    <div class="swiper-slide">
                        <span>8.9</span>
                        <div>
                          <h2>Радиаторы отопления</h2>
                        </div>
                    </div>
                      
                     <div class="swiper-slide">
                        <span>8.6</span>
                        <div>
                          <h2>Расширительные баки</h2>
                        </div>
                    </div>
                      
                      <div class="swiper-slide">
                        <span>8.7</span>
                        <div>
                          <h2>Сантехника</h2>
                        </div>
                    </div>
                      
                      <div class="swiper-slide">
                        <span>9.2</span>
                        <div>
                          <h2>Трубы и фитинги</h2>
                        </div>
                      </div>
                  </div>
                </div>
              
              </div>
                
                <ul class="circles">
                  <li></li>
                  <li></li>
                  <li></li>
                  <li></li>
                  <li></li>
                  <li></li>
                  <li></li>
                  <li></li>
                  <li></li>
                  <li></li>
                </ul>
              </section>
		</td>
		
</tr>
<!-- 	<tr>
			<td colspan=3 cellpadding="5" valign="top" align="center" bgcolor="#ff8000">
			баннер1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			баннер2 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			баннер3 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;(баннеры - произвольные картинки со ссылками)
		</td>
	</tr> -->
</table>
<script src="js/slider.js" type="text/javascript"></script>
<script>
    function redirectToKatalog() {
        // Используйте эту строку для перехода на страницу Katalog.php
        window.location.href = 'Katalog.php';
    }
</script>
<footer style="background-color: #62B6B7; color: white; text-align: center; padding: 20px 0; ">
	<font face="Arial">©Все права защищены</font>
</footer>


</body>
</html>