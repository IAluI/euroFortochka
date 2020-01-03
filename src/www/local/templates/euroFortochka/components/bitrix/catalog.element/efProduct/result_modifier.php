<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$arSelect = Array("ID", "IBLOCK_ID", "NAME", "DETAIL_PICTURE", "PROPERTY_PRICE");
$arFilter = Array("IBLOCK_CODE" => "supplies", "ID" => $arResult['PROPERTIES']['related_prod']['VALUE'], "ACTIVE" => "Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
while($ob = $res->GetNextElement()){
  $buff = $ob->GetFields();
  foreach($ob->GetProperties() as $prop => $value) {
    $buff[$prop] = $value['VALUE'];
  }
  $relProd[] = $buff;
}

$arResult['PROPERTIES']['related_prod'] = $relProd;

?>