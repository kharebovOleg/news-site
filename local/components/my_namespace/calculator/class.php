<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

class MyCalculator extends CBitrixComponent
{
    public function executeComponent()
    {
        $this->arResult["RES"] = $this->calc($this->arParams);

        $this->includeComponentTemplate();
    }


    function onPrepareComponentParams($arParams)
    {
        $result = array(
            "FIRST" => intval($arParams["FIRST"]),
            "SECOND" => intval($arParams["SECOND"]),
            "OPERATOR" => trim($arParams["OPERATOR"])
        );
        return $result;
    }

    function calc($arParams)
    {
        $operator = $arParams["OPERATOR"];
        $a = $arParams["FIRST"];
        $b = $arParams["SECOND"];
        switch($operator)
        {
            case "+":
                return $a + $b;
 
            case "-":
                return $a - $b;
 
            case "*":
                return $a * $b;
 
            case "/":
                return $a / $b;
            default:
                return "неизвестный оператор";
        }
    }
}
?>