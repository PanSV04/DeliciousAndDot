<?php
session_start();

$login = $_SESSION['login'];

error_log($login);
$url ="http://localhost/API/get_one_user.php?login=$login";
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

  <section class="not__margin">
    <div class="categories__background">
      <div class="categories">
        <div>
          <input class="categories__btn__input" type="radio" 
          name="category" id="drink" value="1">
          <label for="drink">
            <div class="categories__btn">
              <div class="categories__img-box">
                <div class="categories__img category__drinks"></div>
              </div>
              <p class="categories__name">Напитки</p>
            </div>
          </label>
        </div>
        <div>
          <input class="categories__btn__input" type="radio" 
          name="category" id="cake" value="2" checked>
          <label for="cake">
            <div class="categories__btn">
              <div class="categories__img-box">
                <div class="categories__img category__cake"></div>
              </div>
              <p class="categories__name">Тортики</p>
            </div>
          </label>
        </div>
        <div>
          <input class="categories__btn__input" type="radio" 
          name="category" id="pie" value="3">
          <label for="pie">
            <div class="categories__btn">
              <div class="categories__img-box">
                <div class="categories__img category__pie"></div>
              </div>
              <p class="categories__name">Пирожные</p>
            </div>
          </label>
        </div>
        <div>
          <input class="categories__btn__input" type="radio" 
          name="category" id="candy" value="4">
          <label for="candy">
            <div class="categories__btn">
              <div class="categories__img-box">
                <div class="categories__img category__candy"></div>
              </div>
              <p class="categories__name">Конфеты</p>
            </div>
          </label>
        </div>
        <div>
          <input class="categories__btn__input" type="radio" 
          name="category" id="cupcakes" value="5">
          <label for="cupcakes">
            <div class="categories__btn">
              <div class="categories__img-box">
                <div class="categories__img category__cupcakes"></div>
              </div>
              <p class="categories__name">Капкейки</p>
            </div>
          </label>
        </div>
        <div>
          <input class="categories__btn__input" type="radio" 
          name="category" id="cookies" value="6">
          <label for="cookies">
            <div class="categories__btn">
              <div class="categories__img-box">
                <div class="categories__img category__cookies"></div>
              </div>
              <p class="categories__name">Печенье</p>
            </div>
          </label>
        </div>
        <div>
          <input class="categories__btn__input" type="radio" 
          name="category" id="baking" value="7">
          <label for="baking">
            <div class="categories__btn">
              <div class="categories__img-box">
                <div class="categories__img category__baking"></div>
              </div>
              <p class="categories__name">Выпечка</p>
            </div>
          </label>
        </div>
        <div>
          <input class="categories__btn__input" type="radio" 
          name="category" id="waffles" value="8">
          <label for="waffles">
            <div class="categories__btn">
              <div class="categories__img-box">
                <div class="categories__img category__waffles"></div>
              </div>
              <p class="categories__name">Вафли</p>
            </div>
          </label>
        </div>
        <div>
          <input class="categories__btn__input" type="radio" 
          name="category" id="macaroons" value="9">
          <label for="macaroons">
            <div class="categories__btn">
              <div class="categories__img-box">
                <div class="categories__img category__macaroons"></div>
              </div>
              <p class="categories__name">Макаруны</p>
            </div>
          </label>
        </div>
        <div>
          <input class="categories__btn__input" type="radio" 
          name="category" id="souffle" value="10">
          <label for="souffle">
            <div class="categories__btn">
              <div class="categories__img-box">
                <div class="categories__img category__souffle"></div>
              </div>
              <p class="categories__name">Суфле</p>
            </div>
          </label>
        </div>
        <div></div>
        <div>
          <input class="categories__btn__input" type="radio" 
          name="category" id="marmalade" value="11">
          <label for="marmalade">
            <div class="categories__btn">
              <div class="categories__img-box">
                <div class="categories__img category__marmalade"></div>
              </div>
              <p class="categories__name">Мармелад</p>
            </div>
          </label>
        </div>
        <div>
          <input class="categories__btn__input" type="radio" 
          name="category" id="ice" value="12">
          <label for="ice">
            <div class="categories__btn">
              <div class="categories__img-box">
                <div class="categories__img category__ice-cream"></div>
              </div>
              <p class="categories__name">Мороженое</p>
            </div>
          </label>
        </div>
        <div>
          <input class="categories__btn__input" type="radio" 
          name="category" id="marshmellow" value="13">
          <label for="marshmellow">
            <div class="categories__btn">
              <div class="categories__img-box">
                <div class="categories__img category__marshmellow"></div>
              </div>
              <p class="categories__name">Зефир</p>
            </div>
          </label>
        </div>
      </div>
    </div>
  </section>

  <section class="filter__margin">
    <div class="container__menu">
      <div class="filters">
        <form class="filter__form" action="API/get_products.php">
          <div class="filter__form-box">
            <p class="filter__title">Вкус</p>
            <div class="filter__columns">
              <div class="filter__column">
                <label class="checkbox-btn">
                  <input type="checkbox" name="taste" value="1">
                  <span>Шоколадный</span>
                </label>

                <label class="checkbox-btn">
                  <input type="checkbox" name="taste" value="2">
                  <span>Йогуртовый</span>
                </label>

                <label class="checkbox-btn">
                  <input type="checkbox" name="taste" value="3">
                  <span>Бисквитный</span>
                </label>

                <label class="checkbox-btn">
                  <input type="checkbox" name="taste" value="4">
                  <span>Сметанный</span>
                </label>

                <label class="checkbox-btn">
                  <input type="checkbox" name="taste" value="5">
                  <span>Фруктовый</span>
                </label>

                <label class="checkbox-btn checkbox-btn__end">
                  <input type="checkbox" name="taste" value="6">
                  <span>Вафельный</span>
                </label>
              </div>

              <div class="filter__column">
                <label class="checkbox-btn">
                  <input type="checkbox" name="taste" value="7">
                  <span>Муссовый</span>
                </label>

                <label class="checkbox-btn">
                  <input type="checkbox" name="taste" value="8">
                  <span>Песочный</span>
                </label>

                <label class="checkbox-btn">
                  <input type="checkbox" name="taste" value="9">
                  <span>Ореховый</span>
                </label>

                <label class="checkbox-btn">
                  <input type="checkbox" name="taste" value="10">
                  <span>Ягодный</span>
                </label>

                <label class="checkbox-btn">
                  <input type="checkbox" name="taste" value="11">
                  <span>Чизкейк</span>
                </label>
              </div>
            </div>
          </div>

          <div class="filter__line"></div>

          <div class="filter__form-box">
            <p class="filter__title">Начинка</p>

            <div class="filter__columns">
              <div class="filter__column">
                <label class="checkbox-btn">
                  <input type="checkbox" name="stuffing" value="1">
                  <span>Карамель</span>
                </label>

                <label class="checkbox-btn">
                  <input type="checkbox" name="stuffing" value="2">
                  <span>Шоколад</span>
                </label>

                <label class="checkbox-btn">
                  <input type="checkbox" name="stuffing" value="3">
                  <span>Печенье</span>
                </label>

                <label class="checkbox-btn">
                  <input type="checkbox" name="stuffing" value="4">
                  <span>Фрукты</span>
                </label>

                <label class="checkbox-btn">
                  <input type="checkbox" name="stuffing" value="5">
                  <span>Корица</span>
                </label>

                <label class="checkbox-btn checkbox-btn__end">
                  <input type="checkbox" name="stuffing" value="6">
                  <span>Ягоды</span>
                </label>
              </div>
              <div class="filter__column">
                <label class="checkbox-btn">
                  <input type="checkbox" name="stuffing" value="7">
                  <span>Сироп</span>
                </label>

                <label class="checkbox-btn">
                  <input type="checkbox" name="stuffing" value="8">
                  <span>Орехи</span>
                </label>

                <label class="checkbox-btn">
                  <input type="checkbox" name="stuffing" value="9">
                  <span>Джем</span>
                </label>

                <label class="checkbox-btn">
                  <input type="checkbox" name="stuffing" value="10">
                  <span>Нуга</span>
                </label>

                <label class="checkbox-btn">
                  <input type="checkbox" name="stuffing" value="11">
                  <span>Безе</span>
                </label>

                <label class="checkbox-btn checkbox-btn__end">
                  <input type="checkbox" name="stuffing" value="12">
                  <span>Мёд</span>
                </label>
              </div>
            </div>
          </div>

          <div class="filter__line"></div>

          <div class="filter__block">
            <div class="filter__form-box">
              <div class="wrapper">
                <p>Цена</p>
                <div class="slider">
                  <div class="progress"></div>
                </div>
                <div class="range-input">
                  <input type="range" class="range-min" min="0" max="10000" value="250" step="10">
                  <input type="range" class="range-max" min="0" max="10000" value="3500" step="10">
                </div>
                <div class="price-input">
                  <div class="field">
                    <input type="number" name="min_price" class="input-min" value="50">
                  </div>
                  <div class="field">
                    <input type="number" name="max_price" class="input-max" value="3500">
                  </div>
                </div>
              </div>
            </div>
            <div class="filter__line-width"></div>
            <div class="filter__form">
              <div class="filter__form-box">
                <p class="filter__title">Порции</p>

                <div class="filter__tab">
                  <label class="filter__tab-checkbox">
                    <input class="filter__tab-input" type="checkbox" name="portion" value="1">
                    <span>1</span>
                  </label>

                  <label class="filter__tab-checkbox">
                    <input class="filter__tab-input" type="checkbox" name="portion" value="2">
                    <span>2</span>
                  </label>

                  <label class="filter__tab-checkbox">
                    <input class="filter__tab-input" type="checkbox" name="portion" value="4">
                    <span>4</span>
                  </label>

                  <label class="filter__tab-checkbox">
                    <input class="filter__tab-input" type="checkbox" name="portion" value="6">
                    <span>6</span>
                  </label>

                  <label class="filter__tab-checkbox">
                    <input class="filter__tab-input" type="checkbox" name="portion" value="8">
                    <span>8</span>
                  </label>

                  <label class="filter__tab-checkbox">
                    <input class="filter__tab-input" type="checkbox" name="portion" value="10">
                    <span>10</span>
                  </label>

                  <label class="filter__tab-checkbox">
                    <input class="filter__tab-input" type="checkbox" name="portion" value="12">
                    <span>12</span>
                  </label>

                  <label class="filter__tab-checkbox">
                    <input class="filter__tab-input" type="checkbox" name="portion" value="14">
                    <span>14</span>
                  </label>

                  <label class="filter__tab-checkbox">
                    <input class="filter__tab-input" type="checkbox" name="portion" value="16">
                    <span>16</span>
                  </label>

                  <label class="filter__tab-checkbox">
                    <input class="filter__tab-input" type="checkbox" name="portion" value="18">
                    <span>18</span>
                  </label>

                  <label class="filter__tab-checkbox">
                    <input class="filter__tab-input" type="checkbox" name="portion" value="20">
                    <span>20</span>
                  </label>

                  <label class="filter__tab-checkbox">
                    <input class="filter__tab-input" type="checkbox" name="portion" value="22">
                    <span>22</span>
                  </label>
                </div>
              </div>
              <div class="filter__line"></div>
              <div class="filter__form-box form-box__margin">
                <label class="checkbox-btn check__margin">
                  <input type="checkbox" class="avaluable__btn" name="avaluable">
                  <span>Только в наличии</span>
                </label>
                <label class="checkbox-btn">
                  <input type="checkbox" class="sale__btn" name="sale">
                  <span>Акции</span>
                </label>
                <button id="btn__filter" class="form__btn">Применить</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>

  <section>
    <div class="container__menu">
      <div class="menu">

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
</body>

</html>