<?php
/**
 * Created by PhpStorm.
 * User: wap19
 * Date: 23/02/15
 * Time: 14:57
 */

require "Helper/DatabaseHelper.class.php";

$articles = new DatabaseHelper("mysql:host=localhost; dbname=blog", "root", "troiswa");
$articlesDisplay = $articles->fetchAll("SELECT *
                                        FROM article
                                        ORDER BY date_article DESC");

include_once "View/homeView.phtml";