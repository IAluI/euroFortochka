<?
  if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
?>

<div class="" id="<?=$itemIds['ID']?>" itemscope itemtype="http://schema.org/Product">
  <div class="row">
    <div class="col-md-4">
      <div class="Product-Images">
        <div class="swiper-container Product-MainImages">
          <div class="swiper-wrapper">
            <?
              foreach($arResult['PROPERTIES']['pictures']['VALUE'] as $pictureId):
            ?>
              <div class="swiper-slide">
                <img src="<?=CFile::GetFileArray($pictureId)['SRC'];?>">
              </div>              
            <?
              endforeach;
            ?>
          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
        </div>
      </div>
    </div>
    <div class="col-md-8">

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