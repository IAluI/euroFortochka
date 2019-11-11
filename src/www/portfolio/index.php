<?
  require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
  $APPLICATION->SetTitle("Контакты");
?>

<?$APPLICATION->IncludeComponent(
	"bitrix:support.faq.section.list",
	"euroFortochka",
	array(
		"AJAX_MODE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"EXPAND_LIST" => "N",
		"IBLOCK_ID" => "5",
		"IBLOCK_TYPE" => "services",
		"SECTION" => "",
    "CUR_SECTION" => $_REQUEST["SECTION_ID"],
		"SECTION_URL" => "?SECTION_ID=#SECTION_ID#"
	),
	false
);?><?$APPLICATION->IncludeComponent(
	"bitrix:support.faq.element.list",
	"euroFortochka",
	Array(
		"AJAX_MODE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"IBLOCK_ID" => "5",
		"IBLOCK_TYPE" => "services",
		"PATH_TO_USER" => "",
		"RATING_TYPE" => "",
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SHOW_RATING" => "N"
	)
);?>

<?
  require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>