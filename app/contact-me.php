<!-- Подключаем head и header -->
<?php
  $page = 'contact-me';
  $title = 'Связаться со мной';
  include "tmpl/head.php";
  include "tmpl/header.php";
?>  
    
<!-- Главный контейнер -->
<div class="container">            
    
    <!-- Подключаем сайдбар -->
    <?php
      include "tmpl/sidebar.php";
    ?>  
    
    <!-- Главная область -->
    <div class="main about-me">  
        <!-- 1ый блок -->
        <section class="box">
            <h2>Связаться со мной</h2>
            
        </section>           
    </div>
</div> 

<!-- Подключаем футер -->
<?php
  include "tmpl/footer.php";
?> 
