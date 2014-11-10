<aside class="sidebar">
    <!-- Блок с навигацией -->
    <nav class="box menu">
        <ul>
            <li <?php echo ($page == 'about-me') ? 'class="current"' : '';?>><a href="/">Обо мне</a></li>
            <li <?php echo ($page == 'my-work') ? 'class="current"' : '';?>><a href="my-work">Мои работы</a></li>
            <li <?php echo ($page == 'contact-me') ? 'class="current"' : '';?>><a href="contact-me.php">Связаться со мной</a></li>
        </ul>
    </nav>
    <!-- Контакты -->
    <address class="box contacts">
      <div class="header">
        <h2>Контакты</h2>
      </div>
      <ul>
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



