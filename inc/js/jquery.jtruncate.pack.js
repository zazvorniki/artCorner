(function(e){e.fn.jTruncate=function(t){var n={length:120,minTrail:20,moreText:" ",lessText:" ",ellipsisText:"...",moreAni:"",lessAni:""};var t=e.extend(n,t);return this.each(function(){obj=e(this);var n=obj.html();if(n.length>t.length+t.minTrail){var r=n.indexOf(" ",t.length);if(r!=-1){var r=n.indexOf(" ",t.length);var i=n.substring(0,r);var s=n.substring(r,n.length-1);obj.html(i+'<span class="truncate_ellipsis">'+t.ellipsisText+"</span>"+'<span class="truncate_more">'+s+"</span>");obj.find(".truncate_more").css("display","none");obj.append('<div class="clearboth">'+'<a href="#" class="truncate_more_link">'+t.moreText+"</a>"+"</div>");var o=e(".truncate_more_link",obj);var u=e(".truncate_more",obj);var a=e(".truncate_ellipsis",obj);o.click(function(){if(o.text()==t.moreText){u.show(t.moreAni);o.text(t.lessText);a.css("display","none")}else{u.hide(t.lessAni);o.text(t.moreText);a.css("display","inline")}return false})}}})}})(jQuery)