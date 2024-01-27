const cart_el = document.querySelector(".cart__block");
const cart_none = document.querySelector(".cart__none");

let request_products = () => {
  const API_URL = window.location.origin + '/API/get_cart.php';

  fetch(API_URL, {
    method: "GET",
    credentials: "include",
  }).then((response) => {
    if (response.status === 200) {
      response.json().then((products) => insert_products(products));
    } else {
      console.log(response.status);
    }
  });
}

let insert_products = (products) => {
  cart_el.innerHTML = '';
  console.log(products);
  if (products.length == 0) {
    cart_none.innerHTML += `
      <img width="150px" height="150px" src="./assert/image/cart__sec.png" alt="construct">
      <h2 class="construct__title">Корзина пустая!</h2>
      <p class="love__text">Вы пока ничего не добавили в корзину <br> посмотрите наше <a class="love__href" href="menu.php">меню</a></p>`;
  }

  products.forEach((product) => {
    cart_el.innerHTML += `
        <div class="cart__box">
        <div class="cart__card">
          <div class="cart__img_content">
            <img class="cart__img" src="${product.image}" alt="image__cart">
            <div class="cart__content">
              <h4 class="cart__title">${product.title}</h4>
              <p class="cart__sub">${product.weight} ${product.weight_name}</p>
              <p class="cart__sub">${product.quantity} шт.</p>
            </div>
          </div>
          <div class="cart__price_box">
            <p class="cart__price">${product.price * product.quantity}</p>
            <p class="cart__price">₽</p>
          </div>
        </div>
      </div>`;
  })
}

let API_URL = window.location.origin + '/API/del_cart.php';

request_products();
