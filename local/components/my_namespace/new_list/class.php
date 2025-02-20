<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if (!CModule::IncludeModule('iblock')) {
    ShowError('Модуль «Информационные блоки» не установлен');
    return;
}

class NewList extends CBitrixComponent {

    public function executeComponent() {
        $this->loadArResult();
        $this->includeComponentTemplate();
    }

    function loadArResult() {
        $arParams = $this->arParams;
        $arResult = [];

        $entity = Bitrix\Iblock\Iblock::wakeUp($arParams['IBLOCK_ID'])->getEntityDataClass();
        $dbResult = $entity::getList(
            [   
                "order" => $arParams['ORDER'],
                "filter" => $arParams['FILTER'],
                "select" => $arParams['SELECT'],
                "count_total" => true,
                "offset" => 0,
                "limit" => $arParams['ELEMENT_COUNT']
            ]
        );

        while($elem = $dbResult->fetch()) {
            // на d7 получить DETAIL_PAGE_URL можно при помощи CIBlock::ReplaceDetailUrl
            $elem['DETAIL_PAGE_URL'] = CIBlock::ReplaceDetailUrl($elem['DETAIL_PAGE_URL'], $elem, false, 'E');
            $arResult['RES'][] = $elem;
        }

        $this->arResult = $arResult;
    }

}