<?
  require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>
<?
  use Bitrix\Main\Page\Asset;
  Asset::getInstance()->addCss("/local/assets/css/index.css", true);
?>
<section class="PromoKiv">
  <div class="container">
    <div class="row p-4">
      <div class="col-12 col-md-6">
        <img
            class="PromoKiv-Img"
            src="/local/assets/img/index/kiv125-promo.png"
            alt="КИВ-125"
        />
      </div>
      <div class="col-12 col-md-6 PromoKiv-Offer">
        <h2>Приточный клапан КИВ-125 / КПВ-125</h2>
        <p class="h2 mb-3">От духоты, влажности и плесени</p>
        <div class="d-inline-block rounded p-4 PromoKiv-OfferBlock">
          <p>КИВ-125 под ключ (с монтажом) по цене:</p>
          <p class="h2 mb-4">от 4300 руб</p>
          <a
              class="btn btn-outline-light font-weight-bolder"
              href="#"
              role="button"
          >
            Подробнее
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<nav class="container page__section">
  <ul
      class="row page__nav"
  >
    <li class="col-6 col-md-3 page__nav-item">
      <div>
        <img
            src="/local/assets/img/index/znak.png"
            alt="Восклицательный знак"
        />
      </div>
      <a href="#why">
        Что такое проветриватель
        <br>
        и зачем он нужен?
      </a>
    </li>
    <li class="col-6 col-md-3 page__nav-item">
      <div>
        <span
            style="font-size: 48px; font-weight: 700; line-height: 2rem"
        >
          ...
        </span>
      </div>
      <a href="#type">
        Виды
        <br>
        проветривателей
      </a>
    </li>
    <li class="col-6 col-md-3 page__nav-item">
      <div>
        <img
            src="/local/assets/img/index/koleso.png"
            alt="Шестеренка"
        />
      </div>
      <a href="#difference">
        Отличия проветривателя
        <br>
        от других устройств
      </a>
    </li>
    <li class="col-6 col-md-3 page__nav-item">
      <div>
        <img src="/local/assets/img/index/vybor.png" alt="Выбрать" />
      </div>
      <a href="#compare">
        Как выбрать
        <br>
        проветриватель?
      </a>
    </li>
  </ul>
