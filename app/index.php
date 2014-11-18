<!-- 
  Подключаем head и header.
  Благодаря этому мы избегаем дублирование кода.
-->
<?php 
  include "tmpl/head.php";
  include "tmpl/header.php";
?>    
         
<!-- 
  Подключаем сайдбар (меню и контакты).
  Сайдбар также одинаковый на всех страницах.
-->
<?php
  include "tmpl/sidebar.php";
?>
  
<!-- 
  Главная область. На всех страницах имеет общий класс main 
  и индивидуальный класс названия страницы, например "about-me" - для страницы "обо мне"
-->
<div class="main about-me">  
  <!-- 1ый блок -->
  <section class="box">
    <h2 class="h2">Основная информация</h2>
    <div class="clearfix"></div> <!-- Очищаем флоат -->
    <img src="/app/images/face.png" alt="Фотография автора" class="photo">
    <dl class="dl-horizontal">
      <dt>Меня зовут:</dt>
      <dd>Иванов Андрей Степанович</dd>
      <dt>Мой возраст:</dt>
      <dd>25 лет</dd>
      <dt>Мой город:</dt>
      <dd>Санкт Петербург, Россия</dd>
      <dt>Моя специализация:</dt>
      <dd>FRONTEND разработчик</dd>
      <dt>Ключевые навыки:</dt>
      <dd class="skills">
        <span class="skill-item">html</span>
        <span class="skill-item">css</span>
        <span class="skill-item">javascript</span>
        <span class="skill-item">gulp</span>
        <span class="skill-item">git</span>
      </dd>
    </dl>                
  </section><!-- // 1ый блок -->
    
  <!-- 2ой блок -->
  <section class="box">
    <h2 class="h2">Опыт работы</h2>
    <div class="item">
      <div class="about-icon icon-portfel"></div>
      <div class="info-block">
        <p class="where">"ИП Боровицкий" - Продавец дисков</p>
        <p class="period">Сентябрь 2005 - Август 2008</p>
      </div>
    </div>
    <div class="item">
      <div class="about-icon icon-portfel"></div>
      <div class="info-block">
        <p class="where">"ООО Системы безопастности" - Системный администратор</p>
        <p class="period">Июнь 2008 - Июль 2010</p>
      </div>
    </div>      
  </section> <!-- // 2ой блок -->

  <!-- 3ий блок -->
  <section class="box">
    <h2 class="h2">Образование</h2>
    <div class="item">
      <div class="about-icon icon-college"></div>
      <div class="info-block">
        <p class="where">Незаконченное высшее. СПБНИУ ИТМО</p>
        <p class="period">Октябрь 2012 - по настоящее время</p>
      </div>
    </div>
    <div class="item">
      <div class="about-icon icon-course"></div>
      <div class="info-block">
        <p class="where">Курсы Loftschool</p>
        <p class="period">Ноябрь 2014 - по настоящее время</p>
      </div>
    </div>
  </section> <!-- // 3ий блок -->         
</div> <!-- // Главная область -->

<!-- Подключаем футер -->
<?php
  include "tmpl/footer.php";
?> 
