(function() {
  
	var app = {
		
		// Инициализация
		initialize : function () {
			this.setUpListeners();
			console.log('init');
		},

		// Подключаем прослушку событий
		setUpListeners: function () {
			$('.add-new-item').on('click', app.showModal);
			$('#add-new-project').on('submit', app.addProject);
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
			    }
			 });
		},

		// Отправляем запрос на сервер в базу данных
		addProject: function (ev) {
			ev.preventDefault();

			var form = $(this),
				data = form.serialize();

			console.log(data);

			// Здесь не понятно, как отправлять файл
			$.ajax({
				url: 'ajax.php',
				type: 'POST',
				data: data,
			})
			.done(function() {
				console.log("success");
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});	
		}
	}

	app.initialize();

}());

