<!-- Подключаем head и header -->
<?php
  $page = 'my-work';
  $title = 'Мои работы';
  include "tmpl/head.php";
  include "tmpl/header.php";
?>  
  
    <!-- Подключаем сайдбар -->
    <?php
      include "tmpl/sidebar.php";
    ?>  
    
    <!-- Главная область -->
    <div class="main my-work">  
        <!-- 1ый блок -->
        <section class="box">
            <h2>Мои работы</h2>
            <div class="clearfix"></div>

            <div class="projects">

              <?php foreach($data['portfolio'] as $item): ?>
              <!-- Проект -->
              <div class="item">
                <div class="hover-img">
                  <img src="app/<?php echo $item['img']; ?>" alt="<?php echo $item['title']; ?>">
                  <div class="zoom-wrapper">
                    <a href="<?php echo $item['url']; ?>" class="zoom" target="_blank"><?php echo $item['title']; ?></a>
                  </div>
                </div>
                <a href="<?php echo $item['url']; ?>" target="_blank"><?php echo $item['title']; ?></a>
                <p><?php echo $item['description']; ?></p>
              </div>
             <?php endforeach; ?>
            <!-- Проверяем, пользователь залогинен или нет -->
            <?php if($_SESSION['auth']): ?>
              <!-- Добавить новый проект -->
              <a href="#" class="item add-new-item">
                <div class="icon-add"></div>
                <span>Добавить проект</span>
              </a>
            <?php endif; ?>
            </div>

        </section>           
    </div>

<!-- Подключаем модальное окно -->
<?php
  include "tmpl/popup-add-project.php";
?> 

<!-- Подключаем футер -->
<?php
  include "tmpl/footer.php";
?> 
