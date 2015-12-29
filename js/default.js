if ($(".indexPage").length > 0) {
	var container = document.querySelector('.outerAllPostIndex');
	var msnry = new Masonry( container, {
	itemSelector: '.itemsIndex',
	 isResizable: true,
      isAnimated: true,
          animationOptions: { 
          queue: false, 
          duration: 500 
      }
	});
	}


var url = location.href;
var regV = "/category";
var result = url.match(regV); 

// вывод результата
if (result) {
   thisCategoryDone = true;
} else {
    thisCategoryDone = false; 
}


var ua = navigator.userAgent.toLowerCase(), isOpera = (ua.indexOf('opera')  > -1), isIE = (!isOpera && ua.indexOf('msie') > -1), _countLs = 0, stop = true, thisCategoryDone, thisCatName;
function getDocumentHeight(){ // высота всей страницы вместе с невидимой частью
return Math.max(document.compatMode!='CSS1Compat'?document.body.scrollHeight:document.documentElement.scrollHeight,getViewportHeight());
}
function getDocumentWidth(){ // ширина всей страницы вместе с невидимой частью
return Math.max(document.compatMode!='CSS1Compat'?document.body.scrollWidth:document.documentElement.scrollWidth,getViewportWidth());
}
function getViewportHeight(){ // высота браузера
return ((document.compatMode||isIE)&&!isOpera)?(document.compatMode=='CSS1Compat')?document.documentElement.clientHeight:document.body.clientHeight:(document.parentWindow||document.defaultView).innerHeight;
}
function getViewportWidth(){ // ширина браузера
return ((document.compatMode||isIE)&&!isOpera)?(document.compatMode=='CSS1Compat')?document.documentElement.clientWidth:document.body.clientWidth:(document.parentWindow||document.defaultView).innerWidth;
}

