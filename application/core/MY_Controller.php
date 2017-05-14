<?php header("Content-type:text/html;charset=utf-8");if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * application: admin
 *
 */
class MY_Controller extends CI_Controller {
	private $controller = '';
	private $model = '';

	/* public $weixin_token      = '';
	public $weixin_app_id     = '';
	public $weixin_app_secret = ''; */
    protected  $ci;
	//public $header_template = 'common/header.html';
	public $body_template   = '';
	//public $footer_template = 'common/footer.html';
	public $result = '';
	public $openid = '';
	function __construct()
	{
		parent::__construct();
		//$this->config->load('weixin');
		$this->load->helper('cookie');
		$this->load->helper('url');
		$this->load->service('user_service');
		$this->ci = get_instance();
		//$this->load->model('user_model');
		/* $this->load->model('token_model');
		$this->weixin_token      = $this->config->item('weixin_token');
		$this->weixin_app_id     = $this->config->item('weixin_app_id');
		$this->weixin_app_secret = $this->config->item('weixin_app_secret');
		$this->load->library('weixin', array(
			'token' => $this->weixin_token
			,'app_id' => $this->weixin_app_id
			,'app_secret' => $this->weixin_app_secret
		)); */

	}
	
    protected function check(){
	    if (!$this->user_service->check()){
	        redirect('manager/user/login');
	    }
	} 
	
	
	/* private function get_current_controller()
	{
		$controller_trigger = $this->config->item('controller_trigger');
		if ($this->config->item('enable_query_strings'))
		{
			$this->controller = $this->input->get($controller_trigger) ? $this->input->get($controller_trigger) : $this->router->routes['default_controller'];
		}
		else
		{
			$this->controller = $this->uri->rsegment(1);
		}
			log_message('debug', '###current_controller:' . $this->controller);
	} */

	/**
	 * 获取当前model
	 */
	/* private function get_current_model()
	{
		if ($this->config->item('enable_query_strings'))
		{
			$model_trigger = $this->config->item('function_trigger');
			$this->model = $this->input->get($model_trigger) ? $this->input->get($model_trigger) : 'index';
		}
		else
		{
			$this->model = $this->uri->resgment(2);
		}
	} */

	/**
	 * 制定视图
	 */
	/* public function view($body_template = null)
	{
		if ($body_template)
		{
			$this->body_template = $body_template;
		}
		else
		{
			$this->body_template = $this->controller . '/' . $this->model;
		}
		//$urlr = $this->config->item('url');
		$appid = $this->config->item('weixin_app_id');
		//$this->assign('url',$url);
		//$this->assign('appid',$appid);
		$url = 'http://open.weixin.qq.com/connect/oauth2/authorize?appid='.$appid.'&redirect_uri='.urlencode('http://'.$this->config->item('url').'/index.php/api/login').'&response_type=code&scope=snsapi_base&state=1#wechat_redirect';
		$this->assign('url',$url);
		$this->display($this->header_template);
		$this->display($this->body_template);
		$this->display($this->footer_template);
	} */

	/**
	 * 微信 auth2.0认证url
	 */
	/* public function weixin_url($url, $response_type = 'code', $scope = 'snsapi_base', $state = 1)
	{
		$weixin_url = 'https://open.weixin.qq.com/connect/oauth2/authorize?'
			. 'appid=' . $this->config->item('weixin_app_id')
			. '&redirect_uri=' . urlencode($url)
			. '&response_type=' . $response_type
			. '&scope=' . $scope
			. '&state=' . $state . '#wechat_redirect';

		return $weixin_url;
	} */
	/*获得用户的地理位置*/
	/* public function get_destination($openid ,$position)
	{	
		if($position){
			$track = $this->user_model->get_user_track_by_openid($openid);
			if(!$track){
				$destination = false;
			}else{
				$destination = $track;
			}
		}else{
			$destination = $this->user_model->get_zhudi_by_openid($openid);
			
			if(!$destination){
				$destination='不在地球的位置';
			}
		}
		return $destination;
	} */
	/*时间的整理*/
	/* public function changetime($str)
	{
		$now = time();
		if($str<=$now&&$str>$now-3600)
		{
			$time = ($now-$str)/60;
			return (int)$time.'分钟';
		}else if($str<=$now-3600&&$str>$now-86400)
		{
			$time = ($now-$str)/3600;
			return (int)$time.'小时';
		}else if($str<=$now-86400&&$str>$now-2592000)
		{
			$time = ($now-$str)/86400;
			return (int)$time.'天';
		}else if($str<=$now-2592000&&$str>$now-31104000)
		{
			$time = ($now-$str)/2592000;
			return (int)$time.'月';
		}else if($str<=$now-31104000)
		{
			$time = ($now-$str)/31104000;
			return (int)$time.'年';
		}
	} */
	
	public function assign($key,$val){
	    $this->ci_smarty->assign($key,$val);
	}
	public function display($html){
	    $this->ci_smarty->display($html);
	}
	
}

/* End of file MY_Controller.php */
/* Location: ./api/core/MY_Controller.php */