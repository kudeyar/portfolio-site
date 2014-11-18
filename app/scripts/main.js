(function() {    

  var app = {

    // Инициализация
    initialize : function () {
      this.setUpListeners();
      this.fileUp();
    },

    // Подключаем прослушку событий
    setUpListeners: function () {
      $('.add-new-item').on('click', app.showModal); // модальное окно "добавть проект"
      $('form').on('keydown', '.has-error', app.removeError); // удаляем красную обводку у элементов форм
      $('form').on('reset', app.clearForm); // при сбросе формы удаляем также: тултипы, обводку, сообщение от сервера
      $('#add-new-project').on('submit', app.addProject); // добавление проекта
      $('#login').on('submit', app.login); //  авторизация пользователя
      $('#contact-me').on('submit', app.contactMe); // отправка формы "связаться со мной""
    },

    // Убирает красную обводку у инпута
    removeError: function() {
      $(this).removeClass('has-error');
    },

    // Подгрузка новых проектов
    fileUp : function () {

      var divUpload = $('#uploadfile'), // div, в который обернут fileUpload
          inpFileName = $('#filename'), // input, в который мы будем помещать название файла
          inpFile = $('#fileupload'), // input file
          inpUrl = $('#fileurl'); // input fileurl

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
            // TODO : доделать вывод ошибок
            console.log('Ошибка на сервере');
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
      form.find('.error-box').text('').hide(); // очищаем и прячем сообщение о серверной ошибке
    },

    // Вызывает модальное окно
    showModal: function () {
      // Подключаем плагин bPopup
      $('#new-progect-popup').bPopup({
        speed: 650,
        transition: 'slideIn',
        transitionClose: 'slideBack',
        onClose: function () {
          var form = this.find('.form')
          form.trigger("reset"); // сбрасываем форму
        }
      });
    },

    // Форма "Связаться со мной"
    contactMe: function (ev) {
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
          form.find('.error-box').text(ans.message).show();
        }
      })
      .fail(function(ans) {
        form.find('.error-box').text('На сервере произошла ошибка').show();
      });

    },

    // Логин
    // TODO : переделать ajax
    login: function (ev) {
      ev.preventDefault();

      var form = $(this),
          data = form.serialize();

      $.ajax({
          url: '/app/login_server.php',
          type: 'POST',
          data: data,
          complete : function(res){
            console.log(res.responseText);
            if(res.responseText == "OK"){
                window.location.href = '/';
            }else{
                alert("Сервер вас не пускает");
            }
          }
      });
    },

    // Добавление проекта
    addProject: function (ev) {
      ev.preventDefault();

      var form = $(this),
          data = form.serialize(),
          url = '/app/ajax.php';
      // console.log(data);

      
      if (!app.validateForm(form)) return; // убедимся, что форма не пустая

      // ajax запрос
      app.ajaxForm(data, url)
        .done(function(ans) {
          var mes = ans.message;
          if ( mes === 'OK'){
            location.reload();
          } else{
            form.find('.error-box').text(ans.message).show();
          }
        })
        .fail(function(ans) {
          form.find('.error-box').text('На сервере произошла ошибка').show();
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

    // Универсальная функция валидации формы
    validateForm: function (form){

      var elements = form.find('input, textarea').not('#fileupload'),
          valid = true;

      $.each(elements, function(index, val) {
        var input = $(val),
            val = input.val();

        if(val.length === 0){
          input
            .addClass('has-error')
            .qtip({
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
              position: {
                  my: 'right center', 
                  at: 'left center',
              },
              style: {
                  classes: 'qtip-red qtip-rounded'
              }
            }).trigger('show');
            valid = false;
          }
      }); // each

      return valid;
      },
    }

    app.initialize();

}());

