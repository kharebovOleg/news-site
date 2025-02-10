<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();


if (!CModule::IncludeModule('iblock')) {
    ShowError('Модуль «Информационные блоки» не установлен');
    return;
}

class DetailInfo extends CBitrixComponent {
    public function executeComponent()
    {
        $this->getArResult();
        $this->includeComponentTemplate();
    }

    function getArResult() {
        $arParams = $this->arParams;

        $order = ['SORT' => 'ASC'];
        $filter = ['CODE' => $arParams['ELEMENT_CODE']];
        $select = ["DETAIL_TEXT","NAME","ACTIVE_FROM"];

        $newsList = \Bitrix\Iblock\ElementTable::getList(
            [   
                "order" => $arParams["ORDER"],
                "filter" => $arParams["FILTER"],
                "select" => $arParams["SELECT"]
            ]
        );

        $arResult["ITEM"] = $newsList->fetch();
        
        // устанавливаем дату
        $month = [
            1 => 'января', 2 => 'февраля', 3 => 'марта', 4 => 'апреля',
            5 => 'мая', 6 => 'июня', 7 => 'июля', 8 => 'августа',
            9 => 'сентября', 10 => 'октября', 11 => 'ноября', 12 => 'декабря'
        ];
        $time = strtotime($arResult["ITEM"]['ACTIVE_FROM']);
        $arResult["ITEM"]["DATE"] = date('d', $time) . " " . $month[date('n', $time)] . " " . date('Yгода');

        $this->arResult = $arResult;
    }
}