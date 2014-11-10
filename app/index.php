<!-- Подключаем head и header -->
<?php
  $page = 'about-me';
  $title = 'Обо мне';
  include "head.php";
  include "header.php";
?>  
    
<!-- Главный контейнер -->
<div class="container">            
    
    <!-- Подключаем сайдбар -->
    <?php
      include "sidebar.php";
    ?>  
    
    <!-- Главная область -->
    <div class="main about-me">  
        <!-- 1ый блок -->
        <section class="box">
            <h2>Основная информация</h2>
            <div class="clearfix"></div>
            <img src="images/face.png" alt="" class="photo">
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
                  <span>html</span>
                  <span>css</span>
                  <span>javascript</span>
                  <span>gulp</span>
                  <span>git</span>
              </dd>
            </dl>                
        </section>
        <!-- 2ой блок -->
        <section class="box">
            <h2>Опыт работы</h2>
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
        </section class="box">
        <!-- 3ий блок -->
        <section class="box">
            <h2>Образование</h2>
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
        </section>           
    </div>
</div> 

<!-- Подключаем футер -->
<?php
  include "footer.php";
?> 
