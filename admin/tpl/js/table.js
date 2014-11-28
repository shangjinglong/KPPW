/**
 * 
 */
$(function(){
	var trObj = $("table tr.item");
	//trObj.click(function(event){
	//	trClick(this,event);
	//})
	trObj.dblclick(function(event){
		trDBclick(this,event);
	})
	//trObj.live("click",function(event){
	//	trClick(this,event);
	//});
	trObj.live("dblclick",function(event){
		trDBclick(this,event);
	});
	$(":radio,:checkbox").each(function(){
		labelColor(this);
	})
	$(":radio,:checkbox").click(function(){
		labelColor(this);
	})
 })
 
function trClick(trObj,event){
	var title = $(trObj).find(".dbl_target").text();
	$(trObj).addClass("selected");
	$.trim(title)?$(trObj).attr("title",L.double_click+title):'';
	var ckbObj = $(trObj).find(":checkbox").get(0);
	if(ckbObj){
		if(ckbObj.checked==true){
			$(ckbObj).attr("checked","");
			$(trObj).removeClass("selected");
		}else{
			$(ckbObj).attr("checked","true");
		}
	}
	event.stopPropagation();
}
function trDBclick(trObj,event){
	var dbTarget = $(trObj).find(".dbl_target");
	var jumpHref = dbTarget.attr("href");
		jumpHref?location.href=jumpHref:'';event.stopPropagation();
}
 function labelColor(obj){
		var label = $(obj).parents("label");
		var name  = obj.name;
		if(obj.checked==false){
			label.removeClass("selected");
		}else{
			label.addClass("selected");
			obj.type=='radio'?label.siblings().removeClass("selected"):'';
		}
 }
 function to_back(){
 	if(document.referrer){
		location.href=document.referrer;
	}
 }
$("div[id*='page'] :checkbox#checkbox").live("click",function(event){
 	var cbkObj = $(this);
 	var par    = cbkObj.parents('table');
 	var t      = cbkObj.get(0).checked;
     if (t) {
    	 par.find("input[type='checkbox']").attr('checked', "true");
     }
     else {
    	 par.find("input[type='checkbox']").removeAttr('checked');
     }
})
 function checkall(event){
 	var cbkObj = $("#checkbox");
 	var par    = cbkObj.parents('table');
 	var t      = cbkObj.get(0).checked;
     if (t) {
    	 par.find("input[type='checkbox']").attr('checked', "true");
     }
     else {
    	 par.find("input[type='checkbox']").removeAttr('checked');
     }
 }
// $(function(){
//	 $("div.search .title").toggle(function(){
//		 $("#detail").slideDown();	
//	 },function(){
// 		$("#detail").slideUp();
//	 })
// })
 $(function(){
	  if($.browser.msie && $.browser.version =='6.0'){
	  	//获取所有类型为submit的button对象，并进行替换
		$("button[type='submit']").each(function(i,n){
			v =$(this).attr('value');
			if(/<\/span>(\S+)/i.test(v)){
			 v =RegExp['$1'];	
			}
			link = $(this)[0];
			c = link.getAttributeNode('onclick').value;
			if(c){
				oc = c;
			}else{
				oc = "void(0)";
			}
			
			i = $(this).attr("id");
			n = $(this).attr('name');
			o = "<input type='submit' name='"+n+"' id='"+i+"' onclick=\""+oc+"\" value='"+v+"'/>";
			$(this).parent().append(o);
			
			$(this).remove();
		})
	  }

	})