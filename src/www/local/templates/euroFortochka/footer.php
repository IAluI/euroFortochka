<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
      </main>
      <footer class="bg-primary">
        <div class="container">
          <div class="d-flex flex-column-reverse flex-sm-row justify-content-between align-items-sm-center w-100 py-2 text-white Footer">
            <?
              $APPLICATION->IncludeFile(
                SITE_DIR."local/include/copyright.php",
                Array(),
                Array("MODE"=>"html")
              );
            ?>
            <div class="flex-shrink-0">
              <?
                $APPLICATION->IncludeFile(
                  SITE_DIR."local/include/company_contacts.php",
                  Array(),
                  Array("MODE"=>"html")
                );
              ?>
            </div>
          </div>
        </div>

      </footer>
    </div>
  </body>
</html>
