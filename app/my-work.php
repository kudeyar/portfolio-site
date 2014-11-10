<!-- Подключаем head и header -->
<?php
  $page = 'my-work';
  $title = 'Мои работы';
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
    <div class="main my-work">  
        <!-- 1ый блок -->
        <section class="box">
            <h2>Мои работы</h2>
            <div class="clearfix"></div>

            <div class="projects">

              <!-- Проект 1 -->
              <div class="item">
                <div class="hover-img">
                  <img src="images/work/loftblog.jpg" alt="loftblog.ru">
                  <div class="zoom-wrapper">
                    <a href="http://loftblog.ru/" class="zoom" target="_blank">портал видео уроков</a>
                  </div>
                </div>
                <a href="http://loftblog.ru/" target="_blank">loftblog.ru</a>
                <p>Сайт с уроками по web разработке</p>
              </div>
              
              <!-- Проект 2 -->
              <div class="item">
                <div class="hover-img">
                  <img src="images/work/itloft.jpg" alt="itloft.ru">
                  <div class="zoom-wrapper">
                    <a href="http://itloft.ru/" class="zoom" target="_blank">диджитал агентство</a>
                  </div>
                </div>
                <a href="http://itloft.ru/" target="_blank">itloft.ru</a>
                <p>Сайт агенства интернет решений itloft</p>
              </div>
              
              <!-- Проект 3 -->
              <div class="item">
                <div class="hover-img">
                  <img src="images/work/landingsloft.jpg" alt="landingsloft.ru">
                  <div class="zoom-wrapper">
                    <a href="http://landingsloft.ru/" class="zoom" target="_blank">студия лендингов</a>
                  </div>
                </div>
                <a href="http://landingsloft.ru/" target="_blank">landingsloft.ru</a>
                <p>Сайт по разработке лендингов с гарантией</p>
              </div>
              
              <!-- Проект 4 -->
              <div class="item">
                <div class="hover-img">
                  <img src="images/work/kovalchuk.jpg" alt="kovalchuk.ru">
                  <div class="zoom-wrapper">
                    <a href="http://kovalchuk.us/" class="zoom" target="_blank">сайт разработчика</a>
                  </div>
                </div>
                <a href="http://kovalchuk.us/" target="_blank">kovalchuk.us</a>
                <p>Личный сайт Дмитрия Ковальчука</p>
              </div>
              
              <!-- Проект 5 -->
              <div class="item">
                <div class="hover-img">
                  <img src="images/work/loftschool.jpg" alt="loftschool.ru">
                  <div class="zoom-wrapper">
                    <a href="http://loftschool.ru/" class="zoom" target="_blank">школа веб разработки</a>
                  </div>
                </div>
                <a href="http://loftschool.ru/" target="_blank">loftschool.ru</a>
                <p>Школа по обучению веб разработчиков</p>
              </div>

              <!-- Добавить новый проект -->
              <a href="#" class="item add-new-item">
                <div class="icon-add"></div>
                <span>Добавить проект</span>
              </a>

            </div>

        </section>           
    </div>
</div> 

<!-- Подключаем модальное окно -->
<?php
  include "popup-add-project.php";
?> 

<!-- Подключаем футер -->
<?php
  include "footer.php";
?> 
