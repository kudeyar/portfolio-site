(function() {
  
	var app = {
		
		initialize : function () {			
			this.modules();
			this.setUpListeners();

			console.log('init');

		},

		modules: function () {

		},

		setUpListeners: function () {
			$('.add-new-item').on('click', app.showModal);
			$('#add-new-project').on('submit', app.addProject);
		},

		showModal: function (ev) {
			 ev.preventDefault();
			 $('#new-progect-popup').bPopup({
			 	speed: 650,
		        transition: 'slideIn',
			    transitionClose: 'slideBack'
			 });
		},

		addProject: function (ev) {
			ev.preventDefault();

			var form = $(this),
				data = form.serialize();

			console.log(data);

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

