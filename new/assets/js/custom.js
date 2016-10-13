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


	  $('#setfavorite').click(function(e){
	  	e.preventDefault();
	  	var favid = $('#setfavorite').attr("data-id");
	  	var favfunc = $('#setfavorite').attr("data-func");
	  		$.ajax({
	            type: "GET",
	            data:  favfunc + '_favorite=1&id=' + favid,
	            url: "ajax.php",
	            dataType: "html",
	            async: false,
	            success: function (data) {
	            	if(data=='1'){
		            	$('#setfavorite').attr('data-func', 'remove');
		            	$('#setfavorite').html('<i class="fa fa-star"></i>Ukloni iz omiljenih');
	            	}
	            	if(data=='2'){
		            	$('#setfavorite').attr('data-func', 'add');
		            	$('#setfavorite').html('<i class="fa fa-star"></i>Dodaj u omiljene');
	            	}
	            }
			});
	  });

	  $('.removefav').click(function(e){
	  	e.preventDefault();
	  	var favid = $('.removefav').attr("data-id");
	  		$.ajax({
	            type: "GET",
	            data:  'remove_favorite=1&id=' + favid,
	            url: "ajax.php",
	            dataType: "html",
	            async: false,
	            success: function (data) {
	            	if(data){
		            	$('.removefav').addClass('addtofav');
		            	$('.removefav').html('<i class="fa fa-star"></i>Dodaj u omiljene');
		            	$('.removefav').removeClass('removefav');
	            	}
	            }
			});
	  });

	 $('#terms_check').click(function () {
        //check if checkbox is checked
		 var v = grecaptcha.getResponse();
        if ($(this).is(':checked') && v != 0) {

            $('#submitsubmit').removeAttr('disabled'); //enable input

        } else {
            $('#submitsubmit').attr('disabled', true); //disable input
        }
     });

	  function recaptchaCallback() {
		  if ($('#terms_check').is(':checked')) {
			  $('#submitsubmit').removeAttr('disabled');
		  }
	  }

	  // adding and removing file input box
		var maxi = $('#AddFileInputBox div').size() + 1;
		MaxFileInputs = 15;
		$('#AddMoreFileBox').click(function(e){
				if(maxi < MaxFileInputs)
				{
					var newinput = '<span><a href="#" class="removeFileBox"><img src="../images/close_icon.gif" border="0" /></a><input type="file" id="fileInputBox" size="20" name="file[]" class="addedInput" value=""/></span>';
					$("#AddFileInputBox").append(newinput);
					maxi++;
				}
				return false;
		});
		$('body').on('click', '.removeFileBox', function(e) { 
			e.preventDefault();
				if( maxi > 1 ) {
						$(this).parent().remove();
						maxi--;
				}
				return false;
		});