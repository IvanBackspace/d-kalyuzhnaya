<!DOCTYPE html>

<?

$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$url_parts = explode('?', $url);
$url = $url_parts[0];

if (strpos($url, 'catalog-pansionatov') !== false) {
  if (preg_match('/pansionat_(\d+)\.html$/', $url, $matches)) {

    $message_id = (int)$matches[1];
    $nc_core->db->query("SELECT Keyword FROM Message24 WHERE Message_ID = $message_id");
    $keyword = $nc_core->db->get_results(null);

    if (!empty($keyword[0]->Keyword)) {
      $new_url = preg_replace('/pansionat_\d+\.html$/', '', $url);
      $redirect_url = $new_url . $keyword[0]->Keyword . '/';
      header("Location: $redirect_url", true, 301);
      exit;
    }
  }
}

$phone = $current_catalogue["phone"];
$phone2 = $current_catalogue["phone2"];
$phone_clear = preg_replace("/[^0-9]/", "", $phone);
$phone_clear2 = preg_replace("/[^0-9+]/", "", $phone2);
$title = $current_sub['Title'];
$desc = $current_sub['Description'];

if ($nc_core->page->get_title()) {
  $title = $nc_core->page->get_title();
} else {
  $title = $current_sub['Title'];
}

if ($nc_core->page->get_description()) {
  $desc = $nc_core->page->get_description();
} else {
  $desc = $current_sub['Description'];
}

?>

<html lang="ru">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicon-16x16.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon-32x32.png">
  <link rel="icon" type="image/png" href="/assets/img/favicon.ico" />
  <link rel="preload" fetchpriority="high" as="image" href="/assets/img/intro/intro-4.webp" type="image/webp">
  <link rel="preload" href="/assets/css/build/fancybox.min.css" media="print" as="style" onload="this.media='all'">
  <link rel="preload" href="/assets/css/build/swiper.css" media="print" as="style" onload="this.media='all'">
  <link rel="preload" as="style" href="/assets/css/build/swiper.css" media="print" onload="this.media='all'">
  <link rel="preload" as="style" href="/assets/css/build/fancybox.min.css" media="print" onload="this.media='all'">
  <link rel="preload" href="/assets/css/fonts.css" as="style" media="print" onload="this.media='all'">
  <link rel="stylesheet" href="/assets/css/fonts.css" media="print" onload="this.media='all'">
  <link rel="preload" href="/assets/css/styles.css?v=1.1" as="style">
  <link rel="stylesheet" href="/assets/css/styles.css?v=1.4">
  <link rel="preload" as="image" href="/netcat_template/stati/pansionat-ili-sidelka-banner.webp" type="image/webp">
  <?

  if (http_response_code() !== 404) {
    $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    if (!stripos($url, "catalog-pansionatov")) {
      $url = explode('?', $url);
      $url = $url[0];
    }
  ?>

    <link rel="canonical" href="<?= $url ?>" />
    <meta name='description' content='<?= $desc ?>' />
  <? } ?>

  <title><?= $title ?></title>
  <meta name='keywords' content='<?= $nc_core->page->get_keywords() ?>' />
  <meta name="viewport" content="initial-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?= $current_catalogue['head_code'] ?>

</head>

