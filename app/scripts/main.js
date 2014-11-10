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

		removeError: function() {
			$(this).removeClass('has-error');
		},

		// Вызов модального окна
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

		// Логин
		login: function (ev) {
			ev.preventDefault();

			var form = $(this),
				data = form.serialize();

			console.log(data);

			if (!app.validateForm(form)) {
				return false;
			}

			$.ajax({
				url: '/app/login_server.php',
				type: 'POST',
				data: data,
                success: function(data){
                    console.log('конец загрузки проекта');
                }
			})
			.done(function(ans) {
                console.log(ans);

				if (ans === "OK") {
					window.location.href = '/';
				}else{
					alert('Сервер вас не пускает!');
				}
				// console.log("success");
			})
			.fail(function() {
				// console.log("error");
			})
			.always(function() {
				// console.log("complete");
			});	
		},

		// Отправляем запрос на сервер в базу данных
		addProject: function (ev) {
			ev.preventDefault();

			var form = $(this),
				data = form.serialize();



			console.log(data);
			
			if (!app.validateForm(form)) {
				return false;
			}

			// Здесь не понятно, как отправлять файл
			$.ajax({
				url: '/app/ajax.php',
				type: 'POST',
				data: data

			})
			.done(function() {
				 console.log("success");
			})
			.fail(function() {
				// console.log("error");
			})
			.always(function() {
				console.log("complete");
			});	
		},

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

