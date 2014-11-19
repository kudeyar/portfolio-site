<!-- Подключаем head и header -->
<?php 
  include "tmpl/head.php";
  include "tmpl/header.php";
?>  

<!-- Подключаем сайдбар -->
<?php
  include "tmpl/sidebar.php";
?>  
    
<!-- Главная область -->
<div class="main contact-me"> 
  <section class="box">
      <div class="sec-header">
        <h2 class="h2">У вас интересный проект? Напишите мне!</h2>
      </div>            
      <form id="contact-me" class="form" role="form">   
        <!-- Вывод сообщений с сервера -->
        <div class="server-mes error-mes"></div>
        <div class="server-mes success-mes"></div>
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
            <input type="text" name="email" class="input" id="email" placeholder="Куда мне писать" qtip-position="right" qtip-content="Вы не ввели email">
          </div>
        </div>
        <!-- Сообщение -->
        <div class="form-group">
          <label for="message" class="label">Сообщение</label>
          <textarea name="message" id="message" class="textarea" rows="3" placeholder="Кратко в чем суть" qtip-content="Что вы от меня хотите?"></textarea>
        </div>
        <!-- Капча -->
        <div class="form-group captcha-wrap">
            <label for="captcha" class="label">Введите код, указанный на картинке</label>
            <img src="/app/captcha.php" alt="код" class="captcha pull-left"/>
            <input type="text" name="captcha" class="input input-captcha pull-right" id="captcha" placeholder="Введите код" qtip-position="right" qtip-content="Вы не ввели код">
        </div>
        <!-- Кнопка "Отправить" -->
        <div class="button-group">
          <button type="submit" class="btn">Отправить</button>
          <button type="reset" class="btn btn-res">Очистить</button>
        </div>      
      </form>            
  </section>           
</div>


<!-- Подключаем футер -->
<?php
  include "tmpl/footer.php";
?> 
