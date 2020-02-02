<?
  if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta
      name="viewport"
      content="width=device-width"
      initial-scale="1"
      shrink-to-fit="no"
    />
    <?
      use Bitrix\Main\Page\Asset;
      //use Bitrix\Main\Page\AssetLocation;
      /*Asset::getInstance()->addString(
        '<script' .
        'type="text/javascript"' .
        'src="https://code.jquery.com/jquery-3.4.1.min.js"' .
        'integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="' .
        'crossorigin="anonymous"' .
        '></script>',
        true,
        AssetLocation::AFTER_JS_KERNEL
      );
      Asset::getInstance()->addString(
        '<script' .
        'type="text/javascript"' .
        'src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"' .
        'integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"' .
        'crossorigin="anonymous"' .
        '></script>',
        true,
        AssetLocation::AFTER_JS_KERNEL
      );
      Asset::getInstance()->addString(
        '<script' .
        'type="text/javascript"' .
        'src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"' .
        'integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"' .
        'crossorigin="anonymous"' .
        '></script>',
        true,
        AssetLocation::AFTER_JS_KERNEL
      );*/
      Asset::getInstance()->addJs('https://code.jquery.com/jquery-3.4.1.min.js');
      Asset::getInstance()->addJs('https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js');
      Asset::getInstance()->addJs('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js');
      Asset::getInstance()->addJs('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js');
      Asset::getInstance()->addJs('https://cdnjs.cloudflare.com/ajax/libs/svg4everybody/2.1.9/svg4everybody.min.js');
      Asset::getInstance()->addJs('/local/assets/js/main.js');
      $APPLICATION->ShowHead();
    ?>
    <script>
      svg4everybody();
    </script>
    <title>
      <?
        $APPLICATION->ShowTitle();
      ?>
    </title>
  </head>
  <body>
    <div class="PageWrapper">
      <div id="panel">
        <?
          $APPLICATION->ShowPanel();
        ?>
      </div>
      <div class="modal fade" id="callback" tabindex="-1">
        <div class="modal-dialog">
          <form class="modal-content needs-validation" novalidate>
            <div class="modal-header">
              <h5 class="modal-title">Оставьте Ваши контактные данные:</h5>
              <button class="close" type="button">
                &times;
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="callBack_name">Ваше имя *</label>
                <input
                  id="callBack_name"
                  class="form-control"
                  type="text"
                  name="name"
                  autocomplete="off"
                  required
                />
                <div class="invalid-feedback">
                  Пожалуйста введите ваше имя.
                </div>
              </div>
              <div class="form-group">
                <label for="callBack_city">Ваш город *</label>
                <select
                  id="callBack_city"
                  class="custom-select"
                  name="city"
                  required
                >
                  <option value="" selected></option>
                  <option value="Барнаул">Барнаул</option>
                  <option value="Красноярск">Красноярск</option>
                  <option value="Новосибирск">Новосибирск</option>
                </select>
                <div class="invalid-feedback">
                  Пожалуйста выберите город.
                </div>
              </div>
              <div class="form-group">
                <label for="callBack_tel">Ваш телефон *</label>
                <input
                  id="callBack_tel"
                  class="form-control"
                  type="tel"
                  name="tel"
                  pattern="(\+7|8) \(\d{3}\) \d{3} \d{4}"
                  autocomplete="off"
                  required
                />
                <div class="invalid-feedback">
                  Пожалуйста введите корректный номер телефона номер телефона.
                </div>
              </div>
              <div class="form-group">
                <label for="callBack_message">Введите сообщение</label>
                <textarea
                  id="callBack_message"
                  name="message"
                  class="form-control"
                  rows="3"
                ></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-primary" type="submit" id="callbackSubmit">
                Оставить заявку
              </button>
            </div>
          </form>
        </div>
      </div>
      <div class="modal fade" id="cart" tabindex="-1">
        <div class="modal-dialog modal-xl">
          <form class="modal-content needs-validation" novalidate>
            <div class="modal-header">
              <h5 class="modal-title">Корзина</h5>
              <button class="close" type="button">
                &times;
              </button>
            </div>
            <div class="modal-body">
              <div class="Cart-GoodsListTmpl" style="display: none">
                <div class="Cart-GoodsListTmplImg">
                  <img>
                </div>
                <div class="Cart-GoodsListTmplName"></div>
                <div class="flex-break d-xl-none"></div>
                <div class="Cart-GoodsListTmplCount">
                  <a href="#" class="Cart-GoodsListTmplCountPlus">
                    <svg class="icon icon-plus">
                      <use xlink:href="/local/assets/img/common/icons.svg#plus"></use>
                    </svg>
                  </a>
                  <span class="Cart-GoodsListTmplCountN"></span>
                  <span>ШТ</span>
                  <a href="#" class="Cart-GoodsListTmplCountMinus">
                    <svg class="icon icon-minus">
                      <use xlink:href="/local/assets/img/common/icons.svg#minus"></use>
                    </svg>
                  </a>
                </div>
                <div class="Cart-GoodsListTmplPrice"></div>
                <div class="Cart-GoodsListTmplSum"></div>
                <a href="#" class="Cart-GoodsListDeleteProduct">
                  <svg class="icon icon-close-circle-outline">
                    <use xlink:href="/local/assets/img/common/icons.svg#close-circle-outline"></use>
                  </svg>
                </a>
              </div>
              <div class="Cart-GoodsList"></div>
              <div class="float-right">
                <span>
                  Итого к оплате:
                </span>
                <span class="font-weight-bold Cart-Total"></span>
                <span class="font-weight-bold">Р</span>
              </div>
              <div class="clear-both"></div>
              <div class="float-right Cart-Inputs">
                <div class="form-group">
                  <label for="cart_name">Ваше имя *</label>
                  <input
                    id="cart_name"
                    class="form-control"
                    type="text"
                    name="name"
                    autocomplete="off"
                    required
                  />
                  <div class="invalid-feedback">
                    Пожалуйста введите ваше имя.
                  </div>
                </div>
                <div class="form-group">
                  <label for="cart_city">Ваш город *</label>
                  <select
                    id="cart_city"
                    class="custom-select"
                    name="city"
                    required
                  >
                    <option value="" selected></option>
                    <option value="Барнаул">Барнаул</option>
                    <option value="Красноярск">Красноярск</option>
                    <option value="Новосибирск">Новосибирск</option>
                  </select>
                  <div class="invalid-feedback">
                    Пожалуйста выберите город.
                  </div>
                </div>
                <div class="form-group">
                  <label for="cart_tel">Ваш телефон *</label>
                  <input
                    id="cart_tel"
                    class="form-control"
                    type="tel"
                    name="tel"
                    pattern="(\+7|8) \(\d{3}\) \d{3} \d{4}"
                    autocomplete="off"
                    required
                  />
                  <div class="invalid-feedback">
                    Пожалуйста введите корректный номер телефона номер телефона.
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input class="btn btn-primary" type="submit" value="Оформить заказ">
            </div>
          </form>
        </div>
      </div>
      <div class="Cart-Call" style="display: none">
        <svg class="icon icon-cart">
          <use xlink:href="/local/assets/img/common/icons.svg#cart"></use>
        </svg>
        <span class="Cart-CallCount"></span>
      </div>
      <header class="MainHeader">
        <input class="HiddenInput" type="checkbox" id="mainNavMenu" />
        <div class="MainHeader-Bar">
          <div class="container">
            <div class="row flex-nowrap justify-content-between">
              <div class="d-md-none d-flex align-items-center">
                <label
                    class="m-0 d-flex align-items-center btn btn-primary p-2 MainHeader-MenuBtn"
                    for="mainNavMenu"
                >
                  <div class="MainHeader-Burger"><div></div></div>
                </label>
              </div>
              <div
                  class="d-none d-sm-flex align-items-center flex-shrink-0 MainHeader-Logo"
              >
                <a class="MainHeader-LogoImg" href="/" title="На главную страницу">
                  <img
                      class="h-100"
                      src="/local/assets/img/common/main-logo.png"
                      alt="Еврофорточка"
                  />
                </a>
                <div class="h-100 mx-2 bg-primary MainHeader-LogoDivider"></div>
                <p class="m-0 text-primary MainHeader-LogoText">
                  от духоты
                  <br />
                  от влажности
                  <br />
                  от плесени
                  <br />
                </p>
              </div>
              <div class="d-none d-xl-flex align-items-center flex-shrink-1">
                <div class="h4 m-0 w-100">Децентрализованные системы вентиляции</div>
              </div>
              <div class="d-none d-md-block flex-shrink-0">
                <?
                  $APPLICATION->IncludeFile(
                    SITE_DIR."local/include/company_contacts.php",
                    Array(),
                    Array("MODE"=>"html")
                  );
                ?>
              </div>
              <div class="d-flex align-items-center flex-shrink-0">
                <button class="btn btn-primary Callback" type="button">
                  Оставить заявку
                </button>
              </div>
            </div>
          </div>
        </div>
        <nav class="container MainHeader-Nav">
          <div class="p-3 p-md-0 MainHeader-NavListWrapper">
            <?
              $APPLICATION->IncludeComponent("bitrix:menu", "main_menu", array(
                "ROOT_MENU_TYPE" => "top",
                "MAX_LEVEL" => "1",
                "MENU_CACHE_TYPE" => "A",
                "MENU_CACHE_TIME" => "36000000",
                "MENU_CACHE_USE_GROUPS" => "Y",
                "MENU_CACHE_GET_VARS" => ""
              ),
                false,
                array(
                  "ACTIVE_COMPONENT" => "Y"
                )
              );
            ?>
            <label class="d-md-none MainHeader-CloseMenu" for="mainNavMenu">
              <div>
                <div></div>
                <div></div>
              </div>
            </label>
          </div>
          <label class="d-md-none w-100 h-100" for="mainNavMenu"></label>
        </nav>
      </header>
      <main class="Content">
        <?
          $APPLICATION->IncludeComponent(
            "bitrix:breadcrumb",
            "efBreadCrumb",
            Array(
              "START_FROM" => "0",
              "PATH" => "",
              "SITE_ID" => "s1"
            )
          );
        ?>