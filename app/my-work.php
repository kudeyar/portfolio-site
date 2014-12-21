<!-- Подключаем head и header -->
<?php
  require_once "tmpl/head.php";
  require_once "tmpl/header.php";
?>  
  
<!-- Подключаем сайдбар -->
<?php
  require_once "tmpl/sidebar.php";
?>  
    
<!-- Главная область -->
<div class="main my-work">  

  <section class="box">
    <h2 class="h2">Мои работы</h2>
    <div class="clearfix"></div>

    <!-- 
      Вывод проектов осуществлен при помощи PHP.
      Проекты берем из базы данных (база лежит в корне репозитория).
     -->
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
        <p class="description"><?php echo $item['description']; ?></p>
      </div> <!-- // Проект -->
      <?php endforeach; ?>
      
      <!-- 
        Проверяем, пользователь залогинен или нет.
        Только авторизованный пользователь может добавлять новые проекты.
      -->
      <?php if($_SESSION['auth']): ?>
        <!-- Добавить новый проект -->
        <a href="#" class="item add-new-item">
          <div class="icon-add"></div>
          <span>Добавить проект</span>
        </a>
      <?php
        // Подключаем модальное окно, только если пользователь авторизован
        require_once "tmpl/popup-add-project.php";
        endif;
      ?>

    </div> <!-- // projects -->

  </section>           
</div> <!-- // Главная область -->

<!-- Подключаем футер -->
<?php
  require_once "tmpl/footer.php";
?> 
