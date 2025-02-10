<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();


if (!CModule::IncludeModule('iblock')) {
    ShowError('Модуль «Информационные блоки» не установлен');
    return;
}

class ListInfo extends CBitrixComponent {

    public function executeComponent()
    {
        $this->getArrResult();
        $this->includeComponentTemplate();
    }

    function onPrepareComponentParams($arParams)
    {
        $arParams['ELEMENT_COUNT'] = intval($arParams['ELEMENT_COUNT']);
        return $arParams;
    }

    function getArrResult()
    {
        $arParams = $this->arParams;

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
            $this->arResult['NAV'] = $nav;
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
            $this->arResult['RES'][] = $element;
        }
    }
}