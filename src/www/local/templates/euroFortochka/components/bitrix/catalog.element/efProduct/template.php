<?
  if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
?>

<div class="" id="<?=$itemIds['ID']?>" itemscope itemtype="http://schema.org/Product">
  <div class="row">
    <div class="col-md-6">
      <div class="Product-Images">
        <div class="swiper-container Product-MainImages">
          <div class="swiper-wrapper">
            <?
              foreach($arResult['PROPERTIES']['pictures']['VALUE'] as $pictureId):
            ?>
              <div class="swiper-slide">
                <div>
                  <div>
                    <img src="<?=CFile::GetFileArray($pictureId)['SRC'];?>">
                  </div>
                </div>
              </div>
            <?
              endforeach;
            ?>
          </div>
          <a href="#" class="swiper-button-prev"></a>
          <a href="#" class="swiper-button-next"></a>
        </div>
      </div>
    </div>
    <div class="col-md-6">

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