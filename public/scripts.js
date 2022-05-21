$(document).ready(function(){   //когда браузер загрузит HTML и построит DOM-дерево
    $('[data-toggle="popover"]').popover({
        trigger: 'hover',   //в каких случаях будет срабатывать popover
        html: true,     //тип отображаемого контента (в данном случае HTML код)
        content: function () {  //отображемый контент
            return '<h6>Авторизируйтесь, чтобы посмотреть контакты</h6>';
        }
    })
});

window.addEventListener("DOMContentLoaded", function () {   //когда был загружен HTML

    let email = document.getElementById('email'),   //ссылка на элемент по идентификатору
        phone = document.getElementById('phone'),
        name = document.getElementById('name'),
        password = document.getElementById('password'),
        invalid_email = document.querySelector('.invalid_email'),   //ссылка на элемент по селектору
        invalid_phone = document.querySelector('.invalid_phone'),
        invalid_name = document.querySelector('.invalid_name'),
        invalid_password = document.querySelector('.invalid_password');

    email.addEventListener('input', function (event) {  //обработчик событий для поля ввода электронной почты
        let regexp = /^((([0-9A-Za-z]{1}[-0-9A-z\.]{1,}[0-9A-Za-z]{1}))@([-A-Za-z]{1,}\.){1,2}[-A-Za-z]{2,})$/u;    //регулярное выражение для электронной почты
        if (!regexp.test(email.value)) {    //проверка на соответствие регулярному выражению
            invalid_email.innerText = `Проверьте корректность электронной почты`;   //вывод ошибки, если электронная почта не соответствует регулярному выражению
            email.classList.add('is-invalid');  //добавление класса, выделяющего некорректное поле ввода
        } else {    //если почта корректна
            invalid_email.innerText = ``;   //ошибка не выводится
            email.classList.remove('is-invalid');   //удаление класса, выделяющего некорректное поле ввода
            email.classList.add('is-valid');    //добавление класса, выделяющего корректное поле ввода
        }
    });

    phone.addEventListener('input', function (event) {  //обработчик событий для поля ввода номера телефона
        let regexp = /^[0-9]{11}$/u;    //регулярное выражение для номера телефона
        if (!regexp.test(phone.value)) {    //проверка на соответствие регулярному выражению
            invalid_phone.innerText = `Проверьте корректность номера телефона`; //вывод ошибки, если не соответствует регулярному выражению
            phone.classList.add('is-invalid');
        } else {
            invalid_phone.innerText = ``;
            phone.classList.remove('is-invalid');
            phone.classList.add('is-valid');
        }
    });

    name.addEventListener('input', function (event) {   //обработчик событий для поля ввода имени
        let regexp = /^[a-zA-Z0-9]{2,20}$/u;    //регулярное выражение для имени
        if (!regexp.test(name.value)) { //проверка на соответствие регулярному выражению
            invalid_name.innerText = `Проверьте корректность имени`;    //вывод ошибки, если не соответствует регулярному выражению
            name.classList.add('is-invalid');
        } else {
            invalid_name.innerText = ``;
            name.classList.remove('is-invalid');
            name.classList.add('is-valid');
        }
    });

    password.addEventListener('input', function (event) {   //обработчик событий для поля ввода пароля
        let regexp = /^[a-zA-Z0-9]{6,40}$/u;    //регулярное выражение для пароля
        if (!regexp.test(password.value)) { //проверка на соответствие регулярному выражению
            invalid_password.innerText = `Пароль должен состоять из шести или более цифр и букв латинского алфавита`;   //вывод ошибки, если не соответствует регулярному выражению
            password.classList.add('is-invalid');
        } else {
            invalid_password.innerText = ``;
            password.classList.remove('is-invalid');
            password.classList.add('is-valid');
        }
    });
});

function matching_passwords() {     //функция для проверки совпадения паролей
    let password = document.getElementById('password'),     //ссылка на элемент по идентификатору
        passwordconfirmation = document.getElementById('password_confirmation'),
        password_mismatch = document.querySelector('.password_mismatch'),   //ссылка на элемент по селектору
        buttonForm = document.querySelector('.valid');

    if (password.value != passwordconfirmation.value) {     //если пароли не совпадают
        password_mismatch.innerText = `Пароли не совпадают`;    //вывод ошибки
        passwordconfirmation.classList.add('is-invalid');
        buttonForm.setAttribute('disabled', true);  //отключение кнопки
    } else {
        password_mismatch.innerText = ``;   //ошибок нет
        passwordconfirmation.classList.remove('is-invalid');
        passwordconfirmation.classList.add('is-valid');
        buttonForm.removeAttribute('disabled');     //включение кнопки
    }
};
