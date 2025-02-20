<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новости компании");?>


<?$APPLICATION->IncludeComponent(
	"my_namespace:list_info",
	"nav",
	[
		"ELEMENT_COUNT" => $_SESSION['ELEMENT_COUNT'], // передаем значение из сессии
		"SHOW_PAGINATION" => 'Y',
		"ORDER" => ['SORT' => 'ASC'],
		"FILTER" => ["IBLOCK_ID" => 1],
		"SELECT" => ["ID", "CODE", "IBLOCK_ID", "ACTIVE_FROM", "NAME", "PREVIEW_TEXT"],
		"SEF_MODE" => "Y"
	],
	false
);?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>