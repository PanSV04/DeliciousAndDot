const menu_el = document.querySelector(".menu");

let request_products = () => {
  const API_URL = window.location.origin + '/API/get_products.php?category=2';

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
            <div class="menu__price_box">
              <h5 class="menu__price">${product.sale} ₽</h5>
              <h5 class="menu__sale">${product.price} ₽</h5>
              <img class="menu__crossed" src="./assert/image/price__crossed.png" alt="crossed">
            </div>
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
            <div class="menu__price_box">
              <h5 class="menu__price">${product.sale} ₽</h5>
              <h5 class="menu__sale">${product.price} ₽</h5>
              <img class="menu__crossed" src="./assert/image/price__crossed.png" alt="crossed">
            </div>
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
            <div class="menu__price_box">
              <h5 class="menu__price">${product.sale} ₽</h5>
              <h5 class="menu__sale">${product.price} ₽</h5>
              <img class="menu__crossed" src="./assert/image/price__crossed.png" alt="crossed">
            </div>
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
            <div class="menu__price_box">
              <h5 class="menu__price">${product.sale} ₽</h5>
              <h5 class="menu__sale">${product.price} ₽</h5>
              <img class="menu__crossed" src="./assert/image/price__crossed.png" alt="crossed">
            </div>
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
            <div class="menu__price_box">
              <h5 class="menu__price">${product.sale} ₽</h5>
              <h5 class="menu__sale">${product.price} ₽</h5>
              <img class="menu__crossed" src="./assert/image/price__crossed.png" alt="crossed">
            </div>
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
            <div class="menu__price_box">
              <h5 class="menu__price">${product.sale} ₽</h5>
              <h5 class="menu__sale">${product.price} ₽</h5>
              <img class="menu__crossed" src="./assert/image/price__crossed.png" alt="crossed">
            </div>
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

const btn = document.querySelectorAll(".categories__btn__input");

btn.forEach((button_one) => {

  console.log(button_one);

  button_one.addEventListener('click', () => {
    const API_URL = window.location.origin + '/API/get_products.php?category=' + button_one.value;

    fetch(API_URL, {
      method: "GET",
      credentials: "include",
    }).then((response) => {
      if (response.status === 200) {
        response.json().then((products) => insert_products(products));
      }
    });
  });
});

const btn__filter = document.querySelector("#btn__filter");

btn__filter.addEventListener('click', () => {
  const categories__input = document.querySelector(".categories__btn__input:checked");
  let API_URL = window.location.origin + '/API/get_products.php?category=' + categories__input.value;

  let input__filter = new Array();

  let input = document.querySelectorAll("input[name='taste']:checked, input[name='stuffing']:checked, input[name='portion']:checked");

  let array__from = Array.from(input);

  let avaluable__btn = document.querySelector(".avaluable__btn");

  let sale__btn = document.querySelector(".sale__btn");

  let input__min_price = document.querySelector(".input-min");

  let input__max_price = document.querySelector(".input-max");

  input__filter = input__filter.concat(array__from);
  console.log(input__filter);

  Array.from(input__filter).forEach((input__check) => {
    console.log(input__check);
    API_URL += `&${input__check.name}[]=${input__check.value}`;
  });

  if (avaluable__btn.checked) {
    API_URL += `&stock=1`;
  }

  if (sale__btn.checked) {
    API_URL += `&sale=true`;
  }

  API_URL += `&${input__min_price.name}=${input__min_price.value}`;

  API_URL += `&${input__max_price.name}=${input__max_price.value}`;

  console.log(API_URL);

  fetch(API_URL, {
    method: "GET",
    credentials: "include",
  }).then((response) => {
    if (response.status === 200) {
      response.json().then((products) => insert_products(products));
    } else {
      menu_el.innerHTML = `
      <div class="menu__block">
        <h5 class="swiper-slide__title">гг</h5>
      </div>`;
    }
  });
});

document.querySelector(".filter__form").addEventListener('submit', (form) => {
  form.preventDefault();
});