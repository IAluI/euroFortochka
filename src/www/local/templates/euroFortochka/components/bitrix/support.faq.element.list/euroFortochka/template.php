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
<?//elements list?>
<ul class="list-unstyled">
<?foreach ($arResult['ITEMS'] as $key=>$val):?>
  <?
    $this->AddEditAction($val['ID'],$val['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($val['ID'],$val['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BSFE_ELEMENT_DELETE_CONFIRM')));
  ?>
  <li>
    <h2 class="h4 Faq-Question">
      <?=$val['NAME']?>
      <div class="Faq-QuestionExpand">
        <div></div>
        <div></div>
      </div>
    </h2>
    <div class="Faq-AnswerWrapper">
      <div class="Faq-Answer">
        <?=$val['PREVIEW_TEXT']?>
      </div>
    </div>
  </li>
<?endforeach;?>
</ul>