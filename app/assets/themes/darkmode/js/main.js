$(document).ready(function() {
    "use strict";

    new WOW().init();
    $(document).on('click', 'button.navbar-toggler', function() {
        $('.side-nav').toggleClass('show')
    });
    $(document).on('click', '.side-nav button.cross', function() {
        $('.side-nav').removeClass('show')
    });
    $(document).on('mouseover' , '.dropdown button.dropdown-toggle' , function() {
        $('.navbar-nav').find('.dropdown-menu').removeClass('show');
        $(this).parent('.dropdown').find('.dropdown-menu').addClass('show');

    });
    $(document).on('mouseleave','.dropdown-menu',function() {
        $(this).removeClass('show');
    });
    $(document).on('mouseleave', '.navbar', function() {
        $('.navbar').find('.dropdown-menu.show').removeClass('show');
    });
    $(document).on('mouseleave', '.side-nav', function() {
        $('.side-nav').find('.dropdown-menu.show').removeClass('show');
    });
  	$('.popup-gallery').each(function() {
        var $imageLinks = $(this).find('.popup-image');
        var items = [];
        $imageLinks.each(function() {
            var $item = $(this);
            var type = 'image';
            if ($item.hasClass('video')) {
                type = 'iframe';
            }
            var magItem = {
                src: $item.attr('href'),
                type: type
            };
            magItem.title = $item.data('title');
            items.push(magItem);
        });
        $imageLinks.magnificPopup({
            mainClass: 'mfp-fade',
            items: items,
            gallery:{
                enabled:true,
                tPrev: $(this).data('prev-text'),
                tNext: $(this).data('next-text')
            },
            type: 'image',
            callbacks: {
                beforeOpen: function() {
                    var index = $imageLinks.index(this.st.el);
                    if (-1 !== index) {
                    this.goTo(index);
                    }
                }
            }
        });
    });
	$('.popup-insta').magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: 'Loading image #%curr%...',
		mainClass: 'mfp-img-mobile',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
		}
	});
	$('.popup-product-image').magnificPopup({
		type: 'image'
	});
	$('.services-slider').slick({
	  dots: true,
	  infinite: true,
	  speed: 800,
	  slidesToShow: 3,
	  slidesToScroll: 3,
	  responsive: [
	    {
	      breakpoint: 1199,
	      settings: {
	        slidesToShow: 2,
	        slidesToScroll: 2,
	        infinite: true,
	        dots: true
	      }
	    },
	    {
	      breakpoint: 768,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    },
	  ]
	});
	$('.testimonial-slider').slick({
	  dots: true,
	  infinite: true,
	  speed: 800,
	  slidesToShow: 2,
	  slidesToScroll: 2,
	  responsive: [
	    {
	      breakpoint: 768,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    },
	  ]
	});
	$(".backstage-photo-slider").slick({
        dots: true,
        vertical: true,
        slidesToShow: 3,
        slidesToScroll: 1
     });
	$(".best-seller-slider").slick({
        dots: true,
        vertical: true,
        slidesToShow: 3,
        slidesToScroll: 1
     });


    $( "#datepicker-footer" ).datepicker({
        minDate:new Date()
    });
	$( "#datepicker-booking" ).datepicker({
      minDate:new Date()
    });


  	$(document).on('mouseover', '.skills-bar div', function() {
  		$('.skills-bar div').not(this).removeClass('hover');
  		$(this).addClass('hover');
  	});
  	$(document).on('click','.comment .reply-btn', function() {
  		$(this).parents('.comment').find('.write-reply').slideToggle();
  	});
	/*============== video ===============*/
	var video = document.querySelector(".behind-the-seen-video video");
	var bar = document.querySelector(".progress-bar-flag");
	var btn = document.getElementById("play-pause");

	function togglePlayPause() {
		if(video.paused){
			btn.className = 'pause';
			video.play();
		}
		else{
			btn.className = 'play';
			video.pause();
		}
	}
	$(document).on('click', '#play-pause' , function() {
		togglePlayPause();
	});
	if (video) {
	video.addEventListener('timeupdate', function() {
		var barPos = video.currentTime / video.duration ;
		bar.style.width = barPos * 100 + "%";
	});
	}
	/*============     Product Detailas slider     ==========*/
	$('.product-image-slider').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  arrows: false,
	  fade: true,
	  asNavFor: '.product-image-nav'
	});
	$('.product-image-nav').slick({
	  slidesToShow: 3,
	  slidesToScroll: 1,
	  asNavFor: '.product-image-slider',
	  dots: false,
	  focusOnSelect: true
	});
	$('.product-image-slider').magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: 'Loading image #%curr%...',
		mainClass: 'mfp-img-mobile',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
		}
	});
	$("#quantity" ).spinner();
	$("#size").selectmenu();
	$('.reladet-products-slider').slick({
	  dots: true,
	  infinite: true,
	  speed: 800,
	  slidesToShow: 3,
	  slidesToScroll: 3,
	  responsive: [
	    {
	      breakpoint: 1199,
	      settings: {
	        slidesToShow: 2,
	        slidesToScroll: 2,
	        infinite: true,
	        dots: true
	      }
	    },
	    {
	      breakpoint: 768,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    },
	  ]
	});
	$('#time-counter').flipper('init');
	$(document).on('click','button.forget',function(e){
		e.preventDefault();
		$('.login-content').removeClass('show');
		$('.forget-pass-content').addClass('show');
	});
	$(document).on('click','button.signup-btn',function(e){
		e.preventDefault();
		$('.login-content').removeClass('show');
		$('.forget-pass-content').removeClass('show');
		$('.signup-content').addClass('show');
	});

	$(document).on('click','button.login-btn',function(e){
		e.preventDefault();
		$('.signup-content').removeClass('show');
		$('.forget-pass-content').removeClass('show');
		$('.login-content').addClass('show');
	});

    $(document).on('click','.close-all-modal',function(e){
        $('#signin').modal('hide');

    });
});

