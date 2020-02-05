<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
use \Bitrix\Main\Loader;
if(!Loader::includeModule("iblock")) die();

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

echo json_encode($response);
?>