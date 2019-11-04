<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

      </div>
    </main>
    <footer class="d-flex flex-column-reverse flex-sm-row justify-content-between align-items-sm-center w-100 p-3 bg-primary text-white Footer">
      <div>
<?
$APPLICATION->IncludeFile(
  SITE_DIR."include/copyright.php",
  Array(),
  Array("MODE"=>"html")
);
?>
      </div>
      <div class="flex-shrink-0">
<?
$APPLICATION->IncludeFile(
  SITE_DIR."include/company_contacts.php",
  Array(),
  Array("MODE"=>"html")
);
?>
      </div>
    </footer>
    <script type="text/javascript" src="../js/main.js"></script>
  </div>
</body>
</html>