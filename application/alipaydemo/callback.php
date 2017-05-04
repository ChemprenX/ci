<?php
echo 123;exit();
file_put_contents('/home/tmg/callback.log',serialize($_REQUEST),FILE_APPEND);
//var_dump($_REQUEST);
