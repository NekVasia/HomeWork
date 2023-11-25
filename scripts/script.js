function init() {
    //запрос с базы данных
}

const showResult = (data) => {
    document.getElementById("result").innerText = data.result;
}

const clearHistory = () => {
    document.getElementById("history").innerHTML = "";
}

const showHistory = (data) => {
    data.history.forEach((item) => appendHistoryItem(item));
}

const appendHistoryItem = (data) => {
    const historyElement = document.getElementById("history");
    const historyItemElement = document.createElement("div");
    historyItemElement.innerText = data.number1 + data.operation + data.number2 + "=" + data.result;
    historyElement.append(historyItemElement); // append втыкает в него
}

const showError = (error) => {
    console.log(error);
    document.getElementById("result").innerText = "Ошибка";
}

const getData = () => {
    return {
        "number1": document.getElementById("number1").value,
        "number2": document.getElementById("number2").value,
        "operation": document.getElementById("operation").value
    }
}

const calculate = () => {
    fetch("server/calculator.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(getData()),
    })

        .then(response => response.json())
        .then(data => {
            showResult(data);
            clearHistory();
            showHistory(data);
        })
        .catch(error => {
            showError(error);
        });
}
