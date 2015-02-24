<?php
/**
 * Created by PhpStorm.
 * User: wap19
 * Date: 23/02/15
 * Time: 14:57
 */

include_once "View/headView.phtml";
require_once "Helper/DatabaseHelper.class.php";

$articles = new DatabaseHelper();
$articlesDisplay = $articles->fetchAll("SELECT *
                                        FROM article
                                        ORDER BY date_article DESC");

include_once "View/homeView.phtml";
include_once "View/footerView.phtml";