<?php
session_start();
ini_set('display_errors', 'Off'); 

$login = $_SESSION['login'];

$url = "http://localhost/API/get_one_user.php?login=$login";
$curl = curl_init($url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl);
curl_close($curl);

$prof = json_decode($response);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="description" content="Сайт авторской кондитерской продукции">
  <meta name="keywords" content="кондитерская, авторская кондитерская, сладости, 
    торты на заказ, заказать торт, кондитерская Челябинск, конфеты">
  <title>CANDY SHOP</title>

  <link rel="stylesheet" href="./assert/css/swiper-slide.css" />
  <link rel="icon" href="../image/logotype.png" type="image/x-icon">
  <link rel="stylesheet" href="./assert/css/style.css">
  <link rel="stylesheet" href="./assert/css/page__style.css">
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
            <a class="profile" href="log_in.php"></a>
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

  <!--Секция главный экран-->

  <section>
    <div class="intro">
      <div class="banner">
        <div class="banner-block">

          <h1 class="banner-block__title">Делаем обычное
            <span class="banner-block__title-add">особенным</span>
          </h1>

          <p class="banner-block__sale">
            <span>Первый заказ</span>
            через конструктор <br>
            <span>со скидкой 30%</span>
          </p>
          <div class="block__btn">
            <a class="btn" href="menu.php">Заказать</a>
          </div>
          <p class="banner-block__text">Закажи свой особенный десерт!</p>

        </div>
      </div>
    </div>
  </section>

  <!--Секция о нас-->

  <section>
    <div class="container">
      <div class="about-us">
        <div class="about-us__content">

          <h2 class="about-us__title">О нас</h2>

          <p>
            <span class="about-us__accent">Candy shop</span>
            — проверенная временем кондитерская оригинальной продукции,
            таких тортиков вам не найти в супермаркете, позвольте себе
            самому решать какой торт вы хотите
          </p>

          <p class="about-us__text">
            Швейцарские, французские и бельгийские технологии создания
            десертов отвечают за качество и вкус сладостей, а большой штат
            профессионалов, который начинался с одной маленькой кондитерской,
            заставит вас сказать “Невероятно!” при дегустации наших десертов
          </p>

          <div class="about-us__facts">

            <div class="about-us__facts-block">

              <div class="facts-block">
                <p class="fact-number">10</p>
                <p class="fact-text">лет <br> на рынке</p>
              </div>

              <div class="facts-block end">
                <p class="fact-number">26</p>
                <p class="fact-text">кондитерских по всей стране</p>
              </div>

            </div>

            <div class="about-us__facts-block">

              <div class="facts-block">
                <p class="fact-number">2560</p>
                <p class="fact-text">индивидуальных заказов испекли</p>
              </div>

              <div class="facts-block end">
                <p class="fact-number">158</p>
                <p class="fact-text">кондитеров <br> в штате</p>
              </div>

            </div>

          </div>

        </div>

        <img src="./assert/image/about__us.png" alt="about__us" title="about us image" width="650px" height="740px">

      </div>
    </div>
  </section>


  <!-----------------------------Секция Заказ----------------------------->


  <section>
    <div class="container">

      <h2 class="order__title">Сделай заказ</h2>

      <div class="order__steps">

        <div class="order__step">
          <h4>Конструктор</h4>
          <p class="order__step-text">
            Зайдите в конструктор <br> и воплотите свой десерт <br> в реальность
            <span>или позвоните</span> нам лично и мы сами его нарисуем!
          </p>
        </div>

        <a class="order__button" href="constructor.php">Конструктор
          <img class="order__button-arrow" src="./assert/image/стрелка.svg" alt="">
        </a>

        <div class="order__step step-2">
          <h4>Согласование</h4>
          <p class="order__step-text">
            После предзаказа в конструкторе наш кондитер лично свяжется с вами,
            поможет улучшить десерт и утвердит сладость
          </p>
        </div>

        <div class="order__step step-3">
          <h4>Готовим</h4>
          <p class="order__step-text">
            Теперь наша очередь потрудиться! Оформляем заказ <br> и кондитер приступает к работе над вашим десертом
          </p>
        </div>

        <div class="order__step step-4">
          <h4>Доставляем</h4>
          <p class="order__step-text">
            В зависимости от заказа встретьте курьера через 2 часа
            или запланируйте доставку <br> на торжество!
          </p>
        </div>

      </div>
    </div>
  </section>

  <section class="advantages">
    <div class="container">

      <h2 class="advantages__title">Наши преимущества</h2>

      <div class="advantages__steps">

        <div class="advantages__step">
          <h5>Натуральные ягоды, фрукты и овощи</h5>
          <p class="advantages__step-text">
            Наши партнеры - краснодаские фермерские хозяйства
          </p>
          <img class="advantages__icon1" src="./assert/image/icon-1.png" alt="icon1">
        </div>

        <div class="advantages__step2">
          <p class="advantages__step-text">
            Поможем определиться с выбором и вы останетесь довольны десертом
          </p>
          <h5>Индивидуальный подход</h5>
          <img class="advantages__icon2" src="./assert/image/icon-2.png" alt="icon2">
        </div>


        <div class="advantages__step3">
          <img class="advantages__icon3" src="./assert/image/icon-3.png" alt="icon3">
          <h5>Профессиональные кондитеры</h5>
          <p class="advantages__step-text">
            У нас работают много специалистов с большим опытом
          </p>
        </div>

        <div class="advantages__step4">
          <p class="advantages__step-text">
            Наши кондитерские есть в 15 городах России
          </p>
          <h5>Множество кондитерских</h5>
          <img class="advantages__icon4" src="./assert/image/icon-4.png" alt="icon4">
        </div>

      </div>
    </div>
  </section>

  <section>
    <div class="container">

      <h2>Популярное</h2>

      <div class="swiper mySwiper">

        <div class="swiper-wrapper">

          <div class="swiper-slide">
            <div class="swiper-slide__block">

              <a href="menu.php">
                <img class="swiper-slide__image" src="./assert/image/products/cake/cake__praga.png" alt="cake praga">
              </a>
              <h5 class="swiper-slide__title">Тортик "Прага"</h5>
              <p class="swiper-slide__wt">200г</p>
              <a class="swiper-slide__button-block" href="#">
                <p class="btn swiper-slide__button">Купить</p>
                <p class="swiper-slide__button-price">120 ₽</p>
              </a>

            </div>
          </div>

          <div class="swiper-slide">
            <div class="swiper-slide__block">

              <a href="menu.php">
                <img class="swiper-slide__image" src="./assert/image/products/cake/cake__praga.png" alt="cake praga">
              </a>
              <h5 class="swiper-slide__title">Тортик "Прага"</h5>
              <p class="swiper-slide__wt">200г</p>
              <a class="swiper-slide__button-block" href="#">
                <p class="btn swiper-slide__button">Купить</p>
                <p class="swiper-slide__button-price">120 ₽</p>
              </a>

            </div>
          </div>

          <div class="swiper-slide">
            <div class="swiper-slide__block">

              <a href="menu.php">
                <img class="swiper-slide__image" src="./assert/image/products/cake/cake__praga.png" alt="cake praga">
              </a>
              <a href="menu.php">
                <h5 class="swiper-slide__title">Тортик "Прага"</h5>
              </a>
              <p class="swiper-slide__wt">200г</p>
              <a class="swiper-slide__button-block" href="#">
                <p class="btn swiper-slide__button">Купить</p>
                <p class="swiper-slide__button-price">120 ₽</p>
              </a>

            </div>
          </div>

          <div class="swiper-slide">
            <div class="swiper-slide__block">

              <a href="menu.php">
                <img class="swiper-slide__image" src="./assert/image/products/cake/cake__praga.png" alt="cake praga">
              </a>
              <a href="menu.php">
                <h5 class="swiper-slide__title">Тортик "Прага"</h5>
              </a>
              <p class="swiper-slide__wt">200г</p>
              <a class="swiper-slide__button-block" href="#">
                <p class="btn swiper-slide__button">Купить</p>
                <p class="swiper-slide__button-price">120 ₽</p>
              </a>

            </div>
          </div>

          <div class="swiper-slide">
            <div class="swiper-slide__block">

              <a href="menu.php">
                <img class="swiper-slide__image" src="./assert/image/products/cake/cake__praga.png" alt="cake praga">
              </a>
              <a href="menu.php">
                <h5 class="swiper-slide__title">Тортик "Прага"</h5>
              </a>
              <p class="swiper-slide__wt">200г</p>
              <a class="swiper-slide__button-block" href="#">
                <p class="btn swiper-slide__button">Купить</p>
                <p class="swiper-slide__button-price">120 ₽</p>
              </a>

            </div>
          </div>

          <div class="swiper-slide">
            <div class="swiper-slide__block">

              <a href="menu.php">
                <img class="swiper-slide__image" src="./assert/image/products/cake/cake__praga.png" alt="cake praga">
              </a>
              <a href="menu.php">
                <h5 class="swiper-slide__title">Тортик "Прага"</h5>
              </a>
              <p class="swiper-slide__wt">200г</p>
              <a class="swiper-slide__button-block" href="#">
                <p class="btn swiper-slide__button">Купить</p>
                <p class="swiper-slide__button-price">120 ₽</p>
              </a>

            </div>
          </div>

        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

      </div>

      <div class="block__btn">
        <a class="btn popular__button" href="menu.php">Перейти в меню</a>
      </div>

    </div>
  </section>

  <section class="mailing">
    <div class="container">
      <div class="mailing__content">

        <h2 class="mailing__title">Подпишись на рассылку –
          <br><span>Получи скидку</span>
        </h2>

        <div class="mailing__form">
          <input class="mailing__form-email" type="email" name="login" placeholder="Электронная почта">
          <a class="btn mailing__button" href="#">Подпишись</a>
        </div>

      </div>
    </div>
  </section>

  <section class="map">
    <div class="map__bcg">

      <div class="map__rectangle">
        <div class="container">
          <div class="map__text-block">
            <div class="map__text-block-center">

              <h2 class="map__title">Контакты</h2>
              <p class="map__street">Москва, улица Тверская 4с1</p>
              <p class="map__glav">главная кондитерская</p>
              <p class="map__number">+7 (495) <span>287-30-34</span></p>
              <div class="map__icons">
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
                  <div class="soc__icon mail"></div>
                </a>
                <a href="#">
                  <div class="soc__icon app"></div>
                </a>
              </div>
              <p class="map__email">candy_shop.oficial</p>

            </div>
          </div>
        </div>
      </div>

      <img class="map__img" src="./assert/image/map.png" alt="map">

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

  <script src="./assert/js/swiper-slide.js"></script>
  <script src="./assert/js/swiper.js"></script>
</body>

</html>