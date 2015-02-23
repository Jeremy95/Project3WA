/**
 * Created by wap19 on 22/01/15.
 */
function getRandomInteger(min, max)
{
    var result = Math.floor(Math.random() * (max - min + 1)) + min;
    return result;
}

function requestInteger(message, min, max)
{
    var question;
    do
    {
        question = parseInt(prompt(message));
    }
    while(isNaN(question) || question < min || question > max);

    return question;

}