<?php
/**
 * Created by PhpStorm.
 * User: Cral
 * Date: 2016/12/24 0024
 * Time: 下午 2:50
 */

namespace app\controllers;
use Pheasant;
use Latte;
use Latte\Loaders;

class BaseController
{

    private $config;
    public $view;

    public function __construct()
    {
        $this->loadConfig();
        $this->initDb();

        $this->view = new Latte\Engine;
        $this->path = APP_ROOT.'/views/'.$this->getClassName();
        $this->view->setLoader(new Loaders\FileLoader($this->path));
        $this->view->setTempDirectory(APP_ROOT.'/views/cache');
    }

    public function initDb()
    {
        Pheasant::setup($this->config['dsn']);
    }

    public function loadConfig()
    {
        $this->config = require APP_ROOT . '/config/base.php';
    }

    public static function getClassName() {
        $class = explode('\\', get_called_class());
        return strtolower(substr(end($class), 0, strripos(end($class), 'controller')));
    }
}