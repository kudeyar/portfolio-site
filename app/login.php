<!-- Подключаем head и header -->
<?php  
  include "tmpl/head.php";
?>  

<!-- Главный контейнер -->
<div class="container">  
	<div class="modal-wrapper login-wrapper">
    <div class="modal-header">
    	<h4 class="modal-title">Авторизуйтесь</h4>
    </div>
    <div class="modal-body">
			<form id="login" class="form" role="form">   
				<!-- Вывод сообщений с сервера -->
	      <div class="server-mes error-mes"></div>
	      <div class="server-mes success-mes"></div>
	      <!-- Название проекта -->
	      <div class="form-group">
	        <label for="login" class="label">Логин</label>
	        <input type="text" name="login" class="input" id="name" qtip-content="Вы не ввели логин">
	      </div>
	      <!-- Картинка проекта -->
	      <div class="form-group">
	        <label for="password" class="label">Пароль</label>
	        <input type="password" name="password" class="input" id="password" qtip-content="Вы не ввели пароль">
	      </div>
	      <!-- Кнопка "Отправить" -->
		    <button type="submit" class="btn">Войти</button>    
	    </form>
		</div>   
	</div>   
</div> 

<!-- Подключаем футер -->
<?php
  include "tmpl/footer.php";
?> 
