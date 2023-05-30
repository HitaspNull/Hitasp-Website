<?php

namespace Web\Templates;

use Web\Models\AboutUs;

class SingleAboutPage extends Template{
    private $lastPosts;
    private $post;
    private $works;
    private $aboutUs;
    private $contacts;

    public function __construct(){
        parent::__construct();
        $this->title = $this->setting->getTitle();

        $id = $this->request->id;
        $aboutModel = new AboutUs();
        $this->post = $aboutModel->getDataById($id);
        $this->title = $this->setting->getTitle() . ' - ' . $this->post->getTitle();

        $this->lastPosts = $aboutModel->sortData(function($first, $second){
            return $first->getTimeStamp() > $second->getTimeStamp()? -1 : 1;
        });
    }
    public function renderPage() {
        ?>
            <!DOCTYPE html>
                <html lang="en">
                <?php $this->getHead() ?>
                <body>

                <!-- notification for small viewports and landscape oriented smartphones -->
                <div class="device-notification">
                <a class="device-notification--logo" href="#0">
                    <img src="<?= asset('img/logo.png')  ?>" alt="Global">
                    <p><?= $this->title ?></p>
                </a>
                <p class="device-notification--message">Hitasp Website has so much to offer that we must request you orient your device to portrait or find a larger screen. You won't be disappointed.</p>
                </div>

                <div class="perspective effect-rotate-left">
                <div class="container">
                    <div id="viewport" class="l-viewport">
                    <div class="l-wrapper">
                    <?php $this->getSingleHeader() ?>
                        <ul class="l-main-content main-content">
                        <li class="l-section section section--is-active">
                            <div class="intro">
                            <div class="intro--options">
                                <p><?= $this->post->getContent() ?></p>
                            </div>
                            </div>
                        </li>
                </div>
                </body>
            </html>
        <?php
    }
}