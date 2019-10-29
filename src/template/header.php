<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<!DOCTYPE html>
<html lang="ru">
<head>
<?$APPLICATION->ShowHead();?>
  <title><?$APPLICATION->ShowTitle()?></title>
</head>

<body>
  <div class="PageWrapper">
    <div id="panel"><?$APPLICATION->ShowPanel();?></div>
    <div class="modal fade" id="callback" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Оставьте Ваши контактные данные:</h5><button class="close" type="button" id="callbackClose"><span>&times;</span></button>
          </div>
          <div class="modal-body"><input class="mb-3 form-control" type="text" placeholder="Введите имя"><input class="mb-3 form-control" type="text" placeholder="Введите город"><input class="mb-3 form-control" type="text" placeholder="Введите номер телефона"><textarea class="form-control" rows="4" placeholder="Введите сообщение"></textarea></div>
          <div class="modal-footer"><button class="btn btn-primary" type="button" id="callbackSubmit">Оставить заявку</button></div>
        </div>
      </div>
    </div>
    <header class="MainHeader"><input class="HiddenInput" type="checkbox" id="mainNavMenu">
      <div class="d-flex justify-content-between py-2 shadow MainHeader-Bar">
        <div class="d-md-none d-flex align-items-center"><label class="m-0 d-flex align-items-center btn btn-primary p-2 MainHeader-MenuBtn" for="mainNavMenu">
            <div class="MainHeader-Burger">
              <div></div>
            </div>
          </label></div>
        <div class="d-none d-sm-flex align-items-center flex-shrink-0 MainHeader-Logo">
          <a class="MainHeader-LogoImg" href="/" title="На главную страницу">
<?
$APPLICATION->IncludeFile(
  SITE_DIR."include/company_logo.php",
  Array(),
  Array("MODE"=>"html")
);
?>
          </a>
          <div class="h-100 mx-2 bg-primary MainHeader-LogoDivider"></div>
          <p class="m-0 text-primary MainHeader-LogoText">от духоты <br>
            от влажности <br>
            от плесени <br></p>
        </div>
        <div class="d-none d-xl-flex align-items-center flex-shrink-1">
          <h4 class="m-0 w-100">Децентрализованные системы вентиляции</h4>
        </div>
        <div class="d-none d-md-block flex-shrink-0">
          <p class="m-0 d-flex align-items-center"><span>Барнаул&nbsp;&nbsp;</span><a class="d-flex align-items-center" href="tel:+73852570858"><svg class="icon icon-phone mx-1">
                <use xlink:href="/img/common/icons.svg#phone"></use>
              </svg><b>8 (3852) 57&ndash;08&ndash;58</b></a></p>
          <p class="m-0 d-flex align-items-center"><span>Красноярск</span><a class="d-flex align-items-center" href="tel:+73912154602"><svg class="icon icon-phone mx-1">
                <use xlink:href="/img/common/icons.svg#phone"></use>
              </svg><b>8 (391) 215&ndash;46&ndash;02</b></a></p>
          <p class="m-0 d-flex align-items-center"><span>Новосибирск</span><a class="d-flex align-items-center" href="tel:+73832772367"><svg class="icon icon-phone mx-1">
                <use xlink:href="/img/common/icons.svg#phone"></use>
              </svg><b>8 (383) 277&ndash;23&ndash;67</b></a></p>
        </div>
        <div class="d-flex align-items-center flex-shrink-0"><button class="btn btn-primary MainHeader-Callback" type="button">Оставить заявку</button></div>
      </div>
      <nav class="MainHeader-Nav">
        <div class="p-3 p-md-0 MainHeader-NavListWrapper">
          <ul class="m-0 mb-md-3 list-unstyled d-flex flex-column flex-md-row justify-content-md-around MainHeader-NavList">
            <li><a href="">Акции</a></li>
            <li><a href="">Оборудование</a></li>
            <li><a href="">Фильтры</a></li>
            <li><a href="">Монтаж</a></li>
            <li><a href="/portfolio.html">Наши клиенты</a></li>
            <li><a href="/faq.html">Вопросы и ответы</a></li>
            <li><a href="/contacts.html">Контакты</a></li>
          </ul><label class="d-md-none MainHeader-CloseMenu" for="mainNavMenu">
            <div>
              <div></div>
              <div></div>
            </div>
          </label>
        </div><label class="d-md-none w-100 h-100" for="mainNavMenu"></label>
      </nav>
    </header>
    <main class="Content">
      <div class="container Content-Header">
        <h1 class="text-black-50"></h1><a class="text-black-50" href="/">Главная</a>
        <div class="border-bottom my-3"></div>