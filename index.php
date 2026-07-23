<?
if (!$nc_core->db->get_row("SELECT Catalogue_ID FROM Catalogue WHERE domain = '" . $_SERVER['HTTP_HOST'] . "'")) {
  header("HTTP/1.0 410");
  exit();
}

$healthy = array("в Краснодаре", "Краснодар");
$yummy = array($current_catalogue['city2'], $current_catalogue['Catalogue_Name']);
$healthy_phone = '+7 (903) 411–00–03';
$yummy_phone = $current_catalogue['additional_phone'];

$partners = [
  1 => [
    'url' => 'https://krasnodar.dr-kalyuzhnaya.ru/',
    'address' => 'Краснодар, ул. 8 Марта, 29/4'
  ],
  974 => [
    'url' => 'https://dr-kalyuzhnaya.ru/',
    'address' => 'г Краснодар, ул. Алма-Атинская, 99'
  ],
  2 => [
    'url' => 'https://rostov-na-dony.dr-kalyuzhnaya.ru/',
    'address' => 'Ростов-на-Дону, ул. Варфоломеева, 107'
  ],
  975 => [
    'url' => 'https://rnd.dr-kalyuzhnaya.ru/',
    'address' => 'г. Ростов-на-Дону, ул. Грисенко, 12'
  ],
];
?>

<!doctype html>
<html lang="ru">

<head>
  <?php
  $canon_uri = strtok($_SERVER["REQUEST_URI"], "?");
  $canon_uri = strtolower("https://" . $_SERVER['HTTP_HOST'] . $canon_uri);
  ?>
  <? $new_title = $nc_core->page->get_title() ?>
  <? $new_desc = $nc_core->page->get_description() ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="initial-scale=1.0, width=device-width">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?/*<meta property="og:title" content="<? $healthy = array("в Краснодаре", "Краснодар");
  $yummy   = array($current_catalogue['city2'], $current_catalogue['Catalogue_Name']);
  echo $new_title = str_replace($healthy, $yummy, $new_title);
  ?>">
  <meta property="og:description" content="<? echo $new_desc; ?>" />
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?= $canon_uri ?>">
  <?
  if ((strpos($_SERVER['REQUEST_URI'], 'stati') !== false) && ($_SERVER['REQUEST_URI'] !== '/stati/')) {
    $pieces = explode("/stati/", $_SERVER['REQUEST_URI']);
    $pieces[1] = str_replace('/', '', $pieces[1]);
    $sql_img = "SELECT article_preview_img FROM Message255 WHERE Keyword LIKE '%" . $pieces[1] . "%' AND Checked = 1";
    $img = $nc_core->db->get_var($sql_img);
  }
  if ((strpos($_SERVER['REQUEST_URI'], 'nashi-spetsialisty') !== false) && ($_SERVER['REQUEST_URI'] !== '/o-klinike/nashi-spetsialisty/')) {
    $pieces1 = explode("/nashi-spetsialisty/", $_SERVER['REQUEST_URI']);
    $pieces1[1] = str_replace('/', '', $pieces1[1]);
    $sql_img = "SELECT photo FROM Message243 WHERE Keyword LIKE '%" . $pieces1[1] . "%' AND Checked = 1";
    $img = $nc_core->db->get_var($sql_img);
  }
  ?>
  <meta property="og:image" content="https://<?= $_SERVER['HTTP_HOST'];if ($img) {echo $img;} else {echo $current_sub['img_soc'];} ?>" />*/ ?>
  <meta name="yandex-verification" content="e9dc916d40e2ed98" />
  <meta name="google-site-verification" content="H0asMbeIu-lkrm_M6GHcI7sV3ywkSAnmI98Ul5fjRjE" />

  <link rel="canonical" href="<?= $canon_uri ?>" />
  <title><? echo str_replace('в Краснодаре', $current_catalogue['city2'], shortcode($new_title)) ?></title>
  <meta name="description" content="<?= str_replace('в Краснодаре', $current_catalogue['city2'], shortcode($new_desc)) ?>">
  <meta name="keywords" content="<?= $nc_core->page->get_keywords() ?>" />
  <?php if ($nc_core->admin_mode) {
    echo nc_js();
  } ?>
  <?php if (stripos(@$_SERVER['HTTP_USER_AGENT'], 'Lighthouse') === false): ?>
    <meta name="msvalidate.01" content="ACEFA3BBE6A9ADF08C6615DFD82BFE4A" />
  <? endif; ?>
  <? if ($current_catalogue['Catalogue_ID'] == 974 or $current_catalogue['Catalogue_ID'] == 975): ?>
    <meta name="robots" content="nofollow" />
    <meta name="robots" content="noindex" />
  <?php endif; ?>
  <link rel="icon" href="/assets/images/new_logos/favicon.svg" type="image/svg+xml">
  <link href="<?= $nc_parent_template_folder_path; ?>assets/css/build/fancybox.css" rel="stylesheet" type="text/css">
  <link href="<?= $nc_parent_template_folder_path; ?>assets/css/build/swiper.css" rel="stylesheet" type="text/css">
  <link href="<?= $nc_parent_template_folder_path; ?>assets/css/normalize.css" rel="stylesheet" type="text/css">
  <link href="<?= $nc_parent_template_folder_path; ?>assets/css/main-min.css?v=<?= time() ?>" rel="stylesheet" type="text/css">
  <link href="<?= $nc_parent_template_folder_path; ?>assets/fonts/Nunito-Regular.woff2" as="font" type="font/woff2" rel="preload" crossorigin>
  <link href="<?= $nc_parent_template_folder_path; ?>assets/fonts/Nunito-ExtraBold.woff" as="font" type="font/woff" rel="preload" crossorigin>
  <?php if (stripos(@$_SERVER['HTTP_USER_AGENT'], 'Lighthouse') === false): ?>
    <script defer src="<?= $nc_parent_template_folder_path; ?>assets/js/sourcebuster.min.js?v=<?= time() ?>"></script>
    <script defer src="<?= $nc_parent_template_folder_path; ?>assets/js/request.js?v=7"></script>
    <script defer src="<?= $nc_parent_template_folder_path; ?>assets/js/build/fancybox.js?v=<?= time() ?>"></script>
    <script defer src="<?= $nc_parent_template_folder_path; ?>assets/js/build/swiper.js?v=<?= time() ?>"></script>
    <script defer src="<?= $nc_parent_template_folder_path; ?>assets/js/main.js?v=<?= time() ?>"></script>
    <? if ($current_catalogue['Catalogue_ID'] == '1') { ?>
      <?
      //   <script>
      //     setTimeout(function() {
      //       var script = document.createElement('script');
      //       script.src = 'https://analytics.alloka.ru/script/3896cc796d795dcd';
      //       script.async = true;
      //       document.head.appendChild(script);
      //     }, 3000);
      //   </script>
      ?>
    <? } ?>
  <?php endif; ?>
</head>