</nav>
<section class="page__section">
  <div class="border-bottom border-top pt-3 mb-4">
    <div class="container">
      <p class="Important">
        <i>Проветриватель</i>
        - это бытовое приточное устройство для подачи свежего воздуха в
        квартиру, дом или офис. Основная функция проветривателей - это
        избавить Вас от
        <strong>духоты</strong>
        ,
        <strong>сырости</strong>
        и
        <strong>плесени</strong>
        за счет нормализации процессов воздухообмена в доме.
      </p>
    </div>
  </div>
  <div class="container">
    <h2 class="page__section-header">
      <a class="text-reset" href="#why" id="why" name="why">
        Зачем нужен проветриватель?
      </a>
    </h2>
    <div class="swiper-container why-breezer__compare">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="row h-100">
            <div class="col-12 col-lg-6">
              <img
                  class="why-breezer__compare-img"
                  src="/local/assets/img/index/with-breezer.svg"
                  alt="Потоки воздуха в квартире с проветривателем"
              />
            </div>
            <div class="col-12 col-lg-6">
              <ul class="why-breezer__compare-props">
                <li class="mb-3">
                  <img
                      src="/local/assets/img/index/oxygen.png"
                      alt="Кислород"
                  />
                  <p class="m-0">
                    Подает в помещение свежий воздух. Окна при этом
                    остаются закрытыми! Соответственно, в Ваш дом НЕ
                    поступают шум, пыль и грязь с улицы. Исключается
                    возможность сквозняков.
                  </p>
                </li>
                <li class="mb-3">
                  <img
                      src="/local/assets/img/index/ventilation.png"
                      alt="Вентиляция"
                  />
                  <p class="m-0">
                    Отработанный воздух вытесняется в вытяжную шахту.
                  </p>
                </li>
                <li class="mb-3">
                  <img
                      src="/local/assets/img/index/eco.png"
                      alt="Очистка"
                  />
                  <p class="m-0">
                    Подаваемый с улицы воздух предварительно очищается.
                    В зависимости от выбранного варианта проветривателя
                    класс очистки варьируется от грубой степени очистки
                    до медицинских стандартов чистоты.
                  </p>
                </li>
                <li class="mb-3">
                  <img
                      src="/local/assets/img/index/temperature.png"
                      alt="Температура"
                  />
                  <p class="m-0">
                    Во многих проветивателях с механической подачей
                    воздух с улицы предварительно подогревается до
                    комнатной температуры, даже если за окном -40.
                  </p>
                </li>
                <li class="mb-3">
                  <img
                      src="/local/assets/img/index/smile.png"
                      alt="Температура"
                  />
                  <p class="m-0">Дома свежо и комфортно.</p>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="row h-100">
            <div class="col-12 col-lg-6">
              <img
                  class="why-breezer__compare-img"
                  src="/local/assets/img/index/open-window.svg"
                  alt="Потоки воздуха в квартире с открытыми окнами"
              />
            </div>
            <div class="col-12 col-lg-6">
              <ul class="why-breezer__compare-props">
                <li class="mb-3">
                  <img
                      src="/local/assets/img/index/wind.png"
                      alt="Сквозняк"
                  />
                  <p class="m-0">
                    Из окон окон дует, образуется сквозняк.
                  </p>
                </li>
                <li class="mb-3">
                  <img
                      src="/local/assets/img/index/noise.png"
                      alt="Шум"
                  />
                  <p class="m-0">
                    В дом поступает шум городских улиц, который мешает
                    здоровому сну и продуктивной работе.
                  </p>
                </li>
                <li class="mb-3">
                  <img
                      src="/local/assets/img/index/impurity.png"
                      alt="Загрязнение воздуха"
                  />
                  <p class="m-0">
                    Через открытые окна мы впускаем в дом промышленные
                    выбросы, выхлопные газы, тополиный пух и цветочную
                    пыльцу.
                  </p>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="row h-100">
            <div class="col-12 col-lg-6">
              <img
                  class="why-breezer__compare-img"
                  src="/local/assets/img/index/close-window.svg"
                  alt="Потоки воздуха в квартире с закрытыми окнами"
              />
            </div>
            <div class="col-12 col-lg-6">
              <ul class="why-breezer__compare-props">
                <li class="mb-3">
                  <img
                      src="/local/assets/img/index/co2.png"
                      alt="Угликислый газ"
                  />
                  <p class="m-0">
                    Отработанный воздух НЕ уходит, а свежему воздуху
                    неоткуда взяться. Становится душно, появляется
                    утомляемость и заложенность носа, что вызвано
                    недостатком свежего воздуха.
                  </p>
                </li>
                <li class="mb-3">
                  <img
                      src="/local/assets/img/index/water.png"
                      alt="Влажность"
                  />
                  <p class="m-0">
                    В воздухе накапливается влага, которая
                    конденсируется на окнах и наружных стенах. Возникает
                    эффект "плачущих окон". Уменьшается долговечность
                    ремонта.
                  </p>
                </li>
                <li class="mb-3">
                  <img
                      src="/local/assets/img/index/fungus.png"
                      alt="Грибок и плесень"
                  />
                  <p class="m-0">
                    Влажность и тепло - это благоприятные условия для
                    развития плесени. Плесень разрушает строительные
                    материалы. А ее споры распространяются в воздухе и
                    попадают в легкие человека.
                  </p>
                </li>
                <li class="mb-3">
                  <img
                      src="/local/assets/img/index/ventilation.png"
                      alt="Вентиляция"
                      style="transform: rotate(180deg)"
                  />
                  <p class="m-0">
                    Во многих проветивателях с механической подачей
                    воздух с улицы предварительно подогревается до
                    комнатной температуры, даже если за окном -40.
                  </p>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
    <div
        class="why-breezer__nav"
    >
      <div class="why-breezer__nav-item why-breezer__nav-item--active">
        <img
            src="/local/assets/img/index/with-breezer-icon.svg"
            alt="Проветриватель"
        />
        <p>С проветривателем</p>
      </div>
      <div class="why-breezer__nav-item">
        <img
            src="/local/assets/img/index/open-window-icon.svg"
            alt="Окна открыты"
        />
        <p>Окна открыты</p>
      </div>
      <div class="why-breezer__nav-item">
        <img
            src="/local/assets/img/index/close-window-icon.svg"
            alt="Окна закрыты"
        />
        <p>Окна закрыты</p>
      </div>
    </div>
  </div>
