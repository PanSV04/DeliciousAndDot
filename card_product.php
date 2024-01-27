<?php
session_start();

$id = $_GET['product'];

error_log($id);
$url = "http://localhost/API/get_one_prod.php?id=$id";
$curl = curl_init($url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);


$response = curl_exec($curl);
curl_close($curl);

$prod = json_decode($response);
?>

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
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../image/logotype.png" type="image/x-icon">
  <link rel="stylesheet" href="./assert/css/style.css">
  <link rel="stylesheet" href="./assert/css/page__style.css">
  <link rel="stylesheet" href="./assert/css/filters.css">
  <link rel="stylesheet" href="./assert/css/swiper-slide.css">
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
    <div class="page__title">
      <h3>Меню</h3>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="card__body">
        <div class="card__block">
          <img src="<?= $prod->image ?>" alt="card__image" class="card__image">
          <?php if ($_SESSION['perms'] == "admin") : ?>
            <a class="card__update_box" href="update__panel.php?product=<?= $id ?>">
              <p class="card__update">Редактировать</p>
            </a>
          <?php endif ?>
        </div>
        <div class="card__block card__margin">
          <h2 class="card__title"><?= $prod->title ?></h2>
          <?php if ($prod->sale > 0) : ?>
            <div class="card__price_box">
              <h3 class="card__price"> <?= $prod->sale ?> ₽</h3>
              <h3 class="card__sale"> <?= $prod->price ?> ₽</h3>
              <img class="card__crossed" src="./assert/image/big__price__cross.png" alt="crossed">
            </div>
          <?php else : ?>
            <div class="card__price_box">
              <h3 class="card__price"> <?= $prod->price ?> ₽</h3>
            </div>
          <?php endif ?>
          <div class="card__box card__txt_marg">
            <?php if ($prod->portion == 1) : ?>
              <h5 class="card__txt"> <?= $prod->portion ?> порция</h5>
            <?php else : ?>
              <?php if ($prod->portion == 2 || $prod->portion == 4 || $prod->portion == 20 || $prod->portion == 22) : ?>
                <h5 class="card__txt"> <?= $prod->portion ?> порции</h5>
              <?php else : ?>
                <h5 class="card__txt"> <?= $prod->portion ?> порций</h5>
              <?php endif ?>
            <?php endif ?>
            <h5 class="card__sub">/</h5>
            <h5 class="card__txt"> <?= $prod->weight ?> </h5>
            <h5 class="card__txt"> <?= $prod->weight_name ?> </h5>
          </div>
          <div class="card__box card__btn_marg">
            <?php if ($prod->stock > 0) : ?>
              <p>В наличии</p>
              <div id="counter">
                <input class="counter__minus" type="button" id="buttonCountMinus" value="-">
                <div class="counter__num_box">
                  <div class="counter__num" id="buttonCountNumber">1</div>
                </div>
                <input class="counter__plus" type="button" id="buttonCountPlus" value="+">
              </div>
              <button class="card__btn_block">
                <p class="card__btn">В корзину</p>
                <?php if ($prod->sale > 0) : ?>
                  <div class="card__box">
                    <div class="card__full_price" id="calculation"> <?= $prod->sale ?></div>
                    <p class="card__full_price">₽</p>
                  </div>
                <?php else : ?>
                  <div class="card__box">
                    <div class="card__full_price" id="calculation"> <?= $prod->price ?> </div>
                    <p class="card__full_price">₽</p>
                  </div>
                <?php endif ?>
              </button>
            <?php else : ?>
              <p>Товар отсутствует</p>
            <?php endif ?>
          </div>
          <p><?= $prod->description ?></p>
          <div class="card__specific">
            <div class="card__spec_block">
              <p class="card__spec_txt"> <?= $prod->taste_name ?> </p>
            </div>
            <div class="card__spec_block">
              <p class="card__spec_txt"> <?= $prod->stuffing_name ?> </p>
            </div>
          </div>
        </div>
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

  <script src="./assert/js/counter.js"></script>
  <script src="./assert/js/cart.js"></script>
</body>

</html>