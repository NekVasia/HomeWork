//Калькулятор на JS с использованием createElement() и createTextNode()

let container = document.createElement('div');
let input_1 = document.createElement('input');

let operator = document.createElement('select')
let operators = ['+', '-', '×', '÷'];

operators.forEach(function(operation) { //Сложно https://qna.habr.com/q/988255
    let option = document.createElement('option');
    option.value = operation;
    option.innerText = operation;
    operator.appendChild(option);
});

let input_2 = document.createElement('input');

let result = document.createElement('input');

let calculatorButton = document.createElement('button');
let calculatorButtonText = document.createTextNode('Вычислить');
calculatorButton.appendChild(calculatorButtonText);

container.appendChild(input_1);
container.appendChild(operator);
container.appendChild(input_2);
container.appendChild(calculatorButton);
container.appendChild(result);

document.body.appendChild(container); //Засовывает весь контейнер в тело страницы

calculatorButton.addEventListener('click',
function () {
    let number1 = parseFloat(input_1.value);
    let number2 = parseFloat(input_2.value);
    let operation = operator.value;
    let calcResult;
    if (operation === "+") {
        calcResult = number1 + number2;
    }
    if (operation === "-") {
        calcResult = number1 - number2;
    }
    if (operation === "×") {
        calcResult = number1 * number2;
    }
    if (operation === "÷") {
        calcResult = number2 !== 0 ? number1 / number2 : "Ошибка: Деление на 0";
    }
    result.value = calcResult;
});