</section>
<section class="page__section">
  <div class="container">
    <h2 class="page__section-header">
      <a class="text-reset" href="#type" id="type" name="type">
        Виды проветривателей
      </a>
    </h2>
    <div class="overflow-auto d-flex TypeBreezer">
      <div>
        <table class="">
          <tbody>
          <tr>
            <th></th>
            <th>Пассивные</th>
            <th>Активные</th>
            <th>Приточно-вытяжные с рекуператором</th>
          </tr>
          <tr>
            <th>Проветриватели</th>
            <td>
              <div class="TypeBreezer-Img">
                <img
                    src="/local/assets/img/common/passive-vent.svg"
                    alt="Пассивный проветриватель"
                />
              </div>
              <!--br-->
              <span>С естественной подачей воздуха</span>
            </td>
            <td>
              <div class="TypeBreezer-Img">
                <img
                    src="/local/assets/img/common/active-vent.svg"
                    alt="Активный проветриватель"
                />
              </div>
              <!--br-->
              <span>С принудительной подачей воздуха</span>
            </td>
            <td>
              <div class="TypeBreezer-Img">
                <img
                    src="/local/assets/img/common/recuperate-vent.svg"
                    alt="Проветриватель с рекуператором"
                />
              </div>
              <!--br-->
              <span>
                          Принудительная приточно-вытяжная вентиляция с
                          рекуперацией
                        </span>
            </td>
          </tr>
          <tr>
            <th>Принцип работы</th>
            <td>
              работают за счет естественной тяги - только при наличии
              вытяжной шахты
            </td>
            <td>подача воздуха за счет встроенного вентилятора</td>
            <td>
              подача и забор воздуха за счет встроенного вентилятора,
              который попеременно работает то на приток, то на
              вытяжку. Рекуператор при этом отдает тепло вытяжного
              воздуха приточному, т.о. подогрев не требуется.
            </td>
          </tr>
          <tr>
            <th>Достоинства и недостатки</th>
            <td>
              <ul class="list-unstyled TypeBreezer-Advantages">
                <li>Просто, дешево, компактно</li>
                <li>Не потребляют электроэнергию</li>
              </ul>
              <ul class="list-unstyled TypeBreezer-Disadvantages">
                <li>
                  Производительность зависит от степени разряжения,
                  которое создает вытяжка
                </li>
                <li>Нет подогрева</li>
                <li>Низкая степень очистки воздуха</li>
                <li>Ручная регулировка</li>
              </ul>
            </td>
            <td>
              <ul class="list-unstyled TypeBreezer-Advantages">
                <li>
                  Производительность ограничена только мощность
                  вентилятора, в среднем 120-200 м3/ч
                </li>
                <li>
                  Работа проветривателя не зависит от наличия или
                  отсутствия вытяжки
                </li>
                <li>Автоматическая регулировка</li>
                <li>Подогрев приточного воздуха</li>
                <li>Очистка приточного воздуха</li>
                <li>Климат-контроль</li>
              </ul>
              <ul class="list-unstyled TypeBreezer-Disadvantages">
                <li>Стоимость</li>
                <li>
                  Энергопотребление до 1,5 кВт/ч при подогреве
                  приточного воздуха от -40 до +25
                </li>
                <li>Габариты</li>
              </ul>
            </td>
            <td>
              <ul class="list-unstyled TypeBreezer-Advantages">
                <li>
                  Производительность в режиме рекуперации 60-80 м3/ч
                </li>
                <li>Автоматическая регулировка</li>
                <li>Подогрев приточного воздуха вытяжным</li>
                <li>Энергопотребление 18 Вт</li>
                <li>Очистка приточного воздуха</li>
              </ul>
              <ul class="list-unstyled TypeBreezer-Disadvantages">
                <li>Габариты и шум</li>
              </ul>
            </td>
          </tr>
          <tr>
            <th>Модели проветривателей</th>
            <td>
              <a href="">КИВ-125</a>
              ,
              <a href="">VAKIO KIV</a>
            </td>
            <td>
              <a href="">ТИОН О2</a>
              ,
              <a href="">ТИОН 3S</a>
              ,
              <a href="">BALLU AIR MASTER</a>
            </td>
            <td>
              <a href="">VAKIO BASE</a>
              ,
              <a href="">УВРК 50М</a>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
      <div class="TypeBreezer-Space"></div>
    </div>
  </div>
