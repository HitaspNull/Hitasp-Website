<?php

namespace Web\Templates;
use Web\Classes\Request;
use Web\Classes\Validator;
use Web\Models\Setting;

abstract class Template {

    protected $title;
    protected $setting;
    protected $request;
    protected $validator;

    public function __construct(){
        $this->request = new Request();
        $this->validator = new Validator($this->request);
        $settingModel = new Setting();
        $this->setting = $settingModel->getFirstData();
    }
    
    protected function getHead(){
        ?>
        <head>
            <title><?= $this->title ?></title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="<?= $this->setting->getDescription() ?>">
            <meta name="keywords" content="<?= $this->setting->getKeywords() ?>">
            <meta name="author" content="<?= $this->setting->getAuthor() ?>">
            <link rel="stylesheet" href="<?= asset('css/main.css') ?>">
        </head>
        <?php
    }

    protected function getErrorHead(){
        ?>
            <head>
                <meta charset="utf-8">
                <title><?= $this->title ?></title>

                <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,900" rel="stylesheet">

                <link type="text/css" rel="stylesheet" href="<?= asset('css/error404.css') ?>" />

            </head>
        <?php
    }

    protected function getHeader(){
        ?>
        <header class="header">
          <a class="header--logo" href="<?= url('index.php') ?>">
            <img src="<?= asset('img/logo.png') ?>" alt="Hitasp">
            <p><?= $this->title ?></p>
          </a>
          <div class="header--nav-toggle">
            <span></span>
          </div>
        </header>
        <?php
    }

    protected function getSingleHeader(){
        ?>
        <header class="header">
          <a class="header--logo" href="<?= url('index.php') ?>">
            <img src="<?= asset('img/logo.png') ?>" alt="Hitasp">
            <p><?= $this->title ?></p>
          </a>
        </header>
        <?php
    }

    protected function getFooter(){
        ?>
            <footer style="padding: 20px 0;margin-top: 15px; text-align: center;" ><?= $this->setting->getFooter() ?> <a href="https://discord.gg/ktqa25TEcC">Hitasp</a></footer>
        <?php
    }

    protected function getNavbar(){
        ?>
        <nav class="l-side-nav">
          <ul class="side-nav">
            <li class="is-active"><span>Home</span></li>
            <li><span>Works</span></li>
            <li><span>About</span></li>
            <li><span>Contact</span></li>
            <li><span>Order</span></li>
          </ul>
        </nav>
        <?php
    }

    protected function getOuterNav(){
        ?>
        <ul class="outer-nav">
            <li class="is-active">Home</li>
            <li>Works</li>
            <li>About</li>
            <li>Contact</li>
            <li>Order</li>
        </ul>
        <?php
    }

    protected function getScripts(){
        ?>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
            <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-2.2.4.min.js"><\/script>')</script>
            <script src="<?= asset('js/functions-min.js') ?>"></script>
        <?php
    }

    abstract public function renderPage();
}