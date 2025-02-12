<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Песочница");

$APPLICATION->IncludeComponent(
	"my_namespace:slider",
	"",
	[
		'MAX' => 9,
		'MIN' => 2,
		'DEFAULT' => $_SESSION['ELEMENT_COUNT']
	]
);

// передаем значение из слайдера в $_SESSION['ELEMENT_COUNT']
if (array_key_exists('RANGE', $_POST)) {
	$_SESSION['ELEMENT_COUNT'] = $_POST["RANGE"];
}
// echo $_SESSION['ELEMENT_COUNT'];


/**
	 * вставим компонент списка новостей,
	 * в значение ELEMENT_COUNT - передадим $_POST['RANGE'],
	 * установить для ELEMENT_COUNT дефолтное значение, а то пагинация не работает
	 * $_POST['RANGE'] передается только для первой страницы пагинации, при переходе
	 * на следующую страницу $_POST['RANGE'] теряется
 */

$APPLICATION->IncludeComponent(
	"my_namespace:list_info",
	"nav",
	[
		"ELEMENT_COUNT" => $_SESSION['ELEMENT_COUNT'],
		"SHOW_PAGINATION" => 'Y',
		"ORDER" => ['SORT' => 'ASC'],
		"FILTER" => ["IBLOCK_ID" => 1],
		"SELECT" => ["ID", "CODE", "IBLOCK_ID", "ACTIVE_FROM", "NAME", "PREVIEW_TEXT"],
		"SEF_MODE" => "N"
	],
	false
);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>

