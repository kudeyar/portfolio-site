(function() {
  
	var app = {
		
		initialize : function () {			
			this.modules();
			this.setUpListeners();
		},

		modules: function () {

		},

		setUpListeners: function () {
			$('.add-new-item').on('click', app.showModal);
		},

		showModal: function (ev) {
			 ev.preventDefault();
			 $('#new-progect-popup').bPopup({
			 	speed: 650,
		        transition: 'slideIn',
			    transitionClose: 'slideBack'
			 });
		}
		
	}

	app.initialize();

}());

