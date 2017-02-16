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
	            url: "/agencija/new/ajax.php",
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
	            url: "/agencija/new/ajax.php",
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
					var newinput = '<span><a href="#" class="removeFileBox"><img src="/agencija/images/close_icon.gif" border="0" /></a><input type="file" id="fileInputBox" size="20" name="file[]" class="addedInput" value=""/></span>';
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



		// homepage quicksearch category switch

		$("#in-contract-type").change(function(){
		  var link = '/agencija/new/' + $(this).val() + '/';
		  $('#quick-search').attr("action", link);
		});

		$(".catfix").change(function(){
		  var link = '/agencija/new/' + $(this).val() + '/';
		  $('#searchForm').attr("action", link);
		});


		$(".cat-link").click(function(e){
			e.preventDefault();
			var vrsta = $(this).attr("data-type");
			$("#type").val(vrsta);
			$("#quick-search").submit();
		});




    $(document).ready(function() {
     
      var sync1 = $("#sync1");
      var sync2 = $("#sync2");
     
      sync1.owlCarousel({
        singleItem : true,
        slideSpeed : 300,
        navigation: false,
        afterAction : syncPosition,
        responsiveRefreshRate : 200,
        autoHeight: true,
        pagination: false
        // itemsScaleUp: true
      });
     
      sync2.owlCarousel({
        items : 6,
        itemsDesktop      : [1199,6],
        itemsDesktopSmall     : [979,4],
        itemsTablet       : [480,3],
        itemsMobile       : false,
        pagination: false,
        responsiveRefreshRate : 100,
        center: true,
        loop: true,
        afterInit : function(el){
          el.find(".owl-item").eq(0).addClass("synced");
        }
      });
     
      function syncPosition(el){
        var current = this.currentItem;
        $("#sync2")
          .find(".owl-item")
          .removeClass("synced")
          .eq(current)
          .addClass("synced")
        if($("#sync2").data("owlCarousel") !== undefined){
          center(current)
        }
      }
     
      $("#sync2").on("click", ".owl-item", function(e){
        e.preventDefault();
        var number = $(this).data("owlItem");
        sync1.trigger("owl.goTo",number);
      });
     
      function center(number){
        var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
        var num = number;
        var found = false;
        for(var i in sync2visible){
          if(num === sync2visible[i]){
            var found = true;
          }
        }
     
        if(found===false){
          if(num>sync2visible[sync2visible.length-1]){
            sync2.trigger("owl.goTo", num - sync2visible.length+2)
          }else{
            if(num - 1 === -1){
              num = 0;
            }
            sync2.trigger("owl.goTo", num);
          }
        } else if(num === sync2visible[sync2visible.length-1]){
          sync2.trigger("owl.goTo", sync2visible[1])
        } else if(num === sync2visible[0]){
          sync2.trigger("owl.goTo", num-1)
        }
        
      }


		  $(".owl-arrow-right").click(function(){
		    sync1.trigger('owl.next');
		  })
		  $(".owl-arrow-left").click(function(){
		    sync1.trigger('owl.prev');
		  })
     
    });

			// $(document).ready(function(){
			// 	$('.galleryx').featherlightGallery({
			// 		gallery: {
			// 			fadeIn: 300,
			// 			fadeOut: 300
			// 		},
			// 		openSpeed:    300,
			// 		closeSpeed:   300
			// 	});
			// });


document.getElementById('sync1').onclick = function (event) {
    event = event || window.event;
    var target = event.target || event.srcElement,
        link = target.src ? target.parentNode : target,
        options = {index: link, event: event},
        links = this.getElementsByTagName('a');
    blueimp.Gallery(links, options);
};