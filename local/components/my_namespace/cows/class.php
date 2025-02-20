<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();


if (!CModule::IncludeModule('iblock')) {
    ShowError('Модуль «Информационные блоки» не установлен');
    return;
}

class Items extends CBitrixComponent {

    public function executeComponent()
    {
        $this->arResult = $this->getArResult();
        $this->includeComponentTemplate();
    }

    function onPrepareComponentParams($arParams)
    {
        $arParams['ELEMENT_COUNT'] = intval($arParams['ELEMENT_COUNT']);
        if($arParams['ELEMENT_COUNT'] <= 0) $arParams['ELEMENT_COUNT'] = 3;

        $arParams["SEF_MODE"] = trim($arParams["SEF_MODE"]);
        if($arParams["SEF_MODE"] !== 'N') $arParams["SEF_MODE"] = 'Y';

        // если есть параметры запроса, то добавляем их в фильтр и в select
        if(!empty($arParams['SELECTED_TAGS'])) {
            foreach($arParams['SELECTED_TAGS'] as $key => $value) {
                if(trim($value) == '' || trim($value) == 0) continue;
                $arParams['SELECT'][$key] = $key;
                //PROPERTY.VALUE - значение свойства, где PROPERTY это название свойства
                $arParams['FILTER']["{$key}.VALUE"] = $value;
            }
        }

        return $arParams;
    }

    function getArResult()
    {
        $arParams = $this->arParams;
        $arResult = [];

        $iblockId = $arParams['IBLOCK_ID'];
        $order = $arParams['ORDER'];
        $select = $arParams['SELECT'];
        $filter = $arParams['FILTER'];
        $offset = 0;
        $limit = $arParams['ELEMENT_COUNT'];

        $hasPagination = $arParams["SHOW_PAGINATION"] === 'Y';

        if($hasPagination) {
            $nav = new \Bitrix\Main\UI\PageNavigation("list");
            $nav->allowAllRecords(false)
                ->setPageSize($arParams['ELEMENT_COUNT'])
                ->initFromUri();
            $offset = $nav->getOffset();
            $limit = $nav->getLimit();
        }

        $entity = Bitrix\Iblock\Iblock::wakeUp($iblockId)->getEntityDataClass();
        $dbResult = $entity::getList(
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
            $nav->setRecordCount($dbResult->getCount());
            $arResult['NAV'] = $nav;
            $arResult["SEF_MODE"] = $arParams["SEF_MODE"];
        }

        $month = [
            1 => 'января', 2 => 'февраля', 3 => 'марта', 4 => 'апреля',
            5 => 'мая', 6 => 'июня', 7 => 'июля', 8 => 'августа',
            9 => 'сентября', 10 => 'октября', 11 => 'ноября', 12 => 'декабря'
        ];

        while($element = $dbResult->fetch()) {
            $element['DETAIL_PAGE_URL'] = "/cows/detail/{$element['CODE']}"; // это зацепить из инфоблока

            $time = strtotime($element['ACTIVE_FROM']);
            $element['DATE'] = date('d', $time) . " " . $month[date('n', $time)] . " " . date('Yгода');

            $arResult['RES'][] = $element;
        }
        return $arResult;
    }
}