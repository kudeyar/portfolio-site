  </div> <!-- // Основной контетн -->

  <!-- Подвал -->
  <footer class="footer-page">
    <div class="gline"></div> <!-- gline - 2 пиксельная линия с градиентом. Можно сделать отдельным дивом или при помощи :after :before -->
    <div class="container">
      <p class="copyright">© 2014, Это мой сайт, пожалуйста, не копируйте и не воруйте его</p>
    </div>
  </footer>

</div> <!-- // Главная обертка -->

<!-- 
  Скрипты только в конце страницы. 
  Подключаем только девелоперские версии скриптов (не минифицированные).
  Скрипты должны быть подключены в порядке из зависимости друг от друга (если эта зависимость есть).
-->
<script src="/app/bower_components/jquery/dist/jquery.js"></script> <!-- Jquery идет первым, от него зависят почти все последующие -->
<script src="/app/bower_components/bpopup/jquery.bpopup.js"></script> <!-- Попап - модальное окно для добавления проектов -->
<script src="/app/bower_components/qtip2/jquery.qtip.js"></script> <!-- Гибкий плагин для тултипов -->

<!-- file-upload - для подгрузки файлов -->
<script src="/app/bower_components/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script> 
<script src="/app/bower_components/jquery-file-upload/js/jquery.iframe-transport.js"></script>
<script src="/app/bower_components/jquery-file-upload/js/jquery.fileupload.js"></script>
<!-- // file-upload - для подгрузки файлов -->

<script src="/app/bower_components/placeholder-polyfill/dist/jquery.placeholder.js"></script> <!-- Для поддержки плейсхолдеров в старых IE -->
<script src="/app/scripts/plugins.js"></script> <!-- Перекочевал из html5boilerplate -->
<script src="/app/scripts/main.js"></script> <!-- Свои скрипты -->

</body>
</html>
