/**
 * Created by wap19 on 22/01/15.
 */
function direBonjour(name, age)
{
    document.write("Bonjour " + name+ " vous avez " + age + "ans");
}

direBonjour("Bob", 20);
document.write("<br/>");
direBonjour("Alice", 40);

function getRandomInteger(min, max)
{
    var result = Math.floor(Math.random() * (max - min + 1)) + min;
    return result;
}

var random = getRandomInteger(1, 10);

document.write("<br/>" + "Nombre random : " + random + "<br/>");

function compute(num1, num2)
{
    var calc = {};
    calc.sum = num1 + num2;
    calc.sub = num1 - num2;
    calc.div = num1 / num2;
    calc.mult = num1 * num2;

    return calc;
}

var result = compute(4, 9);
console.log(result);



