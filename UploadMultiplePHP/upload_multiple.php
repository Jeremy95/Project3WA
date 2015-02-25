<?php
/**
 * Created by PhpStorm.
 * User: wap19
 * Date: 25/02/15
 * Time: 10:19
 */

var_dump($_FILES);

for($i=0; $i<sizeof($_FILES["picture"]["name"]); $i++)
{
    move_uploaded_file($_FILES["picture"]["tmp_name"][$i], "files/".$_FILES["picture"]["name"][$i]);
}
