<?php
session_start();

$login = $_SESSION['login'];

error_log($login);
$url = "http://localhost/API/get_one_user.php?login=$login";
$curl = curl_init($url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl);
curl_close($curl);

$prof = json_decode($response);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assert/css/swiper-slide.css" />
  <link rel="icon" href="../image/logotype.png" type="image/x-icon">
  <link rel="stylesheet" href="./assert/css/style.css">
  <link rel="stylesheet" href="./assert/css/page__style.css">
  <meta charset="utf-8">
  <meta name="description" content="Сайт авторской кондитерской продукции">
  <meta name="keywords" content="кондитерская, авторская кондитерская, сладости, 
    торты на заказ, заказать торт, кондитерская Челябинск, конфеты">
  <title>CANDY SHOP</title>
</head>

<body>

  <!--Секция шапки-->

  <header>
    <div class="container">
      <div class="header__up">
        <div class="header__small_box">
          <div class="phone__small"></div>
          <p class="contact__small">289-90-90</p>
        </div>
        <div class="header__small_box">
          <div class="mail__small"></div>
          <a class="contact__small" href="https://mail.ru/">candy_shop.oficial@mail.ru</a>
        </div>
      </div>
      <div class="header">
        <div class="header__logo_box">
          <a class="image_box" href="./index.php">
            <img src="./assert/image/logotype.png" width="90" height="74" alt="logo">
          </a>
          <div class="logo_text_box">
            <a class="logo_text_1">candy shop</a>
            <a class="logo_text_2">author’s sweets</a>
          </div>
        </div>
        <nav>
          <a class="nav_link" href="menu.php">Меню</a>
          <a class="nav_link" href="constructor.php">Конструктор</a>
          <a class="nav_link" href="#">Отзывы</a>
          <a class="nav_link" href="#">О нас</a>
          <a class="nav_link" href="#">Галерея</a>
          <a class="nav_link" href="#">Мероприятия</a>
        </nav>
        <?php if (isset($_SESSION['login'])) : ?>
          <div class="header__profile">
            <a class="profile" href="prof.php"></a>
            <div class="header__profile-block">
              <div class="header__profile-icon-block"></div>
              <a class="header__profile-name" href="prof.php"> <?= $prof->name ?> </a>
              <p class="header__profile-number"> <?= $prof->login ?> </p>

              <div class="header__profile-links">
                <div class="header__profile-line"></div>
                <a class="header__profile-point" href="prof.php">Профиль</a>
                <div class="header__profile-line"></div>
                <a class="header__profile-point" href="love.php">Избранное</a>
                <div class="header__profile-line"></div>
                <a class="header__profile-point" href="#">Заказы</a>
              </div>
            </div>
          </div>
        <?php else : ?>
          <div class="header__profile">
            <a class="profile" href="prof.php"></a>
            <div class="header__profile-block prof__width">
              <div class="header__profile-icon-block"></div>
              <a class="block__btn" href="log_in.php">
                <p class="prof__btn">Войти</p>
              </a>
              <div class="header__profile-line"></div>
              <a href="registr.php" class="registr__password prof__marg">Регистрация</a>
            </div>
          </div>
        <?php endif ?>
        <a class="cart" href="./cart.php"></a>
      </div>
    </div>
  </header>

  <section class="page__title-sec">
    <div class="page__title ">
      <h3>Корзина</h3>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="cart__block">
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="cart__none">
      </div>
    </div>
  </section>

  <footer>
    <div class="container">
      <div class="footer__block">
        <div class="footer__info">
          <h4 class="footer__title">Навигация</h4>
          <div class="footer__column">
            <a class="footer__point" href="menu.php">Меню</a>
            <div class="footer__circle"></div>
            <a class="footer__point" href="#">О нас</a>
            <div class="footer__circle"></div>
            <a class="footer__point" href="#">Отзывы</a>
            <div class="footer__circle"></div>
            <a class="footer__point" href="#">Галерея</a>
            <div class="footer__circle"></div>
            <a class="footer__point" href="constructor.php">Конструктор</a>
            <div class="footer__circle"></div>
            <a class="footer__point" href="#">Мероприятия</a>
            <div class="footer__circle"></div>
            <a class="footer__point" href="admin_panel.php">Панель админа</a>
          </div>
        </div>
        <div class="footer__info margin__bottom">
          <h4 class="footer__title margin__right">Информация</h4>
          <div class="footer__column">
            <a class="footer__point" href="#">Поддержка</a>
            <div class="footer__circle"></div>
            <a class="footer__point" href="#">Документация</a>
            <div class="footer__circle"></div>
            <a class="footer__point" href="#">Доставка и оплата</a>
            <div class="footer__circle"></div>
            <a class="footer__point" href="#">Условия соглашения</a>
            <div class="footer__circle"></div>
            <a class="footer__point" href="#">Политика безопасности</a>
          </div>
        </div>
        <div class="footer__contact">
          <p class="footer__number">287-90-34</p>
          <div class="footer__icons">
            <a href="#">
              <div class="soc__icon"></div>
            </a>
            <a href="#">
              <div class="soc__icon face"></div>
            </a>
            <a href="#">
              <div class="soc__icon vk"></div>
            </a>
            <a href="#">
              <div class="soc__icon app"></div>
            </a>
          </div>
          <a class="footer__mail-txt" href="https://mail.google.com">candy_shop.official@mail.ru</a>
        </div>
      </div>
    </div>
  </footer>

  <script src="./assert/js/get_cart.js"></script>
  <script src="./assert/js/counter.js"></script>
</body>

</html>