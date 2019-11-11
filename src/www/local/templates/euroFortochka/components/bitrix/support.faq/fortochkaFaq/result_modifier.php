<?
  if (!$arResult["VARIABLES"]["SECTION_ID"]) {
    $sections = CIBlockSection::GetList(
        Array(
          "id" => "ASC"
        ),
        Array(
          "IBLOCK_ID" => 5
        ),
        false,
        Array("ID"),
        false
    );
    $arResult["VARIABLES"]["SECTION_ID"] = $sections->GetNext()["ID"];
    /*$i = 0;
    while ($arSect = $sections->GetNext()["ID"]) {
      $arResult["VARIABLES"][$i] = $arSect;
      $i++;
    }*/
  }
?>