var gallery = $('.gallery-body');
if (gallery.length) {
var mixer = mixitup(gallery);
}
var blogFillter = $('.blog-fillter');
if (blogFillter.length) {
var mixer = mixitup(blogFillter);
}
new WOW().init();


/*============= Login, Registration & Reset Password Request Modal  ===============*/


function selectedCountryCode() {
    $('input[name=country_code]').val($('.country_code').find(':selected').data("code"))
}
selectedCountryCode();

$(document).on('change', ".country_code", function () {
    selectedCountryCode();
});

$(document).on('change keyup', "input, select, textarea", function () {
    $(this).siblings(".text-danger").text(``);
});

$(document).on('change keyup', "input[name=phone]", function () {
    $(this).parents(".form-group").find('.text-danger').text(``);
});


$(document).on('submit', '#login-form', function (e) {
    e.preventDefault();
    var url = $(this).attr('action');
    var formData = new FormData($(this)[0]);

    $('.emailError').text(``);
    $('.usernameError').text(``);
    $('.passwordError').text(``);

    $.ajax({
        type: "post",
        url: url,
        data: formData,
        cache: false,
        async: false,
        processData: false,
        contentType: false,
        success: function (data) {
            $('.login-auth-btn').html(`<i class="fa fa-spinner"></i> Processing..`);
            setTimeout(function () {
                location.href = data;
                $('.login-auth-btn').text(`Success`);
            }, 2000);
        },
        error: function (res) {
            if (res.status == 422) {
                $('.emailError').text(res.responseJSON.errors.email);
                $('.usernameError').text(res.responseJSON.errors.username);
                $('.passwordError').text(res.responseJSON.errors.password);
            }
            if (res.status == 429) {
                $('.emailError').text(res.responseJSON.errors.email);
                $('.usernameError').text(res.responseJSON.errors.username);
            }
            else if (res.status == 401) {
                $('.usernameError').text(res.responseJSON);
            }
        }
    })
});



$(document).on('submit', '#signup-form', function (e) {
    e.preventDefault();
    var url = $(this).attr('action');
    var formData = new FormData($(this)[0]);
    $('.text-danger').text(``);

    $.ajax({
        type: "post",
        url: url,
        data: formData,
        cache: false,
        async: false,
        processData: false,
        contentType: false,
        success: function (data) {


            $('.login-signup-auth-btn').html(`<i class="fa fa-spinner"></i> Loading`);
            setTimeout(function () {
                location.href = data;
                $('.login-signup-auth-btn').text(`Success`);
            }, 2000);
        },
        error: function (res) {
            if (res.status == 422) {
                $('.firstnameError').text(res.responseJSON.errors.firstname);
                $('.lastnameError').text(res.responseJSON.errors.lastname);
                $('.usernameError').text(res.responseJSON.errors.username);
                $('.emailError').text(res.responseJSON.errors.email);
                $('.phoneError').text(res.responseJSON.errors.phone);
                $('.passwordError').text(res.responseJSON.errors.password);
            }
            if (res.status == 429) {
                $('.emailError').text(res.responseJSON.errors.email);
                $('.usernameError').text(res.responseJSON.errors.username);
            }
        }
    })
});


$(document).on('submit', '#reset-form', function (e) {
    e.preventDefault();
    var url = $(this).attr('action');
    var formData = new FormData($(this)[0]);
    $('.text-danger').text(``);
    $.ajax({
        type: "post",
        url: url,
        data: formData,
        cache: false,
        async: false,
        processData: false,
        contentType: false,
        success: function (data) {

            if(data.status == 200){
                Notiflix.Notify.Success(""+data.message);
                $('.login-recover-auth-btn').html(`<i class="fa fa-spinner"></i> Loading`);
                setTimeout(function () {
                    $('.login-recover-auth-btn').text(`Success`);


                    $("#modal-login").removeClass("modal-open");
                }, 2000);


            }
        },
        error: function (res) {

            if (res.status == 422) {
                $('.emailError').text(res.responseJSON.errors.email);
            }
            if (res.status == 429) {
                $('.emailError').text(res.responseJSON.errors.email);
            }
        }
    })
});