</section>
<section class="page__section">
  <div class="container">
    <h2 class="page__section-header">
      <a
          class="text-reset"
          href="#difference"
          id="difference"
          name="difference"
      >
        Проветриватель, очиститель или кондиционер. В чем разница?
      </a>
    </h2>
    <div class="swiper-container DifferenceBreezer">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <h3 class="text-center">Проветриватель</h3>
          <img
              src="/local/assets/img/index/breezer.jpg"
              alt="Проветриватель"
          />
          <ul class="list-unstyled m-0">
            <li>Подает свежий воздух</li>
            <li>
              Предварительно очищает и подогревает воздух до комнатной
              температуры (
              <a href="">ТИОН О2</a>
              ,
              <a href="">ТИОН 3S</a>
              ,
              <a href="">Ballu Air Master</a>
              ,
              <a href="">Vakio Base</a>
              )
            </li>
            <li>Не охлаждает воздух</li>
            <li>
              Может очищать воздух внутри помещения в режиме
              рециркуляции (
              <a href="">ТИОН 3S</a>
              ,
              <a href="">Ballu Air Master</a>
              )
            </li>
          </ul>
        </div>
        <div class="swiper-slide">
          <h3 class="text-center">Очиститель</h3>
          <img
              src="/local/assets/img/index/purifier.jpg"
              alt="Очиститель воздуха"
          />
          <ul class="list-unstyled m-0">
            <li>Подает свежий воздух</li>
            <li>Очищает воздух внутри помещения</li>
            <li>
              Увлажняет воздух (
              <a href="">Hisense Ecolife</a>
              )
            </li>
            <li>Не дает притока свежего воздуха</li>
            <li>Не охлаждает и не подогревает воздух</li>
          </ul>
        </div>
        <div class="swiper-slide">
          <h3 class="text-center">Кондиционер</h3>
          <img
              src="/local/assets/img/index/conditioner.jpg"
              alt="Кондиционер"
          />
          <ul class="list-unstyled m-0">
            <li>Охлаждает воздух</li>
            <li>Практически не очищает воздух внутри помещения</li>
            <li>Не дает притока свежего воздуха</li>
            <li>
              Подогревает воздух
              <a href="https://aba24.ru/shop/konditsioneryi/">
                Выбрать кондиционер
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
  <div class="border-bottom border-top pt-3 mb-3">
    <div class="container">
      <p class="Important">
        Каждое из этих устройств максимально хорошо выполняет лишь свою
        основную функцию. Поэтому для создания максимально комфортных
        условий у Вас должны быть все три прибора одновременно:
        проветриватель, кондиционер и очиститель.
      </p>
    </div>
  </div>
