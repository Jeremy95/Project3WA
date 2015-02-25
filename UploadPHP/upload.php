<?php
/**
 * Created by PhpStorm.
 * User: wap19
 * Date: 25/02/15
 * Time: 10:10
 */

move_uploaded_file($_FILES["picture"]["tmp_name"], "files/".$_FILES["picture"]["name"]);

include "index.php";