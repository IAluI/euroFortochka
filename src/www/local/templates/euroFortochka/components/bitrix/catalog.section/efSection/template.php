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
<div class="row">
  <? foreach ($arResult["ITEMS"] as $arElement): ?>
    <?
      $this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
      $this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
    ?>
    <div class="col-md-6 col-lg-4 ProductCard" id="<?=$this->GetEditAreaId($arElement['ID']);?>">
      <div>
        <h3 class="ProductCard-Header">
          <p>
            <?= $arElement['NAME']; ?>
          </p>
        </h3>
        <div class="ProductCard-Img">
          <img alt="<?= $arElement["DETAIL_PICTURE"]["ALT"] ?>" src="<?= $arElement["DETAIL_PICTURE"]["SRC"] ?>" title="<?= $arElement["DETAIL_PICTURE"]["TITLE"] ?>">
        </div>
        <div class="text-left ProductCard-Description">
          <?= $arElement["~DETAIL_TEXT"]; ?>
        </div>
        <p class="ProductCard-Price">
          <?= (number_format($arElement['PRICES']['price']['VALUE'], 0, '.', ' ') . ' Р'); ?>
        </p>
        <div class="ProductCard-Button">
          <button data-cart="<?= $arElement['IBLOCK_CODE'] . '-' . $arElement['CODE'] ?>" type="button" class="btn btn-primary font-weight-bold">
            Купить
          </button>
        </div>
      </div>
    </div>
  <? endforeach; ?>
</div>
