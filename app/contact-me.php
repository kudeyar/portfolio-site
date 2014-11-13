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
    <div class="main contact-me">  
        <!-- 1ый блок -->
        <section class="box">
            <div class="sec-header">
              <h2>У вас интересный проект? Напишите мне!</h2>
            </div>            
            <form id="contact-me" class="form" role="form">   
             <!-- Имя и email в одну строку, для этого обернем в div.form-line -->
             <div class="form-line">
                <!-- Имя -->
                <div class="form-group pull-left">
                  <label for="name" class="label">Имя</label>
                  <input type="text" name="name" class="input" id="name" placeholder="Как к вам обращаться" qtip-content="Вы не ввели имя">
                </div>
                <!-- Email -->
                <div class="form-group pull-right">
                  <label for="email" class="label">Email</label>
                  <input type="text" name="email" class="input" id="email" placeholder="Куда мне писать" qtip-content="Вы не ввели email">
                </div>
              </div>
              <!-- Сообщение -->
              <div class="form-group">
                <label for="message" class="label">Сообщение</label>
                <textarea name="message" id="message" class="textarea" rows="3" placeholder="Кратко в чем суть" qtip-content="Забыли написать, что вы от меня хотите"></textarea>
              </div>
              <!-- Капча -->
              <!-- 
                
                Антон, добавь сюда капчу

               -->
              <!-- Кнопка "Отправить" -->
              <div class="button-group">
                <button type="submit" class="btn">Отправить</button>
                <button type="reset" class="btn btn-res">Очистить</button>
              </div>      
            </form>            
        </section>           
    </div>
</div> 

<!-- Подключаем футер -->
<?php
  include "tmpl/footer.php";
?> 
