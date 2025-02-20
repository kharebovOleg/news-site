<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();


if (!CModule::IncludeModule('iblock')) {
    ShowError('Модуль «Информационные блоки» не установлен');
    return;
}

class DetailInfo extends CBitrixComponent {
    public function executeComponent()
    {
        $this->arResult = $this->getArResult();
        $this->includeComponentTemplate();
    }

    function getArResult() {
        $arParams = $this->arParams;
        $arResult = [];


        $arParams['IBLOCK_ID'] = $arParams['IBLOCK_ID'] ?? ''; // проверить

        if($arParams['IBLOCK_ID'] !== '') {

            $iblockId = $arParams['IBLOCK_ID'];
            $entity = Bitrix\Iblock\Iblock::wakeUp($iblockId)->getEntityDataClass();
            $res = $entity::getList([
                'select' => ['NAME', 'DETAIL_TEXT', 'ID', 'speed' => 'SPEED', 'power' => 'POWER', 'intellect' => 'INTELLECT'],
                "filter" => $arParams["FILTER"]
            ]);
            $arResult["ITEM"] = $res->fetch();

            return $arResult;

        } else {
            $newsList = \Bitrix\Iblock\ElementTable::getList(
                [   
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
    
            return $arResult;
        }
    }
}