</section>
<section class="page__section">
  <div class="container">
    <h2 class="page__section-header">
      <a class="text-reset" href="#compare" id="compare" name="compare">
        Сравнение проветривателей
      </a>
    </h2>
    <div class="overflow-auto d-flex CompareBreezer">
      <div>
        <table class="rounded shadow">
          <tbody>
          <tr>
            <th>Проветриватель</th>
            <th>
              <div class="CompareBreezer-Img">
                <img
                    src="/local/assets/img/common/p_kiv-125.png"
                    alt="КИВ-125"
                />
              </div>
              <a href="">КИВ-125</a>
            </th>
            <th>
              <div class="CompareBreezer-Img">
                <img
                    src="/local/assets/img/common/p_vakio.png"
                    alt="VAKIO"
                />
              </div>
              <a href="">VAKIO</a>
            </th>
            <th>
              <div class="CompareBreezer-Img">
                <img
                    src="/local/assets/img/common/p_tion-o2.png"
                    alt="ТИОН O2"
                />
              </div>
              <a href="">ТИОН О2</a>
            </th>
            <th>
              <div class="CompareBreezer-Img">
                <img
                    src="/local/assets/img/common/p_ballu-air-master.png"
                    alt="BALLU AIR MASTER"
                />
              </div>
              <a href="">BALLU AIR MASTER</a>
            </th>
            <th>
              <div class="CompareBreezer-Img">
                <img
                    src="/local/assets/img/common/p_tion-s3.png"
                    alt="ТИОН 3S"
                />
              </div>
              <a href="">ТИОН 3S</a>
            </th>
          </tr>
          <tr>
            <th>Производительность, м3/ч</th>
            <td>30 - 60</td>
            <td>20 / 30 / 60 / 120</td>
            <td>40 / 65 / 85 / 120</td>
            <td>40 / 80 / 120 / 160 / 200</td>
            <td>30 / 45 / 60 / 75 / 90 / 140</td>
          </tr>
          <tr>
            <th>Подогрев</th>
            <td>НЕТ</td>
            <td>За счет рекуперации</td>
            <td>ДА</td>
            <td>ДА</td>
            <td>ДА</td>
          </tr>
          <tr>
            <th>Очистка воздуха</th>
            <td>Пылевой фильтр G4</td>
            <td>Фильтр тонкой очистки F6 (EU 6)</td>
            <td>Каскад из фильтров: F7, HEPA H11, АК</td>
            <td>HD Prefilter, F5, H11, АК, УФ-лампы, Ионизатор</td>
            <td>Префильтр, G4, HEPA, АК-XL</td>
          </tr>
          <tr>
            <th>Воздушная заслонка</th>
            <td>Ручная</td>
            <td>Ручная</td>
            <td>Автоматическая</td>
            <td>Автоматическая</td>
            <td>Автоматическая</td>
          </tr>
          <tr>
            <th>Энергопотребление</th>
            <td>НЕТ</td>
            <td>5-18 Вт</td>
            <td>18 Вт/1,45 кВт</td>
            <td>до 1,03 кВт</td>
            <td>30 Вт/1,45 кВт</td>
          </tr>
          <tr>
            <th>Уровень шума, дБ</th>
            <td>0</td>
            <td>20 / 29,5</td>
            <td>от 32</td>
            <td>25 / 32 / 36 / 39 / 45</td>
            <td>19 / 23 / 29 / 35 / 40 / 47</td>
          </tr>
          <tr>
            <th>Габариты (ШхВхГ) , мм</th>
            <td>d 175, глубина 66</td>
            <td>222 х 470 х 94</td>
            <td>454 х 514 х 163</td>
            <td>455 х 578 х 165</td>
            <td>453 х 528 х 203</td>
          </tr>
          <tr>
            <th>Диапазон рабочих t</th>
            <td>от -40</td>
            <td>-47..+50</td>
            <td>-40..+50</td>
            <td>-40..+50</td>
            <td>-40..+50</td>
          </tr>
          <tr>
            <th>Возможность упр-ия Wi-Fi</th>
            <td>НЕТ</td>
            <td>НЕТ</td>
            <td>ДА</td>
            <td>ДА</td>
            <td>ДА</td>
          </tr>
          <tr>
            <th>Страна-производитель</th>
            <td>Россия / Китай</td>
            <td>Россия</td>
            <td>Россия / Китай</td>
            <td>Россия / Китай</td>
            <td>Россия / Китай</td>
          </tr>
          <tr>
            <th>Гарантия</th>
            <td>1 год</td>
            <td>2 года</td>
            <td>1 год</td>
            <td>2 года</td>
            <td>2 года</td>
          </tr>
          <tr>
            <th>Расширенная комплектация</th>
            <td>
              <a href="">КИВ КВАДРО</a>
              ,
              <a href="">Vakio КИВ</a>
            </td>
            <td>
              <a href="">Vakio КИВ</a>
              ,
              <a href="">Vakio Lumi</a>
            </td>
            <td>
              <a href="">Тион MAC</a>
              ,
              <a href="">Тион TOP</a>
            </td>
            <td>
              <a href="">BMAC-200 CO2</a>
              ,
              <a href="">BMAC-200 Wi-Fi</a>
            </td>
            <td>
              <a href="">ТИОН 3S Smart</a>
              ,
              <a href="">ТИОН 3S Plus</a>
            </td>
          </tr>
          <tr>
            <th>Рейтинг</th>
            <td>
              <img
                  class="CompareBreezer-Rate"
                  src="/local/assets/img/index/rate_1.svg"
                  alt=""
              />
            </td>
            <td>
              <img
                  class="CompareBreezer-Rate"
                  src="/local/assets/img/index/rate_2.svg"
                  alt=""
              />
            </td>
            <td>
              <img
                  class="CompareBreezer-Rate"
                  src="/local/assets/img/index/rate_3.svg"
                  alt=""
              />
            </td>
            <td>
              <img
                  class="CompareBreezer-Rate"
                  src="/local/assets/img/index/rate_4.svg"
                  alt=""
              />
            </td>
            <td>
              <img
                  class="CompareBreezer-Rate"
                  src="/local/assets/img/index/rate_5.svg"
                  alt=""
              />
            </td>
          </tr>
          <tr>
            <th>Стоимость</th>
            <td>2 000 Р</td>
            <td>16 900 Р</td>
            <td>25 990 Р</td>
            <td>29 990 Р</td>
            <td>38 990 Р</td>
          </tr>
          <tr>
            <th></th>
            <td><a class="btn btn-primary" href="">Подробнее</a></td>
            <td><a class="btn btn-primary" href="">Подробнее</a></td>
            <td><a class="btn btn-primary" href="">Подробнее</a></td>
            <td><a class="btn btn-primary" href="">Подробнее</a></td>
            <td><a class="btn btn-primary" href="">Подробнее</a></td>
          </tr>
          </tbody>
        </table>
      </div>
      <div class="CompareBreezer-Space"></div>
    </div>
  </div>
