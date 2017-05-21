<?php

class MY_Model extends CI_Model{
    
    const YEAR = 2017;
    
    const REQUEST_SUCCESS = 1000;//请求成功
    
    const USER_NAME_NOT_NULL = 2000; //用户名不能为空
    const USER_PASSWORD_NOT_NULL = 2001; //密码不能为空
    const USER_IS_NULL = 2002; //用户不存在
    const PASSWORD_ERROR = 2003; //密码错误
    const USER_EXIST = 2004; //用户已存在
    const USER_ID_NOT_NULL = 2005;//用户ID不能为空
    const ADMIN_NAME_NOT_NULL = 2006;//管理员用户名不能为空
    const ADMIN_PASSWORD_NOT_NULL = 2007; //管理员密码不能为空
    const ADMIN_TYPE_ERROR = 2008;//管理员类型错误
    const ADMIN_IS_NULL = 2009;//管理员密码错误
    const ADMIN_EXIST = 2010;//管理员已存在
    
    const CASE_ID_NOT_NULL = 3000;//案例ID不能为空
    const TYPE_ERROR = 3001;//类型错误
    const FILE_UPLOAD_FAIL = 3002;//文件上传错误
    const FILE_ERROR = 3003;//文件错误
    const CASE_IS_NULL = 3004;//没有案例
    
    const MONEY_ERROR = 4000;//金额错误
    const COMPANY_NAME_NOT_NULL = 4001;//单位名称不能为空
    const INVOICE_TYPE_ERROR = 4002;//发票类型错误
    const INVOICE_IS_NULL = 4003;//没有发票
    const INVOICE_ID_NOT_NULL = 4004;//发票ID不能为空
    
    const PAYMENT_FAIL = 5001;//支付二维码生成失败
    const OUT_TRADE_NO_NOT_NULL = 5002;//订单号不能为空
    const ORDER_IS_NULL = 5003;//订单不存在
    
    const SYSTEM_ERROR = 6000; //系统错误
    function __construct(){
        parent::__construct();
    }
    
    
}