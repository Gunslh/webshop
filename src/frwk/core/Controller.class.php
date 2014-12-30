<?php include_once 'AjaxAction.class.php';?>
<?php
class Controller
{
	private $request;	
	private $response;
	
	//private $actionInfo;
	//private $scriptInfo;
	
	public function __construct(BaseRequest $request,BaseResponse $response = null)
	{
	    $this->request = $request;
	    $this->response = $response;
	}
	
	protected function handlerActionFlow($action, $doAction)
	{
	    if(empty($action )){
	        return;
	    }
	    if(empty($doAction)){
	        $doAction = "doAction";
	    }

	    try {
	        //include '/home/luoji/work/webshop/src/admin/actions/LoginAction.class.php';
	        $reflection = new ReflectionClass($action);
	        if($reflection->hasMethod($doAction) === false){
	            return;
	        }
	        $class = $reflection->newInstance($this->request,$this->response);
	        if($class instanceof BaseAction){
	            $class->beforAction();
	            $class->{$doAction}();
	            $class->afterAction();
	        }
	    } catch (Exception $e) {
	        //echo $e;
	    }
	}
	
	public function invokeAction()
	{
	    if($this->request->isHttpXRequest()){
	        $actionInfo = URLHandler::parseActionInfo($this->request);
	        $this->handlerActionFlow($actionInfo->action, $actionInfo->method);
	    }else {
	        //:todo modify
	        $actionInfo = URLHandler::parseActionInfo($this->request);
	        $this->handlerActionFlow($actionInfo->action, $actionInfo->method);
	    }
	}
	
	public function init(){}
	public function destroy(){}
}
?>