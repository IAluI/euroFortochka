<?
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

use \Bitrix\Main\Mail\Event;
Event::Send(array(
  "EVENT_NAME" => "FEEDBACK_FORM",
  "LID" => "s1",
  'MESSAGE_ID' => 7,
  "C_FIELDS" => array(
    'AUTHOR' => $_POST['name'],
    'AUTHOR_CITY' => $_POST['city'],
    'AUTHOR_TEL' => $_POST['tel'],
    'TEXT' => $_POST['message'],
  )
));

echo json_encode(array('status' => true));

?>