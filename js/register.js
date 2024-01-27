document.querySelector(".form__column").addEventListener("submit", (event) => send_fetch(event));

let send_fetch = (event) => {
    let data = {};
    event.preventDefault();
    event.target.querySelectorAll(".form__field").forEach(element => {
        data[element.name] = element.value;
    });

    const API_URL = window.location.origin + "/API/registr.php";

    fetch(API_URL, {
        method: "POST",
        headers: {
            'Content-type': 'application/x-www-form-urlencoded;'
        },
        body: new URLSearchParams(data),
        credentials: "include",
    }).then((response) => check_reg_status(response));
}

let check_reg_status = (response) => {
    if (response.status === 200) {
        window.location.href = window.location.origin + "/prof.php";
        alert("Вы успешно зарегестрированы")
    } else if (response.status === 401) {
        alert("Пароль или логин не верный")
    } else {
        alert("Проверь инет, балбес");
    }
}