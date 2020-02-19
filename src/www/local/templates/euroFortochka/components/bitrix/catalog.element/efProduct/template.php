<?
  if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
?>
<div itemscope itemtype="http://schema.org/Product">
  <div class="container">
    <div class="Product" id="<?= $itemIds['ID']; ?>">
      <div class="row mb-3">
        <div class="mb-3 col-md-6">
          <div class="Product-Images">
            <div class="mx-4 Product-MainImages">
              <div class="swiper-container">
                <div class="swiper-wrapper">
                  <?
                    foreach($arResult['PROPERTIES']['pictures']['VALUE'] as $pictureId):
                  ?>
                    <div class="swiper-slide">
                      <div>
                        <div style="background-image: url(<?= CFile::GetPath($pictureId); ?>);"></div>
                      </div>
                    </div>
                  <?
                    endforeach;
                  ?>
                </div>
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
      <meta itemprop="name" content="<?= $arResult['NAME']; ?>" />
      <meta itemprop="image" content="<?= CFile::GetPath($arResult['PROPERTIES']['pictures']['VALUE'][0]); ?>" />
      <div itemprop="offers" itemscope itemtype="http://schema.org/AggregateOffer" class="mx-4 mb-3 Product-Offers">
        <meta itemprop="lowPrice" content="<?= min($arResult['PROPERTIES']['configuration_option_prices']['VALUE']); ?>" />
        <meta itemprop="priceCurrency" content="RUB" />
        <div class="swiper-container">
          <div class="swiper-wrapper">
            <?
              $offerNames = &$arResult['PROPERTIES']['configuration_option_names']['VALUE'];
              $offerImg = &$arResult['PROPERTIES']['configuration_option_pictures']['VALUE'];
              $offerDesc = &$arResult['PROPERTIES']['configuration_option_desc']['~VALUE'];
              $offerPrices = &$arResult['PROPERTIES']['configuration_option_prices']['VALUE'];
              for ($i = 0; $i < count($offerNames); $i++):
            ?>
              <div class="swiper-slide col-md-6 col-lg-4 col-xl-3 ProductCard">
                <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                  <h2 class="ProductCard-Header">
                    <p itemprop="name">
                      <?= $offerNames[$i]; ?>
                    </p>
                  </h2>
                  <div class="ProductCard-Img">
                    <img itemprop="image" alt="<?= $offerNames[$i]; ?>" src="<?= CFile::GetPath($offerImg[$i]); ?>">
                  </div>
                  <div class="ProductCard-Description">
                    <p itemprop="description" >
                      <?= $offerDesc[$i]; ?>
                    </p>
                  </div>
                  <p itemprop="price" class="ProductCard-Price">
                    <?= (number_format($offerPrices[$i], 0, '.', ' ') . ' Р'); ?>
                  </p>
                  <meta itemprop="priceCurrency" content="RUB" />
                  <div class="ProductCard-Button">
                    <button type="button" data-cart="<?= $arResult['IBLOCK_CODE'] . '-' . $arResult['CODE'] . '-' . $i ?>" class="btn btn-secondary font-weight-bold text-white">
                      Купить
                    </button>
                  </div>
                </div>
              </div>
            <?
              endfor;
            ?>
          </div>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
    </div>
  </div>
  <div class="mb-3">
    <input class="HiddenInput" type="radio" name="detail" id="detailDescription" value="detailDescription" checked="checked">
    <input class="HiddenInput" type="radio" name="detail" id="detailStructure" value="detailStructure">
    <input class="HiddenInput" type="radio" name="detail" id="detailCharacteristics" value="detailCharacteristics">
    <input class="HiddenInput" type="radio" name="detail" id="detailNone" value="detailNone">
    <div class="mb-3 Product-DetailsMenu">
      <div class="container">
        <ul class="list-unstyled m-0">
          <li>
            <label for="detailDescription">
              Описание
            </label>
          </li>
          <li>
            <label for="detailStructure">
              Устройство
            </label>
          </li>
          <li>
            <label for="detailCharacteristics">
              Характеристики
            </label>
          </li>
        </ul>
      </div>
    </div>
    <div class="container Product-Details">
      <label for="detailDescription">
        <label for="detailNone"></label>
        Описание
      </label>
      <div itemprop="description" id="descriptionBlock">
        <?= $arResult['PROPERTIES']['description']['~VALUE']['TEXT']; ?>
      </div>
      <label for="detailStructure">
        <label for="detailNone"></label>
        Устройство
      </label>
      <div id="structureBlock">
        <?= $arResult['PROPERTIES']['structure']['~VALUE']['TEXT']; ?>
      </div>
      <label for="detailCharacteristics">
        <label for="detailNone"></label>
        Характеристики
      </label>
      <div id="characteristicsBlock">
        <?= $arResult['PROPERTIES']['full_characteristics']['~VALUE']['TEXT']; ?>
      </div>
    </div>
  </div>
  <div class="container">
    <h2 class="text-center">
      С этим товаром покупают
    </h2>
    <div class="row">
      <? foreach($arResult['PROPERTIES']['related_prod'] as $relProd): ?>
        <div class="col-md-6 col-lg-4 col-xl-3 ProductCard">
          <div>
            <h3 class="ProductCard-Header">
              <p>
                <?= $relProd['NAME']; ?>
              </p>
            </h3>
            <div class="ProductCard-Img">
              <img alt="<?= $relProd['NAME']; ?>" src="<?= CFile::GetFileArray($relProd['DETAIL_PICTURE'])['SRC']; ?>">
            </div>
            <p class="ProductCard-Price">
              <?= (number_format($relProd['price'], 0, '.', ' ') . ' Р'); ?>
            </p>
            <div class="ProductCard-Button">
              <button class="btn btn-primary font-weight-bold" type="button">
                Подробнее
              </button>
            </div>
          </div>
        </div>
      <? endforeach; ?>
    </div>
  </div>
</div>
<pre>
  <?
  //print_r($arResult['PROPERTIES']);
  ?>
</pre>
