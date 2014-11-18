<!DOCTYPE html>
<html lang="ru-RU">
<head>
  <meta charset="utf-8">

  <!-- Тег для корректной работы в IE -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- Правила масштабирования -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Заголовок берем из PHP переменной -->
  <title><?php echo $data['title'];?></title>

  <!-- SEO теги -->
  <meta name="description" content="seo here">
  <meta name="keywords" content="seo here"/>
  <meta name="author" content="Kovalchuk Dmitriy"/>

  <!-- favicon -->
  <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
  <link rel="icon" type="image/png" href="/favicon-192x192.png" sizes="192x192">
  <link rel="icon" type="image/png" href="/favicon-160x160.png" sizes="160x160">
  <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
  <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
  <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/mstile-144x144.png">
  <!-- // favicon -->

  <!-- normalize -->
  <link rel="stylesheet" href="/app/bower_components/normalize.css/normalize.css" />

  <!-- Шрифты -->
  <link rel="stylesheet" href="/app/fonts/fira.css">
  <link rel="stylesheet" href="/app/fonts/proximanovacond-semibold.css">

  <!-- Основные таблицы -->
  <link rel="stylesheet" href="/app/styles/main.css">
  <link rel="stylesheet" href="/app/styles/responsive.css">

  <!-- Страницы -->
  <link rel="stylesheet" href="/app/styles/about_me_page.css">
  <link rel="stylesheet" href="/app/styles/my_work_page.css">
  <link rel="stylesheet" href="/app/styles/contact-me.css">
  <link rel="stylesheet" href="/app/styles/login.css">

  <!-- Плагины -->
  <link rel="stylesheet" type="text/css" href="/app/bower_components/qtip2/jquery.qtip.css">

  <!-- modernizr - исключение, подулючается только в head -->
  <script src="/app/bower_components/modernizr/modernizr.js"></script>    
</head>
<body>
  <!--[if lt IE 7]>
      <p class="browsehappy">Вы используете <strong>устаревший</strong> браузер. Пожалуйста <a href="http://browsehappy.com/">обновите</a> его.</p>
  <![endif]-->