<?php
include $_SERVER['DOCUMENT_ROOT'] . '/includes/admin_check.php';
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
      <h3>Панель админа</h3>
    </div>
  </section>

  <section>
    <div class="tabs__block">
      <div class="tabs">
        <input type="radio" name="tab-btn" id="tab-btn-1" value="" checked>
        <label for="tab-btn-1">Создать товар</label>

        <div class="tabs__content" id="content-1">
          <form action="" method="post" class="form__column add__product">
            <div class="form__point">
              <label class="form__title" for="">Наименование</label>
              <input class="form__field field_long" name="title" type="text" placeholder="Наименование">
            </div>
            <div class="form__point">
              <label class="form__title" for="">Количество в наличии</label>
              <input class="form__field field_min" name="stock" type="text" placeholder="Наименование">
            </div>
            <div class="form__box">
              <div class="form__point">
                <label class="form__title" for="">Цена</label>
                <input class="form__field field_min" name="price" type="text" placeholder="Цена, ₽">
              </div>
              <div class="form__point">
                <label class="form__title" for="">Скидка</label>
                <input class="form__field field_min" name="sale" type="text" placeholder="Скидка, ₽">
              </div>
            </div>
            <div class="form__box">
              <div class="form__point">
                <label class="form__title" for="">Вес</label>
                <input class="form__field field_min" name="weight" type="text" placeholder="Вес">
              </div>
              <div class="form__point">
                <label class="form__title" for="">Единица</label>
                <select class="form__field field__select" name="weight_value" id="selectItem">
                  <option value="1" id="g">грамм</option>
                  <option value="3" id="kg">килограмм</option>
                  <option value="4" id="l">литров</option>
                  <option value="2" id="ml">миллилитров</option>
                </select>
              </div>
              <div class="form__point">
                <label class="form__title" for="">Порций</label>
                <select class="field__min form__field" name="portion" id="selectItem">
                  <option id="1">1</option>
                  <option id="2">2</option>
                  <option id="4">4</option>
                  <option id="6">6</option>
                  <option id="8">8</option>
                  <option id="10">10</option>
                  <option id="12">12</option>
                  <option id="14">14</option>
                  <option id="16">16</option>
                  <option id="18">18</option>
                  <option id="20">20</option>
                  <option id="22">22</option>
                </select>
              </div>
            </div>
            <div class="form__point">
              <label class="form__title" for="">Категория</label>
              <select class="form__field field__select" name="category" id="selectItem">
                <option value="1" id="category">Напитки</option>
                <option value="2" id="category">Тортики</option>
                <option value="3" id="category">Пирожное</option>
                <option value="4" id="category">Конфеты</option>
                <option value="5" id="category">Капкейки</option>
                <option value="6" id="category">Печенье</option>
                <option value="7" id="category">Выпечка</option>
                <option value="8" id="category">Вафли</option>
                <option value="9" id="category">Макаруны</option>
                <option value="10" id="category">Суфле</option>
                <option value="11" id="category">Мармелад</option>
                <option value="12" id="category">Мороженое</option>
                <option value="13" id="category">Зефир</option>
              </select>
            </div>
            <div class="form__box">
              <div class="form__point">
                <label class="form__title" for="">Вкус</label>
                <select class="form__field field__select" name="taste" id="selectItem">
                  <option value="1" id="category">Шоколадный</option>
                  <option value="2" id="category">Йогуртовый</option>
                  <option value="3" id="category">Бисквитный</option>
                  <option value="4" id="category">Сметанный</option>
                  <option value="5" id="category">Фруктовый</option>
                  <option value="6" id="category">Вафельный</option>
                  <option value="7" id="category">Муссовый</option>
                  <option value="8" id="category">Песочный</option>
                  <option value="9" id="category">Ореховый</option>
                  <option value="10" id="category">Ягодный</option>
                  <option value="11" id="category">Чизкейк</option>
                  <option value="12" id="category">Ванильный</option>
                  <option value="13" id="category">Клубничный</option>
                </select>
              </div>
              <div class="form__point">
                <label class="form__title" for="">Начинка</label>
                <select class="form__field field__select" name="stuffing" id="selectItem">
                  <option value="1" id="category">Карамель</option>
                  <option value="2" id="category">Шоколад</option>
                  <option value="4" id="category">Печенье</option>
                  <option value="5" id="category">Фрукты</option>
                  <option value="6" id="category">Корица</option>
                  <option value="7" id="category">Ягоды</option>
                  <option value="8" id="category">Сироп</option>
                  <option value="9" id="category">Орехи</option>
                  <option value="10" id="category">Джем</option>
                  <option value="11" id="category">Нуга</option>
                  <option value="12" id="category">Безе</option>
                  <option value="13" id="category">Мёд</option>
                  <option value="14" id="category">Ваниль</option>
                </select>
              </div>
            </div>
            <div class="form__point">
              <label class="form__title" for="">Ссылка на изображение</label>
              <input class="form__field field_long" name="image" type="text" placeholder=".\\assert\\image\\products">
            </div>
            <div class="form__point">
              <label class="form__title" for="">Описание</label>
              <textarea class="form__field field_text" rows="5" name="description" type="text" placeholder="Описание"></textarea>
            </div>
            <div class="block__btn">
              <input type="submit" class="btn input__btn" value="Создать">
            </div>
          </form>
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


  <script src="./assert/js/menu.js"></script>
  <script src="./assert/js/price_line.js"></script>
  <script src="./assert/js/swiper-slide.js"></script>
  <script src="./assert/js/admin_panel.js"></script>
</body>

</html>