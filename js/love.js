const menu_el = document.querySelector(".grid__conteiner");
const love_none = document.querySelector(".love");

let request_products = () => {
  const API_URL = window.location.origin + '/API/get_love.php';

  fetch(API_URL, {
    method: "GET",
    credentials: "include",
  }).then((response) => {
    if (response.status === 200) {
      response.json().then((products) => insert_products(products));
    }
  });
}

let insert_products = (products) => {
  menu_el.innerHTML = '';
  console.log(products);
  if (products.length == 0) {
    love_none.innerHTML += `
      <div class="love__block">
        <img class="love__img" src="./assert/image/love__none.svg" alt="none love">
        <h2 class="love__title">Ничего нет</h2>
        <p class="love__text">Вы пока ничего не добавили в избранное <br> посмотрите наше <a class="love__href" href="menu.php">меню</a></p>
    </div>`;
  }

  products.forEach((product) => {
    if (product.sale == 0) {
      if (product.is_loving == -1) {
        if (product.portion == 1) {
          menu_el.innerHTML += `
            <div class="menu__block">
              <a class="menu__image_box" href="card_product.php?product=${product.id}">
                <img class="menu__image" src="${product.image}" alt="image">
              </a>
              <a  class="menu__title_block" href="card_product.php?product=${product.id}">
                <h5 class="menu__title">${product.title}</h5>
              </a>
              <h5 class="menu__price">${product.price} ₽</h5>
              <p class="menu__weight">${product.portion} порция / ${product.weight} ${product.weight_name}</p>
              <div class="menu__btn_love">
                <a class="menu__btn_block" href="card_product.php?product=${product.id}">
                  <p class="menu__btn">Купить</p>
                </a>
                <label class="menu__love">
                <input type="checkbox" name="love" data-product_id="${product.id}">
                  <div></div>
                </label>
              </div>
            </div>`;
        } else if (product.portion == 2 || product.portion == 4 || product.portion == 20 || product.portion == 22) {
          menu_el.innerHTML += `
            <div class="menu__block">
              <a class="menu__image_box" href="card_product.php?product=${product.id}">
                <img class="menu__image" src="${product.image}" alt="image">
              </a>
              <a class="menu__title_block" href="card_product.php?product=${product.id}">
                <h5 class="menu__title">${product.title}</h5>
              </a>
              <h5 class="menu__price">${product.price} ₽</h5>
              <p class="menu__weight">${product.portion} порции / ${product.weight} ${product.weight_name}</p>
              <div class="menu__btn_love">
                <a class="menu__btn_block" href="card_product.php?product=${product.id}">
                  <p class="menu__btn">Купить</p>
                </a>
                <label class="menu__love">
                <input type="checkbox" name="love" data-product_id="${product.id}">
                  <div></div>
                </label>
              </div>
            </div>`;
        } else {
          menu_el.innerHTML += `
            <div class="menu__block">
              <a class="menu__image_box" href="card_product.php?product=${product.id}">
                <img class="menu__image" src="${product.image}" alt="image">
              </a>
              <a class="menu__title_block" href="card_product.php?product=${product.id}">
                <h5 class="menu__title">${product.title}</h5>
              </a>
              <h5 class="menu__price">${product.price} ₽</h5>
              <p class="menu__weight">${product.portion} порций / ${product.weight} ${product.weight_name}</p>
              <div class="menu__btn_love">
                <a class="menu__btn_block" href="card_product.php?product=${product.id}">
                  <p class="menu__btn">Купить</p>
                </a>
                <label class="menu__love">
                <input type="checkbox" name="love" data-product_id="${product.id}">
                  <div></div>
                </label>
              </div>
            </div>`;
        }
      } else {
        if (product.portion == 1) {
          menu_el.innerHTML += `
            <div class="menu__block">
              <a class="menu__image_box" href="card_product.php?product=${product.id}">
                <img class="menu__image" src="${product.image}" alt="image">
              </a>
              <a  class="menu__title_block" href="card_product.php?product=${product.id}">
                <h5 class="menu__title">${product.title}</h5>
              </a>
              <h5 class="menu__price">${product.price} ₽</h5>
              <p class="menu__weight">${product.portion} порция / ${product.weight} ${product.weight_name}</p>
              <div class="menu__btn_love">
                <a class="menu__btn_block" href="card_product.php?product=${product.id}">
                  <p class="menu__btn">Купить</p>
                </a>
                <label class="menu__love">
                <input type="checkbox" name="love" data-product_id="${product.id}" checked>
                  <div></div>
                </label>
              </div>
            </div>`;
        } else if (product.portion == 2 || product.portion == 4 || product.portion == 20 || product.portion == 22) {
          menu_el.innerHTML += `
            <div class="menu__block">
              <a class="menu__image_box" href="card_product.php?product=${product.id}">
                <img class="menu__image" src="${product.image}" alt="image">
              </a>
              <a class="menu__title_block" href="card_product.php?product=${product.id}">
                <h5 class="menu__title">${product.title}</h5>
              </a>
              <h5 class="menu__price">${product.price} ₽</h5>
              <p class="menu__weight">${product.portion} порции / ${product.weight} ${product.weight_name}</p>
              <div class="menu__btn_love">
                <a class="menu__btn_block" href="card_product.php?product=${product.id}">
                  <p class="menu__btn">Купить</p>
                </a>
                <label class="menu__love">
                <input type="checkbox" name="love" data-product_id="${product.id}" checked>
                  <div></div>
                </label>
              </div>
            </div>`;
        } else {
          menu_el.innerHTML += `
            <div class="menu__block">
              <a class="menu__image_box" href="card_product.php?product=${product.id}">
                <img class="menu__image" src="${product.image}" alt="image">
              </a>
              <a class="menu__title_block" href="card_product.php?product=${product.id}">
                <h5 class="menu__title">${product.title}</h5>
              </a>
              <h5 class="menu__price">${product.price} ₽</h5>
              <p class="menu__weight">${product.portion} порций / ${product.weight} ${product.weight_name}</p>
              <div class="menu__btn_love">
                <a class="menu__btn_block" href="card_product.php?product=${product.id}">
                  <p class="menu__btn">Купить</p>
                </a>
                <label class="menu__love">
                <input type="checkbox" name="love" data-product_id="${product.id}" checked>
                  <div></div>
                </label>
              </div>
            </div>`;
        }
      }
    } else {
      if (product.is_loving == -1) {
        if (product.portion == 1) {
          menu_el.innerHTML += `
            <div class="menu__block">
              <a class="menu__image_box" href="card_product.php?product=${product.id}">
                <img class="menu__image" src="${product.image}" alt="image">
              </a>
              <a  class="menu__title_block" href="card_product.php?product=${product.id}">
                <h5 class="menu__title">${product.title}</h5>
              </a>
              <h5 class="menu__price">${product.price} ₽</h5>
              <p class="menu__weight">${product.portion} порция / ${product.weight} ${product.weight_name}</p>
              <div class="menu__btn_love">
                <a class="menu__btn_block" href="card_product.php?product=${product.id}">
                  <p class="menu__btn">Купить</p>
                </a>
                <label class="menu__love">
                <input type="checkbox" name="love" data-product_id="${product.id}">
                  <div></div>
                </label>
              </div>
            </div>`;
        } else if (product.portion == 2 || product.portion == 4 || product.portion == 20 || product.portion == 22) {
          menu_el.innerHTML += `
            <div class="menu__block">
              <a class="menu__image_box" href="card_product.php?product=${product.id}">
                <img class="menu__image" src="${product.image}" alt="image">
              </a>
              <a class="menu__title_block" href="card_product.php?product=${product.id}">
                <h5 class="menu__title">${product.title}</h5>
              </a>
              <h5 class="menu__price">${product.price} ₽</h5>
              <p class="menu__weight">${product.portion} порции / ${product.weight} ${product.weight_name}</p>
              <div class="menu__btn_love">
                <a class="menu__btn_block" href="card_product.php?product=${product.id}">
                  <p class="menu__btn">Купить</p>
                </a>
                <label class="menu__love">
                <input type="checkbox" name="love" data-product_id="${product.id}">
                  <div></div>
                </label>
              </div>
            </div>`;
        } else {
          menu_el.innerHTML += `
            <div class="menu__block">
              <a class="menu__image_box" href="card_product.php?product=${product.id}">
                <img class="menu__image" src="${product.image}" alt="image">
              </a>
              <a class="menu__title_block" href="card_product.php?product=${product.id}">
                <h5 class="menu__title">${product.title}</h5>
              </a>
              <h5 class="menu__price">${product.price} ₽</h5>
              <p class="menu__weight">${product.portion} порций / ${product.weight} ${product.weight_name}</p>
              <div class="menu__btn_love">
                <a class="menu__btn_block" href="card_product.php?product=${product.id}">
                  <p class="menu__btn">Купить</p>
                </a>
                <label class="menu__love">
                <input type="checkbox" name="love" data-product_id="${product.id}">
                  <div></div>
                </label>
              </div>
            </div>`;
        }
      } else {
        if (product.portion == 1) {
          menu_el.innerHTML += `
            <div class="menu__block">
              <a class="menu__image_box" href="card_product.php?product=${product.id}">
                <img class="menu__image" src="${product.image}" alt="image">
              </a>
              <a  class="menu__title_block" href="card_product.php?product=${product.id}">
                <h5 class="menu__title">${product.title}</h5>
              </a>
              <h5 class="menu__price">${product.price} ₽</h5>
              <p class="menu__weight">${product.portion} порция / ${product.weight} ${product.weight_name}</p>
              <div class="menu__btn_love">
                <a class="menu__btn_block" href="card_product.php?product=${product.id}">
                  <p class="menu__btn">Купить</p>
                </a>
                <label class="menu__love">
                <input type="checkbox" name="love" data-product_id="${product.id}" checked>
                  <div></div>
                </label>
              </div>
            </div>`;
        } else if (product.portion == 2 || product.portion == 4 || product.portion == 20 || product.portion == 22) {
          menu_el.innerHTML += `
            <div class="menu__block">
              <a class="menu__image_box" href="card_product.php?product=${product.id}">
                <img class="menu__image" src="${product.image}" alt="image">
              </a>
              <a class="menu__title_block" href="card_product.php?product=${product.id}">
                <h5 class="menu__title">${product.title}</h5>
              </a>
              <h5 class="menu__price">${product.price} ₽</h5>
              <p class="menu__weight">${product.portion} порции / ${product.weight} ${product.weight_name}</p>
              <div class="menu__btn_love">
                <a class="menu__btn_block" href="card_product.php?product=${product.id}">
                  <p class="menu__btn">Купить</p>
                </a>
                <label class="menu__love">
                <input type="checkbox" name="love" data-product_id="${product.id}" checked>
                  <div></div>
                </label>
              </div>
            </div>`;
        } else {
          menu_el.innerHTML += `
            <div class="menu__block">
              <a class="menu__image_box" href="card_product.php?product=${product.id}">
                <img class="menu__image" src="${product.image}" alt="image">
              </a>
              <a class="menu__title_block" href="card_product.php?product=${product.id}">
                <h5 class="menu__title">${product.title}</h5>
              </a>
              <h5 class="menu__price">${product.price} ₽</h5>
              <p class="menu__weight">${product.portion} порций / ${product.weight} ${product.weight_name}</p>
              <div class="menu__btn_love">
                <a class="menu__btn_block" href="card_product.php?product=${product.id}">
                  <p class="menu__btn">Купить</p>
                </a>
                <label class="menu__love">
                <input type="checkbox" name="love" data-product_id="${product.id}" checked>
                  <div></div>
                </label>
              </div>
            </div>`;
        }
      }
    }
  })

  let love__btns = document.querySelectorAll('input[name="love"]');

  love__btns.forEach((love__btn) => {
    love__btn.addEventListener('click', (event) => function__love(event));
  });
}

let function__love = (event) => {
  // console.log(event.target.dataset.product_id)
  let API_URL = window.location.origin + '/API/';
  if (!event.target.checked) {
    API_URL += 'del_love.php';
  } else {
    API_URL += 'add_love.php';
  }

  let data = {
    product: event.target.dataset.product_id,
  }

  fetch(API_URL, {
    method: "POST",
    headers: {
      'Content-type': 'application/x-www-form-urlencoded;'
    },
    body: new URLSearchParams(data),
    credentials: "include",
  }).then((response) => check_love_status(response));
};

let check_love_status = (response) => {
  if (response.status === 200) {
  }
  else if (response.status === 401) {
    window.location.href = window.location.origin + '/log_in.php';
  }
  else {
    alert("Проверь инет, балбес");
  }
}


request_products();