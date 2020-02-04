<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

use \Bitrix\Main\Loader;
if(!Loader::includeModule("iblock")) die();

$arSelect = Array(
  "ID",
  "IBLOCK_ID",
  "CODE",
  "NAME",
  "PROPERTY_PRICE_VALUE",
);

$totalPrice = 0;
$protToMail = '<table><tbody>';
$protToMail .= '<tr><th></th><th>Наименование</th><th>Цена</th><th>Количество</th></th>';
$prodCouner = 1;

$prodFromUser = $_POST["products"];
$prodFromDb = array();

foreach ($prodFromUser as $type => $prodList) {
  $prodOfType = array();
  foreach ($prodList as $name => $quantity) {
    $prodOfType[] = $name;
  }
  $arFilter = Array(
    "IBLOCK_CODE" => $type,
    "CODE" => $prodOfType,
  );
  $res = CIBlockElement::GetList(
    Array(),
    $arFilter,
    false,
    false,
    $arSelect
  );
  $prodFromDb[$type] = array();
  while($ob = $res->GetNextElement()){
    $buff = $ob->GetFields();
    foreach($ob->GetProperties() as $prop => $value) {
      $buff[$prop] = $value['VALUE'];
    }
    $prodFromDb[$type][] = $buff;

    $totalPrice += $buff["price"] * $prodList[$buff["CODE"]];
    $protToMail .= '<tr><td>' . $prodCouner . '.</td><td>' . $buff["NAME"] . '</td><td>' . $buff["price"] . '</td><td>' . $prodList[$buff["CODE"]] . '</td></tr>';
    $prodCouner++;
  }
}

$protToMail .= '</table></tbody>';

/*use \Bitrix\Main\Mail\Event;
$event = Event::Send(array(
  "EVENT_NAME" => "NEW_ORDER",
  "LID" => "s1",
  'MESSAGE_ID' => 9,
  "C_FIELDS" => array(
    'AUTHOR' => $_POST['name'],
    'AUTHOR_CITY' => $_POST['city'],
    'AUTHOR_TEL' => $_POST['tel'],
    'PRODUCTS' => $protToMail,
    'TOTAL_PRICE' => $totalPrice,
  )
));

echo json_encode(array(
  'event' => $event -> getId(),
  'totalPrice' => $totalPrice
));*/

echo json_encode(array(
  '$totalPrice' => $totalPrice
));

?>