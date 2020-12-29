const y = document.forms["main"]["y"];
const btn = document.forms["main"]["submit"];
y.oninput = function () {
    if (y.value !== "-")
        if ((y.value !== "" && isNaN(y.value)) || y.value.length > 6) // Если строка перестала соответсвовать критериям числа то удаляем последний введённый символ
            y.value = y.value.substr(0, y.value.length - 1);

    // Если введено число но выходит за границы ОДЗ то выключаем кнопку
    btn.disabled = parseInt(y.value) >= 3 || parseInt(y.value) <= -5;
}