<?
  require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>
<div class="container">
  <?
    $APPLICATION->IncludeComponent(
      "bitrix:catalog.section.list",
      "efCategories",
      Array(
        "ADD_SECTIONS_CHAIN" => "N",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "N",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "COUNT_ELEMENTS" => "N",
        "FILTER_NAME" => "sectionsFilter",
        "IBLOCK_ID" => "8",
        "IBLOCK_TYPE" => "products",
        "SECTION_FIELDS" => array("ID","NAME"),
        "TOP_DEPTH" => "1"
      )
    );
  ?>
</div>
<?
  require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>
