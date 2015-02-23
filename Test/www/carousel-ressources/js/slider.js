/***********************************************************************************/
/*********************************** DONNEES SLIDER ********************************/
/***********************************************************************************/
var slider;

var slides =
    [
        { image : "images/1.jpg", legend : "Photo 1"},
        { image : "images/2.jpg", legend : "Photo 2"},
        { image : "images/3.jpg", legend : "Photo 3"},
        { image : "images/4.jpg", legend : "Photo 4"},
        { image : "images/5.jpg", legend : "Photo 5"},
        { image : "images/6.jpg", legend : "Photo 6"}

    ];


/***********************************************************************************/
/********************************** FONCTIONS SLIDER *******************************/
/***********************************************************************************/

function refreshSlider()
{
    var elemImage = document.querySelector("#js-slider img");
    elemImage.src = slides[slider.current].image;
    var elemP = document.querySelector("#js-slider p");
    elemP.innerHTML = slides[slider.current].legend;

}

function GoToNext()
{
    slider.current++;

    if(slider.current > slides.length)
    {
        slider.current = slides.length;
    }
    else if (slider.current == slides.length)
    {
        slider.current = 0;
    }
    refreshSlider();

}

function onClickToggleSlider()
{
    if(slider.timer == null)
    {
        slider.timer = setInterval(GoToNext, 2000);
        this.innerHTML = "Stop the slider";
    }
    else
    {
        clearInterval(slider.timer);
        slider.timer = null;
        this.innerHTML = "Start the slider";
    }
}

function arrowUpDown()
{

}

function HideOrShowToolbar()
{
    document.getElementById("js-hide").classList.toggle("hidden");

    var divElement = document.getElementById("js-hide");
    var toolbarElement = document.getElementById("js-toolbar");

    if(divElement.classList.contains("hidden"))
    {
        toolbarElement.classList.add("fa");
        toolbarElement.classList.add("fa-arrow-right");
        toolbarElement.classList.remove("fa-arrow-down");
    }
    else
    {
        toolbarElement.classList.add("fa-arrow-down");
        toolbarElement.classList.remove("fa-arrow-right");
    }
}

function onClickGoToRandom()
{
    slider.current = getRandomInteger(0, slides.length);
    var elemImg = document.querySelector("#js-slider img");
    elemImg.src = slides[slider.current].image;
    var elemP = document.querySelector("#js-slider p");
    elemP.innerHTML = slides[slider.current].legend;
}

function onClickGoToPrevious()
{
    slider.current--;

    if(slider.current < 0)
    {
        slider.current = slides.length - 1;
    }

    refreshSlider();
}

function initSlider()
{
    slider = {};
    slider.current = 0;
    slider.timer = null;

    document.getElementById("js-sliderPrev").addEventListener("click", onClickGoToPrevious);
    document.getElementById("js-sliderNext").addEventListener("click", GoToNext);
    document.getElementById("js-sliderRandom").addEventListener("click", onClickGoToRandom);
    document.getElementById("js-sliderStart").addEventListener("click", onClickToggleSlider);
    document.getElementById("js-toolbar").addEventListener("click", HideOrShowToolbar);

    refreshSlider();
}

/***********************************************************************************/
/********************************** CODE PRINCIPAL *********************************/
/***********************************************************************************/


document.addEventListener("DOMContentLoaded", initSlider);