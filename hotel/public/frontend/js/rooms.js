!function(t){t(document).ready(function(){t(".lst-search-location").each(function(){t(this).autocomplete({autoSelectFirst:!0,minChars:2,lookup:function(e,a){t.ajax({url:APP_URL+"/ajax_search",type:"POST",dataType:"json",data:{query:e},success:function(t){var e={};if(e.suggestions=[],t.country.length&&t.country[0]&&e.suggestions.push({value:t.country[0].display_text,data:t.country[0].id,type:t.country[i].type}),t.state.length)for(var i=0;i<=3;i++)t.state[i]&&e.suggestions.push({value:t.state[i].display_text,data:t.state[i].id,type:t.state[i].type});if(t.city.length)for(var i=0;i<=3;i++)t.city[i]&&e.suggestions.push({value:t.city[i].display_text,data:t.city[i].id,type:t.city[i].type});if(t.area.length)for(var i=0;i<=3;i++)t.area[i]&&e.suggestions.push({value:t.area[i].display_text,data:t.area[i].id,type:t.area[i].type});if(t.destination.length)for(var i=0;i<=3;i++)t.destination[i]&&e.suggestions.push({value:t.destination[i].display_text,data:t.destination[i].id,type:t.destination[i].type});if(t.room.length)for(var i=0;i<=20;i++)t.room[i]&&e.suggestions.push({value:t.room[i].display_text,data:t.room[i].id,type:t.room[i].type});e.suggestions.length||e.suggestions.push({value:"No result",data:"",type:"LOCATION"}),a(e)}})},onSelect:function(e){t(".lst-sid").val(e.data),t(".lst-search-type").val(e.type)}})})})}(jQuery),app.controller("rooms_detail",["$scope","$http","$filter",function(t,e,a){function i(){$("#lst_affix_booking2 .search-checkin").datepicker({minDate:0,dateFormat:"dd-mm-yy",beforeShow:function(e,a){$(".ui-datepicker").addClass("loading");var i=t.room_id;$.ajax({method:"POST",url:APP_URL+"/rooms/rooms_calendar",dataType:"json",data:{data:i},success:function(t){$(".ui-datepicker").removeClass("loading"),$("#lst_affix_booking2 .search-checkin").datepicker("hide"),$("#lst_affix_booking2 .search-checkin").datepicker("destroy"),$("#room_blocked_dates").val(t.not_available),$("#calendar_available_price").val(t.changed_price),$("#room_available_price").val(t.price);var a=$("#room_blocked_dates").val(),i=t.checkout_available;$("#room_available_price").val(),$("#calendar_available_price").val(),t.changed_price,t.currency_symbol;$("#list_checkin").datepicker({minDate:0,dateFormat:"dd-mm-yy",showButtonPanel:!0,beforeShowDay:function(t){var e=jQuery.datepicker.formatDate("yy-mm-dd",t),i=new Date;return i.setDate(i.getDate()-1),a.indexOf(e)==-1,[a.indexOf(e)==-1]},onSelect:function(t){var e=$("#list_checkin").datepicker("getDate");e.setDate(e.getDate()+1),$("#list_checkout").datepicker("setDate",e),$("#list_checkout").datepicker("option","minDate",e),setTimeout(function(){$("#list_checkout").datepicker("show")},20);var a=$(this).val(),e=$("#list_checkout").val(),i=$("#number_of_guests").val();$(".js-book-it-status").addClass("loading"),n(e,a,i),$(".tooltip").hide(),t!=new Date&&$(".ui-datepicker-today").removeClass("ui-datepicker-today")}}),$(document).on("mouseenter",".ui-datepicker-calendar .ui-state-hover",function(t){$(".highlight").tooltip({container:"body"})}),$("#list_checkout").datepicker({minDate:1,dateFormat:"dd-mm-yy",showButtonPanel:!0,beforeShowDay:function(t){var e=jQuery.datepicker.formatDate("yy-mm-dd",t);return i.indexOf(e)>0?[!0]:(a.indexOf(e)==-1,[a.indexOf(e)==-1])},onSelect:function(){$(".tooltip").hide()},onClose:function(){var t=$("#list_checkin").datepicker("getDate"),e=$("#list_checkout").datepicker("getDate");if(null!=t&&e<=t){var a=$("#list_checkout").datepicker("option","minDate");$("#list_checkout").datepicker("setDate",a)}var e=$(this).val(),t=$("#list_checkin").val(),i=$("#number_of_guests").val();""!=t&&($(".js-book-it-status").addClass("loading"),n(e,t,i))}}),$(e).datepicker("show")},headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")}})}})}function o(){if(""!=$("#url_checkin").val()&&""!=$("#url_checkout").val()&&""!=$("#url_guests").val()){$("#list_checkin").datepicker("setDate",new Date($("#url_checkin").val())),$("#list_checkout").datepicker("setDate",new Date($("#url_checkout").val())),$("#list_checkout").datepicker("option","minDate",new Date($("#url_checkin").val()));var t=0==$("#url_guests").val()?1:$("#url_guests").val();$("#number_of_guests").val(t),$("#message_checkin").datepicker("setDate",new Date($("#url_checkin").val())),$("#message_checkout").datepicker("setDate",new Date($("#url_checkout").val())),$("#message_checkout").datepicker("option","minDate",new Date($("#url_checkin").val())),$("#message_guests").val(t);var e=$("#list_checkin").val(),a=$("#list_checkout").val(),i=$("#number_of_guests").val();n(a,e,i)}if(""!=$("#list_checkin").val()&&""!=$("#list_checkout").val()&&""!=$("#number_of_guests").val()){var e=$("#list_checkin").val(),a=$("#list_checkout").val(),i=0==$("#number_of_guests").val()?1:$("#number_of_guests").val();n(a,e,i)}}function n(t,a,i){var o=$('input[name="room_id"]').val();$(".js-subtotal-container").show(),e.post("price_calculation",{checkin:a,checkout:t,guest_count:i,room_id:o}).then(function(t){if("Not available"==t.data.status)return t.data.message&&$("#book_it_disabled_message").html(t.data.message),$(".js-subtotal-container").hide(),$("#book_it_disabled").show(),$(".js-book-it-btn-container").hide(),!1;"HA available"==t.data.status?($(".js-subtotal-container").show(),$("#book_it_disabled").hide(),$(".js-book-it-btn-container").show(),$("#ha_total_night_price").closest("tr").show(),$("#week_end_price").closest("tr").hide(),$("#normal_nights_price").closest("tr").hide(),t.data.rooms_price?$("#ha_rooms_price").text(window.lst_convert_currency(t.data.rooms_price)):$("#ha_rooms_price").text(0),t.data.total_nights?$("#ha_night").text(window.lst_convert_currency(t.data.total_nights)):$("#ha_night").text(0),t.data.total_night_price?$("#ha_total_night_price").text(window.lst_convert_currency(t.data.total_night_price)):$("#ha_total_night_price").text(0)):($(".js-subtotal-container").show(),$("#book_it_disabled").hide(),$(".js-book-it-btn-container").show()),$(".js-book-it-status").removeClass("loading"),t.data.normal_nights?$("#normal_nights").text(window.lst_convert_currency(t.data.normal_nights)):$("#normal_nights").text(0),t.data.week_end_days?$("#week_end_days").text(window.lst_convert_currency(t.data.week_end_days)):$("#week_end_days").text(0),t.data.week_end_price?$("#week_end_price").text(window.lst_convert_currency(t.data.week_end_price)):$("#week_end_price").text(0),t.data.normal_prices?$("#normal_nights_price").text(window.lst_convert_currency(t.data.normal_prices)):$("#normal_nights_price").text(0),t.data.special_nights_count?$("#special_nights_count").text(window.lst_convert_currency(t.data.special_nights_count)):$("#special_nights_count").text(0),t.data.special_nights_price?$("#special_nights_price").text(window.lst_convert_currency(t.data.special_nights_price)):$("#special_nights_price").text(0),t.data.special_one_night_price?$("#special_one_night_price").text(window.lst_convert_currency(t.data.special_one_night_price)):$("#special_one_night_price").text(0),t.data.month_count?($("#month_count").text(window.lst_convert_currency(t.data.month_count)),$(".days-split-box").hide(),$(".month-split-box").show()):($("#month_count").text(0),$(".month-split-box").hide(),$(".days-split-box").show()),t.data.month?$("#one_month_price").text(window.lst_convert_currency(t.data.month)):$("#one_month_price").text(0),t.data.month_price?($("#month_price").text(window.lst_convert_currency(t.data.month_price)),$(".days-split-box").hide(),$(".month-split-box").show()):($("#month_price").text(0),$(".month-split-box").hide(),$(".days-split-box").show()),t.data.month_days_remaining_price?($("#month_days_remaining_price").text(window.lst_convert_currency(t.data.month_days_remaining_price)),$(".days-split-box").hide(),$(".month-split-box").show()):($("#month_days_remaining_price").text(0),$(".month-split-box").hide(),$(".days-split-box").show()),t.data.month_days_remaining?($("#month_days_remaining").text(window.lst_convert_currency(t.data.month_days_remaining)),$(".days-split-box").hide(),$(".month-split-box").show()):($("#month_days_remaining").text(0),$(".month-split-box").hide(),$(".days-split-box").show()),t.data.month_per_day_price?$("#month_per_day_price").text(window.lst_convert_currency(t.data.month_per_day_price)):$("#month_per_day_price").text(0),t.data.service_fee?$("#service_fee").text(window.lst_convert_currency(t.data.service_fee)):$("#service_fee").text(0),t.data.total?$("#total").text(window.lst_convert_currency(t.data.total)):$("#total").text(0);var e=t.data.rooms_price;e?$("#rooms_price_amount").text(window.lst_convert_currency(e)):$("#rooms_price_amount").text(0);var a=t.data.total_nights;a?$("#rooms_average_day").text(window.lst_convert_currency(a)):$("#rooms_average_day").text(0);var i=t.data.total_night_price;i?$(".rooms_average_total_price").text(window.lst_convert_currency(i)):$(".rooms_average_total_price").text(0);var o=t.data.night;o?$("#rooms_normal_day_price").text(window.lst_convert_currency(o)):$("#rooms_normal_day_price").text(0),t.data.week_end_price?$("#rooms_price_amount_weekend").text(window.lst_convert_currency(t.data.week_end_price/t.data.week_end_days)):$("#rooms_price_amount_weekend").text(0),t.data.additional_guest?($(".additional_price").show(),$("#additional_guest").text(window.lst_convert_currency(t.data.additional_guest))):$(".additional_price").hide(),t.data.security_fee?($(".security_price").show(),$(".security_fee").text(window.lst_convert_currency(t.data.security_fee))):$(".security_price").hide(),t.data.service_fee&&$(".service_fee").text(window.lst_convert_currency(t.data.service_fee)),t.data.host_fee?($(".host_fee_price").show(),$("#host_fee").text(window.lst_convert_currency(t.data.host_fee))):$(".host_fee_price").hide();var n=t.data.service_fee+t.data.security_fee+t.data.host_fee;n&&$("#total_service_fee").text(window.lst_convert_currency(n)),t.data.cleaning_fee?($(".cleaning_price").show(),$("#cleaning_fee").text(window.lst_convert_currency(t.data.cleaning_fee))):$(".cleaning_price").hide()})}$(".expandable-trigger-more").click(function(){$(".all_description").addClass("expanded")}),$(".rooms_amenities_after").hide(),$(".amenities_trigger").click(function(){$(".rooms_amenities_before").hide(),$(".rooms_amenities_after").show()}),i(),o(),$("#number_of_guests").change(function(){var t=$(this).val(),e=$("#list_checkin").val(),a=$("#list_checkout").val();""!=e&&""!=a&&($(".js-book-it-status").addClass("loading"),n(a,e,t))}),$(".additional_price").hide(),$(".security_price").hide(),$(".cleaning_price").hide(),$("#book_it_disabled").hide(),$(".month-split-box").hide(),$("#contact-host-link, #host-profile-contact-btn").click(function(){$(".contact-modal").removeClass("hide")}),$(document).on("click",".rich-toggle-unchecked,.rich-toggle-checked",function(a){return a.preventDefault(),"object"==typeof USER_ID?(window.location.href=APP_URL+"/login",!1):($(".wl-modal__modal").removeClass("hide"),$(".wl-modal__col:nth-child(2)").addClass("hide"),$(".row-margin-zero").append('<div id="wish-list-signup-container" style="overflow-y:auto;" class="col-lg-5 wl-modal__col-collapsible"> <div class="loading wl-modal__col"> </div> </div>'),void e.get(APP_URL+"/wishlist_list?id="+t.room_id,{}).then(function(e){$("#wish-list-signup-container").remove(),$(".wl-modal__col:nth-child(2)").removeClass("hide"),t.wishlist_list=e.data}))}),t.wishlist_row_select=function(a){e.post(APP_URL+"/save_wishlist",{data:t.room_id,wishlist_id:t.wishlist_list[a].id,saved_id:t.wishlist_list[a].saved_id}).then(function(e){e.data.has_wishlist?t.save_wl=1:t.save_wl=0,"null"==e.data.result?t.wishlist_list[a].saved_id=null:t.wishlist_list[a].saved_id=e.data.result}),$("#wishlist_row_"+a).hasClass("text-dark-gray")?t.wishlist_list[a].saved_id=null:t.wishlist_list[a].saved_id=1},$(document).on("submit",".wl-modal-footer__form",function(a){a.preventDefault(),$(".wl-modal__col:nth-child(2)").addClass("hide"),$(".row-margin-zero").append('<div id="wish-list-signup-container" style="overflow-y:auto;" class="col-lg-5 wl-modal__col-collapsible"> <div class="loading wl-modal__col"> </div> </div>'),e.post(APP_URL+"/wishlist_create",{data:$(".wl-modal-footer__input").val(),id:t.room_id}).then(function(e){$(".wl-modal-footer__form").addClass("hide"),$("#wish-list-signup-container").remove(),$(".wl-modal__col:nth-child(2)").removeClass("hide"),t.wishlist_list=e.data,a.preventDefault()}),a.preventDefault()}),$(".wl-modal__modal-close").click(function(){var e=a("filter")(t.wishlist_list,{saved_id:null});e.length==t.wishlist_list.length?$("#wishlist-button").prop("checked",!1):$("#wishlist-button").prop("checked",!0),$(".wl-modal__modal").addClass("hide")})}]),$("#view-calendar").click(function(){return $("#list_checkin").trigger("select"),!1}),$(".js-book-it-btn-container").click(function(){var t=$("#list_checkin").val(),e=$("#list_checkout").val();if(""==t&&""==e)return $("#list_checkin").trigger("select"),!1}),$(document).ready(function(){function t(t){var e=$(document).scrollTop();$("ul.subnav-list li a").each(function(){var t=$(this),a=$(t.attr("href"));if(void 0!=t.attr("data-extra")){var i=$(t.attr("data-extra"));i.position().top-80<=e&&i.position().top+i.height()>e&&($("ul.subnav-list li a").attr("aria-selected","false"),t.attr("aria-selected","true"))}a.position().top-80<=e&&a.position().top+a.height()>e&&($("ul.subnav-list li a").attr("aria-selected","false"),t.attr("aria-selected","true"))})}$('[data-behavior="modal-close"]').click(function(){$(".contact-modal").addClass("hide"),$(".contact-modal").attr("aria-hidden","true")}),$(document).ready(function(){$(document).on("scroll",t)})}),$(".list-testimonial").owlCarousel({loop:!0,margin:20,dots:!0,nav:!0,navText:["<span class='lst-icon-thin-arrow-right'></span>","<span class='lst-icon-thin-arrow-left'></span>"],responsive:{0:{items:1,nav:!1,dots:!0},600:{items:2,nav:!1,dots:!0},768:{items:2,nav:!1,dots:!0},960:{items:2,dotsEach:2,dots:!0},1e3:{items:2,nav:!0,dotsEach:2,dots:!0},1200:{items:2,nav:!0,dotsEach:2,dots:!0}}}),$(".owl-carousel-2").owlCarousel({loop:!0,margin:20,dots:!1,nav:!0,navText:["<span class='lst-icon-thin-arrow-right'></span>","<span class='lst-icon-thin-arrow-left'></span>"],responsive:{0:{items:1,nav:!1,dots:!0},600:{items:2,nav:!1},768:{items:2,nav:!1},960:{items:3,dotsEach:3},1e3:{items:3,nav:!0,dotsEach:3},1200:{items:3,nav:!0,dotsEach:3}}}),$(".owl-carousel").owlCarousel({loop:!0,margin:20,dots:!0,nav:!0,navText:["<span class='lst-icon-thin-arrow-right'></span>","<span class='lst-icon-thin-arrow-left'></span>"],responsive:{0:{items:1,nav:!1,dots:!1},600:{items:2,nav:!1},768:{items:2,nav:!1},960:{items:3,dotsEach:3},1e3:{items:3,nav:!0,dotsEach:3},1200:{items:4,nav:!0,dotsEach:3}}}),function(t){t(document).ready(function(){function e(){if(t(window).width()>991){var e=t("#single-slider-container").height(),a=t("#lst_header").height();height_prize=t(".book-it-prize").height(),height_place=t("#neighborhood").height(),height_footer=t("footer").height(),height_relate=t(".related-room").height(),height_room_blog=t(".related-room-blog").height(),offset_top=parseInt(e)+parseInt(a)-parseInt(height_prize),offset_bottom=parseInt(height_place)+parseInt(height_footer)+parseInt(height_relate)+parseInt(height_room_blog)+100,t("#lst_affix_booking2 .check-booking-sb").affix({offset:{top:offset_top,bottom:offset_bottom}}),t("#menu_hidden").affix({offset:{top:offset_top}})}else t(window).off(".affix"),t("#lst_affix_booking2 .check-booking-sb").removeClass("affix affix-top affix-bottom").removeData("bs.affix")}t("#slide-samelocation").slick({slidesToShow:3,arrows:!1,dots:!1,responsive:[{breakpoint:768,settings:{slidesToScroll:1,slidesToShow:2}},{breakpoint:480,settings:{slidesToScroll:1,slidesToShow:1}}]}),t("#single-slider").removeClass("hide"),t("#single-slider").slick({centerMode:!0,slidesToShow:1,variableWidth:!0,draggable:!0,prevArrow:".slider-control.prev",nextArrow:".slider-control.next",dots:!0,swipe:!0,swipeToSlide:!0,speed:500,focusOnSelect:!0,lazyLoad:"progressive",touchMove:!0,touchThreshold:100}),t("#lst_affix_booking").affix({offset:{top:function(){return t("#lst_main_single").offset().top},bottom:function(){var e=t("#lst_main_content").offset().top,a=t("#lst_main_content").height();return t(document).height()-e-a+20}}}),t("#box_more_info").readmore({speed:1e3,startOpen:!0,moreLink:'<span class="center-more-info"><a href="javascript:void(0)"><u>'+lang.readmore+"</u></a></span>",lessLink:'<span class="center-more-info lst-show-less"><a href="javascript:void(0)"><u>'+lang.un_readmore+"</u></a></span>"});var a=function(e){var a=!1;t(".lst-gallery-show-album li").each(function(){t(this).click(function(){a=!0})}),t("#single-slider").on("beforeChange",function(t,e,i,o){a=i==o});for(var i=function(e){for(var e,a,i,o,n=t(e).find(".lst-photo-item"),s=n.length,r=[],l=0;l<s;l++)if(e=n[l],1===e.nodeType){a=e.children,i=e.getAttribute("data-size").split("x"),o={src:e.getAttribute("href"),w:parseInt(i[0],10),h:parseInt(i[1],10),author:e.getAttribute("data-author")},o.el=e,a.length>0&&(o.msrc=a[0].getAttribute("src"),a.length>1&&(o.title=a[1].innerHTML));var c=e.getAttribute("data-med");c&&(i=e.getAttribute("data-med-size").split("x"),o.m={src:c,w:parseInt(i[0],10),h:parseInt(i[1],10)}),o.o={src:o.src,w:o.w,h:o.h},r.push(o)}return r},o=function(e){e=e||window.event,e.preventDefault?e.preventDefault():e.returnValue=!1;var i=e.target||e.srcElement,o=t(i).closest(".lst-photo-item")[0];if(o){for(var n,r=t(o).closest(".lst-photo-gallery")[0],l=t(r).find(".lst-photo-item"),c=l.length,d=0,_=0;_<c;_++)if(1===l[_].nodeType){if(l[_]===o){n=d;break}d++}return n>=0&&a&&s(n,r),!1}},n=function(){var t=window.location.hash.substring(1),e={};if(t.length<5)return e;for(var a=t.split("&"),i=0;i<a.length;i++)if(a[i]){var o=a[i].split("=");o.length<2||(e[o[0]]=o[1])}return e.gid&&(e.gid=parseInt(e.gid,10)),e},s=function(t,e,a,o){var n,s,r=document.querySelectorAll(".pswp")[0];if(s=i(e),n={galleryUID:e.getAttribute("data-pswp-uid"),getThumbBoundsFn:function(t){var e=s[t].el.children[0],a=window.pageYOffset||document.documentElement.scrollTop,i=e.getBoundingClientRect();return{x:i.left,y:i.top+a,w:i.width}},addCaptionHTMLFn:function(t,e,a){return t.title?(e.children[0].innerHTML=t.title+"<br/><small>Photo: "+t.author+"</small>",!0):(e.children[0].innerText="",!1)},getDoubleTapZoom:function(t,e){return t?1:e.initialZoomLevel<.7?1:1.5},closeOnScroll:!1},o)if(n.galleryPIDs){for(var l=0;l<s.length;l++)if(s[l].pid==t){n.index=l;break}}else n.index=parseInt(t,10)-1;else n.index=parseInt(t,10);if(!isNaN(n.index)){for(var c="radio-all-controls",d=0,_=c.length;d<_;d++)if(c[d].checked){"radio-all-controls"==c[d].id||"radio-minimal-black"==c[d].id&&(n.mainClass="pswp--minimal--dark",n.barsSize={top:0,bottom:0},n.captionEl=!1,n.fullscreenEl=!1,n.shareEl=!1,n.bgOpacity=.85,n.tapToClose=!0,n.tapToToggleControls=!1);break}a&&(n.showAnimationDuration=0),window.gallery=new PhotoSwipe(r,PhotoSwipeUI_Default,s,n);var h,u,p=!1,m=!0;window.gallery.listen("beforeResize",function(){var t=window.devicePixelRatio?window.devicePixelRatio:1;t=Math.min(t,2.5),h=window.gallery.viewportSize.x*t,h>=1200||!window.gallery.likelyTouchDevice&&h>800||screen.width>1200?p||(p=!0,u=!0):p&&(p=!1,u=!0),u&&!m&&window.gallery.invalidateCurrItems(),m&&(m=!1),u=!1}),window.gallery.listen("gettingData",function(t,e){p?(e.src=e.o.src,e.w=e.o.w,e.h=e.o.h):(e.src=e.m.src,e.w=e.m.w,e.h=e.m.h)}),window.gallery.init()}},r=document.querySelectorAll(e),l=0,c=r.length;l<c;l++)r[l].setAttribute("data-pswp-uid",l+1),r[l].onclick=o;var d=n();d.pid&&d.gid&&s(d.pid,r[d.gid-1],!0,!0)};a(".lst-photo-gallery"),t(window).scroll(function(){t(window).scrollTop()>=1200&&t(window).scrollTop()<=2400?(t(".lst-mobile-wrapper").removeClass("hide"),t(".lst-mobile-wrapper").fadeIn("fast")):(t(".lst-mobile-wrapper").addClass("hide"),t(".lst-mobile-wrapper").fadeOut("fast"))});var i=function(){var e=t('form#book_it_form input[name="room_id"]').val(),a=new Date,i=a.getFullYear(),n=a.getMonth(),s=new Date(i,n,1),r=new Date(i,n+3,1);o(e,s,r)},o=function(e,a,i){t.ajax({method:"GET",dataType:"json",url:APP_URL+"/rooms/"+e+"/view_calendars",data:{start_date:t.datepicker.formatDate("dd-mm-yy",a),end_date:t.datepicker.formatDate("dd-mm-yy",i)},async:!1,success:function(n){var s=[],r=[],l=[];t.each(n,function(t,e){e.blocked===!0&&s.push(e.date),e.checkin===!0&&r.push(e.date),e.checkout===!0&&l.push(e.date)});new Date;t("#lst_calendar_room .lst-date-content").datepicker("destroy"),t("#lst_calendar_room .lst-date-content").datepicker({dateFormat:"yy-mm-dd",numberOfMonths:[1,3],minDate:new Date,defaultDate:a,beforeShowDay:function(e){var a=t.datepicker.formatDate("yy-mm-dd",e);return t.inArray(a,s)!=-1?[!0,"lst-block","No Available"]:t.inArray(a,r)!=-1?[!0,"lst-checkin","No Available"]:t.inArray(a,l)!=-1?[!0,"lst-checkout","No Available"]:[!1,"","Available"]},onChangeMonthYear:function(t,n,s){a=new Date(t,n-1,1),i=new Date(t,n+2,1),o(e,a,i)}})}})};i(),e(),t(window).on("resize",e);var n,s=t("#menu_hidden ul"),r=s.outerHeight()+15,l=s.find("a"),c=l.map(function(){var e=t(t(this).attr("href"));if(e.length)return e});l.click(function(e){var a=t(this).attr("href"),i="#"===a?0:t(a).offset().top-r+1;t("html, body").stop().animate({scrollTop:i},300),e.preventDefault()}),t(window).scroll(function(){var e=t(this).scrollTop()+r,a=c.map(function(){if(t(this).offset().top<e)return this});a=a[a.length-1];var i=a&&a.length?a[0].id:"";n!==i&&(n=i,l.parent().removeClass("active").end().filter("[href='#"+i+"']").parent().addClass("active"))}),t("#lst_checkin_label").text(moment({hour:14}).format("h:mm A")),t("#lst_checkout_label").text(moment({hour:12}).format("h:mm A")),t(".comment-item .content").each(function(){t(this).height()>70&&(t(this).addClass("height-excerpt"),t(this).siblings(".comment-readmore").removeClass("hide"))}),t(document).on("click",".comment-readmore",function(e){e.preventDefault(),t(this).parent().find(".content").removeClass("height-excerpt"),t(this).addClass("hide"),t(this).siblings(".comment-hide").removeClass("hide")}),t(document).on("click",".comment-hide",function(e){e.preventDefault(),t(this).parent().find(".content").addClass("height-excerpt"),t(this).addClass("hide"),t(this).parent().find(".comment-readmore").removeClass("hide")}),t(document).ajaxStop(function(){a(".lst-photo-gallery")})})}(jQuery);