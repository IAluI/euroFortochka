<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
use \Bitrix\Main\Loader;
if (!Loader::includeModule("iblock")) die();

$type = $_GET["type"];
$name = $_GET["name"];
$mod = $_GET["mod"];

switch ($type) {
  case 'supplies':
    $arFilter = Array(
      "IBLOCK_CODE" => $_GET["type"],
      "CODE" => $_GET["name"]
    );
    $arSelect = Array(
      "ID",
      "IBLOCK_ID",
      "NAME",
      "DETAIL_PICTURE",
      "PROPERTY_PRICE_VALUE"
    );
    $res = CIBlockElement::GetList(
      Array(),
      $arFilter,
      false,
      false,
      $arSelect
    );
    $ob = $res->GetNextElement();
    $product = $ob->GetFields();
    foreach($ob->GetProperties() as $prop => $value) {
      $product[$prop] = $value['VALUE'];
    }
    count($product);
    $response = array(
      "name" => $product["NAME"],
      "picture" => CFile::GetPath($product["DETAIL_PICTURE"]),
      "price" => $product["price"]
    );
    break;
  case 'equipment':
    $arFilter = Array(
      "IBLOCK_CODE" => $_GET["type"],
      "CODE" => $_GET["name"]
    );
    $arSelect = Array(
      "ID",
      "IBLOCK_ID",
      "PROPERTY_CONFIGURATION_OPTION_NAMES_VALUE",
      "PROPERTY_CONFIGURATION_OPTION_PICTURES_VALUE",
      "PROPERTY_CONFIGURATION_OPTION_PRICES_VALUE"
    );
    $res = CIBlockElement::GetList(
      Array(),
      $arFilter,
      false,
      false,
      $arSelect
    );
    $ob = $res->GetNextElement();
    $product = $ob->GetFields();
    foreach($ob->GetProperties() as $prop => $value) {
      $product[$prop] = $value['VALUE'];
    }
    count($product);
    $response = array(
      "name" => $product["configuration_option_names"][$mod],
      "picture" => CFile::GetPath($product["configuration_option_pictures"][$mod]),
      "price" => $product["configuration_option_prices"][$mod]
    );
    break;
}

echo json_encode($response);
?>