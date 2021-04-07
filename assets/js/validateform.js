
function validatefrm(get_current_div_id){
var field_validation=false;
var get_all_data = jQuery('#' + get_current_div_id + ' input[type=\'text\'], #' + get_current_div_id + ' input[type=\'email\'], #' + get_current_div_id + ' input[type=\'hidden\'], #' + get_current_div_id + ' input[type=\'radio\']:checked, #' + get_current_div_id + ' input[type=\'checkbox\']:checked, #' + get_current_div_id + ' select, #' + get_current_div_id + ' input[type=\'file\'], #' + get_current_div_id + ' textarea');

var read_c_r_box = jQuery('#' + get_current_div_id + ' input[type=\'radio\'], #' + get_current_div_id + ' input[type=\'checkbox\']');

jQuery.each(get_all_data, function (key, value) {
  if (jQuery(this).attr("id") == 'existingcount') {
    if (jQuery(this).val() != 0) {
    exist_image = jQuery(this).val();
    }
  }
  if (jQuery(this).attr("pjtdetails") == "required") {
    if (jQuery(this).val().length === 0) {
      jQuery(this).addClass('parsley-error');
      jQuery(this).parent('div').children("button").addClass("parsley-error");
      field_validation = 1;
    } else{
      jQuery(this).removeClass("parsley-error");
      jQuery(this).parent('div').children("button").removeClass("parsley-error");
      jQuery(this).removeClass("error");
    }
  }
});
var current = false;
var checkvalid = '';
var notcheckedvalue = [];

jQuery.each(read_c_r_box, function (key1, value1) {
if (this.name != checkvalid) {
current = false;
}
checkvalid = this.name;
if (jQuery(this).prop('checked') == false && jQuery(this).attr("radiovalid") == "required") {

if (jQuery.inArray(this.name, notcheckedvalue) == -1 && current == false) {
notcheckedvalue.push(this.name);
current = true;
}

} else if (jQuery(this).prop('checked') == true) {

current = true;
var removeItem = this.name;
notcheckedvalue = jQuery.grep(notcheckedvalue, function (value) {
return value != removeItem;
});
}
jQuery(this).next().removeClass("radio_error");
});

notcheckedvalue = unique(notcheckedvalue);
// console.log(notcheckedvalue);
if (notcheckedvalue.length !== 0) {
//alert(index_step);

jQuery.each(notcheckedvalue, function (key2, value2) {

jQuery("input[name='" + value2 + "'] ").next().addClass("radio_error");
});

alert("Please select all the values");
field_validation = 1;
}

if(field_validation==1){
return field_validation;
}
}
function unique(list) {
    var result = [];
    jQuery.each(list, function (i, e) {
        if (jQuery.inArray(e, result) == -1)
            result.push(e);
    });
    return result;
}

$('.alphaonly').bind('keyup blur', function () {//entry only alphabets only number and special character not allowed
        var node = $(this);
        node.val(node.val().replace(/[^A-Za-z ]/g, ''));
    });