<body>
  <noscript>
    <div><img src="https://mc.yandex.ru/watch/104195988" style="position:absolute; left:-9999px;" alt="" /></div>
  </noscript>
  <?
  $sql = "SELECT reviews FROM Message18 WHERE Subdivision_ID=12";
  $reviews = $nc_core->db->get_var($sql);

  $rev_un = explode('</tr>', $reviews);
  $arr_un = [];
  for ($i = 0; $i <= count($rev_un) - 2; $i++) {
    $pos = explode('</td>', $rev_un[$i]);
    $arr_un[] = [
      'img' => trim(strip_tags($pos[0])),
      'star' => trim(strip_tags($pos[1])),
      'name' => trim(strip_tags($pos[2])),
      'text' => trim(strip_tags($pos[3])),
      'date' => trim(strip_tags($pos[4]))
    ];
  };
  ?>

  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "MedicalOrganization",
      "name": "Сеть домов престарелых «Рядом»",
      "alternateName": "Set domov prestarelykh «Ryadom»",
      "url": "https://<?= $_SERVER['HTTP_HOST'] ?>",
      "telephone": [
        "<?= $current_catalogue['phone'] ?>",
        "<?= $current_catalogue['phone2'] ?>"
      ],
      "email": "mailto:info@chastnyy-dom-prestarelyh.ru",
      "logo": {
        "@type": "ImageObject",
        "@id": "https://<?= $_SERVER['HTTP_HOST'] ?>/assets/img/logo.png",
        "url": "https://<?= $_SERVER['HTTP_HOST'] ?>/assets/img/logo.png"
      },
      "image": "https://<?= $_SERVER['HTTP_HOST'] ?>/assets/img/logo.png",
      "contactPoint": {
        "@type": "ContactPoint",
        "telephone": [
          "<?= $current_catalogue['phone'] ?>",
          "<?= $current_catalogue['phone2'] ?>"
        ],
        "contactType": "medical clinic",
        "areaServed": "RU",
        "availableLanguage": ["Russian", "RU"]
      },
      "aggregateRating": {
        "@type": "AggregateRating",
        "bestRating": "5",
        "worstRating": "1",
        "ratingCount": "<?= count($rev_un) ?>",
        "ratingValue": "4.6"
      },
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "<?= $current_catalogue['address'] ?>",
        "addressLocality": "<?= $current_catalogue['Catalogue_Name'] ?>",
        "addressRegion": "<?= $current_catalogue['region'] ?>",
        "addressCountry": "RU",
        "postalCode": "<?= $current_catalogue['index_post'] ?>"
      },
      "sameAs": [
        "<?= $current_catalogue['tg'] ?>",
        "<? //= $current_catalogue['wp'] 
          ?>"
      ]
    }
  </script>

  <?
  $sql = "SELECT Title, Description FROM Subdivision WHERE Subdivision_Name='Титульная страница' AND Catalogue_ID=" . $current_catalogue['Catalogue_ID'];
  $metaTags = $nc_core->db->get_row($sql);
  ?>

  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebSite",
      "url": "https://<?= $_SERVER['HTTP_HOST'] ?>",
      "name": "Сеть домов престарелых «Рядом»",
      "description": "<?= $metaTags->Description ?>",
      "potentialAction": {
        "@type": "SearchAction",
        "target": {
          "@type": "EntryPoint",
          "urlTemplate": "https://<?= $_SERVER['HTTP_HOST'] ?>/poisk?q={search_term_string}"
        },
        "query-input": "required name=search_term_string"
      }
    }
  </script>


  <div class="page">
    <header class="header" id="header">

      <div class="container">

        <div class="header__top header__menu">

          <?php
          $cc_id = $current_catalogue["Catalogue_ID"];
          $menu_where = "Catalogue_ID = " . $cc_id;
          $service_menu_sub = ($cc_id == 4) ? 115 : 32;
          ?>
          <?= nc_browse_sub(0, $template_menu, 0, $menu_where); ?>

          <div class="wrapper__phone">
            <a href="tel:<?= $phone_clear ?>" class="header__phone">
              <div class="header__phone-icon">
                <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M14.493 10.5718C14.369 11.5186 13.9054 12.388 13.1885 13.0186C12.4715 13.6491 11.55 13.9979 10.5952 14C5.02881 14 0.5 9.47119 0.5 3.90482C0.502105 2.95003 0.850859 2.02848 1.48142 1.31152C2.11198 0.594565 2.98145 0.130981 3.92815 0.00696131C4.16949 -0.0197973 4.41307 0.0310137 4.62358 0.152026C4.83409 0.273038 5.00059 0.457959 5.09891 0.679973L6.50803 3.96792C6.58113 4.13858 6.61043 4.3248 6.59329 4.50967C6.57615 4.69453 6.51311 4.87219 6.40988 5.02651L5.24614 6.80719C5.77311 7.87664 6.64141 8.74001 7.71384 9.26087L9.47349 8.09011C9.62765 7.9862 9.80575 7.9233 9.99097 7.90735C10.1762 7.89141 10.3624 7.92294 10.5321 7.99898L13.82 9.40108C14.042 9.49941 14.227 9.6659 14.348 9.87642C14.469 10.0869 14.5198 10.3305 14.493 10.5718ZM9.47349 5.58735C9.62214 5.58533 9.76467 5.52782 9.87309 5.42611L12.2777 3.01448V4.46566C12.2777 4.61441 12.3368 4.75706 12.442 4.86224C12.5472 4.96742 12.6898 5.02651 12.8385 5.02651C12.9873 5.02651 13.1299 4.96742 13.2351 4.86224C13.3403 4.75706 13.3994 4.61441 13.3994 4.46566V1.66145C13.3994 1.5127 13.3403 1.37005 13.2351 1.26487C13.1299 1.15969 12.9873 1.10061 12.8385 1.10061H10.0343C9.88559 1.10061 9.74294 1.15969 9.63776 1.26487C9.53258 1.37005 9.47349 1.5127 9.47349 1.66145C9.47349 1.81019 9.53258 1.95285 9.63776 2.05802C9.74294 2.1632 9.88559 2.22229 10.0343 2.22229H11.4855L9.07389 4.62691C8.96857 4.73324 8.90949 4.87685 8.90949 5.02651C8.90949 5.17617 8.96857 5.31978 9.07389 5.42611C9.18231 5.52782 9.32484 5.58533 9.47349 5.58735Z" fill="#50AEA3" />
                </svg>
              </div>
              <?= $phone ?>
            </a>

            <a href="tel:<?= $phone_clear2 ?>" class="header__phone">
              <div class="header__phone-icon">
                <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M14.493 10.5718C14.369 11.5186 13.9054 12.388 13.1885 13.0186C12.4715 13.6491 11.55 13.9979 10.5952 14C5.02881 14 0.5 9.47119 0.5 3.90482C0.502105 2.95003 0.850859 2.02848 1.48142 1.31152C2.11198 0.594565 2.98145 0.130981 3.92815 0.00696131C4.16949 -0.0197973 4.41307 0.0310137 4.62358 0.152026C4.83409 0.273038 5.00059 0.457959 5.09891 0.679973L6.50803 3.96792C6.58113 4.13858 6.61043 4.3248 6.59329 4.50967C6.57615 4.69453 6.51311 4.87219 6.40988 5.02651L5.24614 6.80719C5.77311 7.87664 6.64141 8.74001 7.71384 9.26087L9.47349 8.09011C9.62765 7.9862 9.80575 7.9233 9.99097 7.90735C10.1762 7.89141 10.3624 7.92294 10.5321 7.99898L13.82 9.40108C14.042 9.49941 14.227 9.6659 14.348 9.87642C14.469 10.0869 14.5198 10.3305 14.493 10.5718ZM9.47349 5.58735C9.62214 5.58533 9.76467 5.52782 9.87309 5.42611L12.2777 3.01448V4.46566C12.2777 4.61441 12.3368 4.75706 12.442 4.86224C12.5472 4.96742 12.6898 5.02651 12.8385 5.02651C12.9873 5.02651 13.1299 4.96742 13.2351 4.86224C13.3403 4.75706 13.3994 4.61441 13.3994 4.46566V1.66145C13.3994 1.5127 13.3403 1.37005 13.2351 1.26487C13.1299 1.15969 12.9873 1.10061 12.8385 1.10061H10.0343C9.88559 1.10061 9.74294 1.15969 9.63776 1.26487C9.53258 1.37005 9.47349 1.5127 9.47349 1.66145C9.47349 1.81019 9.53258 1.95285 9.63776 2.05802C9.74294 2.1632 9.88559 2.22229 10.0343 2.22229H11.4855L9.07389 4.62691C8.96857 4.73324 8.90949 4.87685 8.90949 5.02651C8.90949 5.17617 8.96857 5.31978 9.07389 5.42611C9.18231 5.52782 9.32484 5.58533 9.47349 5.58735Z" fill="#50AEA3" />
                </svg>
              </div>
              <?= $phone2 ?>
            </a>
          </div>


          <p class="header__top-text">Работаем круглосуточно, без выходных</p>

          <div class="header__menu-mobile">
            <div class="header__info">
              <div class="header__item">
                <p>Написать нам на почту:</p>
                <a href="mailto:<?= $current_catalogue["mail"] ?>" class="micro-general-email"><?= $current_catalogue["mail"] ?></a>
              </div>
              <div class="header__item">
                <p>Мы в социальных сетях:</p>
                <div class="header__networks">
                  <a href="<?= $current_catalogue["tg"] ?>" class="header__network micro-general-social" target="_blank" rel="nofollow" aria-label="Ссылка на телеграм">
                    <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M17.2 1.34199L14.4951 15.463C14.4951 15.463 14.1166 16.4421 13.077 15.9725L6.83609 11.0173L6.80715 11.0027C7.65016 10.2188 14.1871 4.13238 14.4728 3.8565C14.9151 3.42921 14.6405 3.17484 14.127 3.49761L4.47109 9.84766L0.74585 8.54968C0.74585 8.54968 0.159607 8.33373 0.103209 7.86418C0.046069 7.39387 0.765144 7.13949 0.765144 7.13949L15.9518 0.970041C15.9518 0.970041 17.2 0.402125 17.2 1.34199V1.34199Z" fill="#FEFEFE" />
                    </svg>
                  </a>
                  <a href="https://wa.me/<?= $current_catalogue["wp"] ?>" class="header__network micro-general-social" target="_blank" rel="nofollow" aria-label="Ссылка на вотсап">
                    <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M16.1341 2.85622C14.3561 1.08435 11.9854 0.0999756 9.48292 0.0999756C4.28049 0.0999756 0.0658527 4.29998 0.0658527 9.48435C0.0658527 11.125 0.526829 12.7656 1.31707 14.1437L0 19L5.00488 17.6875C6.38781 18.4094 7.90244 18.8031 9.48292 18.8031C14.6854 18.8031 18.9 14.6031 18.9 9.41873C18.8341 6.9906 17.9122 4.6281 16.1341 2.85622ZM14.0268 12.8312C13.8293 13.3562 12.9073 13.8812 12.4463 13.9468C12.0512 14.0125 11.5244 14.0125 10.9976 13.8812C10.6683 13.75 10.2073 13.6187 9.68049 13.3562C7.30976 12.3719 5.79512 10.0094 5.66342 9.81248C5.53171 9.68123 4.67561 8.5656 4.67561 7.38435C4.67561 6.2031 5.26829 5.6781 5.46585 5.4156C5.66341 5.1531 5.92683 5.1531 6.12439 5.1531C6.2561 5.1531 6.45366 5.1531 6.58536 5.1531C6.71707 5.1531 6.91463 5.08748 7.11219 5.54685C7.30976 6.00623 7.77073 7.18748 7.83658 7.2531C7.90244 7.38435 7.90244 7.5156 7.83658 7.64685C7.77073 7.7781 7.70488 7.90935 7.57317 8.0406C7.44146 8.17185 7.30975 8.36872 7.2439 8.43435C7.11219 8.5656 6.98049 8.69685 7.11219 8.89372C7.2439 9.15622 7.70488 9.8781 8.42927 10.5343C9.35122 11.3218 10.0756 11.5844 10.339 11.7156C10.6024 11.8469 10.7341 11.7812 10.8659 11.65C10.9976 11.5187 11.4585 10.9937 11.5902 10.7312C11.722 10.4687 11.9195 10.5344 12.1171 10.6C12.3146 10.6656 13.5 11.2562 13.6976 11.3875C13.961 11.5187 14.0927 11.5843 14.1585 11.65C14.2244 11.8468 14.2244 12.3062 14.0268 12.8312Z" fill="white" />
                    </svg>
                  </a>


                  <a href="<?= $current_catalogue["vk"] ?>" target="_blank" rel="nofollow" class="flex-icons">
                    <img src="/assets/img/vk.svg" alt="vk logo" style="height: 36px; width: 36px;" decoding="async">
                  </a>


                  <a href="<?= $current_catalogue["ok"] ?>" target="_blank" rel="nofollow" class="flex-icons">
                    <img src="/assets/img/ok.svg" alt="ok logo" style="height: 36px; width: 36px;" decoding="async">
                  </a>
                </div>
              </div>
            </div>
            <div class="header__btns">
              <button class="btn-green btn-small popup-btn" data-path="popup-quiz">Подобрать пансионат</button>
              <button class="btn-orange btn-small popup-btn" data-path="popup-change">Заказать звонок</button>
            </div>
          </div>
        </div>

        <div class="header__midle">
          <div class="header__midle-left">
            <a href="/" class="header__logo logo">
              <picture class="logo__picture">
                <source srcset="/assets/img/logo-small.svg" media="(max-width: 1024px)">
                <source srcset="/assets/img/logo.svg" type="image/svg+xml">
                <img src="/assets/img/logo.png" alt="Logo" class="micro-general-logo" decoding="async">
              </picture>
            </a>
            <p class="header__midle-text">100+ домов престарелых <?= $current_catalogue['Catalogue_ID'] == 4 ? 'в Ростове-на-Дону и области' : 'в Москве и Московской области' ?></p>
          </div>
          <div class="header__btns">
            <a href="https://wa.me/<?= $current_catalogue["wp"] ?>" class="header__btns-item" aria-label="Ссылка на Вотсап">
              <svg class="vidjet__icon wa btn__image" width="29" height="29" viewBox="0 0 29 29" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M5.91211 2.69971C8.66939 0.708547 12.048 -0.231808 15.4375 0.0483398C18.8269 0.328538 22.0046 1.81125 24.3975 4.22803C26.7704 6.62905 28.2151 9.79384 28.4736 13.1597C28.7321 16.5257 27.7873 19.8746 25.8086 22.6099C23.8299 25.3451 20.9448 27.2894 17.667 28.0972C14.3892 28.9049 10.9313 28.5236 7.9082 27.021L0.708008 28.728C0.598877 28.7542 0.483518 28.7462 0.378906 28.7056C0.274472 28.6649 0.184845 28.5933 0.12207 28.5005C0.0792019 28.4393 0.0490118 28.3696 0.0341797 28.2964C0.0194005 28.2232 0.020459 28.1477 0.0361328 28.0747L1.54883 20.728C0.00720489 17.6964 -0.39967 14.2134 0.400391 10.9077C1.20045 7.60212 3.15487 4.69086 5.91211 2.69971ZM9.79004 7.40576C9.63383 7.36995 9.47107 7.37051 9.31543 7.40869C9.15983 7.44688 9.01542 7.52148 8.89355 7.62549C8.12254 8.27367 7.20743 9.26704 7.09766 10.3647C6.89913 12.2988 7.72015 14.7377 10.8799 17.6675L10.9248 17.7065C14.5184 21.0569 17.4063 21.4963 19.2881 21.0415C20.3623 20.7828 21.2168 19.7393 21.7578 18.8872C21.8408 18.7513 21.8924 18.5985 21.9072 18.4399C21.922 18.2814 21.9001 18.1211 21.8438 17.9722C21.7873 17.8232 21.6973 17.6886 21.5811 17.5796C21.4649 17.4707 21.3251 17.39 21.1729 17.3433L18.4102 16.5591C18.2324 16.5087 18.0442 16.5064 17.8652 16.5522C17.6863 16.5981 17.5222 16.6902 17.3906 16.8198L16.708 17.5073C16.5694 17.6506 16.3914 17.7495 16.1963 17.7905C16.0011 17.8315 15.7979 17.8132 15.6133 17.7378C14.9233 17.4608 13.8333 16.6479 12.8506 15.7593C11.9751 14.9726 11.1858 14.123 10.8564 13.5454C10.7573 13.3696 10.7132 13.1675 10.7295 12.9663C10.7459 12.7653 10.8222 12.574 10.9482 12.4165L11.5361 11.6528C11.6503 11.5067 11.7226 11.332 11.7451 11.1479C11.7676 10.9639 11.7395 10.7773 11.6641 10.6079L10.501 7.99365C10.4366 7.847 10.3382 7.71784 10.2148 7.61572C10.0914 7.51362 9.94615 7.44158 9.79004 7.40576Z"
                  fill="#25D366"></path>
              </svg>
            </a>
            <button class="btn-green btn-small popup-btn" data-path="popup-quiz">Подобрать пансионат</button>
            <button class="btn-orange btn-small popup-btn" data-path="popup-change">Заказать звонок</button>
          </div>

          <div class="header__mobile">

            <div class="wrapper__phone header__phone">
              <a href="tel:<?= $phone_clear ?>" class="header__phone micro-general-phone">
                <div class="header__phone-icon">
                  <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.493 10.5718C14.369 11.5186 13.9054 12.388 13.1885 13.0186C12.4715 13.6491 11.55 13.9979 10.5952 14C5.02881 14 0.5 9.47119 0.5 3.90482C0.502105 2.95003 0.850859 2.02848 1.48142 1.31152C2.11198 0.594565 2.98145 0.130981 3.92815 0.00696131C4.16949 -0.0197973 4.41307 0.0310137 4.62358 0.152026C4.83409 0.273038 5.00059 0.457959 5.09891 0.679973L6.50803 3.96792C6.58113 4.13858 6.61043 4.3248 6.59329 4.50967C6.57615 4.69453 6.51311 4.87219 6.40988 5.02651L5.24614 6.80719C5.77311 7.87664 6.64141 8.74001 7.71384 9.26087L9.47349 8.09011C9.62765 7.9862 9.80575 7.9233 9.99097 7.90735C10.1762 7.89141 10.3624 7.92294 10.5321 7.99898L13.82 9.40108C14.042 9.49941 14.227 9.6659 14.348 9.87642C14.469 10.0869 14.5198 10.3305 14.493 10.5718ZM9.47349 5.58735C9.62214 5.58533 9.76467 5.52782 9.87309 5.42611L12.2777 3.01448V4.46566C12.2777 4.61441 12.3368 4.75706 12.442 4.86224C12.5472 4.96742 12.6898 5.02651 12.8385 5.02651C12.9873 5.02651 13.1299 4.96742 13.2351 4.86224C13.3403 4.75706 13.3994 4.61441 13.3994 4.46566V1.66145C13.3994 1.5127 13.3403 1.37005 13.2351 1.26487C13.1299 1.15969 12.9873 1.10061 12.8385 1.10061H10.0343C9.88559 1.10061 9.74294 1.15969 9.63776 1.26487C9.53258 1.37005 9.47349 1.5127 9.47349 1.66145C9.47349 1.81019 9.53258 1.95285 9.63776 2.05802C9.74294 2.1632 9.88559 2.22229 10.0343 2.22229H11.4855L9.07389 4.62691C8.96857 4.73324 8.90949 4.87685 8.90949 5.02651C8.90949 5.17617 8.96857 5.31978 9.07389 5.42611C9.18231 5.52782 9.32484 5.58533 9.47349 5.58735Z" fill="#50AEA3" />
                  </svg>
                </div>
                <?= $phone ?>
              </a>
              <a href="tel:<?= $phone_clear2 ?>" class="header__phone micro-general-phone">
                <div class="header__phone-icon">
                  <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.493 10.5718C14.369 11.5186 13.9054 12.388 13.1885 13.0186C12.4715 13.6491 11.55 13.9979 10.5952 14C5.02881 14 0.5 9.47119 0.5 3.90482C0.502105 2.95003 0.850859 2.02848 1.48142 1.31152C2.11198 0.594565 2.98145 0.130981 3.92815 0.00696131C4.16949 -0.0197973 4.41307 0.0310137 4.62358 0.152026C4.83409 0.273038 5.00059 0.457959 5.09891 0.679973L6.50803 3.96792C6.58113 4.13858 6.61043 4.3248 6.59329 4.50967C6.57615 4.69453 6.51311 4.87219 6.40988 5.02651L5.24614 6.80719C5.77311 7.87664 6.64141 8.74001 7.71384 9.26087L9.47349 8.09011C9.62765 7.9862 9.80575 7.9233 9.99097 7.90735C10.1762 7.89141 10.3624 7.92294 10.5321 7.99898L13.82 9.40108C14.042 9.49941 14.227 9.6659 14.348 9.87642C14.469 10.0869 14.5198 10.3305 14.493 10.5718ZM9.47349 5.58735C9.62214 5.58533 9.76467 5.52782 9.87309 5.42611L12.2777 3.01448V4.46566C12.2777 4.61441 12.3368 4.75706 12.442 4.86224C12.5472 4.96742 12.6898 5.02651 12.8385 5.02651C12.9873 5.02651 13.1299 4.96742 13.2351 4.86224C13.3403 4.75706 13.3994 4.61441 13.3994 4.46566V1.66145C13.3994 1.5127 13.3403 1.37005 13.2351 1.26487C13.1299 1.15969 12.9873 1.10061 12.8385 1.10061H10.0343C9.88559 1.10061 9.74294 1.15969 9.63776 1.26487C9.53258 1.37005 9.47349 1.5127 9.47349 1.66145C9.47349 1.81019 9.53258 1.95285 9.63776 2.05802C9.74294 2.1632 9.88559 2.22229 10.0343 2.22229H11.4855L9.07389 4.62691C8.96857 4.73324 8.90949 4.87685 8.90949 5.02651C8.90949 5.17617 8.96857 5.31978 9.07389 5.42611C9.18231 5.52782 9.32484 5.58533 9.47349 5.58735Z" fill="#50AEA3" />
                  </svg>
                </div>
                <?= $phone2 ?>
              </a>
            </div>

            <a href="https://wa.me/<?= $current_catalogue["wp"] ?>" class="header__btns-item" aria-label="Ссылка на Вотсап">
              <svg class="vidjet__icon wa btn__image" width="29" height="29" viewBox="0 0 29 29" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M5.91211 2.69971C8.66939 0.708547 12.048 -0.231808 15.4375 0.0483398C18.8269 0.328538 22.0046 1.81125 24.3975 4.22803C26.7704 6.62905 28.2151 9.79384 28.4736 13.1597C28.7321 16.5257 27.7873 19.8746 25.8086 22.6099C23.8299 25.3451 20.9448 27.2894 17.667 28.0972C14.3892 28.9049 10.9313 28.5236 7.9082 27.021L0.708008 28.728C0.598877 28.7542 0.483518 28.7462 0.378906 28.7056C0.274472 28.6649 0.184845 28.5933 0.12207 28.5005C0.0792019 28.4393 0.0490118 28.3696 0.0341797 28.2964C0.0194005 28.2232 0.020459 28.1477 0.0361328 28.0747L1.54883 20.728C0.00720489 17.6964 -0.39967 14.2134 0.400391 10.9077C1.20045 7.60212 3.15487 4.69086 5.91211 2.69971ZM9.79004 7.40576C9.63383 7.36995 9.47107 7.37051 9.31543 7.40869C9.15983 7.44688 9.01542 7.52148 8.89355 7.62549C8.12254 8.27367 7.20743 9.26704 7.09766 10.3647C6.89913 12.2988 7.72015 14.7377 10.8799 17.6675L10.9248 17.7065C14.5184 21.0569 17.4063 21.4963 19.2881 21.0415C20.3623 20.7828 21.2168 19.7393 21.7578 18.8872C21.8408 18.7513 21.8924 18.5985 21.9072 18.4399C21.922 18.2814 21.9001 18.1211 21.8438 17.9722C21.7873 17.8232 21.6973 17.6886 21.5811 17.5796C21.4649 17.4707 21.3251 17.39 21.1729 17.3433L18.4102 16.5591C18.2324 16.5087 18.0442 16.5064 17.8652 16.5522C17.6863 16.5981 17.5222 16.6902 17.3906 16.8198L16.708 17.5073C16.5694 17.6506 16.3914 17.7495 16.1963 17.7905C16.0011 17.8315 15.7979 17.8132 15.6133 17.7378C14.9233 17.4608 13.8333 16.6479 12.8506 15.7593C11.9751 14.9726 11.1858 14.123 10.8564 13.5454C10.7573 13.3696 10.7132 13.1675 10.7295 12.9663C10.7459 12.7653 10.8222 12.574 10.9482 12.4165L11.5361 11.6528C11.6503 11.5067 11.7226 11.332 11.7451 11.1479C11.7676 10.9639 11.7395 10.7773 11.6641 10.6079L10.501 7.99365C10.4366 7.847 10.3382 7.71784 10.2148 7.61572C10.0914 7.51362 9.94615 7.44158 9.79004 7.40576Z"
                  fill="#25D366"></path>
              </svg>
            </a>

            <div class="burger__menu">
              <svg class="ham hamRotate ham4" viewBox="0 0 100 100" width="80" onclick="this.classList.toggle('active')">
                <path
                  class="line top"
                  d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
                <path
                  class="line middle"
                  d="m 70,50 h -40" />
                <path
                  class="line bottom"
                  d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
              </svg>
            </div>
          </div>
        </div>

        <div class="header__bottom">
          <?= nc_browse_sub($service_menu_sub, $service_menu, 0, $menu_where)  ?>
        </div>

      </div>
    </header>
    <main class="main">