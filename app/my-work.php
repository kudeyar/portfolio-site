<!-- Подключаем head и header -->
<?php
  $page = 'my-work';
  $title = 'Мои работы';
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
              <div class="item">
                <img src="images/work/loftblog.jpg" alt="loftblog.ru">
                <a href="http://loftblog.ru/" target="_blank">loftblog.ru</a>
                <p>Сайт с уроками по web разработке</p>
              </div>
              
              <div class="item">
                <img src="images/work/itloft.jpg" alt="itloft.ru">
                <a href="http://itloft.ru/" target="_blank">itloft.ru</a>
                <p>Сайт агенства интернет решений itloft</p>
              </div>
              
              <div class="item">
                <img src="images/work/landingsloft.jpg" alt="landingsloft.ru">
                <a href="http://landingsloft.ru/" target="_blank">landingsloft.ru</a>
                <p>Сайт по разработке лендингов с гарантией</p>
              </div>
              
              <div class="item">
                <img src="images/work/kovalchuk.jpg" alt="kovalchuk.ru">
                <a href="http://kovalchuk.us/" target="_blank">kovalchuk.us</a>
                <p>Личный сайт Дмитрия Ковальчука</p>
              </div>
              
              <div class="item">
                <img src="images/work/loftschool.jpg" alt="loftschool.ru">
                <a href="http://loftschool.ru/" target="_blank">loftschool.ru</a>
                <p>Школа по обучению веб разработчиков</p>
              </div>

              <div class="item add-new-item">
                <p>Добавить проект</p>
              </div>

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
