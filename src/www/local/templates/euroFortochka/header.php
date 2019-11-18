<?
  if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width"
      initial-scale="1"
      shrink-to-fit="no"
    />
    <?
      /*CJSCore::RegisterExt(
          "commonScript",
          array(
              "js" => "/local/assets/js/main.js",
              "skip_core" => true,
          )
      );
      CJSCore::Init(array('commonScript'));*/
      use Bitrix\Main\Page\Asset;
      Asset::getInstance()->addJs('/local/assets/js/main.js', true);
      //Asset::getInstance()->addString('<script type="text/javascript" src="/local/assets/js/main.js"></script>', true, AssetLocation::BEFORE_JS);
      $APPLICATION->ShowHead();
    ?>
    <title>
      <?
        $APPLICATION->ShowTitle()
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
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Оставьте Ваши контактные данные:</h5>
              <button class="close" type="button" id="callbackClose">
                <span>&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <input
                  class="mb-3 form-control"
                  type="text"
                  placeholder="Введите имя"
              />
              <input
                  class="mb-3 form-control"
                  type="text"
                  placeholder="Введите город"
              />
              <input
                  class="mb-3 form-control"
                  type="text"
                  placeholder="Введите номер телефона"
              />
                <textarea
                    class="form-control"
                    rows="4"
                    placeholder="Введите сообщение"
                ></textarea>
            </div>
            <div class="modal-footer">
              <button class="btn btn-primary" type="button" id="callbackSubmit">
                Оставить заявку
              </button>
            </div>
          </div>
        </div>
      </div>
      <header class="MainHeader">
        <input class="HiddenInput" type="checkbox" id="mainNavMenu" />
        <div class="d-flex justify-content-between py-2 shadow MainHeader-Bar">
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
            <button class="btn btn-primary MainHeader-Callback" type="button">
              Оставить заявку
            </button>
          </div>
        </div>
        <nav class="MainHeader-Nav">
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
        <div class="container Content-Header">
          <h1 class="text-black-50"></h1>
          <a class="text-black-50" href="/">Главная</a>
          <div class="border-bottom my-3"></div>
        </div>
        <div class="container">