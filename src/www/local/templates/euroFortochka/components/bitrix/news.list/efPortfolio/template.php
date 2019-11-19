<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="row justify-content-around">
  <?foreach($arResult["ITEMS"] as $arItem):?>
  	<?
      $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
      $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
  	?>
  	<div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="Portfolio-Item">
  	  <div class="Portfolio-PrevWrapper">
  	    <div class="Portfolio-PrevContainer">
  	      <img
            class="Portfolio-PrevImg"
            src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
            alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
          />
  	    </div>
  	  </div>
      <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
        <p class="Portfolio-PrevText">
          <?= $arItem["PREVIEW_TEXT"];?>
        </p>
      <?endif;?>
  	</div>
  <?endforeach;?>
  <div class="Portfolio-Item">
    <div class="Portfolio-PrevWrapper">
      <div class="Portfolio-PrevContainer Portfolio-LastItem">
        <div>
          ?
        </div>
      </div>
    </div>
    <p class="Portfolio-PrevText">
      Здесь может быть Ваш ОБЪЕКТ
    </p>
  </div>
</div>
