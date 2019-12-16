<?
  if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
?>

<div class="" id="<?=$itemIds['ID']?>" itemscope itemtype="http://schema.org/Product">
  <div class="row">
    <div class="col-md-12">
      <div class="Product-Image">
        <?
          foreach($arResult['PROPERTIES']['pictures']['VALUE'] as $pictureId):
        ?>
          <img src="<?=CFile::GetFileArray($pictureId)['SRC'];?>">
        <?
          endforeach;
        ?>
      </div>
    </div>
    <div class="col-md-9">

    </div>
  </div>
  <pre>
    <?
      print_r($arResult['PROPERTIES']);
    ?>
  </pre>
  <pre>
      <?
        print_r($arResult['NAME']);
      ?>
    </pre>
</div>