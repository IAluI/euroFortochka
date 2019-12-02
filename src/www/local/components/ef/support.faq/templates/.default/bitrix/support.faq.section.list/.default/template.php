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
<?//display sections?>

<div class="rounded border border-primary p-3 mb-3">
  <p class="h4">
    Категории вопросов:
  </p>
  <ul class="m-0">
    <?foreach ($arResult['SECTIONS'] as $val):?>
      <?if($arParams['SECTION_ID'] == $val["ID"]) $SELECTED_ITEM = $val?>
      <li>
        <?=
          '<a href="'.
          str_replace('#SECTION_CODE#', $val['CODE'], $val['SECTION_PAGE_URL']).
          '" class="'.($arParams['SECTION_ID'] == $val["ID"]?'font-weight-bold':'').
          '">'.
          $val['NAME'].
          '</a>'
        ?>
      </li>
    <?endforeach;?>
  </ul>
</div>