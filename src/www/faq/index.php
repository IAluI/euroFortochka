<?
  require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
  $APPLICATION->SetTitle("Контакты");
?>

<?
  $APPLICATION->IncludeComponent(
    "bitrix:support.faq",
    "fortochkaFaq",
    Array(
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
      "IBLOCK_TYPE" => "services",
      "PATH_TO_USER" => "",
      "RATING_TYPE" => "",
      "SECTION" => "",
      "SEF_MODE" => "N",
      "SHOW_RATING" => "N"
    )
  );
?>

<?
  require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>