
document.querySelector(".card__btn_block").addEventListener("click", (event) => send_fetch(event));

let send_fetch = (event) => {
    let data = {
        product: findGetParameter("product"),
        quantity: document.querySelector("#buttonCountNumber").innerHTML
    };

    const API_URL = window.location.origin + "/API/add_cart.php";

    fetch(API_URL, {
        method: "POST",
        headers: {
            'Content-type': 'application/x-www-form-urlencoded;'
        },
        body: new URLSearchParams(data),
        credentials: "include",
    }).then((response) => check_cart_status(response));
}

let findGetParameter = (parameterName) => {
    var result = null,
        tmp = [];
    location.search
        .substr(1)
        .split("&")
        .forEach(function (item) {
          tmp = item.split("=");
          if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
        });
    return result;
}

let check_cart_status = (response) => {
    if (response.status === 200) {
        alert("Товар успешно добавлен в корзину")
    } else if (response.status === 401) {
        window.location.href = window.location.origin + "/log_in.php";
        alert("Пожалуйста, войдите или зарегестрируйтесь, чтобы добавлять товары в корзину!");
    } else if (response.status === 409) {
        window.location.href = window.location.origin + "/cart.php";
        alert("Данный товар уже находиться в вашей корзине!"); 
    } else {
        alert("Проверь инет, балбес");
    }
}