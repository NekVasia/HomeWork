function calculate() {

    const data = {
        "number1":document.getElementById("number1").value,
        "number2":document.getElementById("number2").value,
        "operation":document.getElementById("operation").value
    }

    fetch("server/calculator.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
    })

        .then(response => response.json())
        .then(data => {
            document.getElementById("result").innerText = data.result;
        })
        .catch(error => {
            document.getElementById("result").innerText = "Ошибка";
        });
}