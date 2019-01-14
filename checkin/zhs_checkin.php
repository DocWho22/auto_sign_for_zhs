<?php
/**
 * Created by PhpStorm.
 * User: KongKong
 * Date: 2019/1/13 0013
 * Time: 下午 8:39
 */
require __DIR__.'/vendor/autoload.php';
require __DIR__.'/function.php';

function check(){
    $host='';
    $session=new \GuzzleHttp\Client([
        'cookies' => true,
        'base_uri'=>$host,
        ]);

    //登陆
    $login=$session->request('post','/auth/login',[
        'verify'=>false,
        'form_params'=>['email'=>'','passwd'=>'']
        ]);

    if ($login->getStatusCode()==200){
        //unicode转utf-8
        $msg=unicodeDecode($login->getBody()->read(1000));
        $msg=json_decode($msg,1);
        //$msg['ret']为1时说明登陆成功
        if ($msg['ret']==1){
            //签到
            $checkin=$session->request('post','/user/checkin',[
                'verify'=>false,
                'headers'=>[
                    'X-Requested-With'=>'XMLHttpRequest',
                ],
            ]);
            $chk_msg=unicodeDecode($checkin->getBody()->read(1000));
            $chk_msg=json_decode($chk_msg,1);
            if ($msg['ret']==1){
                //发送成功邮件
                sendEmail('3936160@qq.com',$chk_msg['msg']);
            }
        }
        
    }

}

check();