

$(function(){
	var objItem = $("input[name^='txt_']");
	objItem.keyup(function(){
		var arrPrice = new Array();
		var intNum = 0;
		objItem.each(function(i,obj){
			var objVal= parseInt($(obj).val())+0;
			if(isNaN(objVal)||objVal ==''){
				objVal = 0;
			}
			intNum = parseInt(intNum)+objVal;
			//alert(intNum);
			var objPrice = $(obj).attr('data-unit-price');

			if(isNaN(objPrice)||objPrice ==''){
				objPrice = 0;
			}
			arrPrice[i] = objPrice*objVal;
		});
		var tatalPrice = 0;
		for(i in arrPrice){
			tatalPrice += arrPrice[i];
		}
		$('#payitem-costs').text(tatalPrice);
		if(intNum>0){
			$("#btn-payitempay").removeAttr('disabled');
		}

	});
});