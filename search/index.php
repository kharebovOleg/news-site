<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->IncludeComponent(
	"bitrix:search.form",
	"",
	[
		"USE_SUGGEST" => "N",
		"PAGE" => "#SITE_DIR#search/index.php"
	]
);

$APPLICATION->IncludeComponent('my_namespace:search_simple','',['IBLOCK_ID' => [1,5]]);