(function() {    

  var app = {

    // Инициализация
    initialize : function () {
      console.log('Инициализация приложения');

      this.setUpListeners();
    },

    // Подключаем прослушку событий
    setUpListeners: function () {
      console.log('Прослушка событий включена');

      $('.add-new-item').on('click', app.showModal); // модальное окно "добавть проект"
      $('form').on('keydown', '.has-error', app.removeError); // удаляем красную обводку у элементов форм
      $('form').on('reset', app.clearForm); // при сбросе формы удаляем также: тултипы, обводку, сообщение от сервера
      $('#add-new-project').on('submit', app.addProject); // добавление проекта
      $('#login').on('submit', app.login); //  авторизация пользователя
      $('#contact-me').on('submit', app.contactMe); // отправка формы "связаться со мной""
    },

    // Убирает красную обводку у элементов форм
    removeError: function() {
      console.log('Красная обводка у элементов форм удалена');

      $(this).removeClass('has-error');
    },

    // Подгрузка новых проектов
    fileUp : function () {      
      console.log('Инициализируем файлаплоад');

      var divUpload = $('#uploadfile'), // div, в который обернут fileUpload
          inpFileName = $('#filename'), // input, в который мы будем помещать название файла
          inpFile = $('#fileupload'), // input file
          inpUrl = $('#fileurl'), // input fileurl
          form = divUpload.parents('.form'); // сама форма

      // Загрузка файлов на сервер
      inpFile.fileupload({
        url: '/app/upload.php',
        dataType: 'json',
        success: function(data){
          console.log(data);
          var mes = data.message;
          if (mes == 'ОК') {
            inpFileName
              .val(data.name) // добавляем в инпут называние картинки 
              .removeClass('has-error') // удаялем красную обводку
              .trigger('hideTooltip'); // удаляем тултип
            inpUrl.val(data.url);
          }
          else{
            form.find('.error-mes').text(mes).show(); // случае ошибки, показываем её текст
          }
        }
      });
    },

    // Универсальная функция очистки формы
    clearForm: function(form) {
      console.log('Очищаем форму');

      var form = $(this);
      form.find('.input, .textarea').trigger('hideTooltip'); // удаляем тултипы
      form.find('.has-error').removeClass('has-error'); // удаляем красную подсветку
      form.find('.error-mes, success-mes').text('').hide(); // очищаем и прячем сообщения с сервера
    },

    // Вызывает модальное окно
    showModal: function () {
      console.log('Вызов модального окна');

      app.fileUp(); // инициализируем fileUpload

      // Подключаем плагин bPopup
      $('#new-progect-popup').bPopup({
        speed: 650,
        transition: 'slideDown',
        onClose: function () {
          var form = this.find('.form');
          form.trigger("reset"); // сбрасываем форму
        }
      });
    },

    // Форма "Связаться со мной"
    contactMe: function (ev) {
      console.log('Работаем с формой связи');

      ev.preventDefault();

      var form = $(this),
          data = form.serialize(),
          url = '/app/send_mail.php';  

      // убедимся, что форма не пустая
      if (!app.validateForm(form)) return;

      app.ajaxForm(data, url)
      .done(function(ans) {
        console.log(ans);
        if ( ans === 'OK'){
          console.log('Письмо отправлено!');
        } else{
          form.find('.error-mes').text(ans.message).show();
        }
      })
      .fail(function(ans) {
        form.find('.error-mes').text('На сервере произошла ошибка').show();
      });

    },

    // Логин
    login: function (ev) {
      console.log('Работаем с формой авторизации');

      ev.preventDefault();

       var form = $(this),
          data = form.serialize(),
          url = '/app/login_server.php';

      if (!app.validateForm(form)) return; // убедимся, что форма не пустая

      // ajax запрос
      app.ajaxForm(data, url)
        .done(function(ans) {
          var mes = ans.responseText;
          if ( mes === 'OK'){
            window.location.href = '/';
          } else{
            form.find('.error-mes').text(mes).show();
          }
        })
        .fail(function(ans) {
          form.find('.error-mes').text('На сервере произошла ошибка').show();
        }); 
     
    },

    // Добавление проекта
    addProject: function (ev) {
      console.log('Работаем с формой добавления проекта');

      ev.preventDefault();

      var form = $(this),
          data = form.serialize(),
          url = '/app/ajax.php';
      
      if (!app.validateForm(form)) return; // убедимся, что форма не пустая

      // ajax запрос
      app.ajaxForm(data, url)
        .done(function(ans) {
          var mes = ans.message;
          if ( mes === 'OK'){
            location.reload();
          } else{
            form.find('.error-mes').text(mes).show();
          }
        })
        .fail(function(ans) {
          form.find('.error-mes').text('На сервере произошла ошибка').show();
        }); 
    },

    // Универсальная функция для работы со всеми формами
    ajaxForm: function (data, url, dataType) { 
      return $.ajax({
        type: 'POST',
        url: url,
        dataType : dataType || "JSON",
        data: data
      })
    },

    // Функция создания тултипа
    createQtip: function (element, position) {
      console.log('Создаем тултип');

      // позиция тултипа
      if (position === 'right') {
        position = {
          my: 'left center', 
          at: 'right center'
        }
      }else{
        position = {
          my: 'right center', 
          at: 'left center',
          adjust: {
            method: 'shift none'
          }
        }
      }

      // инициализация тултипа
      element.qtip({
        content: {
          text: function() {
            return $(this).attr('qtip-content');
          }
        },
        show: {
          event: 'show'
        },
        hide: {
          event: 'keydown hideTooltip'
        },
        position: position,
        style: {
          classes: 'qtip-mystyle qtip-rounded',
          tip: {
            height: 10,
            width: 16
          }
        }
      }).trigger('show');
    },

    // Универсальная функция валидации формы
    validateForm: function (form){
      console.log('Проверяем форму');

      var elements = form.find('input, textarea').not('#fileupload'),
          valid = true;

      $.each(elements, function(index, val) {
        var element = $(val),
            val = element.val(),
            pos = element.attr('qtip-position');         

        if(val.length === 0){
          element.addClass('has-error');
          app.createQtip(element, pos);            
          valid = false;
        }

      }); // each

      return valid;
      },
    }

    app.initialize();

}());
