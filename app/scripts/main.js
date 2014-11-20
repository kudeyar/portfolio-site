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

    // Обрабатывает форму "Связаться со мной"
    contactMe: function (ev) {
      console.log('Работаем с формой связи');

      ev.preventDefault();

      var form = $(this),          
          url = '/app/send_mail.php',
          defObject = app.ajaxForm(form, url);

     if (defObject) {
        defObject.done(function(ans) {
          console.log(ans);
          var mes = ans.message;
          if ( mes === 'OK'){
            form.find('.error-mes').text('').hide();
            form.find('.success-mes').text(mes).show();            
          } else{
            form.find('.error-mes').text(mes).show();
          }
        });
      }
    },

    // Обрабатывает форму авторизации
    login: function (ev) {
      console.log('Работаем с формой авторизации');

      ev.preventDefault();

      var form = $(this),
          url = '/app/login_server.php',
          defObject = app.ajaxForm(form, url);

      if (defObject) {
        defObject.done(function(ans) {
          var mes = ans.responseText;
          if ( mes === 'OK'){
            form.find('.error-mes').text('').hide();
            window.location.href = '/';
          } else{
            form.find('.error-mes').text(mes).show();
          }
        });
      }      
    },

    // Обрабатывает форму добавления проекта
    addProject: function (ev) {
      console.log('Работаем с формой добавления проекта');

      ev.preventDefault();

      var form = $(this),
          url = '/app/ajax.php',
          defObject = app.ajaxForm(form, url);

      if (defObject) {
        defObject.done(function(ans) {
          var mes = ans.message;
          if ( mes === 'OK'){
            form.find('.error-mes').text('').hide();
            form.find('.success-mes').text('Проект успешно добавлен').show();
            // location.reload(); // сразу перезагрузим страницу
          } else{
            form.find('.error-mes').text(mes).show();
          }
        });
      }
        
    },

    // Проверяет форму и делает ajax запрос
    ajaxForm: function (form, url, dataType) { 
      
      if (!app.validateForm(form)) return false;  // Возвращает false, если не проходит валидацию 
      var data = form.serialize(); // собираем данные из формы в объект data

      return $.ajax({ // Возвращает Deferred Object
        type: 'POST',
        url: url,
        dataType : dataType || "JSON", // по-умолчанию тип данных JSON, но можем задать и другой
        data: data,
        error: function( xhr, textStatus ) {
            console.log( [ xhr.status, textStatus ] );
        }

      })
      .fail(function(ans) { // ошибка обрабатывается всегда одинаково
        console.log('fail');
        form.find('.error-mes').text('На сервере произошла ошибка').show();
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

    // Убирает красную обводку у элементов форм
    removeError: function() {
      console.log('Красная обводка у элементов форм удалена');

      $(this).removeClass('has-error');
    },

    // Универсальная функция валидации формы
    validateForm: function (form){
      console.log('Проверяем форму');

      var elements = form.find('input, textarea').not('input[type="file"], input[type="hidden"]'),
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

      }
  }

  app.initialize();

}());
