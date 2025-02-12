<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/**
     * $arParams[min]
     * $arParams[max]
     * $arParams[default]
*/

class Slider extends CBitrixComponent {

    public function executeComponent()
    {
        $this->getArrResult();
        $this->includeComponentTemplate();
    }

    function getArrResult()
    {
        $arParams = $this->arParams;

        $arResult['VALUE'] = $arParams['DEFAULT'];
        $arResult['MAX'] = $arParams['MAX'];
        $arResult['MIN'] = $arParams['MIN'];

        if($arResult['MIN'] < 1) $arResult['MIN'] = 1;
        if($arResult['MAX'] > 10) $arResult['MAX'] = 10;
        if($arResult['VALUE'] < $arResult['MIN'] || $arResult['VALUE'] > $arResult['MAX']) $arResult['VALUE'] = 3;

        $this->arResult = $arResult;
    }
}

?>