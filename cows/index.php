<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Коровы");

foreach($_POST as $key => $val) {
	$_SESSION['SELECTED_TAGS'][$key] = $val;
}

$APPLICATION->IncludeComponent(
	"my_namespace:cows",
	"",
	[
		"IBLOCK_ID" => 5,
        "SELECTED_TAGS" => $_SESSION['SELECTED_TAGS'],
		"ELEMENT_COUNT" => 3,
		"SHOW_PAGINATION" => 'Y',
		"ORDER" => ['SORT' => 'ASC'],
		"FILTER" => [],
		"SELECT" => ["ID", "CODE", "IBLOCK_ID", "ACTIVE_FROM", "NAME", "PREVIEW_TEXT"],
		"SEF_MODE" => "Y"
	],
	false
);


require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>