$(document).ready(function(){



		$(".blockPhoto").addClass("fadeInUp");
		if($(".sectionTwoForAll").length > 0){
			$("body").addClass("footerFixed");
		}



		$(".showAdd").on("click", function(){
			if ($(".addPost").is(":visible")) {
				$(".addPost").fadeOut();
				$(this).text("Додати пост")
			}
			else{
				$(".addPost").fadeIn();
				$(this).text("Скрити форму")
			}
			

		});
		$(".disqusComments").hide();
		
		

		$(".dropRep > p").on("click", function(){
			$(".inputMrnu").hide();
			$(this).next().show();
		});

		$(".closX").on("click", function(){
			$(this).parent().hide();
		})

		$(".closerCrop").on("click",function(){
			modalCrop.closePop();
		})
		$(".opencrop").on("click",function(){
			modalCrop.showPop();
		})

		/*
		 $('.strat').on("click",function(e){
		 	e.preventDefault();
		    var formData = new FormData($('#formNewsSend')[0]); 
		    $.ajax({
		        type: "POST",
		        processData: false,
		        contentType: false,
		        url: 'http://garmata.tv/site/sendNews', 
		        data: formData,
		        success: function(result){
		        $('#outersSucsess').fadeOut(function(){
		        	$('#success h2').html(result).parent().show();
		        	$('#formNewsSend').trigger('reset');

		        });
		        setTimeout(function(){
		        	$(".closer").trigger("click");
		        	$('#success').hide();
		        	$(".outersSucsess").show();
		        },2000);
		        }
		    });
		});*/

		$("#changeFile").change(function(){
			$(".fileName").text($(this).val()).addClass("deleteInput");
		});

		$(".outerInputs > span.fileName").on("click", function(){
			$(this).text("");
			$(this).removeClass("deleteInput");
			clearFileInputField("changeFile");
		});

		

		//$('.outerAllPostIndex > div').shuffle();

		$(".openModalAbout").on("click", function(){
			$(".popUpAbout").fadeIn("slow", function(){
				$(".contentAbout").addClass("animated fadeInUpBig");
				$(".contentAbout").delay(400).animate({"opacity": "1"}, 300, function(){
					$(".contentAbout").removeClass("fadeInUpBig");
				})
			})
		});

		$(".aboutCloser").on("click", function(){
			$(".contentAbout").addClass("animated fadeOutDownBig");
				$(".popUpAbout").delay(300).fadeOut("slow", function(){
					$(".contentAbout").removeClass("fadeOutDownBig").css("opacity", "0");
				});
		})

		$(".openFormNews").on("click", function(){
			$(".popUpNewsAssept").fadeIn("slow", function(){
				$(".contentNewsAccept").addClass("animated fadeInUpBig");
				$(".contentNewsAccept").delay(400).animate({"opacity": "1"}, 300, function(){
					$(".contentNewsAccept").removeClass("fadeInUpBig");
				})
			})
		});

		$(".closer span").on("click", function(){
			
				$(".contentNewsAccept").addClass("animated fadeOutDownBig");
				$(".popUpNewsAssept").delay(300).fadeOut("slow", function(){
					$(".contentNewsAccept").removeClass("fadeOutDownBig").css("opacity", "0");
				});
			
		});

		$(".weather").hover(function(){
			w = setTimeout(function(){$(".dropMenu").fadeIn()},300);
		},function(){
			clearInterval(w);
			$(".dropMenu").fadeOut();
		});

		$(".currency").hover(function(){
			cur = setTimeout(function(){$(".dropMenuCurrency").fadeIn()},300)
		},function(){
			clearInterval(cur);
			$(".dropMenuCurrency").fadeOut();
		});

		
		$(".openClose").on("click", function(){
			var b = $(this).parent().height();

			if($(this).parent().css("top") == "0px"){
				$(this).parent().css("top", -(b-16)+"px");
				$(this).text("Відкрити опис");
			}
			else{
				$(this).parent().css("top", "0px");
				$(this).text("Приховати опис");
			}

		});
		

	 $('#slider').nivoSlider({
            effect: 'fade',
            controlNavThumbs: 'true',
             prevText: 'Prev',
    			nextText: 'Next'
        });
	 var wow = new WOW(
		  {
		    boxClass:     'wow',      // animated element css class (default is wow)
		    animateClass: 'animated', // animation css class (default is animated)
		    offset:       0,          // distance to the element when triggering the animation (default is 0)
		    mobile:       true,       // trigger animations on mobile devices (default is true)
		    live:         true,       // act on asynchronously loaded content (default is true)
		    callback:     function(box) {
		      // the callback is fired every time an animation is started
		      // the argument that is passed in is the DOM node being animated
		    }
		  }
		);
		wow.init();


	$(window).scroll(function(e){
		e.preventDefault;
		if ($(window).scrollTop() > 300) {
			$(".footerFixed footer").slideDown();
			$(".openFoot").css("opacity", "1");
			$(".toTop").css("opacity", "1");
		}
		else{
			$(".footerFixed footer").slideUp();
			$(".openFoot").css("opacity", "0");
			$(".toTop").css("opacity", "0");
			if ($(".footerFixed footer").css("bottom") == "0px") {
				$(".footerFixed footer").css({"bottom": "-420px"});
				$(".openFoot").text("Открыть").append("<span class='caret-down'></span>").animate({"bottom": "50px"}, 300);
			}
		}
	})

	$(".toTop").on("click", function(){
		$("html, body").animate({ scrollTop: 0 }, 600);
	});

	$(".openFoot").on("click", function(){
		var t = $(this);

		if($(".footerFixed footer").css("bottom") == "-420px"){
			$(".footerFixed footer").animate({"bottom": "0px"}, 200);
			t.text("Закрыть").append("<span class='caret-down'></span>").animate({"bottom": "470px"}, 300);
		}
		else{
			$(".footerFixed footer").animate({"bottom": "-420px"}, 200);
			t.text("Открыть").append("<span class='caret-down'></span>").animate({"bottom": "50px"}, 300);
		}
		
	})
	

	$('.carousel').carousel({
    itemsToShow: 1,
    itemsToCycle: 1,
    infinite: true
	});

	$(".outerGaleryPhoto ul > li").each(function(i){
		$(this).attr("data-item", "stay"+(i++));
	});
	$(".sideGenPhoto > div").each(function(i){
		$(this).attr("id", "stay"+(i++));
	});

	var a = $(".outerGaleryPhoto > ul li:first img").attr("src"), t, d = $(".outerGaleryPhoto > ul li:first img").data("item"), b, f;
	$(".outerGaleryPhoto .descrGalPhoto:first").show();
	$(".sideGenPhoto > img").attr("src", a);
	$(".outerGaleryPhoto ul li:first").addClass("activeImg");

	

	$(".outerGaleryPhoto li").on("click", function(){
		if($(this).hasClass("activeImg")){return false;}
		else{
		$(this).siblings("li").removeAttr("class");
		$(this).addClass("activeImg");
		t = $(this);
		a = $(this).children("img").attr("src");
		b = t.data("item");
		f = $('[id = '+b+']');

		$(".sideGenPhoto img").effect("drop", {"direction": "right"}, 500);

		$(".outerGaleryPhoto").find(".sideGenPhoto").find(".descrGalPhoto:visible").effect("drop", {"direction": "left"}, 500, function(){
		    	$(".sideGenPhoto > img").attr("src", a);
		    	f.effect("drop", {"direction": "left", "mode": "show"}, 500, function(){})
		    	$(".sideGenPhoto > img").effect("drop", {"direction": "right", "mode": "show"}, 500, function(){})
			});
	}
	})


	var pane = jQuery('.newsOuter');
	pane.jScrollPane(
		{
			verticalDragMaxHeight: 50,
			mouseWheelSpeed: 30,
		}
	);
	var api = pane.data('jsp');

$(".allmini .buttonforLoad").on("click", function(){
	api.scrollToBottom("swing");
	var lengthList = $(this).prev().find(".oneNews").length;
	var lastDate = $(this).prev().find(".oneNews:last").data("date");
	$.ajax({
      url: "http://garmata.tv/ajax/newsNoImage",
      global: false,
      type: "POST",
      data: ({count : lengthList, lastDate: lastDate}),
      success: function(html){
		$(".jspPane").append(html);
		api.reinitialise();
		api.scrollToBottom("swing");
      }
 
   });
});

$(".outerLevel2 .buttonforLoad").on("click", function(){
	api.scrollToBottom("swing");
	var lengthList = $(this).prev().find(".oneNews").length;
	$.ajax({
      url: "http://garmata.tv/ajax/newsWithImage",
      global: false,
      type: "POST",
      data: ({count : lengthList}),
      success: function(html){
		$(".jspPane").append(html);
		api.reinitialise();
		api.scrollToBottom("swing");
      }

   });
});



$(".forSubscribe").submit(function(e){
	e.preventDefault();
	var data = $(".forSubscribe").serialize();

	$.ajax({
      url: "http://garmata.tv/ajax/addEmail",
      global: false,
      type: "POST",
      data: data,
      success: function(html){
      	$('.forSubscribe').trigger('reset');
		$(".resultSubscribe").fadeIn().children().text(html);
		setTimeout(function(){
			$(".resultSubscribe").children().text("").parent().fadeOut();
		},3000)
      }
 
   });
})



$('.jspPane').bind('mousewheel', function(event) {
      event.preventDefault();
      var scrollTop = this.scrollTop;
      this.scrollTop = (scrollTop + ((event.deltaY * event.deltaFactor) * -1));
      api.reinitialise();
      console.log(event.deltaY, event.deltaFactor, event.originalEvent.deltaMode, event.originalEvent.wheelDelta);
    });

	searchB();
	menuWidth();
	videoSlider();
	$('.tabs').tab();
	$(".formSearch").one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend');
});


