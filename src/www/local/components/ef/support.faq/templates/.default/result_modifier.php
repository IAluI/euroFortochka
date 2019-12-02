<?
  if ($arResult["VARIABLES"]["SECTION_CODE"]) {
    $sections = CIBlockSection::GetList(
      Array(
        "id" => "ASC"
      ),
      Array(
        "ACTIVE" => "Y",
        "CODE" => $arResult['VARIABLES']['SECTION_CODE'],
        "IBLOCK_ID" => $arParams["IBLOCK_ID"]
      ),
      false,
      Array(
        "ID",
        "DESCRIPTION"
      ),
      false
    );
    $buff = $sections->GetNext();
    $arResult["VARIABLES"]["SECTION_ID"] = $buff["ID"];
    $arResult["VARIABLES"]["SECTION_DESC"] = $buff["DESCRIPTION"];
  } elseif (!$arResult["VARIABLES"]["SECTION_ID"]) {
    $sections = CIBlockSection::GetList(
        Array(
          "id" => "ASC"
        ),
        Array(
          "ACTIVE" => "Y",
          "IBLOCK_ID" => $arParams["IBLOCK_ID"]
        ),
        false,
        Array(
          "ID",
          "DESCRIPTION"
        ),
        false
    );
    $buff = $sections->GetNext();
    $arResult["VARIABLES"]["SECTION_ID"] = $buff["ID"];
    $arResult["VARIABLES"]["SECTION_DESC"] = $buff["DESCRIPTION"];
  }
?>