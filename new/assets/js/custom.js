	  $('.lang-rs').click(function(e){
	  	e.preventDefault();
		var d = new Date();
    	d.setTime(d.getTime() + (86400 * 30));
    	var expires = "expires="+ d.toUTCString();
    	document.cookie = "jevtic_lang=rs;" + expires;
    	location.reload();
	  });

	  $('.lang-en').click(function(e){
	  	e.preventDefault();
		var d = new Date();
    	d.setTime(d.getTime() + (86400 * 30));
    	var expires = "expires="+ d.toUTCString();
    	document.cookie = "jevtic_lang=en;" + expires;
    	location.reload();
	  });


	  $('.addtofav').click(function(e)){
	  	e.preventDefault();
	  	var favid = $('#addtofav').attr("data-id");
	  		$.ajax({
	            type: "GET",
	            data:  '?add_favorite=1&id=' + favid,
	            url: "ajax.php",
	            dataType: "html",
	            async: false,
	            success: function (data) {
	            	if(data){
	            	$(this).removeClass('addtofav');
	            	$(this).addClass('removefav');
	            	$(this).text('Ukloni iz omiljenih');
	            	}
	            }
			});
	  }
	  $('.removefav').click(function(e)){
	  	e.preventDefault();
	  	var favid = $('#addtofav').attr("data-id");
	  		$.ajax({
	            type: "GET",
	            data:  '?remove_favorite=1&id=' + favid,
	            url: "ajax.php",
	            dataType: "html",
	            async: false,
	            success: function (data) {
	            	if(data){
	            	$(this).removeClass('removefav');
	            	$(this).addClass('addtofav');
	            	$(this).text('Dodaj u omiljene');
	            	}
	            }
			});
	  }