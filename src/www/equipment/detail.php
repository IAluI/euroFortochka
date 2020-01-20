<?
  require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>
<?$APPLICATION->IncludeComponent(
  "bitrix:catalog.element",
  "efProduct",
  array(
    "ACTION_VARIABLE" => "action",
    "ADD_DETAIL_TO_SLIDER" => "N",
    "ADD_ELEMENT_CHAIN" => "Y",
    "ADD_PICT_PROP" => "-",
    "ADD_PROPERTIES_TO_BASKET" => "Y",
    "ADD_SECTIONS_CHAIN" => "N",
    "BACKGROUND_IMAGE" => "-",
    "BASKET_URL" => "/personal/basket.php",
    "BRAND_USE" => "N",
    "BROWSER_TITLE" => "-",
    "CACHE_GROUPS" => "N",
    "CACHE_TIME" => "36000000",
    "CACHE_TYPE" => "A",
    "CHECK_SECTION_ID_VARIABLE" => "N",
    "COMPATIBLE_MODE" => "N",
    "DETAIL_PICTURE_MODE" => array(
      0 => "POPUP",
      1 => "MAGNIFIER",
    ),
    "DETAIL_URL" => "",
    "DISABLE_INIT_JS_IN_COMPONENT" => "N",
    "DISPLAY_COMPARE" => "N",
    "DISPLAY_NAME" => "Y",
    "DISPLAY_PREVIEW_TEXT_MODE" => "E",
    "ELEMENT_CODE" => "",
    "ELEMENT_ID" => $_REQUEST["ELEMENT_ID"],
    "IBLOCK_ID" => "7",
    "IBLOCK_TYPE" => "products",
    "IMAGE_RESOLUTION" => "16by9",
    "LABEL_PROP" => array(
    ),
    "LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
    "LINK_IBLOCK_ID" => "",
    "LINK_IBLOCK_TYPE" => "",
    "LINK_PROPERTY_SID" => "",
    "MESSAGE_404" => "",
    "MESS_BTN_ADD_TO_BASKET" => "В корзину",
    "MESS_BTN_BUY" => "Купить",
    "MESS_BTN_SUBSCRIBE" => "Подписаться",
    "MESS_COMMENTS_TAB" => "Комментарии",
    "MESS_DESCRIPTION_TAB" => "Описание",
    "MESS_NOT_AVAILABLE" => "Нет в наличии",
    "MESS_PRICE_RANGES_TITLE" => "Цены",
    "MESS_PROPERTIES_TAB" => "Характеристики",
    "META_DESCRIPTION" => "-",
    "META_KEYWORDS" => "-",
    "OFFERS_LIMIT" => "0",
    "PARTIAL_PRODUCT_PROPERTIES" => "N",
    "PRICE_CODE" => array(
    ),
    "PRICE_VAT_INCLUDE" => "Y",
    "PRICE_VAT_SHOW_VALUE" => "N",
    "PRODUCT_ID_VARIABLE" => "id",
    "PRODUCT_INFO_BLOCK_ORDER" => "sku,props",
    "PRODUCT_PAY_BLOCK_ORDER" => "rating,price,priceRanges,quantityLimit,quantity,buttons",
    "PRODUCT_PROPS_VARIABLE" => "prop",
    "PRODUCT_QUANTITY_VARIABLE" => "quantity",
    "SECTION_CODE" => "",
    "SECTION_ID" => $_REQUEST["SECTION_ID"],
    "SECTION_ID_VARIABLE" => "SECTION_ID",
    "SECTION_URL" => "",
    "SEF_MODE" => "N",
    "SET_BROWSER_TITLE" => "Y",
    "SET_CANONICAL_URL" => "N",
    "SET_LAST_MODIFIED" => "N",
    "SET_META_DESCRIPTION" => "Y",
    "SET_META_KEYWORDS" => "Y",
    "SET_STATUS_404" => "N",
    "SET_TITLE" => "Y",
    "SHOW_404" => "N",
    "SHOW_DEACTIVATED" => "N",
    "SHOW_PRICE_COUNT" => "1",
    "SHOW_SLIDER" => "N",
    "STRICT_SECTION_CHECK" => "N",
    "TEMPLATE_THEME" => "",
    "USE_COMMENTS" => "N",
    "USE_ELEMENT_COUNTER" => "Y",
    "USE_ENHANCED_ECOMMERCE" => "N",
    "USE_MAIN_ELEMENT_SECTION" => "N",
    "USE_PRICE_COUNT" => "N",
    "USE_PRODUCT_QUANTITY" => "N",
    "USE_RATIO_IN_RANGES" => "N",
    "USE_VOTE_RATING" => "N",
    "COMPONENT_TEMPLATE" => "efProduct"
  ),
  false
);?>
<?
  require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>