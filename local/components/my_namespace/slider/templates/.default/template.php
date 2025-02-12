<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();?>


<form class="range-wrap no-js" action="sandbox.php" method="POST">
    <label for="range" class="range-label">Новостей на странице</label>
    <div class="range-inner">
        <input type="range" id="range" class="range" name="RANGE"
            value="<?=$arResult['VALUE']?>"
            max="<?=$arResult['MAX']?>"
            min="<?=$arResult['MIN']?>"
        >
        <output name="value" class="output" for="range">
            <span class="output-text"></span>
        </output>
    </div>
    <input type="submit" value="подтвердить">
</form>

<script>
    const rangeWrap = document.querySelector('.range-wrap');
    rangeWrap.classList.remove('no-js');
    const range = document.querySelector('.range');
    const output = document.querySelector('.output');

    const onRangeInput = () => {
        const value = range.value;
        output.value = value;
        output.value = value;
        const min = range.min; // Получаем минимальное значение
        const max = range.max; // Получаем максимальное значение
        const valuePercent = `${100 - ((max - value) / (max - min) * 100)}%`; // Рассчитываем проценты
        range.style.backgroundSize = `${valuePercent} 100%`; // Меняем значение background-size
    };

    onRangeInput();
    range.addEventListener('input', onRangeInput);
    range.addEventListener('submit', (event) =>{

    });
</script>


<!-- ВЕРТИКАЛЬНЫЙ СЛАЙДЕР -->

<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.4/dist/css/foundation.min.css"
    crossorigin="anonymous"/> 

<script src= "https://cdnjs.cloudflare.com/ajax/libs/foundation/6.0.1/js/vendor/jquery.min.js"></script> 
<script src= "https://cdn.jsdelivr.net/npm/foundation-sites@6.5.1/dist/js/foundation.min.js"
crossorigin="anonymous"></script>

<div class='center'> 
    <div class="slider vertical" 
        data-slider data-initial-start="1" 
        data-end="10" data-vertical="true"> 
            
        <span class="slider-handle" 
            data-slider-handle role="slider" 
            tabindex="1"> 
        </span> 

        <span class="slider-fill" 
            data-slider-fill> 
        </span> 
    </div> 
</div> 

<script> 
    $(document).ready(function () { 
        $(document).foundation(); 
    }); 
</script>