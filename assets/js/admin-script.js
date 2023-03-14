jQuery(document).ready(function($) {
    // Add Color Picker to all inputs that have 'color-field' class
    $(function() {
        $('.color-field').wpColorPicker();
    });
	
	var uploadID = '';
	
	jQuery('.upload-button').click(function() {
		uploadID = jQuery(this).prev('input'); /*grab the specific input*/
		formfield = jQuery('.upload').attr('name');
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		return false;
	});
	
	window.send_to_editor = function(html) {
		imgurl = jQuery('img',html).attr('src');
		uploadID.val(imgurl); /*assign the value to the input*/
		tb_remove();
		
		$('#submit').trigger('click');
	};
});
// 	$('#upload_logo_button').click(function() {
//         tb_show('Upload a logo', 'media-upload.php?referer=wptuts-settings&type=image&TB_iframe=true&post_id=0', false);
//         return false;
//     });
	
// 	window.send_to_editor = function(html) {
// 		var image_url = $('img',html).attr('src');
// 		$('#colorlogo').val(image_url);
// 		tb_remove();
// 		$('#upload_logo_preview img').attr('src',image_url);

// 		$('#submit').trigger('click');
// 	};

//     $('#logo_white_uploader').click(function() {
//         tb_show('Upload a logo', 'media-upload.php?referer=wptuts-settings2&type=image&TB_iframe=true&post_id=0', false);
//         return false;
//     });
	
// 	window.send_to_editor = function(html2) {
// 		var image_url2 = $('img',html2).attr('src');
// 		$('#whitelogourl').val(image_url2);
// 		tb_remove();
// 		$('#white_logo_preview img').attr('src',image_url2);

// 		$('#submit').trigger('click');
// 	};
