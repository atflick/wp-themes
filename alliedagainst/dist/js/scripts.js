"use strict";!function(o){function t(t,n){console.log(t.serialize());var a=o.ajax({url:"/ajax-sort",method:"POST",data:{data:t.serialize(),direction:n,offset_amount:o(".pagination").data("offset")},dataType:"html"});a.done(function(t){o(".all-posts-container").empty().append(t),o("html, body").animate({scrollTop:o(".all-posts-container").offset().top},"slow")}),a.fail(function(o,t){console.log("Request failed with:"+t)})}o(".post-selector").on("change",function(){t(o("#sorting-form"),!1)}),o(".all-posts").on("click",".pager",function(){t(o("#sorting-form"),o(this).attr("id"))}),o(".search-post-selector").on("change",function(){var t=window.location.href.replace(/\&sort=(.*)/g,""),n=t.replace(/\/page\/(.*)\//g,"");window.location.href=n+"&sort="+o(this).val()}),o("#get-updates-button").on("click",function(){o("#mailing-list").length?o("html, body").animate({scrollTop:o("#mailing-list").offset().top},"slow"):window.location.href="/#mailing-list"}),o(".search-container").on("click",function(){o(this).children().toggleClass("hide"),o(".search-form").toggleClass("hide-search")}),o(".reader").on("click",function(){o(this).parent().children(".toggle").each(function(){o(this).toggleClass("hide")})}),o("#national-resources").on("click",function(){o("#locale").val("national"),t(o("#sorting-form"),!1),o("html, body").animate({scrollTop:o(".all-posts").offset().top},"slow")})}(jQuery);