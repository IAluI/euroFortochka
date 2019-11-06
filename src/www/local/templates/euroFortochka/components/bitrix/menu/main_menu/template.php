<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
  <ul class="m-0 mb-md-3 list-unstyled d-flex flex-column flex-md-row justify-content-md-around MainHeader-NavList">
  <?foreach($arResult as $arItem):?>
    <li>
      <a <?if (!$arItem["SELECTED"]) echo 'href="'.$arItem["LINK"].'"' ?> >
        <?=$arItem["TEXT"]?>
      </a>
    </li>
  <?endforeach?>
  </ul>
<?endif?>
