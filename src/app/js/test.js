	
var Test = function (arg) {
  var instance = new Test.Core(arg);
  instance.init();
  return instance;
};

(function($) {
	function createDiv(div)
	{
		div.css('position','absolute');
		div.css('top','200px');
		div.css('left','400px');
		div.css('width','400px');
		div.css('height','200px');
		div.css('background-color','black');
		div.css('color','white');
		div.append('<input type="text"></input>')
	}
	Config = function()
	{
		this.init = function (arg)
		{
			for (var i in arg)
				this[i] = arg[i];
		};
		this.getFunc = function(name, parameter)
		{
			if(this.hasOwnProperty(name)){
				return this[name](parameter);			
			}
		}
		this.get = function(name)
		{
			if(this.hasOwnProperty(name)){
				return this[name];			
			}
		}
		return this;
		
	}
	
	Test.Core = function (arg) {
		var config = new Config();
		
		if(typeof(arg.afterEvent) != null)
			this.afterEvent = arg.afterEvent;
		this.afterChange = arg.afterChange;
		
		this.show = function(){
			alert(config.get('a'));
		};
		
		this.init = function(){
			config.init(arg);
			createDiv(config.get('div'));
			
			//this.afterEvent(this.a+"event");
			config.getFunc('afterEvent');
		};		
		
		$('input').live('change',function(){
			config.getFunc('afterChange', $(this).val());
		});
		
		return this;
	}
})(jQuery);