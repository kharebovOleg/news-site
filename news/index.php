<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новости компании");?>


<?$APPLICATION->IncludeComponent(
	"my_namespace:list_info",
	"template_for_list",
	[
		"ELEMENT_COUNT" => 3,
		"SHOW_PAGINATION" => 'Y',
		"ORDER" => ['SORT' => 'ASC'],
		"FILTER" => ["IBLOCK_ID" => 1],
		"SELECT" => ["ID", "CODE", "IBLOCK_ID", "ACTIVE_FROM", "NAME", "PREVIEW_TEXT"]
	],
	false
);?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>