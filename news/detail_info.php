<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Новость детально");
$APPLICATION->SetPageProperty("keywords", "новости, детально");
$APPLICATION->SetTitle("Новость детально");

$APPLICATION->IncludeComponent(
    "my_namespace:detail_info", 
    "",
    [
        "ORDER" => ['SORT' => 'ASC'],
        "FILTER" => ['CODE' => $_REQUEST['CODE']],
        "SELECT" => ["DETAIL_TEXT","NAME","ACTIVE_FROM"]
    ],
    false
);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");