$(window).load(function(){

	$(".topForGarmata > div").each(function(){
			if($(this).width() < $(this).children("img").width()){
				$(this).children("img").css("left",  -($(this).children("img").width()-$(this).width())/2+"px" );
			}
		});
	
	setTimeout(function(){
			$(".disqusComments").text(parseInt($(".disqusComments").text())).delay(1000).show();
		},3000)

	$(".descrTitle").each(function(){
	var a = $(this).height();
	$(this).css("top", -(a-16)+"px");
	$(this).children(".openClose").text("Відкрити опис");
	});


	if ($(".indexPage").length > 0) {
	var container = document.querySelector('.outerAllPostIndex');
	var msnry = new Masonry( container, {
	itemSelector: '.itemsIndex',
	 isResizable: true,
      isAnimated: true,
          animationOptions: { 
          queue: false, 
          duration: 500 
      }
	});
	}
	

	if ($(".allVideoPage").length>0) {
	var container = document.querySelector('.clear');
	var msnry = new Masonry( container, {
	itemSelector: '.oneVideoIn'
	});
	}

	if ($(".containerBloger").length>0) {
	var container = document.querySelector('.containerBloger');
	var msnry = new Masonry( container, {
	itemSelector: '.items'
	});
	}

	if ($(".oneVideoPage").length>0) {
	var container = document.querySelector('.outerMason');
	var msnry = new Masonry( container, {
	itemSelector: '.oneVideoIn'
	});
	}

	

	$(".arhiveDrop li").append($(".pickmeup"));
	$(".pickmeup").delay(1000).fadeTo(100, 1);
	$('.pageWithoutTop .carousel').fadeTo(100, 1);
});

// сука блядь!!!!

