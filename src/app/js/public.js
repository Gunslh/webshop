(function($) {
	var funcArray = new Array();
	$.key = {
		enter:function(func)
		{
			var arr = new Array();
			arr[0] = 13;
			arr[1] = func;
			funcArray[funcArray.length] = arr;
		}
	};
	document.onkeydown = function(e){
		
		var ev = document.all ? window.event : e;
		for(var i = 0; i < funcArray.length; i++)
		{
			var func = funcArray[i];
			if(e.which == parseInt(func[0])){
				if(func[1])func[1]();
			}
		}
	} 
})(jQuery);