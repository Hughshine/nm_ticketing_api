<?php
/**
 * Created by PhpStorm.
 * User: 31832
 * Date: 2019/3/9
 * Time: 10:00
 */
/*
 * 基础控制器,可以在此做一些代码复用
 * */
namespace backend\controllers;


use yii\web\Controller;

class BaseController extends Controller
{
    public function beforeAction($action)
    {
        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }
}