window.onscroll = function (event)
{
if ($(".indexPage").length > 0) {
event.preventDefault();
var s = getDocumentHeight() - getViewportHeight() ;
var ls =  s - $(this).scrollTop();
console.log(ls)
if(ls < 500 &&  _countLs < 2 && stop == true){
stop = false;
var lengthList = $(".outerAllPostIndex").children().length;
console.log(_countLs +"/"+ lengthList);
	$.ajax({
      url: "http://garmata.tv/ajax/publications",
      global: false,
      type: "POST",
      data: ({count : lengthList}),
      success: function(html){
		$('.outerAllPostIndex').masonry().append(html).children().addClass("wow fadeInUp");
		$('.outerAllPostIndex').masonry('reloadItems');
		$('.outerAllPostIndex').masonry('layout');
		//$(".materials").css("margin-bottom","150px");
		 _countLs++;
		 setTimeout(function(){
		 	stop = true;
		 })
      }

   });

}
}

if ($(".sectionTwoForAll").length > 0) {
event.preventDefault();
if(thisCategoryDone == true){
	thisCatName = $(".blockNews").data("item");
}
var s = getDocumentHeight() - getViewportHeight() ;
var ls =  s - $(this).scrollTop();
if(ls < 500 && stop == true){
stop = false;
var lengthPhoto = $(".photo").children(".blockPhoto").length;
var lengthVideo = $(".video").children(".blockVideo").length;
var lengthNews = $(".news").children(".blockNews").length;
var dataText = (location.pathname.indexOf("date") > -1) ? location.pathname.split("/") : null;
var data = null;

	if(dataText){
		for (var i = 0; i < data.length; i++) {
			var matchea_array = data[i].match(/\d{0,2}-\d{0,2}-\d{0,4}/i);
			if(matches_array){
				var data = matches_array[0];
			}
			break;
		};	
	}


	$.ajax({
      url: "http://garmata.tv/ajax/moreAllPhotos",
      global: false,
      type: "POST",
      data: ({count : lengthPhoto, category : thisCatName, data: data}),
      success: function(html){
      	if(html){
      	$('.photo').append(html);
		 setTimeout(function(){
		 	stop = true;
		 },300)	
      	}
      }

   });
	$.ajax({
      url: "http://garmata.tv/ajax/moreAllVideos",
      global: false,
      type: "POST",
      data: ({count : lengthVideo, category : thisCatName, data: data}),
      success: function(html){
      	if(html){
		$('.video').append(html);
		 setTimeout(function(){
		 	stop = true;
		 },300)
		} 
      }

   });
	$.ajax({
      url: "http://garmata.tv/ajax/moreAllNews",
      global: false,
      type: "POST",
      data: ({count : lengthNews, category : thisCatName, data: data}),
      success: function(html){
      	if(html){
		$('.news').append(html);
		 setTimeout(function(){
		 	stop = true;
		 },300)
		}
      }

   });
}	
}
}


function menuWidth(){
	var a = $(".topMenu > li:first").outerWidth();
	$(".outDropDown > li").width(a);
	$(".inDrop").css("left", a+"px");
}

function searchB() {
	$(".searchButton").hover(function(){
		$(".search .button").hide();
		$(this).prev().css("z-index", "1");
		$(this).addClass("searchButtonActive");
		$(this).prev().addClass("animate bounceIn").animate({"opacity": "1"}, function(){
			$(".closersForm").fadeIn();
			$(".search .button").delay(300).show();

		});
		
	});

	$(".closersForm").on("click", function(){
		$(this).fadeOut("fast", function(){
			$(this).next().removeClass("animate bounceIn").animate({"opacity": "0", "z-index": "-1"});
			$(this).next().next().removeClass("searchButtonActive");

		})
	});
}

function clearFileInputField(Id) { 
  document.getElementById(Id).innerHTML = document.getElementById(Id).innerHTML; 
}


var modalCrop = {}
modalCrop.showPop = function(){
				$(".popupForCropImg").fadeIn();
			}
modalCrop.closePop = function(){
				$(".popupForCropImg").fadeOut();
			}


function videoSlider(){
	
	var totWidth=0;
	var positions = new Array();
	
	$('#slides .slides').each(function(i){
		
		
		
		positions[i]= totWidth;
		totWidth += $(this).width();
	
		
		if(!$(this).width())
		{
			alert("Please, fill in width & height for all your images!");
			return false;
		}
		
	});
	
	$('#slides').width(totWidth);


	$('#menu ul li a').click(function(e,keepScroll){


			$('li.menuItem').removeClass('act').addClass('inact');
			$(this).parent().addClass('act');
			
			var pos = $(this).parent().prevAll('.menuItem').length;
			
			$('#slides').stop().animate({marginLeft:-positions[pos]+'px'},450);
			
			e.preventDefault();


			if(!keepScroll) clearInterval(itvl);
	});
	
	$('#menu ul li.menuItem:first').addClass('act').siblings().addClass('inact');
	 
	var current=1;
	function autoAdvance()
	{
		if(current==-1) return false;
		
		$('#menu ul li a').eq(current%$('#menu ul li a').length).trigger('click',[true]);	// [true] will be passed as the keepScroll parameter of the click function on line 28
		current++;
	}
	
	var changeEvery = 10;

	var itvl = setInterval(function(){autoAdvance()},changeEvery*4000);

}