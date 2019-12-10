<?
  require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>
<?
  use Bitrix\Main\Page\Asset;
  Asset::getInstance()->addCss("/local/assets/css/installation.css", true);
?>
<div class="container">
  <section>
    <h2 class="text-center">Стоимость стандартного монтажа</h2>
    <div class="swiper-container Installation-Types">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div
            class="rounded-top shadow-sm border overflow-hidden text-center Installation-Type"
          >
            <h3 class="bg-primary text-white p-2 Installation-TypeHeader">
              Пассивный проветриватель
            </h3>
            <div class="px-2">
              <img
                class="Installation-TypeImg"
                src="/local/assets/img/common/passive-vent.svg"
                alt="Пассивный проветриватель"
              />
              <div class="border-bottom">
                <p class="Installation-TypeLinks">
                  <a href="">КИВ-125</a>
                  <span>,</span>
                  <a href="">КИВ-Квадро</a>
                  <span>,</span>
                  <a href="">Вакио КИВ</a>
                </p>
              </div>
              <div class="border-bottom">
                <p>Барнаул</p>
                <p class="Installation-TypePrice">2 500 Р</p>
              </div>
              <div class="border-bottom">
                <p>Новосибирск</p>
                <p class="Installation-TypePrice">от 2 500 Р</p>
              </div>
              <div class="border-bottom">
                <p>Красноярск</p>
                <p class="Installation-TypePrice">от 2 500 Р</p>
              </div>
              <button
                class="btn btn-secondary text-white font-weight-bold my-3 Callback"
                type="button"
              >
                Заказать
              </button>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div
            class="rounded-top shadow-sm border overflow-hidden text-center Installation-Type"
          >
            <h3 class="bg-primary text-white p-2 Installation-TypeHeader">
              Активный проветриватель
            </h3>
            <div class="px-2">
              <img
                class="Installation-TypeImg"
                src="/local/assets/img/common/active-vent.svg"
                alt="Активный проветриватель"
              />
              <div class="border-bottom">
                <p class="Installation-TypeLinks">
                  <a href="">Тион О2</a>
                  <span>,</span>
                  <a href="">Тион Lite</a>
                  <span>,</span>
                  <a href="">Ballu air Master</a>
                </p>
              </div>
              <div class="border-bottom">
                <p>Барнаул</p>
                <p class="Installation-TypePrice">4 000 Р</p>
              </div>
              <div class="border-bottom">
                <p>Новосибирск</p>
                <p class="Installation-TypePrice">от 4 000 Р</p>
              </div>
              <div class="border-bottom">
                <p>Красноярск</p>
                <p class="Installation-TypePrice">от 4 500 Р</p>
              </div>
              <button
                class="btn btn-secondary text-white font-weight-bold my-3 Callback"
                type="button"
              >
                Заказать
              </button>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div
            class="rounded-top shadow-sm border overflow-hidden text-center Installation-Type"
          >
            <h3 class="bg-primary text-white p-2 Installation-TypeHeader">
              Активный проветриватель
            </h3>
            <div class="px-2">
              <img
                class="Installation-TypeImg"
                src="/local/assets/img/common/active-vent.svg"
                alt="Активный проветриватель"
              />
              <div class="border-bottom">
                <p class="Installation-TypeLinks"><a href="">Тион 3S</a></p>
              </div>
              <div class="border-bottom">
                <p>Барнаул</p>
                <p class="Installation-TypePrice">4 500 Р</p>
              </div>
              <div class="border-bottom">
                <p>Новосибирск</p>
                <p class="Installation-TypePrice">от 4 500 Р</p>
              </div>
              <div class="border-bottom">
                <p>Красноярск</p>
                <p class="Installation-TypePrice">от 5 000 Р</p>
              </div>
              <button
                class="btn btn-secondary text-white font-weight-bold my-3 Callback"
                type="button"
              >
                Заказать
              </button>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div
            class="rounded-top shadow-sm border overflow-hidden text-center Installation-Type"
          >
            <h3 class="bg-primary text-white p-2 Installation-TypeHeader">
              Проветриватель с рекуператором
            </h3>
            <div class="px-2">
              <img
                class="Installation-TypeImg"
                src="/local/assets/img/common/recuperate-vent.svg"
                alt="Проветриватель с рекуператором"
              />
              <div class="border-bottom">
                <p class="Installation-TypeLinks">
                  <a href="">Vakio Base</a>
                  <span>,</span>
                  <a href="">УВРК 50М</a>
                  <span>,</span>
                  <a href="">Winzel</a>
                </p>
              </div>
              <div class="border-bottom">
                <p>Барнаул</p>
                <p class="Installation-TypePrice">4 500 Р</p>
              </div>
              <div class="border-bottom">
                <p>Новосибирск</p>
                <p class="Installation-TypePrice">от 4 500 Р</p>
              </div>
              <div class="border-bottom">
                <p>Красноярск</p>
                <p class="Installation-TypePrice">от 5 000 Р</p>
              </div>
              <button
                class="btn btn-secondary text-white font-weight-bold my-3 Callback"
                type="button"
              >
                Заказать
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </section>
  <section>
    <h2 class="text-center">Этапы монтажа</h2>
    <div class="swiper-container Installation-Steps">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="rounded shadow-sm border Installation-Step">
            <p class="Installation-StepNum">1 Этап</p>
            <div class="Installation-StepImg">
              <div>
                <img
                  src="/local/assets/img/installation/installStep-1.jpg"
                  alt="Окно"
                />
              </div>
            </div>
            <h3 class="Installation-StepHeader">
              Выбор места монтажа и разметка
            </h3>
            <p>
              Приточная вентиляция необходима в тех комнатах, где люди проводят
              максимальное количество своего времени.
            </p>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="rounded shadow-sm border Installation-Step">
            <p class="Installation-StepNum">2 Этап</p>
            <div class="Installation-StepImg">
              <div>
                <img
                  src="/local/assets/img/installation/installStep-2.jpg"
                  alt="Окно"
                />
              </div>
            </div>
            <h3 class="Installation-StepHeader">
              Производство отверстия в стене
            </h3>
            <p>
              Согласно разметке устанавливаем алмазную установку на стену и делаем
              отверстие в наружной стене диаметром 132 мм.
            </p>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="rounded shadow-sm border Installation-Step">
            <p class="Installation-StepNum">3 Этап</p>
            <div class="Installation-StepImg">
              <div>
                <img
                  src="/local/assets/img/installation/installStep-3.jpg"
                  alt="Окно"
                />
              </div>
            </div>
            <h3 class="Installation-StepHeader">Монтаж воздуховода</h3>
            <p>
              Гильзование отверстия вентиляционной трубой, установка наружной
              решетки и теплошумоизоляции в канале.
            </p>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="rounded shadow-sm border Installation-Step">
            <p class="Installation-StepNum">4 Этап</p>
            <div class="Installation-StepImg">
              <div>
                <img
                  src="/local/assets/img/installation/installStep-4.jpg"
                  alt="Окно"
                />
              </div>
            </div>
            <h3 class="Installation-StepHeader">Установка проветривателя</h3>
            <p>Прибор совмещается с воздухозаборным каналом.</p>
          </div>
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </section>
  <section>
    <h2 class="text-center">
      <span class="text-primary" style="margin-right: -0.5rem">НЕ</span>
      <span>стандартный монтаж</span>
    </h2>
    <p>
      Иногда для установки клапана проветривателя необходимы дополнительные
      работы, выходящие за рамки стандартного монтажа. Доп работы оплачиваются
      отдельно. Здесь Вы можете ознакомиться со списком возможных дополнительных
      работ:
    </p>
    <!--div.rounded.shadow.mb-3-->
    <table class="rounded shadow Installation-UnstdPrices">
      <tbody>
        <tr>
          <td>
            Бурение дополнительного технологического отверстия в кирпичной,
            бетонной стене толщиной до 1м
          </td>
          <td>2500 руб</td>
        </tr>
        <tr>
          <td>
            Прокладка дополнительного воздуховода (в т.ч. расходные материалы)
          </td>
          <td>1000 руб/м</td>
        </tr>
        <tr>
          <td>Высота бурения от пола более 2 м</td>
          <td>500 руб</td>
        </tr>
        <tr>
          <td>Работа с гипсокартоном и пластиковыми панелями</td>
          <td>500 руб</td>
        </tr>
        <tr>
          <td>Бурение доп отверстия в стене или лоджии</td>
          <td>1000 руб</td>
        </tr>
        <tr>
          <td>Окраска наружной решетки в выбранный цвет</td>
          <td>500 руб</td>
        </tr>
        <tr>
          <td>Выезд в удаленные районы</td>
          <td>12-15 руб/км</td>
        </tr>
        <tr>
          <td>Химический анкер</td>
          <td>1000 руб/шт</td>
        </tr>
        <tr>
          <td>Вентилируемый фасад: керамогранит или сайдинг</td>
          <td>500 руб/шт</td>
        </tr>
        <tr>
          <td>
            Замена КИВ-125 на другое приточное устройство:
            <a href="">Тион О2</a>
            ,
            <a href="">Тион 3S</a>
            ,
            <a href="">Vakio</a>
            ,
            <a href="">Ballu Air Master</a>
          </td>
          <td>от 1000 руб</td>
        </tr>
      </tbody>
    </table>
  </section>
  <section>
    <h2 class="text-center">Вопросы и ответы по монтажу</h2>
    <?$APPLICATION->IncludeComponent(
    "bitrix:support.faq.element.list",
    "efElementList",
    array(
      "IBLOCK_TYPE" => "services",
      "IBLOCK_ID" => "5",
      "CACHE_TYPE" => "A",
      "CACHE_TIME" => "36000000",
      "CACHE_GROUPS" => "N",
      "AJAX_MODE" => "N",
      "SECTION" => $arParams["SECTION"],
      "EXPAND_LIST" => $arParams["EXPAND_LIST"],
      "LINK_ELEMENTS" => "",
      "LINK_ELEMENTS_LINK" => "/support/faq/?ELEMENT_ID=#ELEMENT_ID#",
      "AJAX_OPTION_SHADOW" => "Y",
      "AJAX_OPTION_JUMP" => "N",
      "AJAX_OPTION_STYLE" => "Y",
      "AJAX_OPTION_HISTORY" => "N",
      "SHOW_RATING" => "N",
      "RATING_TYPE" => "",
      "PATH_TO_USER" => "",
      "SECTION_ID" => "7",
      "DETAIL_URL" => "",
      "COMPONENT_TEMPLATE" => "efElementList",
      "AJAX_OPTION_ADDITIONAL" => ""
    ),
    $component
  );?>
  </section>
  <section class="mb-5">
    <h2 class="text-center">Не нашли Ваш ответ?</h2>
    <p class="h4 text-center mb-3">
      Мы Вам поможем! Просто
      <a href="/contacts/">позвоните нам</a>
      или оставьте заявку
    </p>
    <button class="btn btn-primary d-block my-3 m-auto Callback" type="button">
      Заказать звонок
    </button>
  </section>
</div>
<?
  require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>