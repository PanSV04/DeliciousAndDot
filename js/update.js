document.querySelector(".update__product").addEventListener("submit", (event) => send_fetch(event));

let send_fetch = (event) => {
    let data = {};
    event.preventDefault();
    event.target.querySelectorAll(".form__field").forEach(element => {
        data[element.name] = element.value;
    });

    const API_URL = window.location.origin + "/API/update_product.php";

    fetch(API_URL, {
        method: "POST",
        headers: {
            'Content-type': 'application/x-www-form-urlencoded;'
        },
        body: new URLSearchParams(data),
        credentials: "include",
    }).then((response) => check_log_in_status(response));
}

let check_log_in_status = (response) => {
    if (response.status === 200) {
        alert("данные обновлены успешно!")
    } else if (response.status === 401) {
        alert("Команда не выполнена")
    } else {
        alert("Нет соединения");
    }
}