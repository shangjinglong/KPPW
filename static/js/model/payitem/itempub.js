$(function(){
	var objItem = $("input[name^='txt_']");
	objItem.keyup(function(){
		var tatalPrice = 0;
		var taskCosts = parseFloat($('#task-costs').text());
		var arrPrice = new Array();
		objItem.each(function(i,obj){
			var objVal	= parseInt($(obj).val());
			var objPrice= parseFloat($(obj).attr('data-unit-price'));
			if(isNaN(objVal)||objVal ==''){
				objVal = 0;
			}
			if(isNaN(objPrice)||objPrice ==''){
				objPrice = 0;
			}
			arrPrice[i] = objPrice*objVal;
		});
		for(i in arrPrice){
			tatalPrice += arrPrice[i];
		}
		$('#payitem-costs').text(tatalPrice);
		$('#hdn-total-costs').val(tatalPrice);
		$('#total-costs').text(tatalPrice+taskCosts);
	});
});