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
  <link rel="icon" href="./assert/image/logotype.png" type="image/x-icon">
  <link rel="stylesheet" href="./assert/css/style.css">
  <link rel="stylesheet" href="./assert/css/page__style.css">
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


  <!----------------------------Профиль----------------------------->


  <section class="page__title-sec not__margin">
    <div class="page__title">
      <h3>Регистрация</h3>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="registr">
        <div class="registration__">
          <form action="/API/registr.php" method="post" class="form__column">
            <div class="form__block">
              <div class="registr__columns not__margin">
                <div class="form__point">
                  <label class="form__title" for="">Имя*</label>
                  <input class="form__field" name="name" type="text" placeholder="Имя">
                </div>
                <div class="form__point">
                  <label class="form__title" for="">Фамилия*</label>
                  <input class="form__field" name="surname" type="text" placeholder="Фамилия">
                </div>
                <div class="form__point">
                  <label class="form__title" for="">Отчество</label>
                  <input class="form__field" name="patronymic" type="text" placeholder="Отчество">
                </div>
                <div class="form__point">
                  <label class="form__title" for="">Дата рождения</label>
                  <input class="form__field" name="date_birth" type="date" placeholder="Дата рождения">
                </div>
              </div>
              <div class="registr__columns">
                <div class="form__point">
                  <label class="form__title" for="">Телефон*</label>
                  <input class="form__field" name="login" type="text" placeholder="Телефон">
                  <p class="form__subscription">Пример: 89007008090</p>
                </div>
                <div class="form__point">
                  <label class="form__title" for="">Пароль*</label>
                  <div class="password">
                    <input class="form__field" type="password" id="password-input" placeholder="Пароль" name="password">
                    <a href="#" class="password-control"></a>
                  </div>
                </div>
                <p class="form__subscription">Пункты под * - обязательные</p>
              </div>
            </div>
            <div class="registr__columns not__margin">
              <div class="form__point">
                <label class="form__title" for="">Город</label>
                <select class="form__field" name="city" id="selectItem">
                  <option id="chelyabinsk">Челябинск</option>
                  <option id="moskva">Москва</option>
                  <option id="piter">Санкт-Петербург</option>
                  <option id="nnovgor">Нижний Новгород</option>
                </select>
              </div>
              <div class="form__block">
                <div class="form__point-spec">
                  <label class="form__title" for="">Улица</label>
                  <input class="form__field" name="street" type="text" placeholder="Улица">
                  <p class="form__subscription">Пример: Пр. Победы</p>
                </div>
                <div class="form__point-spec">
                  <label class="form__title" for="">Дом</label>
                  <input class="form__field field_min" name="num_home" type="text" placeholder="Дом">
                  <p class="form__subscription">10А</p>
                </div>
                <div class="form__point-spec not__margin">
                  <label class="form__title" for="">Квартира</label>
                  <input class="form__field field_min" name="num_app" type="text" placeholder="Кв.">
                  <p class="form__subscription">34</p>
                </div>
              </div>
            </div>
            <div class="block__btn">
              <input type="submit" class="btn input__btn" value="Зарегестрироваться">
            </div>
          </form>
          <div class="block__subscription">
            <p class="registr__pass-txt">Уже зарегестрированы?</p>
            <a href="log_in.php" class="registr__password">Войдите</a>
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

  <script src="./assert/js/jquery-3.6.3.js"></script>
  <script src="./assert/js/close-open.js"></script>
  <script src="./assert/js/register.js"></script>
</body>

</html>