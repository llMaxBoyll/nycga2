jQuery(document).ready(function(){jQuery("#bpe-categories-form #addcat").live("click",function(){var b=jQuery("input#cat_name").val();var a=jQuery("input#cat_slug").val();var d=jQuery("input#cat_id").val();var c=jQuery("input#_wpnonce_save_category").val();jQuery(".submit span.ajax-loader").css("display","inline-block");jQuery.post(ajaxurl,{action:"bpe_add_category",cookie:encodeURIComponent(document.cookie),name:b,slug:a,cat_id:d,_wpnonce:c},function(e){e=jQuery.parseJSON(e);jQuery("#ajax-response").empty().html(e.message);jQuery("input#cat_name,input#cat_slug,input#cat_id").val("");if(e.type=="success"){if(e.action=="edit"){var f=e.category.split("§");jQuery("#editcat-"+f[0]).text(f[2]);jQuery("#catslug-"+f[0]).text(f[1]);jQuery("input#addcat").val("Add Category");jQuery(".clear-form").hide()}else{jQuery("#the-list").append(e.category)}}jQuery(".submit span.ajax-loader").css("display","none")});return false});jQuery(".bpe-delete-category").live("click",function(){var c=jQuery(this);var d=c.attr("id");var b=c.attr("href");d=d.split("-");d=d[1];var a=parseInt(jQuery("#num-1").text())+parseInt(jQuery("#num-"+d).text());b=b.split("_wpnonce=");b=b[1].split("&");b=b[0];c.addClass("bpe-loading");jQuery.post(ajaxurl,{action:"bpe_delete_category",cookie:encodeURIComponent(document.cookie),id:d,_wpnonce:b},function(e){e=jQuery.parseJSON(e);jQuery("#ajax-response").empty().html(e.message);if(e.type=="success"){jQuery("#cat-"+e.id).parent().parent().remove();jQuery("#num-1").empty().text(String(a))}c.removeClass("bpe-loading")});return false});jQuery(".bpe-edit-category").live("click",function(){var c=jQuery(this);var d=c.attr("id");d=d.split("-");d=d[1];var b=c.text();var a=jQuery("#catslug-"+d).text();jQuery("input#cat_name").val(b);jQuery("input#cat_slug").val(a);jQuery("input#cat_id").val(d);jQuery("input#addcat").val("Edit Category");jQuery(".clear-form").show();return false});jQuery(".clear-form").live("click",function(){jQuery("input#cat_name,input#cat_slug,input#cat_id").val("");jQuery("input#addcat").val("Add Category");jQuery(".clear-form").hide();return false})});