$(function(){
	setTags(arrUserSkill);
	 var SelectedP = $("#indus_pid option:selected").val();
	    InsertIndus(SelectedP, "skill_tags");

	$('#editSkillForm').scojs_valid({
	    rules: {
	    	strUserTags: ['not_empty']
	    },
	    messages: {
	    	strUserTags: {
				not_empty: "请选择技能标签",
			}
	    },
	    wrapper:'.form-group'
	    ,onSuccess: function(response, validator, $form) {
	    	$(':submit').prop('disabled', 'disabled').addClass('disabled');
	    	  tipsUser(response.data,response.status);
	    }
	});
});

function InsertIndus(pIndus, insertDiv){
    $.getJSON("index.php?do=user&view=account&op=skill&ac=getSkill&indus_id=" + pIndus, function(json){
        if (json.status == '1') {
            var tagStr = '';
            $.each(json.data, function(i, n){
                tagStr += '<a href="javascript:add_tag(\'' + n.indus_name + '\');\">' + n.indus_name + '</a>';
            });
            $("#" + insertDiv).html(tagStr);
        }
        else {
            $("#" + insertDiv).html("无标签");
        }
    });
}

var add_tag = function(name){
    os = $("#tags_tagsinput .tag");
    s = os.length;
    var tags = new Array();
    os.each(function(i, n){
        tags.push(jQuery.trim($(n).find('span').text()));
    });
    if (in_array(name, tags)) {
        tipsOp('<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> 此技能标签已存在</div>');

    } else {
        if (s < 5) {
            $("#tags").addTag(name);
        } else {
        	tipsOp('自选技能标签最多5个');
        }
    }
};
function save_skill(){
    os = $("#tags_tagsinput .tag");
    s = os.length;
    var tags = new Array();
    os.each(function(i, n){
        tags.push(jQuery.trim($(n).find('span').text()));
    });
    if (!s) {
        tipsOp('<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> 技能列表为空</div>');
    }else {
        tag_str = tags.join(',');
    }
    $("#strUserTags").val(tag_str);

}

//设置标签
function setTags(arrSkill){
    $('#tags').tagsInput({
        'unique': 1,
        'defaultText': ''
    });
    skills = arrSkill;
    s = skills.split(',');
    for (var i = 0; i < s.length; i++) {
        $("#tags").addTag(s[i]);
    }
}

function in_array(needle, haystack) {
	if(typeof needle == 'string' || typeof needle == 'number') {
		for(var i in haystack) {
			if(haystack[i] == needle) {
					return true;
			}
		}
	}
	return false;
}