</section>
<section class="page__section WhyWe">
  <div class="container">
    <h2 class="page__section-header">
      <a class="text-reset" href="#whyWe" id="whyWe" name="whyWe">
        7 причин выбрать нас
      </a>
    </h2>
    <div class="swiper-container WhyWe-Reasons">
      <div class="swiper-wrapper">
        <div class="swiper-slide WhyWe-Reason">
          <div class="WhyWe-Header">
            <div class="WhyWe-HeaderIcon">
              <img
                  src="/local/assets/img/index/certificate.png"
                  alt="Сертификат"
              />
            </div>
            <h3>Сертифицированный монтаж</h3>
          </div>
          <div class="WhyWe-ReasonCover">
            <div class="WhyWe-ReasonContent">
              Мы являемся сертифицированной монтажной компанией. Наши
              специалисты одобрены компанией ТИОН, производителем Ballu
              Air Master, Vakio и рекомендованы на официальных сайтах
              производителей.
            </div>
          </div>
        </div>
        <div class="swiper-slide WhyWe-Reason">
          <div class="WhyWe-Header">
            <div class="WhyWe-HeaderIcon">
              <img
                  src="/local/assets/img/index/experience.png"
                  alt="Собака"
              />
            </div>
            <h3>Опыт</h3>
          </div>
          <div class="WhyWe-ReasonCover">
            <div class="WhyWe-ReasonContent">
              Мы занимаемся бытовой приточной вентиляцией уже более 8
              лет. И поверьте, мы уже на этом собаку съели :).
            </div>
          </div>
        </div>
        <div class="swiper-slide WhyWe-Reason">
          <div class="WhyWe-Header">
            <div class="WhyWe-HeaderIcon">
              <img
                  src="/local/assets/img/index/clear.png"
                  alt="Чистота"
              />
            </div>
            <h3>Чистый монтаж</h3>
          </div>
          <div class="WhyWe-ReasonCover">
            <div class="WhyWe-ReasonContent">
              При бурении мы работаем с водосборным кольцом и пылесосом.
              Таким образом, монтаж получается чистый, без пыли и грязи.
            </div>
          </div>
        </div>
        <div class="swiper-slide WhyWe-Reason">
          <div class="WhyWe-Header">
            <div class="WhyWe-HeaderIcon">
              <img
                  src="/local/assets/img/index/complex.png"
                  alt="Пазл"
              />
            </div>
            <h3>Чистый монтаж</h3>
          </div>
          <div class="WhyWe-ReasonCover">
            <div class="WhyWe-ReasonContent">
              Помимо монтажа проветривателей мы оказываем ряд услуг в
              сфере кондиционирования и вентиляции. Подберем любое
              климатическое оборудование. От проекта до монтажа - все
              под ключ.
            </div>
          </div>
        </div>
        <div class="swiper-slide WhyWe-Reason">
          <div class="WhyWe-Header">
            <div class="WhyWe-HeaderIcon">
              <img
                  src="/local/assets/img/index/warranty.png"
                  alt="Отлично"
              />
            </div>
            <h3>Гарантия</h3>
          </div>
          <div class="WhyWe-ReasonCover">
            <div class="WhyWe-ReasonContent">
              Мы даем гарантию как на оборудование, так и на монтажные
              работы.
            </div>
          </div>
        </div>
        <div class="swiper-slide WhyWe-Reason">
          <div class="WhyWe-Header">
            <div class="WhyWe-HeaderIcon">
              <img
                  src="/local/assets/img/index/service.png"
                  alt="Сервис"
              />
            </div>
            <h3>Обслуживание и сервис</h3>
          </div>
          <div class="WhyWe-ReasonCover">
            <div class="WhyWe-ReasonContent">
              При возникновении проблем с оборудованием - просто
              позвоните нам. Мы решим Ваши проблемы в кратчайшие сроки.
              Взамен временно неисправного оборудования мы предоставляем
              подмену. Так же мы предлагаем услуги по обслуживанию
              проветривателей: чистка, замена фильтров, ремонт.
            </div>
          </div>
        </div>
        <div class="swiper-slide WhyWe-Reason">
          <div class="WhyWe-Header">
            <div class="WhyWe-HeaderIcon">
              <img
                  src="/local/assets/img/index/recommend.png"
                  alt="Сарафан"
              />
            </div>
            <h3>Обслуживание и сервис</h3>
          </div>
          <div class="WhyWe-ReasonCover">
            <div class="WhyWe-ReasonContent">
              Сарафанное радио - это, пожалуй, самая эффективная реклама
              для нас :) Нас рекомендуют друзьям и коллегам! Позвоните
              нам и и мы предложим оптимальное техническое решение!
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
</section>
<?
  require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>