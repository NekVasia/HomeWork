const showResult = (data) => { //Функция для вывода результата
    document.getElementById("result").innerText = data.result;
}

const clearHistory = () => { //Функция для отчистки истории
    document.getElementById("history").innerHTML = "";
}

const showHistory = (data) => { //Функция для отображения истории
    data.history.forEach((item) => appendHistoryItem(item));
}

const appendHistoryItem = (data) => { //Функция для конструирования отображаемой истории
    const historyElement = document.getElementById("history");
    const historyItemElement = document.createElement("div");
    historyItemElement.innerText = data.number1 + data.operation + data.number2 + "=" + data.result;
    historyElement.append(historyItemElement); // append втыкает в него
}

const showError = (error) => { //Функция вывода ошибки
    console.log(error);
    document.getElementById("result").innerText = "Ошибка";
}

const getData = () => { //Создаем массив с данными калькулятора
    return { //"Возвращаем" данные с HTML
        "number1": document.getElementById("number1").value,
        "number2": document.getElementById("number2").value,
        "operation": document.getElementById("operation").value
    }
}

const init = () => { //Функция для отображения истории при загрузке страницы
    fetch("server/calculator.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(getData()),
    })

        .then(response => response.json())
        .then(data => {
            showHistory(data);
        })
        .catch(error => {
            showError(error);
        });
}

const calculate = () => { //Функция для передачи данных в php
    fetch("server/calculator.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(getData()),
    })

        .then(response => response.json())
        .then(data => {
            console.log(data);
            showResult(data);
            clearHistory();
            showHistory(data);
        })
        .catch(error => {
            showError(error);
        });
}

window.addEventListener('load', () => { //Функция для вывода данных "История" при загрузке страницы
    init();
});