<body class="body">
  <?php if (stripos(@$_SERVER['HTTP_USER_AGENT'], 'Lighthouse') === false): ?>
    <?= $current_catalogue['headcode'] ?>
  <? endif; ?>
  <script type="text/javascript">
    ! function() {
      var t = document.createElement("script");
      t.type = "text/javascript", t.async = !0, t.src = 'https://vk.com/js/api/openapi.js?173', t.onload = function() {
        VK.Retargeting.Init("VK-RTRG-1965126-aBzdK"), VK.Retargeting.Hit()
      }, document.head.appendChild(t)
    }();
  </script><noscript><img src="https://vk.com/rtrg?p=VK-RTRG-1965126-aBzdK" style="position:fixed; left:-999px;" alt="" /></noscript>
  <?php if (!empty($current_catalogue['plashka'])): ?>
    <div class="holidays">
      <div class="container">
        <p class="holidays__text">
          <?= $current_catalogue['plashka'] ?>
        </p>
      </div>
    </div>
  <?php endif; ?>

  <div class="top-bar">
    <div class="top-bar__container container">
      <p class="top-bar__text">
        Медицинская лицензия <?= $current_catalogue['license'] ?>
      </p>
      <ul class="top-bar__socials">
        <li class="top-bar__socials-item"><a href="<?= $current_catalogue['telegram'] ?>" target="_blank" rel="nofollow" class="socials__link" aria-label="telegram">
            <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M10.6326 15.8632L10.2687 20.8888C10.7894 20.8888 11.0149 20.6692 11.2853 20.4055L13.7264 18.115L18.7847 21.7519C19.7124 22.2595 20.366 21.9922 20.6163 20.914L23.9365 5.63926L23.9374 5.63836C24.2317 4.29196 23.4415 3.76547 22.5377 4.09576L3.02135 11.4316C1.68941 11.9392 1.70957 12.6682 2.79493 12.9985L7.78447 14.5222L19.3742 7.40235C19.9196 7.04775 20.4155 7.24395 20.0076 7.59855L10.6326 15.8632Z" fill="#3390ec"></path>
            </svg>
          </a></li>
        <?php if (!empty($current_catalogue['ok'])): ?>
          <li class="top-bar__socials-item">
            <a href="<?= $current_catalogue['ok'] ?>" target="_blank" rel="nofollow" class="top-bar__socials-link" aria-label="ok">
              <svg class="top-bar__socials-icon" width="22" height="22" viewBox="0 0 22 22" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_1225_196)">
                  <path
                    d="M9.9474 0.0687494C7.82475 0.446875 6.06303 1.96367 5.43998 3.94453C5.19506 4.72656 5.13061 5.68477 5.26811 6.48828C5.66772 8.80859 7.56264 10.6477 9.98607 11.0645C10.4845 11.1504 11.5158 11.1504 12.0142 11.0645C14.1626 10.6949 15.933 9.18242 16.5603 7.18008C16.7579 6.55273 16.8138 6.11445 16.788 5.37109C16.7622 4.64492 16.672 4.20234 16.4185 3.54062C15.7396 1.77891 13.9994 0.408203 12.0142 0.0644531C11.5329 -0.0171881 10.4201 -0.0171881 9.9474 0.0687494ZM11.722 2.93906C12.315 3.09805 12.9208 3.50195 13.2646 3.96602C13.6341 4.46445 13.806 4.97148 13.8103 5.56445C13.8103 6.00703 13.7415 6.29492 13.5224 6.7418C13.2646 7.27031 12.8392 7.6957 12.2892 7.96211C11.3997 8.39609 10.6005 8.39609 9.71107 7.96211C8.92475 7.57969 8.37475 6.86211 8.22436 6.01562C8.12123 5.43984 8.18998 4.98008 8.47357 4.38711C8.72279 3.86719 9.15678 3.4375 9.71107 3.1668C9.93451 3.05508 10.2568 2.93906 10.4201 2.90039C10.7681 2.82734 11.3697 2.84453 11.722 2.93906Z"
                    fill="#071D26" />
                  <path
                    d="M5.22072 11.0816C4.59338 11.2449 4.16369 11.7906 4.13361 12.4652C4.12072 12.7445 4.12931 12.8176 4.22384 13.0024C4.4172 13.3762 4.96291 13.8359 5.84806 14.3602C6.64299 14.8371 7.7172 15.1938 8.93752 15.3828C9.25549 15.4344 9.58634 15.4902 9.67228 15.5031L9.82697 15.5332L7.61838 17.6602C5.13478 20.0449 5.18205 19.9934 5.17775 20.5391C5.17775 20.943 5.31525 21.2524 5.62463 21.5402C6.18752 22.0645 6.98244 22.1547 7.49377 21.7465C7.5797 21.6777 8.40041 20.8957 9.32424 20.002L11 18.382L11.4856 18.8375C11.7477 19.0867 12.5469 19.8516 13.2559 20.5391C14.0895 21.3469 14.6137 21.8195 14.7383 21.884C15.0262 22.0258 15.6621 22.0215 15.9543 21.8754C16.2766 21.7164 16.5645 21.4285 16.7192 21.1149C16.891 20.7668 16.9082 20.3758 16.7664 20.0492C16.659 19.8086 16.7063 19.8602 14.1453 17.4066C13.0754 16.3797 12.2074 15.5375 12.2117 15.5289C12.2203 15.5246 12.3879 15.4988 12.5899 15.4688C13.4149 15.3613 14.3817 15.1379 15.009 14.9059C15.5461 14.7082 16.0145 14.4676 16.5731 14.0981C17.2262 13.6641 17.6215 13.3031 17.7719 12.9938C18.0856 12.3535 17.6602 11.3867 16.9598 11.1418C16.6547 11.0387 16.2035 11.0473 15.8899 11.1719C15.7524 11.2234 15.4602 11.3824 15.2453 11.5242C12.7102 13.1957 9.29845 13.1914 6.75041 11.5199C6.53556 11.3781 6.24767 11.2234 6.11447 11.1719C5.84377 11.0731 5.42267 11.0258 5.22072 11.0816Z"
                    fill="#071D26" />
                </g>
                <defs>
                  <clipPath id="clip0_1225_196">
                    <rect width="22" height="22" fill="white" />
                  </clipPath>
                </defs>
              </svg>
            </a>
          </li>
        <?php endif; ?>




        <?php if (!empty($current_catalogue['vk'])): ?>
          <li class="top-bar__socials-item">
            <a href="<?= $current_catalogue['vk'] ?>" target="_blank" rel="nofollow" class="top-bar__socials-link" aria-label="vk">
              <svg class="top-bar__socials-icon" width="22" height="22" viewBox="0 0 22 22" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_87_45)">
                  <path
                    d="M18.2554 11.9424C17.8998 11.4932 18.0015 11.2934 18.2554 10.8919C18.26 10.8873 21.1961 6.83012 21.4986 5.45421L21.5004 5.45329C21.6508 4.95187 21.5004 4.58337 20.7735 4.58337H18.3682C17.7558 4.58337 17.4735 4.89962 17.3223 5.25346C17.3223 5.25346 16.0976 8.18496 14.3651 10.0852C13.8059 10.6343 13.5474 10.8103 13.2422 10.8103C13.0918 10.8103 12.8581 10.6343 12.8581 10.1329V5.45329C12.8581 4.85196 12.6867 4.58337 12.1798 4.58337H8.39758C8.0135 4.58337 7.78525 4.86387 7.78525 5.12512C7.78525 5.69529 8.6515 5.82637 8.74133 7.43054V10.9111C8.74133 11.6738 8.60292 11.814 8.29583 11.814C7.47817 11.814 5.49358 8.87062 4.3175 5.50187C4.08008 4.84829 3.84817 4.58429 3.23125 4.58429H0.825C0.138417 4.58429 0 4.90054 0 5.25437C0 5.87954 0.817666 8.98796 3.80233 13.0946C5.7915 15.8978 8.59283 17.4167 11.1412 17.4167C12.6729 17.4167 12.8599 17.0794 12.8599 16.4991C12.8599 13.8206 12.7215 13.5676 13.4888 13.5676C13.8444 13.5676 14.4568 13.7436 15.8868 15.0957C17.5212 16.699 17.7898 17.4167 18.7046 17.4167H21.1099C21.7956 17.4167 22.143 17.0794 21.9432 16.4139C21.4858 15.0141 18.3948 12.1349 18.2554 11.9424Z"
                    fill="#071D26" />
                </g>
                <defs>
                  <clipPath id="clip0_87_45">
                    <rect width="22" height="22" fill="white" />
                  </clipPath>
                </defs>
              </svg>
            </a>
          </li>
        <?php endif; ?>
        <?php if (!empty($current_catalogue['dzen'])): ?>
          <li class="top-bar__socials-item">
            <a href="<?= $current_catalogue['dzen'] ?>" target="_blank" rel="nofollow" class="top-bar__socials-link" aria-label="dzen">
              <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 169 169" fill="none">
                <g clip-path="url(#clip0_45_484)">
                  <path d="M84.0337 168.01H84.7036C118.068 168.01 137.434 164.651 151.152 151.333C165.139 137.206 168.369 117.709 168.369 84.4749V83.5351C168.369 50.311 165.139 30.9445 151.152 16.677C137.444 3.3594 117.938 0 84.7136 0H84.0437C50.6797 0 31.3031 3.3594 17.5856 16.677C3.59808 30.8045 0.368652 50.311 0.368652 83.5351V84.4749C0.368652 117.699 3.59808 137.066 17.5856 151.333C31.1732 164.651 50.6797 168.01 84.0337 168.01Z" fill="#202022" />
                  <path d="M148.369 82.7304C148.369 82.0906 147.849 81.5608 147.209 81.5308C124.246 80.661 110.271 77.732 100.494 67.955C90.6967 58.1581 87.7776 44.1724 86.9079 21.1596C86.8879 20.5198 86.358 20 85.7082 20H83.0291C82.3893 20 81.8594 20.5198 81.8295 21.1596C80.9597 44.1624 78.0406 58.1581 68.2437 67.955C58.4568 77.742 44.4911 80.661 21.5283 81.5308C20.8885 81.5508 20.3687 82.0806 20.3687 82.7304V85.4096C20.3687 86.0494 20.8885 86.5792 21.5283 86.6092C44.4911 87.4789 58.4667 90.408 68.2437 100.185C78.0206 109.962 80.9397 123.908 81.8195 146.83C81.8394 147.47 82.3693 147.99 83.0191 147.99H85.7082C86.348 147.99 86.8779 147.47 86.9079 146.83C87.7876 123.908 90.7067 109.962 100.484 100.185C110.271 90.398 124.236 87.4789 147.199 86.6092C147.839 86.5892 148.359 86.0594 148.359 85.4096V82.7304H148.369Z" fill="white" />
                </g>
                <defs>
                  <clipPath id="clip0_45_484">
                    <rect width="168.04" height="168.04" fill="white" transform="translate(0.368652)" />
                  </clipPath>
                </defs>
              </svg>
            </a>
          </li>
        <?php endif; ?>
        <?php if (!empty($current_catalogue['youtube'])): ?>
          <li class="top-bar__socials-item">
            <a href="<?= $current_catalogue['youtube'] ?>" target="_blank" rel="nofollow" class="top-bar__socials-link" aria-label="youtube">
              <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_1135_3113)">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M11 3C11.855 3 12.732 3.022 13.582 3.058L14.586 3.106L15.547 3.163L16.447 3.224L17.269 3.288C18.161 3.35628 19.0004 3.73695 19.6395 4.36304C20.2786 4.98913 20.6764 5.82054 20.763 6.711L20.803 7.136L20.878 8.046C20.948 8.989 21 10.017 21 11C21 11.983 20.948 13.011 20.878 13.954L20.803 14.864C20.79 15.01 20.777 15.151 20.763 15.289C20.6764 16.1796 20.2784 17.0112 19.6391 17.6373C18.9999 18.2634 18.1602 18.6439 17.268 18.712L16.448 18.775L15.548 18.837L14.586 18.894L13.582 18.942C12.7218 18.9794 11.861 18.9987 11 19C10.139 18.9987 9.27817 18.9794 8.418 18.942L7.414 18.894L6.453 18.837L5.553 18.775L4.731 18.712C3.83895 18.6437 2.99955 18.2631 2.36047 17.637C1.72139 17.0109 1.32357 16.1795 1.237 15.289L1.197 14.864L1.122 13.954C1.04554 12.9711 1.00484 11.9858 1 11C1 10.017 1.052 8.989 1.122 8.046L1.197 7.136C1.21 6.99 1.223 6.849 1.237 6.711C1.32354 5.8207 1.72122 4.98942 2.36009 4.36334C2.99897 3.73727 3.83813 3.3565 4.73 3.288L5.551 3.224L6.451 3.163L7.413 3.106L8.417 3.058C9.2775 3.02063 10.1387 3.0013 11 3ZM9 8.575V13.425C9 13.887 9.5 14.175 9.9 13.945L14.1 11.52C14.1914 11.4674 14.2673 11.3916 14.3201 11.3003C14.3729 11.209 14.4007 11.1055 14.4007 11C14.4007 10.8945 14.3729 10.791 14.3201 10.6997C14.2673 10.6084 14.1914 10.5326 14.1 10.48L9.9 8.056C9.80876 8.00332 9.70526 7.9756 9.5999 7.97562C9.49455 7.97563 9.39106 8.00339 9.29983 8.0561C9.20861 8.1088 9.13287 8.1846 9.08024 8.27587C9.02761 8.36713 8.99993 8.47065 9 8.576"
                    fill="#071D26" />
                </g>
                <defs>
                  <clipPath id="clip0_1135_3113">
                    <rect width="22" height="22" fill="white" />
                  </clipPath>
                </defs>
              </svg>
            </a>
          </li>
        <?php endif; ?>


        <? /*<li class="top-bar__item">
                    <a href="https://max.ru/u/f9LHodD0cOK1HK0UMo8RDi3T5lQI6_rMbWU0rcGnZ-GfIQwqu797rJh_gDY" target="_blank" rel="nofollow">
                        <img src="/assets/img/max-mini.svg" alt="mag logo" height="22" width="22">
                    </a>
                </li> */ ?>


      </ul>
      <form action="/search-1/" method="post" class="top-bar__search search-top" enctype="multipart/form-data">
        <input name="f_TrafficSource" type="hidden" value="typein">
        <input name="f_Istochnik" type="hidden" value="(direct)">
        <label class="search-top__label">
          <input name="s" placeholder="Искать на сайте" type="text" class="search-top__input">
        </label>
        <div class="search-top__submit">
          <label>
            <input type="submit" style="display:none;">
            <svg class="search-top__submit-icon" width="22" height="22" viewBox="0 0 22 22" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M17.6663 18.8106L12.1763 13.3261C11.7216 13.712 11.1899 14.0131 10.5813 14.2293C9.97262 14.4455 9.32208 14.5536 8.62968 14.5536C6.95165 14.5536 5.53119 13.9715 4.36833 12.8075C3.20546 11.6433 2.62402 10.2388 2.62402 8.59376C2.62402 6.94875 3.20608 5.54418 4.37018 4.38008C5.53427 3.21599 6.94265 2.63394 8.59531 2.63394C10.248 2.63394 11.6525 3.21599 12.809 4.38008C13.9654 5.54418 14.5437 6.94989 14.5437 8.5972C14.5437 9.25916 14.4395 9.89296 14.2311 10.4986C14.0227 11.1042 13.71 11.6726 13.2932 12.2036L18.8291 17.6937C18.9849 17.8446 19.0627 18.0266 19.0627 18.2398C19.0627 18.453 18.9779 18.6426 18.8082 18.8086C18.65 18.9694 18.4574 19.0497 18.2304 19.0497C18.0033 19.0497 17.8153 18.97 17.6663 18.8106ZM8.60871 12.9923C9.82681 12.9923 10.8603 12.5626 11.7091 11.7033C12.5579 10.844 12.9824 9.80752 12.9824 8.59376C12.9824 7.38001 12.5577 6.34349 11.7083 5.4842C10.8589 4.6249 9.82574 4.19525 8.60871 4.19525C7.37894 4.19525 6.33427 4.6249 5.4747 5.4842C4.61512 6.34349 4.18534 7.38001 4.18534 8.59376C4.18534 9.80752 4.61486 10.844 5.47389 11.7033C6.33292 12.5626 7.37786 12.9923 8.60871 12.9923Z"
                fill="#071D26" />
            </svg>
          </label>
        </div>
      </form>
      <div>
        <div id="specialButton" style="cursor:pointer;margin-left: 10px;" class="header__lidrekon aspect-ratio">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 50 50" fill="none">
            <path
              d="M25 39C38.036 39 48.352 26.167 48.784 25.621L49.275 25L48.784 24.379C48.352 23.833 38.036 11 25 11C11.964 11 1.64798 23.833 1.21598 24.379L0.724976 25L1.21598 25.621C1.64798 26.167 11.964 39 25 39ZM25 13C35.494 13 44.47 22.46 46.69 25C44.473 27.542 35.509 37 25 37C14.506 37 5.52998 27.54 3.30998 25C5.52698 22.458 14.491 13 25 13Z"
              fill="black" />
            <path
              d="M25 34C29.963 34 34 29.962 34 25C34 20.038 29.963 16 25 16C20.037 16 16 20.038 16 25C16 29.962 20.037 34 25 34ZM25 18C28.859 18 32 21.14 32 25C32 28.86 28.859 32 25 32C21.141 32 18 28.86 18 25C18 21.14 21.141 18 25 18Z"
              fill="black" />
          </svg>
        </div>
      </div>

    </div>
  </div>
  <header class="header">
    <div class="header__top">
      <div class="header__top-container container">
        <button class="header__menu-burger menu-burger" aria-label="Бургер меню">
          <span class="menu-burger__decor"></span>
        </button>
        <a href="/" class="header__logo logo">
          <picture class="logo__picture">
            <source media="(max-width:991px)"
              srcset="/assets/images/new_logos/color_sign.svg" style="width: 31px; height: 31px;">
            <img src="/assets/images/new_logos/color_logo.svg"
              alt="Логотип клиники доктора Калюжной" class="logo__img">
          </picture>
        </a>
        <div class="header__mobile-icons">
          <?php
          if (
            isset($_GET['utm_source']) && $_GET['utm_source'] === 'yandex'
            && isset($_GET['utm_medium']) && $_GET['utm_medium'] === 'cpc'
          ) { ?>
            <a href="tel:+79038565989" class="header__mobile-phone header__mobile-phone_digits">+7 (903) 856-59-89</a>
          <? } else if (
            isset($_GET['utm_source']) && $_GET['utm_source'] == 'city' &&
            isset($_GET['utm_medium']) && $_GET['utm_medium'] == 'banner' &&
            isset($_GET['utm_campaign']) && $_GET['utm_campaign'] == 'naruzshka'
          ) { ?>
            <a href="tel:89068049813" class="header__mobile-phone header__mobile-phone_digits">+7 (906) 804-98-13</a>
          <? } else if (
            isset($_GET['utm_source']) && $_GET['utm_source'] == 'avto' &&
            isset($_GET['utm_medium']) && $_GET['utm_medium'] == 'banner' &&
            isset($_GET['utm_campaign']) && $_GET['utm_campaign'] == 'bus*'
          ) { ?>
            <a href="tel:89068049017" class="header__mobile-phone header__mobile-phone_digits">+7 (906) 804-90-17</a>
          <? } else { ?>
            <a href="tel:<?= $current_catalogue['clear_phone'] ?>" class="header__mobile-phone header__mobile-phone_digits 
          <? if ($current_catalogue['Catalogue_ID'] == '1' || $current_catalogue['Catalogue_ID'] == '2') {
              echo 'phone_alloka';
            } ?>"><?= $current_catalogue['phone'] ?></a>
          <? } ?>
        </div>
        <ul class="header__info">
          <?php
          //Для городов без физического присутствия
          if (!in_array($current_catalogue['Catalogue_Name'], ['Краснодар', 'Ростов-на-Дону'])): ?>
            <li class="header__info-item">
              <span class="header__address_name">Адрес call-центра</span>
            </li>
          <?php endif; ?>
          <li class="header__info-item">
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M4.17435 20.3037C3.7527 20.3037 3.38706 20.1489 3.07744 19.8393C2.76784 19.5296 2.61304 19.164 2.61304 18.7424V4.63265C2.61304 4.20951 2.76784 3.84259 3.07744 3.5319C3.38706 3.22119 3.7527 3.06584 4.17435 3.06584H5.61462V2.4506C5.61462 2.24215 5.69037 2.06341 5.84188 1.91439C5.99341 1.76536 6.17945 1.69084 6.40002 1.69084C6.62342 1.69084 6.81217 1.76751 6.96624 1.92086C7.12032 2.0742 7.19736 2.25842 7.19736 2.47351V3.06584H14.8027V2.4506C14.8027 2.24215 14.8785 2.06341 15.03 1.91439C15.1815 1.76536 15.3675 1.69084 15.5881 1.69084C15.8115 1.69084 16.0002 1.76751 16.1543 1.92086C16.3084 2.0742 16.3855 2.25842 16.3855 2.47351V3.06584H17.8257C18.2489 3.06584 18.6158 3.22119 18.9265 3.5319C19.2372 3.84259 19.3925 4.20951 19.3925 4.63265V18.7424C19.3925 19.164 19.2372 19.5296 18.9265 19.8393C18.6158 20.1489 18.2489 20.3037 17.8257 20.3037H4.17435ZM4.17435 18.7424H17.8257V8.93751H4.17435V18.7424Z"
                fill="#0079B5" />
            </svg>
            <span class="header__info-item-text">
              <?= $current_catalogue['schedule'] ?>
            </span>
          </li>
          <li class="header__info-item">
            <button class="header__info-city-btn modal-button-city" data-additional="Выбор города">
              <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M11.0002 10.8037C11.4504 10.8037 11.8358 10.6434 12.1563 10.3228C12.4768 10.0021 12.637 9.61672 12.637 9.16648C12.637 8.71624 12.4767 8.33087 12.1561 8.01036C11.8355 7.68986 11.45 7.52961 10.9998 7.52961C10.5496 7.52961 10.1642 7.68993 9.84367 8.01056C9.52317 8.33118 9.36292 8.71661 9.36292 9.16685C9.36292 9.61708 9.52324 10.0025 9.84388 10.323C10.1645 10.6435 10.5499 10.8037 11.0002 10.8037ZM11.0101 19.9629C10.8934 19.9629 10.781 19.9449 10.6729 19.9089C10.5648 19.8728 10.4671 19.8188 10.3797 19.7467C8.0997 17.7345 6.39531 15.8709 5.26657 14.1559C4.13785 12.4408 3.57349 10.8388 3.57349 9.35C3.57349 7.02993 4.31995 5.18161 5.81288 3.80503C7.30581 2.42846 9.03467 1.74017 10.9995 1.74017C12.9643 1.74017 14.6933 2.42846 16.1866 3.80503C17.6798 5.18161 18.4265 7.02993 18.4265 9.35C18.4265 10.8356 17.8621 12.4367 16.7334 14.1534C15.6046 15.8701 13.9003 17.7345 11.6202 19.7467C11.5329 19.8188 11.4385 19.8728 11.3371 19.9089C11.2357 19.9449 11.1267 19.9629 11.0101 19.9629Z"
                  fill="#0079B5" />
              </svg>
              <span class="header__info-item-text cololig">
                <?= $current_catalogue['address'] ?>
              </span>
            </button>
          </li>
          <? if (isset($partners[$current_catalogue['Catalogue_ID']])) {
            $partner = $partners[$current_catalogue['Catalogue_ID']];
          ?>
            <li class="header__info-item">
              <span class="header__info-item-text">Партнёры</span>
              <a class="header__info-city-btn modal-button-city" href="<?= $partner['url'] ?>" target="_blank">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M11.0002 10.8037C11.4504 10.8037 11.8358 10.6434 12.1563 10.3228C12.4768 10.0021 12.637 9.61672 12.637 9.16648C12.637 8.71624 12.4767 8.33087 12.1561 8.01036C11.8355 7.68986 11.45 7.52961 10.9998 7.52961C10.5496 7.52961 10.1642 7.68993 9.84367 8.01056C9.52317 8.33118 9.36292 8.71661 9.36292 9.16685C9.36292 9.61708 9.52324 10.0025 9.84388 10.323C10.1645 10.6435 10.5499 10.8037 11.0002 10.8037ZM11.0101 19.9629C10.8934 19.9629 10.781 19.9449 10.6729 19.9089C10.5648 19.8728 10.4671 19.8188 10.3797 19.7467C8.0997 17.7345 6.39531 15.8709 5.26657 14.1559C4.13785 12.4408 3.57349 10.8388 3.57349 9.35C3.57349 7.02993 4.31995 5.18161 5.81288 3.80503C7.30581 2.42846 9.03467 1.74017 10.9995 1.74017C12.9643 1.74017 14.6933 2.42846 16.1866 3.80503C17.6798 5.18161 18.4265 7.02993 18.4265 9.35C18.4265 10.8356 17.8621 12.4367 16.7334 14.1534C15.6046 15.8701 13.9003 17.7345 11.6202 19.7467C11.5329 19.8188 11.4385 19.8728 11.3371 19.9089C11.2357 19.9449 11.1267 19.9629 11.0101 19.9629Z"
                    fill="#0079B5" />
                </svg>
                <span class="header__info-item-text cololig">
                  <?= $partner['address'] ?>
                </span>
              </a>
            </li>
          <? } ?>
          <?
          if ($current_catalogue['Catalogue_ID'] != 2) {
            if (in_array($current_catalogue['Catalogue_Name'], ['Архангельск', 'Вологда', 'Иваново', 'Мурманск', 'Оренбург', 'Петрозаводск', 'Псков', 'Саранск', 'Тамбов', 'Тула', 'Ульяновск'])): ?>
              <li class="header__info-item">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M8.12945 13.9035H4.951C4.63582 13.9035 4.40416 13.7648 4.25603 13.4875C4.10791 13.2101 4.12883 12.9404 4.3188 12.6784L12.2729 1.19914C12.4024 1.02012 12.5643 0.89914 12.7586 0.836211C12.9529 0.773267 13.1472 0.781815 13.3415 0.861855C13.5358 0.938244 13.6901 1.06686 13.8043 1.2477C13.9186 1.42855 13.9604 1.62376 13.9299 1.83334L13.0252 9.00774H16.9653C17.2958 9.00774 17.5304 9.15587 17.669 9.45212C17.8077 9.74839 17.7744 10.0257 17.5691 10.2841L8.85332 20.7506C8.72379 20.9144 8.55806 21.0201 8.35612 21.0678C8.15419 21.1154 7.96189 21.0974 7.77922 21.0137C7.60021 20.9336 7.45922 20.805 7.35627 20.6278C7.25331 20.4506 7.21711 20.2554 7.24766 20.0421L8.12945 13.9035Z"
                    fill="#1C7597" />
                </svg>
                <span class="header__info-item-text">
                  Выезд нарколога за 2 минуты
                </span>
              </li>
            <?php endif; ?>
          <? } ?>
        </ul>



        <div class="header__connection">
          <?php
          if (
            isset($_GET['utm_source']) && $_GET['utm_source'] === 'yandex'
            && isset($_GET['utm_medium']) && $_GET['utm_medium'] === 'cpc'
          ) { ?>
          <? } else if (
            isset($_GET['utm_source']) && $_GET['utm_source'] == 'city' &&
            isset($_GET['utm_medium']) && $_GET['utm_medium'] == 'banner' &&
            isset($_GET['utm_campaign']) && $_GET['utm_campaign'] == 'naruzshka'
          ) { ?>
            <a href="tel:89068049813" class="header__connection-tel">+7 (906) 804-98-13</a>
          <? } else if (
            isset($_GET['utm_source']) && $_GET['utm_source'] == 'avto' &&
            isset($_GET['utm_medium']) && $_GET['utm_medium'] == 'banner' &&
            isset($_GET['utm_campaign']) && $_GET['utm_campaign'] == 'bus*'
          ) { ?>
            <a href="tel:89068049017" class="header__connection-tel">+7 (906) 804-90-17</a>
          <? } else { ?>
            <?php if (!empty($current_catalogue['phone'])): ?>
              <a href="tel:<?= $current_catalogue['clear_phone'] ?>" class="header__connection-tel"><?= $current_catalogue['phone'] ?></a>
            <?php endif; ?>
            <?php if ($current_catalogue['Catalogue_ID'] < 7):  ?>
              <?php if (!empty($current_catalogue['additional_phone'])): ?>
                <a href="tel:<?= $current_catalogue['clear_additional_phone'] ?>" class="header__connection-tel"><?= $current_catalogue['additional_phone'] ?></a>
              <?php endif; ?>
            <?php endif; ?>
            <? if (!in_array($current_catalogue['Catalogue_Name'], ['Краснодар', 'Ростов-на-Дону'])): ?>
              <a href="tel:+78003021770" class="header__connection-tel">+7 (800) 302-17-70</a>
            <? endif ?>
            <?
            //Для городов без физического присутствия
            if (!in_array($current_catalogue['Catalogue_Name'], ['Краснодар', 'Ростов-на-Дону'])):
            // <li class="header__info-item">
            //   <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            //     <path
            //       d="M8.12945 13.9035H4.951C4.63582 13.9035 4.40416 13.7648 4.25603 13.4875C4.10791 13.2101 4.12883 12.9404 4.3188 12.6784L12.2729 1.19914C12.4024 1.02012 12.5643 0.89914 12.7586 0.836211C12.9529 0.773267 13.1472 0.781815 13.3415 0.861855C13.5358 0.938244 13.6901 1.06686 13.8043 1.2477C13.9186 1.42855 13.9604 1.62376 13.9299 1.83334L13.0252 9.00774H16.9653C17.2958 9.00774 17.5304 9.15587 17.669 9.45212C17.8077 9.74839 17.7744 10.0257 17.5691 10.2841L8.85332 20.7506C8.72379 20.9144 8.55806 21.0201 8.35612 21.0678C8.15419 21.1154 7.96189 21.0974 7.77922 21.0137C7.60021 20.9336 7.45922 20.805 7.35627 20.6278C7.25331 20.4506 7.21711 20.2554 7.24766 20.0421L8.12945 13.9035Z"
            //       fill="#1C7597" />
            //   </svg>
            //   <span class="header__info-item-text">
            //     Выезд нарколога за 2 минуты
            //   </span>
            // </li>
            endif; ?>

          <? } ?>
        </div>
        <div>
          <button class="header__btn btn modal-button header__info-item" data-additional="Кнопка обратный звонок в шапке">
            Обратный звонок
          </button>
          <div class="header__block">
            <?/*php if (!empty($current_catalogue['telegram'])): */ ?>
            <button class="header__social-link header__connection-link" data-chat-start><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" style="width: 25px;">
                <path d="M13.0867 21.3877L13.7321 21.7697L13.0867 21.3877ZM13.6288 20.4718L12.9833 20.0898L13.6288 20.4718ZM10.3712 20.4718L9.72579 20.8539H9.72579L10.3712 20.4718ZM10.9133 21.3877L11.5587 21.0057L10.9133 21.3877ZM1.25 10.5C1.25 10.9142 1.58579 11.25 2 11.25C2.41421 11.25 2.75 10.9142 2.75 10.5H1.25ZM3.07351 15.6264C2.915 15.2437 2.47627 15.062 2.09359 15.2205C1.71091 15.379 1.52918 15.8177 1.68769 16.2004L3.07351 15.6264ZM7.78958 18.9915L7.77666 19.7413L7.78958 18.9915ZM5.08658 18.6194L4.79957 19.3123H4.79957L5.08658 18.6194ZM21.6194 15.9134L22.3123 16.2004V16.2004L21.6194 15.9134ZM16.2104 18.9915L16.1975 18.2416L16.2104 18.9915ZM18.9134 18.6194L19.2004 19.3123H19.2004L18.9134 18.6194ZM19.6125 2.7368L19.2206 3.37628L19.6125 2.7368ZM21.2632 4.38751L21.9027 3.99563V3.99563L21.2632 4.38751ZM4.38751 2.7368L3.99563 2.09732V2.09732L4.38751 2.7368ZM2.7368 4.38751L2.09732 3.99563H2.09732L2.7368 4.38751ZM9.40279 19.2098L9.77986 18.5615L9.77986 18.5615L9.40279 19.2098ZM13.7321 21.7697L14.2742 20.8539L12.9833 20.0898L12.4412 21.0057L13.7321 21.7697ZM9.72579 20.8539L10.2679 21.7697L11.5587 21.0057L11.0166 20.0898L9.72579 20.8539ZM12.4412 21.0057C12.2485 21.3313 11.7515 21.3313 11.5587 21.0057L10.2679 21.7697C11.0415 23.0767 12.9585 23.0767 13.7321 21.7697L12.4412 21.0057ZM10.5 2.75H13.5V1.25H10.5V2.75ZM21.25 10.5V11.5H22.75V10.5H21.25ZM7.8025 18.2416C6.54706 18.2199 5.88923 18.1401 5.37359 17.9265L4.79957 19.3123C5.60454 19.6457 6.52138 19.7197 7.77666 19.7413L7.8025 18.2416ZM1.68769 16.2004C2.27128 17.6093 3.39066 18.7287 4.79957 19.3123L5.3736 17.9265C4.33223 17.4951 3.50486 16.6678 3.07351 15.6264L1.68769 16.2004ZM21.25 11.5C21.25 12.6751 21.2496 13.5189 21.2042 14.1847C21.1592 14.8438 21.0726 15.2736 20.9265 15.6264L22.3123 16.2004C22.5468 15.6344 22.6505 15.0223 22.7007 14.2868C22.7504 13.5581 22.75 12.6546 22.75 11.5H21.25ZM16.2233 19.7413C17.4786 19.7197 18.3955 19.6457 19.2004 19.3123L18.6264 17.9265C18.1108 18.1401 17.4529 18.2199 16.1975 18.2416L16.2233 19.7413ZM20.9265 15.6264C20.4951 16.6678 19.6678 17.4951 18.6264 17.9265L19.2004 19.3123C20.6093 18.7287 21.7287 17.6093 22.3123 16.2004L20.9265 15.6264ZM13.5 2.75C15.1512 2.75 16.337 2.75079 17.2619 2.83873C18.1757 2.92561 18.7571 3.09223 19.2206 3.37628L20.0044 2.09732C19.2655 1.64457 18.4274 1.44279 17.4039 1.34547C16.3915 1.24921 15.1222 1.25 13.5 1.25V2.75ZM22.75 10.5C22.75 8.87781 22.7508 7.6085 22.6545 6.59611C22.5572 5.57256 22.3554 4.73445 21.9027 3.99563L20.6237 4.77938C20.9078 5.24291 21.0744 5.82434 21.1613 6.73809C21.2492 7.663 21.25 8.84876 21.25 10.5H22.75ZM19.2206 3.37628C19.7925 3.72672 20.2733 4.20752 20.6237 4.77938L21.9027 3.99563C21.4286 3.22194 20.7781 2.57144 20.0044 2.09732L19.2206 3.37628ZM10.5 1.25C8.87781 1.25 7.6085 1.24921 6.59611 1.34547C5.57256 1.44279 4.73445 1.64457 3.99563 2.09732L4.77938 3.37628C5.24291 3.09223 5.82434 2.92561 6.73809 2.83873C7.663 2.75079 8.84876 2.75 10.5 2.75V1.25ZM2.75 10.5C2.75 8.84876 2.75079 7.663 2.83873 6.73809C2.92561 5.82434 3.09223 5.24291 3.37628 4.77938L2.09732 3.99563C1.64457 4.73445 1.44279 5.57256 1.34547 6.59611C1.24921 7.6085 1.25 8.87781 1.25 10.5H2.75ZM3.99563 2.09732C3.22194 2.57144 2.57144 3.22194 2.09732 3.99563L3.37628 4.77938C3.72672 4.20752 4.20752 3.72672 4.77938 3.37628L3.99563 2.09732ZM11.0166 20.0898C10.8136 19.7468 10.6354 19.4441 10.4621 19.2063C10.2795 18.9559 10.0702 18.7304 9.77986 18.5615L9.02572 19.8582C9.07313 19.8857 9.13772 19.936 9.24985 20.0898C9.37122 20.2564 9.50835 20.4865 9.72579 20.8539L11.0166 20.0898ZM7.77666 19.7413C8.21575 19.7489 8.49387 19.7545 8.70588 19.7779C8.90399 19.7999 8.98078 19.832 9.02572 19.8582L9.77986 18.5615C9.4871 18.3912 9.18246 18.3215 8.87097 18.287C8.57339 18.2541 8.21375 18.2487 7.8025 18.2416L7.77666 19.7413ZM14.2742 20.8539C14.4916 20.4865 14.6287 20.2564 14.7501 20.0898C14.8622 19.936 14.9268 19.8857 14.9742 19.8582L14.2201 18.5615C13.9298 18.7304 13.7204 18.9559 13.5379 19.2063C13.3646 19.4441 13.1864 19.7468 12.9833 20.0898L14.2742 20.8539ZM16.1975 18.2416C15.7862 18.2487 15.4266 18.2541 15.129 18.287C14.8175 18.3215 14.5129 18.3912 14.2201 18.5615L14.9742 19.8582C15.0192 19.832 15.096 19.7999 15.2941 19.7779C15.5061 19.7545 15.7842 19.7489 16.2233 19.7413L16.1975 18.2416Z" fill="#F04A25" />
              </svg>
              <span class="header__connection-link-text">
                Спросить
              </span>
            </button>
            <?/*php endif; */ ?>
            <?php if (!empty($current_catalogue['href_whatsapp'])): ?>
              <a href="<?= $current_catalogue['href_whatsapp'] ?>" target="_blank" rel="nofollow" class="header__connection-link">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M12.003 0H11.997C5.3805 0 0 5.382 0 12C0 14.625 0.846 17.058 2.2845 19.0335L0.789 23.4915L5.4015 22.017C7.299 23.274 9.5625 24 12.003 24C18.6195 24 24 18.6165 24 12C24 5.3835 18.6195 0 12.003 0Z" fill="#F04A25" />
                  <path d="M18.9858 16.9453C18.6963 17.7628 17.5473 18.4408 16.6308 18.6388C16.0038 18.7723 15.1848 18.8788 12.4278 17.7358C8.90132 16.2748 6.63032 12.6913 6.45332 12.4588C6.28382 12.2263 5.02832 10.5613 5.02832 8.83928C5.02832 7.11728 5.90282 6.27878 6.25532 5.91878C6.54482 5.62328 7.02332 5.48828 7.48232 5.48828C7.63082 5.48828 7.76432 5.49578 7.88432 5.50178C8.23682 5.51678 8.41382 5.53778 8.64632 6.09428C8.93582 6.79178 9.64082 8.51378 9.72482 8.69078C9.81032 8.86778 9.89582 9.10778 9.77582 9.34028C9.66332 9.58028 9.56432 9.68678 9.38732 9.89078C9.21032 10.0948 9.04232 10.2508 8.86532 10.4698C8.70332 10.6603 8.52032 10.8643 8.72432 11.2168C8.92832 11.5618 9.63332 12.7123 10.6713 13.6363C12.0108 14.8288 13.0968 15.2098 13.4853 15.3718C13.7748 15.4918 14.1198 15.4633 14.3313 15.2383C14.5998 14.9488 14.9313 14.4688 15.2688 13.9963C15.5088 13.6573 15.8118 13.6153 16.1298 13.7353C16.4538 13.8478 18.1683 14.6953 18.5208 14.8708C18.8733 15.0478 19.1058 15.1318 19.1913 15.2803C19.2753 15.4288 19.2753 16.1263 18.9858 16.9453Z" fill="#FAFAFA" />
                </svg>
                <span class="header__connection-link-text">
                  WhatsApp
                </span>
              </a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="header__bottom">
      <div class="header__bottom-container container">
        <nav class="header__menu menu">
          <ul class="menu__list">
            <?
            $menu = '';
            function displayMenu(&$pages, $level, $parent_id)
            {
              if ($level > 3) {
                return;
              }
              foreach ($pages as $key => $page) {
                if ($page['Parent_Sub_ID'] == $parent_id) {

                  if ($level == 0) {
                    if ($page['Template_ID'] == 6) {
                      $menu .= '<li class="menu__item">';
                      $menu .= '<button class="menu__link"><span class="menu__link-text">' . $page['Subdivision_Name']  . '</span><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.9993 13.9064C10.8971 13.9064 10.8015 13.8883 10.7125 13.8521C10.6235 13.8159 10.537 13.7561 10.4529 13.6728L5.91543 9.13527C5.77495 8.99388 5.70853 8.80841 5.71617 8.57888C5.72381 8.34933 5.79787 8.1634 5.93834 8.02109C6.10939 7.84822 6.29555 7.77324 6.49682 7.79616C6.69809 7.81908 6.87661 7.90077 7.03239 8.04125L10.9999 12.0088L14.9675 8.04125C15.1098 7.90077 15.2965 7.8229 15.5274 7.80762C15.7583 7.79234 15.944 7.87101 16.0845 8.04361C16.2555 8.18567 16.3296 8.368 16.3066 8.59061C16.2837 8.81324 16.202 9.00243 16.0616 9.15819L11.547 13.6728C11.4627 13.7561 11.3759 13.8159 11.2866 13.8521C11.1973 13.8883 11.1016 13.9064 10.9993 13.9064Z" fill="white"></path></svg></button><ul class="menu__sub-list">';
                    } else {

                      $menu .= '<li class="menu__item"><a class="menu__link" href="' . $page['Hidden_URL'] . '"><span class="menu__link-text">' . $page['Subdivision_Name'] . '</span></a></li>';
                    }
                  } else {
                    if ($page['Template_ID'] == 6 || $page['Template_ID'] == 0) {
                      $menu .= '<li class="menu__sub-item"><button class="menu__sub-link">' . $page['Subdivision_Name']  . '<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14.0703 10.8631C14.0703 10.9653 14.0523 11.0609 14.0161 11.1499C13.9799 11.2389 13.9201 11.3254 13.8367 11.4095L9.29919 15.947C9.15779 16.0874 8.97233 16.1539 8.7428 16.1462C8.51325 16.1386 8.32732 16.0645 8.185 15.9241C8.01214 15.753 7.93716 15.5668 7.96008 15.3656C7.98299 15.1643 8.06469 14.9858 8.20517 14.83L12.1728 10.8624L8.20517 6.89489C8.06469 6.75256 7.98681 6.56594 7.97154 6.33503C7.95626 6.10412 8.03492 5.91842 8.20753 5.77793C8.34958 5.60689 8.53192 5.53283 8.75453 5.55575C8.97716 5.57867 9.16635 5.66037 9.32211 5.80085L13.8367 10.3154C13.9201 10.3997 13.9799 10.4865 14.0161 10.5758C14.0523 10.6651 14.0703 10.7608 14.0703 10.8631Z" fill="white"></path></svg></button><ul class="menu__sub-list">';
                    } else {
                      $menu .= '<li class="menu__sub-item"><a class="menu__sub-link menu__sub-link_pr-30" href="' . $page['Hidden_URL'] . '">' . $page['Subdivision_Name'] . '</a></li>';
                    }
                  }
                  $menu .= displayMenu($pages,  $level + 1, $page['Subdivision_ID']);
                  if ($level == 0) {
                    if ($page['Template_ID'] == 6) {
                      $menu .= '</ul></li>';
                    }
                  } else {
                    if ($page['Template_ID'] == 6 || $page['Template_ID'] == 0) {
                      $menu .= '</ul></li>';
                    }
                  }
                }
              }
              return $menu;
            }
            $menuMobile = '';
            function displayMenuMobile(&$pages, $level, $parent_id)
            {
              if ($level > 3) {
                return;
              }
              foreach ($pages as $key => $page) {
                if ($page['Parent_Sub_ID'] == $parent_id) {

                  if ($level == 0) {
                    if ($page['Template_ID'] == 6) {
                      $menuMobile .= '<li class="mobile-menu__item accor"><button class="mobile-menu__btn accor-open" data-accordion-button><span class="mobile-menu__btn-text" >' . $page['Subdivision_Name']  . '</span><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.99946 12.6424C9.90654 12.6424 9.81963 12.626 9.73873 12.5931C9.65782 12.5602 9.57916 12.5058 9.50273 12.43L5.37773 8.30502C5.25002 8.17648 5.18964 8.00787 5.19658 7.7992C5.20353 7.59052 5.27085 7.4215 5.39856 7.29212C5.55406 7.13497 5.7233 7.06681 5.90627 7.08764C6.08924 7.10848 6.25153 7.18275 6.39314 7.31045L10 10.9174L13.6069 7.31045C13.7363 7.18275 13.9059 7.11195 14.1159 7.09806C14.3258 7.08417 14.4946 7.15568 14.6223 7.3126C14.7778 7.44174 14.8451 7.6075 14.8243 7.80987C14.8035 8.01226 14.7292 8.18425 14.6015 8.32585L10.4973 12.43C10.4207 12.5058 10.3418 12.5602 10.2606 12.5931C10.1794 12.626 10.0924 12.6424 9.99946 12.6424Z" fill="white"></path></svg></button><div class="mobile-menu__item-wrapper accor-full"><div class="mobile-menu__item-content" data-accordion-content> <ul class="mobile-menu__sub-list accor-full-content" data-accordion-list>';
                    } else {

                      $menuMobile .= '<li class="mobile-menu__item accor"><a class="mobile-menu__btn" href="' . $page['Hidden_URL'] . '"><span class="mobile-menu__btn-text">' . $page['Subdivision_Name'] . '</span></a></li>';
                    }
                  } else {
                    if ($page['Template_ID'] == 6 || $page['Template_ID'] == 0) {
                      $menuMobile .= '<li class="mobile-menu__sub-item accor"><button class="mobile-menu__sub-link accor-open" data-accordion-button><span class="mobile-menu__sub-link-text">' . $page['Subdivision_Name']  . '</span><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.99946 12.6424C9.90654 12.6424 9.81963 12.626 9.73873 12.5931C9.65782 12.5602 9.57916 12.5058 9.50273 12.43L5.37773 8.30502C5.25002 8.17648 5.18964 8.00787 5.19658 7.7992C5.20353 7.59052 5.27085 7.4215 5.39856 7.29212C5.55406 7.13497 5.7233 7.06681 5.90627 7.08764C6.08924 7.10848 6.25153 7.18275 6.39314 7.31045L10 10.9174L13.6069 7.31045C13.7363 7.18275 13.9059 7.11195 14.1159 7.09806C14.3258 7.08417 14.4946 7.15568 14.6223 7.3126C14.7778 7.44174 14.8451 7.6075 14.8243 7.80987C14.8035 8.01226 14.7292 8.18425 14.6015 8.32585L10.4973 12.43C10.4207 12.5058 10.3418 12.5602 10.2606 12.5931C10.1794 12.626 10.0924 12.6424 9.99946 12.6424Z" fill="white"></path></svg></button><div class="mobile-menu__sub-item-wrapper accor-full"><ul class="mobile-menu__sub-list accor-full-content" data-accordion-content>';
                    } else {
                      $menuMobile .= '<li class="mobile-menu__sub-item accor"><a class="mobile-menu__sub-link" href="' . $page['Hidden_URL'] . '">' . $page['Subdivision_Name'] . '</a></li>';
                    }
                  }
                  $menuMobile .= displayMenuMobile($pages,  $level + 1, $page['Subdivision_ID']);
                  if ($level == 0) {
                    if ($page['Template_ID'] == 6) {
                      $menuMobile .= '</ul></div></div></li>';
                    }
                  } else {
                    if ($page['Template_ID'] == 6 || $page['Template_ID'] == 0) {
                      $menuMobile .= '</ul></div></li>';
                    }
                  }
                }
              }
              return $menuMobile;
            }

            $nc_core->db->query("SELECT Subdivision_Name, Subdivision_ID,  Hidden_URL, Parent_Sub_ID, Template_ID FROM Subdivision WHERE (Checked = 1 OR Hidden_URL = '/o-klinike/konsultatsii/') AND Catalogue_ID = " . $current_catalogue['Catalogue_ID'] . " ORDER BY Priority ASC ", ARRAY_A);
            $pages = $nc_core->db->last_result;
            $menu_html .= displayMenu($pages,  0, 0);
            echo $menu_html;
            ?>
          </ul>
        </nav>
      </div>
    </div>
    <div class="header__mobile-menu mobile-menu">
      <ul data-accordion-list class="mobile-menu__list accor-wrapper">
        <?
        $menu_htmlMobile = displayMenuMobile($pages,  0, 0);
        echo $menu_htmlMobile;
        ?>
      </ul>
      <div class="mobile-menu__container container">
        <ul class="header__info">
          <?php
          //Для городов без физического присутствия
          if (!in_array($current_catalogue['Catalogue_Name'], ['Краснодар', 'Ростов-на-Дону'])): ?>
            <li class="header__info-item">
              <span class="header__address_name">Адрес call-центра</span>
            </li>
          <?php endif; ?>
          <li class="header__info-item">
            <button class="header__info-item-btn header__info-city-btn modal-button-city" data-additional="Выбор города">
              <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M11.0002 10.8037C11.4504 10.8037 11.8358 10.6434 12.1563 10.3228C12.4768 10.0021 12.637 9.61672 12.637 9.16648C12.637 8.71624 12.4767 8.33087 12.1561 8.01036C11.8355 7.68986 11.45 7.52961 10.9998 7.52961C10.5496 7.52961 10.1642 7.68993 9.84367 8.01056C9.52317 8.33118 9.36292 8.71661 9.36292 9.16685C9.36292 9.61708 9.52324 10.0025 9.84388 10.323C10.1645 10.6435 10.5499 10.8037 11.0002 10.8037ZM11.0101 19.9629C10.8934 19.9629 10.781 19.9449 10.6729 19.9089C10.5648 19.8728 10.4671 19.8188 10.3797 19.7467C8.0997 17.7345 6.39531 15.8709 5.26657 14.1559C4.13785 12.4408 3.57349 10.8388 3.57349 9.35C3.57349 7.02993 4.31995 5.18161 5.81288 3.80503C7.30581 2.42846 9.03467 1.74017 10.9995 1.74017C12.9643 1.74017 14.6933 2.42846 16.1866 3.80503C17.6798 5.18161 18.4265 7.02993 18.4265 9.35C18.4265 10.8356 17.8621 12.4367 16.7334 14.1534C15.6046 15.8701 13.9003 17.7345 11.6202 19.7467C11.5329 19.8188 11.4385 19.8728 11.3371 19.9089C11.2357 19.9449 11.1267 19.9629 11.0101 19.9629Z"
                  fill="#1C7597" />
              </svg>
              <span class="header__info-item-text">
                <?= $current_catalogue['address'] ?>
              </span>
            </button>
          </li>
          <li class="header__info-item">
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M4.17435 20.3037C3.7527 20.3037 3.38706 20.1489 3.07744 19.8393C2.76784 19.5296 2.61304 19.164 2.61304 18.7424V4.63265C2.61304 4.20951 2.76784 3.84259 3.07744 3.5319C3.38706 3.22119 3.7527 3.06584 4.17435 3.06584H5.61462V2.4506C5.61462 2.24215 5.69037 2.06341 5.84188 1.91439C5.99341 1.76536 6.17945 1.69084 6.40002 1.69084C6.62342 1.69084 6.81217 1.76751 6.96624 1.92086C7.12032 2.0742 7.19736 2.25842 7.19736 2.47351V3.06584H14.8027V2.4506C14.8027 2.24215 14.8785 2.06341 15.03 1.91439C15.1815 1.76536 15.3675 1.69084 15.5881 1.69084C15.8115 1.69084 16.0002 1.76751 16.1543 1.92086C16.3084 2.0742 16.3855 2.25842 16.3855 2.47351V3.06584H17.8257C18.2489 3.06584 18.6158 3.22119 18.9265 3.5319C19.2372 3.84259 19.3925 4.20951 19.3925 4.63265V18.7424C19.3925 19.164 19.2372 19.5296 18.9265 19.8393C18.6158 20.1489 18.2489 20.3037 17.8257 20.3037H4.17435ZM4.17435 18.7424H17.8257V8.93751H4.17435V18.7424Z"
                fill="#1C7597" />
            </svg>
            <span class="header__info-item-text">
              <?= $current_catalogue['schedule'] ?>
            </span>
          </li>
          <?php
          if (
            isset($_GET['utm_source']) && $_GET['utm_source'] === 'yandex'
            && isset($_GET['utm_medium']) && $_GET['utm_medium'] === 'cpc'
          ) { ?>
            <li class="header__info-item">
              <a href="tel:+79038565989" class="header__info-item-btn">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M18.2243 19.376C16.3421 19.376 14.4723 18.9141 12.6149 17.9901C10.7575 17.0661 9.08815 15.8644 7.60688 14.3849C6.12559 12.9055 4.92296 11.2361 3.99899 9.3769C3.07502 7.51765 2.61304 5.64878 2.61304 3.77029C2.61304 3.44347 2.72513 3.16796 2.94932 2.94378C3.1735 2.71959 3.449 2.6075 3.77581 2.6075H6.98414C7.26013 2.6075 7.49478 2.69195 7.68807 2.86084C7.88138 3.02972 8.00826 3.26379 8.06869 3.56303L8.68744 6.36285C8.72897 6.62424 8.72424 6.85739 8.67326 7.06232C8.62228 7.26724 8.52106 7.44177 8.36961 7.58592L6.05054 9.86761C6.88417 11.2373 7.8118 12.4282 8.83342 13.4404C9.85503 14.4525 11.0088 15.3107 12.2948 16.0148L14.4993 13.7525C14.6813 13.5589 14.8853 13.424 15.1113 13.3479C15.3373 13.2719 15.5716 13.2623 15.814 13.319L18.426 13.9039C18.7137 13.968 18.9457 14.1064 19.1223 14.3189C19.2988 14.5315 19.387 14.7874 19.387 15.0866V18.2078C19.387 18.5382 19.2749 18.8156 19.0508 19.0398C18.8266 19.2639 18.5511 19.376 18.2243 19.376Z"
                    fill="#1C7597" />
                </svg>
                <span class="header__info-item-text">
                  Горячая линия:
                  <span>+7 (903) 856-59-89</span>
                </span>
              </a>
            </li>
          <? } else if (
            isset($_GET['utm_source']) && $_GET['utm_source'] == 'city' &&
            isset($_GET['utm_medium']) && $_GET['utm_medium'] == 'banner' &&
            isset($_GET['utm_campaign']) && $_GET['utm_campaign'] == 'naruzshka'
          ) { ?>
            <li class="header__info-item">
              <a href="tel:89068049813" class="header__info-item-btn">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M18.2243 19.376C16.3421 19.376 14.4723 18.9141 12.6149 17.9901C10.7575 17.0661 9.08815 15.8644 7.60688 14.3849C6.12559 12.9055 4.92296 11.2361 3.99899 9.3769C3.07502 7.51765 2.61304 5.64878 2.61304 3.77029C2.61304 3.44347 2.72513 3.16796 2.94932 2.94378C3.1735 2.71959 3.449 2.6075 3.77581 2.6075H6.98414C7.26013 2.6075 7.49478 2.69195 7.68807 2.86084C7.88138 3.02972 8.00826 3.26379 8.06869 3.56303L8.68744 6.36285C8.72897 6.62424 8.72424 6.85739 8.67326 7.06232C8.62228 7.26724 8.52106 7.44177 8.36961 7.58592L6.05054 9.86761C6.88417 11.2373 7.8118 12.4282 8.83342 13.4404C9.85503 14.4525 11.0088 15.3107 12.2948 16.0148L14.4993 13.7525C14.6813 13.5589 14.8853 13.424 15.1113 13.3479C15.3373 13.2719 15.5716 13.2623 15.814 13.319L18.426 13.9039C18.7137 13.968 18.9457 14.1064 19.1223 14.3189C19.2988 14.5315 19.387 14.7874 19.387 15.0866V18.2078C19.387 18.5382 19.2749 18.8156 19.0508 19.0398C18.8266 19.2639 18.5511 19.376 18.2243 19.376Z"
                    fill="#1C7597" />
                </svg>
                <span class="header__info-item-text">
                  Горячая линия:
                  <span>+7 (906) 804-98-13</span>
                </span>
              </a>
            </li>
          <? } else if (
            isset($_GET['utm_source']) && $_GET['utm_source'] == 'avto' &&
            isset($_GET['utm_medium']) && $_GET['utm_medium'] == 'banner' &&
            isset($_GET['utm_campaign']) && $_GET['utm_campaign'] == 'bus*'
          ) { ?>
            <li class="header__info-item">
              <a href="tel:89068049017" class="header__info-item-btn">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M18.2243 19.376C16.3421 19.376 14.4723 18.9141 12.6149 17.9901C10.7575 17.0661 9.08815 15.8644 7.60688 14.3849C6.12559 12.9055 4.92296 11.2361 3.99899 9.3769C3.07502 7.51765 2.61304 5.64878 2.61304 3.77029C2.61304 3.44347 2.72513 3.16796 2.94932 2.94378C3.1735 2.71959 3.449 2.6075 3.77581 2.6075H6.98414C7.26013 2.6075 7.49478 2.69195 7.68807 2.86084C7.88138 3.02972 8.00826 3.26379 8.06869 3.56303L8.68744 6.36285C8.72897 6.62424 8.72424 6.85739 8.67326 7.06232C8.62228 7.26724 8.52106 7.44177 8.36961 7.58592L6.05054 9.86761C6.88417 11.2373 7.8118 12.4282 8.83342 13.4404C9.85503 14.4525 11.0088 15.3107 12.2948 16.0148L14.4993 13.7525C14.6813 13.5589 14.8853 13.424 15.1113 13.3479C15.3373 13.2719 15.5716 13.2623 15.814 13.319L18.426 13.9039C18.7137 13.968 18.9457 14.1064 19.1223 14.3189C19.2988 14.5315 19.387 14.7874 19.387 15.0866V18.2078C19.387 18.5382 19.2749 18.8156 19.0508 19.0398C18.8266 19.2639 18.5511 19.376 18.2243 19.376Z"
                    fill="#1C7597" />
                </svg>
                <span class="header__info-item-text">
                  Горячая линия:
                  <span>+7 (906) 804-90-17</span>
                </span>
              </a>
            </li>
          <? } else { ?>

            <li class="header__info-item">
              <a href="tel:<?= $current_catalogue['clear_phone'] ?>" class="header__info-item-btn">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M18.2243 19.376C16.3421 19.376 14.4723 18.9141 12.6149 17.9901C10.7575 17.0661 9.08815 15.8644 7.60688 14.3849C6.12559 12.9055 4.92296 11.2361 3.99899 9.3769C3.07502 7.51765 2.61304 5.64878 2.61304 3.77029C2.61304 3.44347 2.72513 3.16796 2.94932 2.94378C3.1735 2.71959 3.449 2.6075 3.77581 2.6075H6.98414C7.26013 2.6075 7.49478 2.69195 7.68807 2.86084C7.88138 3.02972 8.00826 3.26379 8.06869 3.56303L8.68744 6.36285C8.72897 6.62424 8.72424 6.85739 8.67326 7.06232C8.62228 7.26724 8.52106 7.44177 8.36961 7.58592L6.05054 9.86761C6.88417 11.2373 7.8118 12.4282 8.83342 13.4404C9.85503 14.4525 11.0088 15.3107 12.2948 16.0148L14.4993 13.7525C14.6813 13.5589 14.8853 13.424 15.1113 13.3479C15.3373 13.2719 15.5716 13.2623 15.814 13.319L18.426 13.9039C18.7137 13.968 18.9457 14.1064 19.1223 14.3189C19.2988 14.5315 19.387 14.7874 19.387 15.0866V18.2078C19.387 18.5382 19.2749 18.8156 19.0508 19.0398C18.8266 19.2639 18.5511 19.376 18.2243 19.376Z"
                    fill="#1C7597" />
                </svg>
                <span class="header__info-item-text">
                  Горячая линия:
                  <span <? if ($current_catalogue['Catalogue_ID'] == '1' || $current_catalogue['Catalogue_ID'] == '2') {
                          echo 'class="phone_alloka"';
                        } ?>><?= $current_catalogue['phone'] ?></span>
                </span>
              </a>
            </li>
          <? } ?>

          <li class="header__info-item">
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M8.12945 13.9035H4.951C4.63582 13.9035 4.40416 13.7648 4.25603 13.4875C4.10791 13.2101 4.12883 12.9404 4.3188 12.6784L12.2729 1.19914C12.4024 1.02012 12.5643 0.89914 12.7586 0.836211C12.9529 0.773267 13.1472 0.781815 13.3415 0.861855C13.5358 0.938244 13.6901 1.06686 13.8043 1.2477C13.9186 1.42855 13.9604 1.62376 13.9299 1.83334L13.0252 9.00774H16.9653C17.2958 9.00774 17.5304 9.15587 17.669 9.45212C17.8077 9.74839 17.7744 10.0257 17.5691 10.2841L8.85332 20.7506C8.72379 20.9144 8.55806 21.0201 8.35612 21.0678C8.15419 21.1154 7.96189 21.0974 7.77922 21.0137C7.60021 20.9336 7.45922 20.805 7.35627 20.6278C7.25331 20.4506 7.21711 20.2554 7.24766 20.0421L8.12945 13.9035Z"
                fill="#1C7597" />
            </svg>
            <span class="header__info-item-text">
              Выезд нарколога за 2 минуты
            </span>
          </li>
          <li class="header__info-item">
            <a class="header__mobile-search" href='/search-1/'>
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M19.2723 20.5208L13.2832 14.5377C12.7872 14.9587 12.2072 15.2872 11.5432 15.523C10.8792 15.7589 10.1695 15.8768 9.41417 15.8768C7.58359 15.8768 6.03401 15.2418 4.76542 13.9719C3.49684 12.702 2.86255 11.1697 2.86255 9.37516C2.86255 7.58059 3.49752 6.04834 4.76745 4.77841C6.03737 3.50849 7.57377 2.87354 9.37667 2.87354C11.1796 2.87354 12.7118 3.50849 13.9734 4.77841C15.235 6.04834 15.8658 7.58184 15.8658 9.37891C15.8658 10.101 15.7521 10.7925 15.5248 11.4532C15.2974 12.1138 14.9564 12.7339 14.5017 13.3132L20.5408 19.3023C20.7107 19.467 20.7957 19.6655 20.7957 19.8981C20.7957 20.1306 20.7031 20.3375 20.518 20.5186C20.3455 20.694 20.1354 20.7817 19.8877 20.7817C19.64 20.7817 19.4348 20.6947 19.2723 20.5208ZM9.3913 14.1735C10.7201 14.1735 11.8475 13.7048 12.7735 12.7674C13.6995 11.83 14.1625 10.6993 14.1625 9.37516C14.1625 8.05106 13.6993 6.92031 12.7727 5.98291C11.8461 5.04549 10.719 4.57679 9.3913 4.57679C8.04973 4.57679 6.91009 5.04549 5.97237 5.98291C5.03466 6.92031 4.5658 8.05106 4.5658 9.37516C4.5658 10.6993 5.03437 11.83 5.9715 12.7674C6.90862 13.7048 8.04855 14.1735 9.3913 14.1735Z"
                  fill="#1C7597" />
              </svg>
              <span class="header__info-item-text">
                Поиск по сайту
              </span>
            </a>
          </li>
          <? if (isset($partners[$current_catalogue['Catalogue_ID']])) {
            $partner = $partners[$current_catalogue['Catalogue_ID']];
          ?>
            <li class="header__info-item">
              <span class="header__info-item-text">Партнёры</span>
              <a class="header__info-city-btn modal-button-city" href="<?= $partner['url'] ?>" target="_blank">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M11.0002 10.8037C11.4504 10.8037 11.8358 10.6434 12.1563 10.3228C12.4768 10.0021 12.637 9.61672 12.637 9.16648C12.637 8.71624 12.4767 8.33087 12.1561 8.01036C11.8355 7.68986 11.45 7.52961 10.9998 7.52961C10.5496 7.52961 10.1642 7.68993 9.84367 8.01056C9.52317 8.33118 9.36292 8.71661 9.36292 9.16685C9.36292 9.61708 9.52324 10.0025 9.84388 10.323C10.1645 10.6435 10.5499 10.8037 11.0002 10.8037ZM11.0101 19.9629C10.8934 19.9629 10.781 19.9449 10.6729 19.9089C10.5648 19.8728 10.4671 19.8188 10.3797 19.7467C8.0997 17.7345 6.39531 15.8709 5.26657 14.1559C4.13785 12.4408 3.57349 10.8388 3.57349 9.35C3.57349 7.02993 4.31995 5.18161 5.81288 3.80503C7.30581 2.42846 9.03467 1.74017 10.9995 1.74017C12.9643 1.74017 14.6933 2.42846 16.1866 3.80503C17.6798 5.18161 18.4265 7.02993 18.4265 9.35C18.4265 10.8356 17.8621 12.4367 16.7334 14.1534C15.6046 15.8701 13.9003 17.7345 11.6202 19.7467C11.5329 19.8188 11.4385 19.8728 11.3371 19.9089C11.2357 19.9449 11.1267 19.9629 11.0101 19.9629Z"
                    fill="#1C7597" />
                </svg>
                <span class="header__info-item-text cololig">
                  <?= $partner['address'] ?>
                </span>
              </a>
            </li>
          <? } ?>
        </ul>
        <div class="header__connection">
          <?php
          if (
            isset($_GET['utm_source']) && $_GET['utm_source'] === 'yandex'
            && isset($_GET['utm_medium']) && $_GET['utm_medium'] === 'cpc'
          ) { ?>
            <a href="tel:+79038565989" class="header__connection-tel">+7 (903) 856-59-89</a>
          <? } else if (
            isset($_GET['utm_source']) && $_GET['utm_source'] == 'city' &&
            isset($_GET['utm_medium']) && $_GET['utm_medium'] == 'banner' &&
            isset($_GET['utm_campaign']) && $_GET['utm_campaign'] == 'naruzshka'
          ) { ?>
            <a href="tel:89068049813" class="header__connection-tel">+7 (906) 804-98-13</a>
          <? } else if (
            isset($_GET['utm_source']) && $_GET['utm_source'] == 'avto' &&
            isset($_GET['utm_medium']) && $_GET['utm_medium'] == 'banner' &&
            isset($_GET['utm_campaign']) && $_GET['utm_campaign'] == 'bus*'
          ) { ?>
            <a href="tel:89068049017" class="header__connection-tel">+7 (906) 804-90-17</a>
          <? } else { ?>
            <?php if (!empty($current_catalogue['phone'])): ?>
              <a href="tel:<?= $current_catalogue['clear_phone'] ?>" class="header__connection-tel">
                <?= $current_catalogue['phone'] ?></a>
            <?php endif; ?>
            <?php if (!empty($current_catalogue['additional_phone'])): ?>
              <a href="tel:<?= $current_catalogue['clear_additional_phone'] ?>" class="header__connection-tel"><?= $current_catalogue['additional_phone'] ?></a>
            <?php endif; ?>
            <? if (!in_array($current_catalogue['Catalogue_Name'], ['Краснодар', 'Ростов-на-Дону'])): ?>
              <a href="tel:+78003021770" class="header__connection-tel">+7 (800) 302-17-70</a>
            <? endif ?>
            <?php if (!empty($current_catalogue['telegram'])): ?>
              <a href="<?= $current_catalogue['telegram'] ?>" target="_blank" rel="nofollow" class="header__connection-link">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_87_39)">
                    <path
                      d="M12 24C18.629 24 24 18.629 24 12C24 5.371 18.629 0 12 0C5.371 0 0 5.371 0 12C0 18.629 5.371 24 12 24ZM5.491 11.74L17.061 7.279C17.598 7.085 18.067 7.41 17.893 8.222L17.894 8.221L15.924 17.502C15.778 18.16 15.387 18.32 14.84 18.01L11.84 15.799L10.393 17.193C10.233 17.353 10.098 17.488 9.788 17.488L10.001 14.435L15.561 9.412C15.803 9.199 15.507 9.079 15.188 9.291L8.317 13.617L5.355 12.693C4.712 12.489 4.698 12.05 5.491 11.74Z"
                      fill="#F04A25" />
                  </g>
                  <defs>
                    <clipPath>
                      <rect width="24" height="24" fill="white" />
                    </clipPath>
                  </defs>
                </svg>
                <span class="header__connection-link-text">
                  Написать наркологу
                </span>
              </a><br>
            <?php endif; ?>
          <? } ?>
          <?php if (!empty($current_catalogue['href_whatsapp'])): ?>
            <a href="<?= $current_catalogue['href_whatsapp'] ?>" target="_blank" rel="nofollow" class="header__connection-link">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.003 0H11.997C5.3805 0 0 5.382 0 12C0 14.625 0.846 17.058 2.2845 19.0335L0.789 23.4915L5.4015 22.017C7.299 23.274 9.5625 24 12.003 24C18.6195 24 24 18.6165 24 12C24 5.3835 18.6195 0 12.003 0Z" fill="#F04A25" />
                <path d="M18.9858 16.9453C18.6963 17.7628 17.5473 18.4408 16.6308 18.6388C16.0038 18.7723 15.1848 18.8788 12.4278 17.7358C8.90132 16.2748 6.63032 12.6913 6.45332 12.4588C6.28382 12.2263 5.02832 10.5613 5.02832 8.83928C5.02832 7.11728 5.90282 6.27878 6.25532 5.91878C6.54482 5.62328 7.02332 5.48828 7.48232 5.48828C7.63082 5.48828 7.76432 5.49578 7.88432 5.50178C8.23682 5.51678 8.41382 5.53778 8.64632 6.09428C8.93582 6.79178 9.64082 8.51378 9.72482 8.69078C9.81032 8.86778 9.89582 9.10778 9.77582 9.34028C9.66332 9.58028 9.56432 9.68678 9.38732 9.89078C9.21032 10.0948 9.04232 10.2508 8.86532 10.4698C8.70332 10.6603 8.52032 10.8643 8.72432 11.2168C8.92832 11.5618 9.63332 12.7123 10.6713 13.6363C12.0108 14.8288 13.0968 15.2098 13.4853 15.3718C13.7748 15.4918 14.1198 15.4633 14.3313 15.2383C14.5998 14.9488 14.9313 14.4688 15.2688 13.9963C15.5088 13.6573 15.8118 13.6153 16.1298 13.7353C16.4538 13.8478 18.1683 14.6953 18.5208 14.8708C18.8733 15.0478 19.1058 15.1318 19.1913 15.2803C19.2753 15.4288 19.2753 16.1263 18.9858 16.9453Z" fill="#FAFAFA" />
              </svg>
              <span class="header__connection-link-text">
                WhatsApp
              </span>
            </a>
          <?php endif; ?>

        </div>
        <ul class="header__socials">
          <?php if (!empty($current_catalogue['vk'])): ?>
            <li class="header__socials-item">
              <a href="<?= $current_catalogue['vk'] ?>" target="_blank" rel="nofollow" class="header__socials-link" aria-label="vk">
                <picture class="vk-logo">
                  <source style="width: 24px; height: 24px"
                    srcset="/netcat_template/template/custom/assets/img/vk-black.svg"
                    type="image/svg+xml">
                  <img style="width: 24px; height: 24px"
                    src="/netcat_template/template/custom/assets/img/vk-black.png" alt="">
                </picture>
              </a>
            </li>
          <?php endif; ?>
          <?php if (!empty($current_catalogue['dzen'])): ?>
            <li class="header__socials-item">
              <a href="<?= $current_catalogue['dzen'] ?>" target="_blank" rel="nofollow" class="header__socials-link" aria-label="dzen">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M2 11C2 6.02948 6.02945 2 10.9999 2C15.9705 2 20 6.02948 20 11C20 15.9706 15.9705 20 10.9999 20C6.02945 20 2 15.9706 2 11Z"
                    fill="#071D26" />
                  <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M10.7302 2C10.6848 5.64853 10.4357 7.69909 9.06743 9.06752C7.69913 10.436 5.64847 10.685 2 10.7303V11.2697C5.64847 11.315 7.69913 11.5642 9.06743 12.9325C10.4357 14.3009 10.6848 16.3516 10.7302 20H11.2698C11.3149 16.3516 11.5642 14.3009 12.9325 12.9325C14.3008 11.564 16.3515 11.315 20 11.2697V10.7303C16.3515 10.685 14.3008 10.436 12.9325 9.06752C11.5638 7.69909 11.3149 5.64853 11.2698 2H10.7302Z"
                    fill="#F3F4F4" />
                </svg>
              </a>
            </li>
          <?php endif; ?>
          <?php if (!empty($current_catalogue['youtube'])): ?>
            <li class="header__socials-item">
              <a href="<?= $current_catalogue['youtube'] ?>" target="_blank" rel="nofollow" class="header__socials-link" aria-label="youtube">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_1135_3113)">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M11 3C11.855 3 12.732 3.022 13.582 3.058L14.586 3.106L15.547 3.163L16.447 3.224L17.269 3.288C18.161 3.35628 19.0004 3.73695 19.6395 4.36304C20.2786 4.98913 20.6764 5.82054 20.763 6.711L20.803 7.136L20.878 8.046C20.948 8.989 21 10.017 21 11C21 11.983 20.948 13.011 20.878 13.954L20.803 14.864C20.79 15.01 20.777 15.151 20.763 15.289C20.6764 16.1796 20.2784 17.0112 19.6391 17.6373C18.9999 18.2634 18.1602 18.6439 17.268 18.712L16.448 18.775L15.548 18.837L14.586 18.894L13.582 18.942C12.7218 18.9794 11.861 18.9987 11 19C10.139 18.9987 9.27817 18.9794 8.418 18.942L7.414 18.894L6.453 18.837L5.553 18.775L4.731 18.712C3.83895 18.6437 2.99955 18.2631 2.36047 17.637C1.72139 17.0109 1.32357 16.1795 1.237 15.289L1.197 14.864L1.122 13.954C1.04554 12.9711 1.00484 11.9858 1 11C1 10.017 1.052 8.989 1.122 8.046L1.197 7.136C1.21 6.99 1.223 6.849 1.237 6.711C1.32354 5.8207 1.72122 4.98942 2.36009 4.36334C2.99897 3.73727 3.83813 3.3565 4.73 3.288L5.551 3.224L6.451 3.163L7.413 3.106L8.417 3.058C9.2775 3.02063 10.1387 3.0013 11 3ZM9 8.575V13.425C9 13.887 9.5 14.175 9.9 13.945L14.1 11.52C14.1914 11.4674 14.2673 11.3916 14.3201 11.3003C14.3729 11.209 14.4007 11.1055 14.4007 11C14.4007 10.8945 14.3729 10.791 14.3201 10.6997C14.2673 10.6084 14.1914 10.5326 14.1 10.48L9.9 8.056C9.80876 8.00332 9.70526 7.9756 9.5999 7.97562C9.49455 7.97563 9.39106 8.00339 9.29983 8.0561C9.20861 8.1088 9.13287 8.1846 9.08024 8.27587C9.02761 8.36713 8.99993 8.47065 9 8.576"
                      fill="#071D26" />
                  </g>
                  <defs>
                    <clipPath>
                      <rect width="22" height="22" fill="white" />
                    </clipPath>
                  </defs>
                </svg>
              </a>
            </li>
          <?php endif; ?>

          <? /* <li class="header__socials-item">
                        <a href="https://max.ru/u/f9LHodD0cOK1HK0UMo8RDi3T5lQI6_rMbWU0rcGnZ-GfIQwqu797rJh_gDY" target="_blank"
                            rel="nofollow" aria-label="max">
                            <img src="/assets/img/max-mini.svg" alt="mag logo" height="22" width="22">

                        </a>
                    </li> */ ?>


        </ul>
        <button class="header__btn btn modal-button" data-additional="Кнопка обратный звонок в шапке">
          Обратный звонок
        </button>
      </div>
      <p class="mobile-menu__consultation">
        Медицинская лицензия <?= $current_catalogue['license'] ?>
      </p>
    </div>
  </header>