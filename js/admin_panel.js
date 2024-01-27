document.querySelector(".add__product").addEventListener("submit", (event) => send_fetch(event));

let send_fetch = (event) => {
    let data = {};
    event.preventDefault();
    event.target.querySelectorAll(".form__field").forEach(element => {
        data[element.name] = element.value;
    });

    const API_URL = window.location.origin + "/API/add_products.php";

    fetch(API_URL, {
        method: "POST",
        headers: {
            'Content-type': 'application/x-www-form-urlencoded;'
        },
        body: new URLSearchParams(data),
        credentials: "include",
    }).then((response) => check_admin_status(response));
}

let check_admin_status = (response) => {
    if (response.status === 200) {
        alert("Успешное создание товара!")
    } else if (response.status === 401) {
        alert("У вас нет прав для создания товаров!")
    } else {
        alert("Проверьте подключение");
    }
}