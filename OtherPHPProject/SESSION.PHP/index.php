<?php
/**
 * Created by PhpStorm.
 * User: wap20
 * Date: 18/02/15
 * Time: 11:42
 */

include "template/headerTemplate.phtml";

require "config.php";

if(array_key_exists("id", $_SESSION))
{
    include "template/logoutTemplate.phtml";
    include "template/chatTemplate.phtml";
}
else
{
    include "template/loginTemplate.phtml";
}


include "template/footerTemplate.phtml";