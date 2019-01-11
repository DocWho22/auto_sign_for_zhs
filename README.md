# auto_sign_for_zhs
某个梯子的自动签到脚本，目前只适配了召唤师网站。

# 使用方法

首先把$arr里的数组里user和pass换成自己的账号和密码。 如果需要成功后发送邮箱，请把$email_user和$email_pass换成自己的，并在locSign方法里注释掉sendEmail()方法。
$host填的是网站的域名。

替换完后，在zhsSign.php所在目录执行 php zhsSign.php即可，如果需要全局执行或添加windows的任务计划，建议使用绝对路径如（D:\wamp64\bin\php\php7.1.16\php.exe E:\zhs_sign\zhsSign.php），请根据本机环境自动更改。

后期会考虑适配更多网站。

