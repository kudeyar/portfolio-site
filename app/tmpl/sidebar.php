<aside class="sidebar">
  <!-- Блок с навигацией -->
  <nav class="box menu">
    <ul>
      <!-- Текущий пункт меню определяем при помощи PHP, путём добавления класса current -->
      <li <?php echo ($page == '') ? 'class="current"' : '';?>><a href="/">Обо мне</a></li>
      <li <?php echo ($page == 'my-work') ? 'class="current"' : '';?>><a href="my-work">Мои работы</a></li>
      <li <?php echo ($page == 'contact') ? 'class="current"' : '';?>><a href="contact">Связаться со мной</a></li>
    </ul>
  </nav>
  <!-- Контакты -->
  <address class="box contacts">
    <div class="contacts-header">
      <!-- 
        Учтите, что в коммерческих проектах, сео оптимизатор может попросить вас поменять 
        тег h2 на какой-нибудь другой. Поэтому лучше стили задавать через класс, например .h2
      -->
      <h2 class="h2">Контакты</h2>
    </div>
    <ul>
      <!-- 
        Все ссылки блока address кликабельны, в том числе скайп и телефон.
        Это особенно удобно, когда пользователь заходит с мобильного устройства.
      -->
      <li class="mail">
         <span class="contact-icon icon-mail"></span>
         <a href="mailto:kovaldn@gmail.com">kovaldn@gmail.com</a>
      </li>
      <li class="phone">
         <span class="contact-icon icon-phone"></span>
         <a href="tel:+78129892723">+78129892723</a>
      </li>
      <li class="skype">
         <span class="contact-icon icon-skype"></span>
         <a href="skype:skype_kdn?chat">skype_kdn</a>
      </li>
    </ul>
  </address>
</aside>



