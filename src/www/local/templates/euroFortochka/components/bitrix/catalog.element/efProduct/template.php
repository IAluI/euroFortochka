<?
  if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
?>

<div class="Product" id="<?=$itemIds['ID']?>" itemscope itemtype="http://schema.org/Product">
  <div class="row mb-3">
    <div class="mb-3 col-md-6">
      <div class="Product-Images">
        <div class="swiper-container Product-MainImages">
          <div class="swiper-wrapper">
            <?
              foreach($arResult['PROPERTIES']['pictures']['VALUE'] as $pictureId):
            ?>
              <div class="swiper-slide">
                <div>
                  <div style="background-image: url(<?= CFile::GetFileArray($pictureId)['SRC']; ?>);"></div>
                </div>
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
    <div class="col-md-6 Product-ShortChar">
      <?=$arResult['PROPERTIES']['short_characteristics']['~VALUE']['TEXT']?>
    </div>
  </div>
  <div itemprop="offers" itemscope itemtype="http://schema.org/AggregateOffer" class="swiper-container mb-3 Product-Offers">
    <div class="swiper-wrapper">
      <?
        $offerNames = &$arResult['PROPERTIES']['configuration_option_names']['VALUE'];
        $offerImg = &$arResult['PROPERTIES']['configuration_option_pictures']['VALUE'];
        $offerDesc = &$arResult['PROPERTIES']['configuration_option_desc']['~VALUE'];
        $offerPrices = &$arResult['PROPERTIES']['configuration_option_prices']['VALUE'];
        for ($i = 0; $i < count($offerNames); $i++):
      ?>
        <div class="swiper-slide p-3 col-md-4 col-xl-3 Product-Offer">
          <div class="rounded-top shadow h-100 overflow-hidden">
            <div class="p-2 bg-primary Product-OfferHeader">
              <div>
                <?= $offerNames[$i]; ?>
              </div>
            </div>
            <div class="m-2 Product-OfferImg">
              <img alt="<?= $offerNames[$i]; ?>" src="<?= CFile::GetFileArray($offerImg[$i])['SRC']; ?>">
            </div>
            <div class="mx-2 mb-3 Product-OfferDesc">
              <div>
                <?= $offerDesc[$i]; ?>
              </div>
            </div>
            <p class="py-2 mx-2 border-top border-bottom font-weight-bold Product-OfferPrice">
              <?= (number_format($offerPrices[$i], 0, '.', ' ') . ' Р'); ?>
            </p>
            <div class="mb-3 Product-OfferImgBtn">
              <button class="btn btn-secondary font-weight-bold text-white Callback" type="button">
                Купить
              </button>
            </div>
          </div>
        </div>
      <?
        endfor;
      ?>
    </div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
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