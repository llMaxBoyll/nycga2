(function(a){a.extend({pwTyper:{wrap:function(b){b=b.replace(/(<span[^>]*?class="[^"]*pwText[^"]*>)([^<]*)(<\/span>)/g,"$2");b=b.replace(/(>|^(?!<))([^<]+)(<|(?!>)$)/g,'$1<span class="pwText">$2</span>$3');b=b.replace(/<span class="pwText">[^<]*&\S*;[^<]*<\/span>/g,function(c){return c.replace(/(&[^;]+;)/g,'</span><span class="pwSpecial">$1</span><span class="pwText">')});return b},type:function(c){if(c.charCount>c.data[c.dataIndex].count){c.dataIndex++}if(c.dataIndex==c.dataLength){c.thisElement.data("finished",true);c.thisElement.html(c.content);if(c.thisElement.data("callback")){var e=true;a(c.thisElement.data("get")).each(function(){if(!a(this).data("finished")){e=false}});if(e){var d=c.thisElement.data("callback");if(d){d.call()}}}return false}var b=c.data[c.dataIndex].element.data("order");for(c.order;c.order<=b;c.order++){c.thisElement.find(".order-"+c.order).removeClass("pwHidden")}c.data[c.dataIndex].element.html(c.data[c.dataIndex].text.substr(0,c.charCount-((c.dataIndex>0)?c.data[c.dataIndex-1].count:0)));c.delay=Math.round(c.minInterval+(Math.random()*(c.maxInterval-c.minInterval)));c.thisElement.data("int",setTimeout(function(){a.pwTyper.type(c)},c.delay));c.charCount++;c.thisElement.data("G",c)},createCSS:function(b,g){var e=navigator.userAgent.toLowerCase();var f=(/msie/.test(e))&&!(/opera/.test(e))&&(/win/.test(e));var d=document.getElementById("pwTyperStyles");if(!d){d=document.createElement("style");d.setAttribute("type","text/css");d.setAttribute("media","screen");d.setAttribute("id","pwTyperStyles")}if(d.innerHTML.indexOf(b+" {"+g+"}")===-1){if(!f){d.appendChild(document.createTextNode(b+" {"+g+"}\n"))}document.getElementsByTagName("head")[0].appendChild(d);if(f&&document.styleSheets&&document.styleSheets.length>0){var c=document.styleSheets[document.styleSheets.length-1];if(typeof(c.addRule)=="object"){c.addRule(b,g)}}}}}});a.fn.extend({stopTyper:function(){clearInterval(this.data("int"));return this},resumeTyper:function(){this.data("func").call(a.pwTyper,this.data("G"));return this},finishTyper:function(){clearInterval(this.data("int"));if(this.data("func")==a.pwTyper.type){this.html(this.data("content"))}else{this.empty()}var b=this.data("callback");if(b){b.call()}return this},type:function(b){a.pwTyper.createCSS(".pwHidden","display:none;");clearInterval(this.data("int"));var c={minInterval:30,maxInterval:90};c=jQuery.extend(c,b||{});this.data("func",a.pwTyper.type);this.data("get",this.get());this.data("callback",(c.callback)?c.callback:null);return this.each(function(){var d={charCount:0,charTotal:0,data:[],dataLength:0,dataIndex:0,thisElement:a(this),order:0,delay:0,newText:"",content:"",minInterval:c.minInterval,maxInterval:c.maxInterval};if(!c.content){d.content=d.thisElement.html()}else{if(c.content instanceof jQuery){d.content=a(c.content).html()}else{d.content=c.content}}d.thisElement.data("finished",false);d.thisElement.data("content",d.content);d.newText=a.pwTyper.wrap(d.content);d.thisElement.html(d.newText).find("*").each(function(e){a(this).addClass("pwHidden").data("order",e).addClass("order-"+e)});d.thisElement.find(".pwText").each(function(e){d.data[e]={order:a(this).data("order"),text:a(this).html(),element:a(this),count:(e>0)?a(this).html().length+d.data[e-1].count:a(this).html().length};a(this).empty()});d.dataLength=d.data.length;d.charTotal=d.data[d.dataLength-1].count;if(c.time){d.delay=Math.floor(c.time/d.charTotal);if(d.delay===0){d.delay=1}if(c.deviation){if(c.deviation>1){c.deviation=1}d.minInterval=Math.round(d.delay*(1-c.deviation));d.maxInterval=d.delay+(d.delay-d.minInterval);if(d.minInterval===0){d.minInterval=1}}else{d.minInterval=d.delay;d.maxInterval=d.delay}}if(c.delay){d.thisElement.data("int",setTimeout(function(){a.pwTyper.type(d)},c.delay))}else{a.pwTyper.type(d)}})}})})(jQuery);var captions=[{content:"You have chosen to delete Buddyvents and all related databases<br />",min:30,max:90,timeout:2000},{content:"Deletion will commence in 10 seconds or press Esc to cancel<br />",min:30,max:90,timeout:3000},{content:"7<br />6<br />5<br />4<br />3<br />2<br />1<br />",min:1000,max:1000,timeout:2000},{content:"..."+dbPrefix+"bpe_events deleted...<br />",min:30,max:90,timeout:1500},{content:"..."+dbPrefix+"bpe_members deleted...<br />",min:30,max:90,timeout:1500},{content:"..."+dbPrefix+"bpe_schedules deleted...<br />",min:30,max:90,timeout:1500},{content:"..."+dbPrefix+"bpe_documents deleted...<br />",min:30,max:90,timeout:1500},{content:"..."+dbPrefix+"bpe_event_meta deleted...<br />",min:30,max:90,timeout:1500},{content:"..."+dbPrefix+"bpe_categories deleted...<br />",min:30,max:90,timeout:1500},{content:"..."+dbPrefix+"bpe_tickets deleted...<br />",min:30,max:90,timeout:1500},{content:"..."+dbPrefix+"bpe_sales deleted...<br />",min:30,max:90,timeout:1500},{content:"..."+dbPrefix+"bpe_invoices deleted...<br />",min:30,max:90,timeout:1500},{content:"..."+dbPrefix+"bpe_notifications deleted...<br />",min:30,max:90,timeout:1500},{content:"..."+dbPrefix+"bpe_api deleted...<br />",min:30,max:90,timeout:1500},{content:"..."+dbPrefix+"bpe_webhooks deleted...<br />",min:30,max:90,timeout:1500},{content:"...database options deleted...<br />",min:30,max:90,timeout:1500},{content:"...plugin files deleted...<br />",min:30,max:90,timeout:1500},{content:"................<br />",min:500,max:500,timeout:1500},{content:"This was just a little <a href='http://en.wikipedia.org/wiki/Easter_egg_%28media%29'>easter egg</a>, but don't try this again :) Next time might be for real! <a href=\""+adminUrl+'">Go back!</a>',min:30,max:90,timeout:1000}];jQuery(document).ready(function(){setInterval("cursorAnimation()",600);var b=0;var a=captions[b];jQuery("#captions").append('<span class="caption'+b+'"></span>');jQuery(".caption"+b).type({content:a.content,minInterval:a.min,maxInterval:a.max,callback:function(){chainType(b)}})});function chainType(b){b++;if(b>=captions.length){return false}var a=captions[b];jQuery("#captions").append('<span class="caption'+b+'"></span>');setTimeout(function(){jQuery(".caption"+b).type({content:a.content,minInterval:a.min,maxInterval:a.max,callback:function(){chainType(b)}})},a.timeout)}function cursorAnimation(){jQuery(".cursor").animate({opacity:0},"fast","swing").animate({opacity:1},"fast","swing")};