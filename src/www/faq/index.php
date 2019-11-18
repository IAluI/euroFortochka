<?
  require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
  $APPLICATION->SetTitle("Контакты");
?>

<?$APPLICATION->IncludeComponent(
	"ef:support.faq",
	"fortochkaFaq",
	array(
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"EXPAND_LIST" => "N",
		"IBLOCK_ID" => "5",
		"IBLOCK_TYPE_ID" => "services",
		"IBLOCK_TYPE" => "services",
		"PATH_TO_USER" => "",
		"RATING_TYPE" => "",
		"SECTION" => "",
		"SHOW_RATING" => "N",
		"COMPONENT_TEMPLATE" => ".default",
		"SEF_MODE" => "Y",
		"SEF_FOLDER" => "/faq/",
		"SEF_URL_TEMPLATES" => array(
			"faq" => "",
			"section" => "#SECTION_ID#/",
			"detail" => "#SECTION_ID#/#ELEMENT_ID#",
		),
	),
	false
);?>

<?
  require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>