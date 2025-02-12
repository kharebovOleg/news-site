<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();


if (!CModule::IncludeModule('iblock')) {
    ShowError('Модуль «Информационные блоки» не установлен');
    return;
}

class ListInfo extends CBitrixComponent {

    public function executeComponent()
    {
        $this->arResult = $this->getArResult();
        $this->includeComponentTemplate();
    }

    function onPrepareComponentParams($arParams)
    {
        // передаем значение из сессии
        $arParams['ELEMENT_COUNT'] = $_SESSION['ELEMENT_COUNT'];

        $arParams['ELEMENT_COUNT'] = intval($arParams['ELEMENT_COUNT']);
        if($arParams['ELEMENT_COUNT'] <= 0) $arParams['ELEMENT_COUNT'] = 3;

        $arParams["SEF_MODE"] = trim($arParams["SEF_MODE"]);
        if($arParams["SEF_MODE"] !== 'N') $arParams["SEF_MODE"] = 'Y';

        return $arParams;
    }

    function getArResult()
    {
        $arParams = $this->arParams;
        $arResult = [];

        $hasPagination = $arParams["SHOW_PAGINATION"] === 'Y';

        $order = $arParams['ORDER'];
        $select = $arParams['SELECT'];
        $filter = $arParams['FILTER'];
        $offset = 0;
        $limit = $arParams['ELEMENT_COUNT'];

        if($hasPagination) {
            $nav = new \Bitrix\Main\UI\PageNavigation("list");
            $nav->allowAllRecords(false)
                ->setPageSize($arParams['ELEMENT_COUNT'])
                ->initFromUri();
            $offset = $nav->getOffset();
            $limit = $nav->getLimit();
        }
        
        $newsList = \Bitrix\Iblock\ElementTable::getList(
            [   
                "order" => $order,
                "filter" => $filter,
                "select" => $select,
                "count_total" => true,
                "offset" => $offset,
                "limit" => $limit
            ]
        );
        
        if($hasPagination) {
            $nav->setRecordCount($newsList->getCount());
            $arResult['NAV'] = $nav;
            $arResult["SEF_MODE"] = $arParams["SEF_MODE"];
        }
        
        $month = [
            1 => 'января', 2 => 'февраля', 3 => 'марта', 4 => 'апреля',
            5 => 'мая', 6 => 'июня', 7 => 'июля', 8 => 'августа',
            9 => 'сентября', 10 => 'октября', 11 => 'ноября', 12 => 'декабря'
        ];
        
        foreach ($newsList as $element)
        {
            $element['DETAIL_PAGE_URL'] = "/news/detail/{$element['CODE']}";
            $time = strtotime($element['ACTIVE_FROM']);

            $element['DATE'] = date('d', $time) . " " . $month[date('n', $time)] . " " . date('Yгода');
            $arResult['RES'][] = $element;
        }

        return $arResult;
    }
}