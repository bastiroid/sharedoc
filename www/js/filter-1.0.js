$(document).ready(function(){
	$('#list .create_doc').hide();
	// LIST
	if($('#list').length > 0){
		$('#filter a:not(.create_group)').each(function(index, element) {
            $(this).click(function(){
				return Filter(this);
			});
        });
		if(window.location.hash){
			hash = window.location.hash.substr(1);
			$('#filter a.f-' + hash).each(function(index, element) {
               return Filter(this);
            });
			
		}
	}
});

/**************************************
FILTER
**************************************/

function Filter(id){
	$('#list .doc a').removeAttr('onclick');
	window.location.hash = 'all';
	if( $(id).hasClass('f-all') || $(id).hasClass('sel')){
		$('#filter a').removeClass('sel');
		$('#list .create_doc a').parent().stop();
		$('#list .create_doc a').parent().hide('fast');
		$('#list .doc a').parent().stop();
		$('#list .doc a').parent().show('fast',function(){
			$('#list .doc a').parent().toggleClass('off');
		});
		$('#filter a.f-all').addClass('sel');
	}else{
		$('#filter a').removeClass('sel');
		var f_class = $(id).attr('class');
		var hash = f_class.substr(2);
		window.location.hash = hash;
		$('#list .doc a:not(.' + f_class + ')').attr('onclick','return false;');
		$('#list .doc a:not(.' + f_class + ')').parent().stop();
		$('#list .doc a:not(.' + f_class + ')').parent().hide('fast',function(){
			$('#list .doc a:not(.' + f_class + ')').parent().toggleClass('off');
		});
		$('#list .create_doc a').parent().stop();
		$('#list .create_doc a').parent().show('fast',function(){
			$('#list .create_doc a').attr('class', ''+ hash +'');
			$('#list .create_doc a').parent().toggleClass('off');
		});
		$('#list .doc a.' + f_class).parent().stop();
		$('#list .doc a.' + f_class).parent().show('fast',function(){
			$('#list .doc a.' + f_class).parent().toggleClass('off');
		});
		$(id).addClass('sel');
	}
	return false;
}