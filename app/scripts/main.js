(function() {

    var app = {

        // Инициализация
        initialize : function () {
            this.setUpListeners();
        },

        // Подключаем прослушку событий
        setUpListeners: function () {
            $('.add-new-item').on('click', app.showModal);

            // form
            $('form').on('keydown', '.has-error', app.removeError);
            $('#add-new-project').on('submit', app.addProject);
            $('#login').on('submit', app.login);
            $('#contact-me').on('submit', app.contactMe);

            var fileupload = $('#fileupload');
            new AjaxUpload(fileupload, {
                action: "/app/upload.php",
                name: "userfile",
                autoSubmit: true,
                onSubmit: function(file, ext){
                    fileupload.text("Загрузка");
                    this.disable();
                },
                onComplete: function(file, response){
                    var otvet = JSON.parse(response);
                    console.log(otvet);
                    if(otvet.message == "ОК"){
                        fileupload.text('Файл загружен');
                        $('#fileurl').val(otvet.url);
                    }else{
                        fileupload.text(otvet.message);
                    }
                    this.enable();
                }
            });

        },

        // Убирает красную обводку у инпута
        removeError: function() {
            $(this).removeClass('has-error');
        },

        // Вызывает модальное окно
        showModal: function () {
            // Подключаем плагин bPopup
            $('#new-progect-popup').bPopup({
                speed: 650,
                transition: 'slideIn',
                transitionClose: 'slideBack',
                onClose: function () {
                    // При закрытии плагина очищаем форму
                    this.find('.form').trigger("reset");
                    $(".qtip").remove();
                    $('.has-error').removeClass('has-error');
                }
            });
        },

        // Форма "Связаться со мной"
        contactMe: function (ev) {
            ev.preventDefault();

            var form = $(this),
                data = form.serialize();

            $.ajax({
                url: '/app/send_mail.php',
                type: 'POST',
                data: data,
                success: function(){

                }
            });


        },

        // Логин
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

        // Попытаемся добавить проект
        addProject: function (ev) {
            ev.preventDefault();



            var form = $(this),
                data = form.serialize();

            $.ajax({
                url: '/app/ajax.php',
                type: 'POST',
                data: data,
                complete : function(res, data){
                    window.location.href = '/my-work';
                }
            });
        },

        // Универсальная функция для работы со всеми формами
        ajaxForm: function (form, url) {

            data = form.serialize(); // собираем данные с функции
            console.log(data);

            // убедимся, что форма не пустая
            if (!app.validateForm(form)) {
                return false;
            }

            // отправляем аяксом запрос на сервер
            $.ajax({
                url: url,
                type: 'POST',
                data: data
            })
                .done(function(ans) {
                    return ans;
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function(ans) {
                    console.log(ans);
                });
        },

        // Универсальная функция валидации формы
        validateForm: function (form){

            var elements = form.find('input, textarea'),
                valid = true;

            $.each(elements, function(index, val) {
                var input = $(val),
                    val = input.val();
                // formGrout = input.parents('.form-group'),
                // label = formGrout.find('label').text().split(' ')[0].toLowerCase(),
                // textError = 'Введите ' + label;

                if(val.length === 0){
                    input.addClass('has-error').removeClass('has-success');
                    // input.tooltip({
                    // 	trigger: 'manual',
                    // 	placement: 'right',
                    // 	title: textError
                    // }).tooltip('show');

                    // input.qtip().show();


                    input.qtip({
                        content: {
                            text: function() {
                                return $(this).attr('qtip-content');
                            }
                        },
                        show: {
                            event: 'show'
                        },
                        hide: {
                            event: 'keydown'
                        },
                        position: {
                            my: 'right center',  // Position my top left...
                            at: 'left center',
                        },
                        style: {
                            classes: 'qtip-red qtip-rounded'
                        }
                    }).trigger('show');


                    valid = false;
                }else{
                    // formGrout.removeClass('has-error').addClass('has-success');
                    // input.tooltip('hide');
                }
            });

            return valid;
        },
    }

    app.initialize();

}());

