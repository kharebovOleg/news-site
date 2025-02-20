<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
use Bitrix\Main\Loader;
use Bitrix\Iblock; 
if (!CModule::IncludeModule('iblock')) {
    ShowError('Модуль «Информационные блоки» не установлен');
    return;
}

if (!CModule::IncludeModule("search")) {
    ShowError('Модуль «Поиск» не установлен');
    return;
}

 class SearchSimple extends CBitrixComponent {


    public function executeComponent() {
        $this->loadArResult();
        $this->includeComponentTemplate();
    }

    function loadArResult() {
        $arParams = $this->arParams;
        $query = $_REQUEST['q'] ?? '';
        // if ($query) {
        //     $arFilter = ['IBLOCK_ID' => $arParams['IBLOCK_ID'], 'ACTIVE' => 'Y','%NAME' => $query];
        //     $arSelect = ['ID', 'NAME', 'PREVIEW_TEXT', 'DETAIL_PAGE_URL' => 'IBLOCK.DETAIL_PAGE_URL'];

        //     $res = Iblock\ElementTable::getList(['filter' => $arFilter, 'select' => $arSelect]);

        //     $arResult = [];
        //     while ($item = $res->fetch()) {
        //         $item['DETAIL_PAGE_URL'] = CIBlock::ReplaceDetailUrl($item['DETAIL_PAGE_URL'], $item, false, 'E');
        //         $arResult[] = $item;
        //     }
        //     $this->arResult['ITEMS'] = $arResult;
        // }
        
        $module_id = "iblock";
        $param1='cows';
        $obSearch = new CSearch();
        $obSearch->Search(
            [
                'MODULE_ID' => $module_id, // где искать - iblock означает искать в инфоблоках
                "QUERY" => $_REQUEST['q'] // искомое значение
            ]
        );
        while($item = $obSearch->GetNext()) {
            $item['DETAIL_URL'] = "cows/detail/" . $item['ITEM_ID'];
            $arResult[] = $item;
        }
        
        $this->arResult['ITEMS'] = $arResult;
    }
}