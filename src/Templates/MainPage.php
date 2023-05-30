<?php

namespace Web\Templates;

use Web\Classes\Session;
use Web\Models\AboutUs;
use Web\Models\Contact;
use Web\Models\Post;
use Web\Models\Works;

class MainPage extends Template{

    private $errors;
    private $lastPosts;
    private $posts;
    private $works;
    private $aboutUs;
    private $contacts;
    private $message;

    public function __construct(){
        parent::__construct();
        $this->title = $this->setting->getTitle();

        $aboutUsModel = new AboutUs();
        $postModel = new Post();
        $contactModel = new Contact();
        $worksModel = new Works();

        $this->posts = $postModel->getAllData();
        $this->aboutUs = $aboutUsModel->getAllData();
        $this->contacts = $contactModel->getAllData();
        $this->works = $worksModel->getAllData();

        $this->lastPosts = $postModel->sortData(function($first, $second){
            return $first->getTimeStamp() > $second->getTimeStamp()? -1 : 1;
        });


    }

    public function renderPage(){
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
                <p class="device-notification--message">Global has so much to offer that we must request you orient your device to portrait or find a larger screen. You won't be disappointed.</p>
                </div>

                <div class="perspective effect-rotate-left">
                <div class="container"><div class="outer-nav--return"></div>
                    <div id="viewport" class="l-viewport">
                    <div class="l-wrapper">
                    <?php $this->getHeader() ?>
                    <?php $this->getNavbar() ?>
                        <ul class="l-main-content main-content">
                        <li class="l-section section section--is-active">
                            <div class="intro">
                            <div class="intro--banner">
                                <h1>Your next<br>experience<br>with us</h1>
                                <button class="cta">Order
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 150 118" style="enable-background:new 0 0 150 118;" xml:space="preserve">
                                <g transform="translate(0.000000,118.000000) scale(0.100000,-0.100000)">
                                    <path d="M870,1167c-34-17-55-57-46-90c3-15,81-100,194-211l187-185l-565-1c-431,0-571-3-590-13c-55-28-64-94-18-137c21-20,33-20,597-20h575l-192-193C800,103,794,94,849,39c20-20,39-29,61-29c28,0,63,30,298,262c147,144,272,271,279,282c30,51,23,60-219,304C947,1180,926,1196,870,1167z"/>
                                </g>
                                </svg>
                                <span class="btn-background"></span>
                                </button>
                                <img src="<?= asset('img/introduction-visual.png') ?>" alt="Welcome">
                            </div>
                            <div class="intro--options">
                            <?php foreach($this->posts as $post): ?>
                                <a href="<?= url('index.php', ['action' => 'single', 'id' => $post->getId()]) ?>">
                                <h3><?= $post->getTitle() ?></h3>
                                <p><?= $post->getExcerpt() ?></p>
                                </a>
                            <?php endforeach ?>
                            </div>
                            </div>
                        </li>
                        <li class="l-section section">
                            <div class="work">
                            <h2>What we do? </h2>
                            <div class="work--lockup">
                                <ul class="slider">
                                    <?php foreach($this->works as $work): ?>
                                <li class="<?= $work->getSliderClass() ?>">
                                    <div class="slider--item-image">
                                        <img src="<?= asset($work->getImage()) ?>" alt="Victory">
                                    </div>
                                    <p class="slider--item-title"><?= $work->getTitle() ?></p>
                                    <p class="slider--item-description"><?= $work->getContent() ?></p>
                                </li>
                                <?php endforeach ?>
                                </ul>
                                <div class="slider--prev">
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 0 150 118" style="enable-background:new 0 0 150 118;" xml:space="preserve">
                                <g transform="translate(0.000000,118.000000) scale(0.100000,-0.100000)">
                                    <path d="M561,1169C525,1155,10,640,3,612c-3-13,1-36,8-52c8-15,134-145,281-289C527,41,562,10,590,10c22,0,41,9,61,29
                                    c55,55,49,64-163,278L296,510h575c564,0,576,0,597,20c46,43,37,109-18,137c-19,10-159,13-590,13l-565,1l182,180
                                    c101,99,187,188,193,199c16,30,12,57-12,84C631,1174,595,1183,561,1169z"/>
                                </g>
                                </svg>
                                </div>
                                <div class="slider--next">
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 150 118" style="enable-background:new 0 0 150 118;" xml:space="preserve">
                                <g transform="translate(0.000000,118.000000) scale(0.100000,-0.100000)">
                                    <path d="M870,1167c-34-17-55-57-46-90c3-15,81-100,194-211l187-185l-565-1c-431,0-571-3-590-13c-55-28-64-94-18-137c21-20,33-20,597-20h575l-192-193C800,103,794,94,849,39c20-20,39-29,61-29c28,0,63,30,298,262c147,144,272,271,279,282c30,51,23,60-219,304C947,1180,926,1196,870,1167z"/>
                                </g>
                                </svg>
                                </div>
                            </div>
                            </div>
                        </li>
                        <li class="l-section section">
                            <div class="about">
                            <div class="about--banner">
                                <h2>We<br>believe in<br>passionate<br>people</h2>
                                <span>
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 150 118" style="enable-background:new 0 0 150 118;" xml:space="preserve">
                                    <g transform="translate(0.000000,118.000000) scale(0.100000,-0.100000)">
                                    <path d="M870,1167c-34-17-55-57-46-90c3-15,81-100,194-211l187-185l-565-1c-431,0-571-3-590-13c-55-28-64-94-18-137c21-20,33-20,597-20h575l-192-193C800,103,794,94,849,39c20-20,39-29,61-29c28,0,63,30,298,262c147,144,272,271,279,282c30,51,23,60-219,304C947,1180,926,1196,870,1167z"/>
                                    </g>
                                    </svg>
                                </span>
                                <img src="assets/img/about-visual.png" alt="About Us">
                            </div>
                            <div class="about--options">
                            <?php foreach($this->aboutUs as $about): ?>
                                <a href="<?= url('index.php', ['action' => 'singleabout', 'id' => $about->getId()]) ?>">
                                <h3><?= $about->getTitle() ?></h3>
                                </a>
                                <?php endforeach ?>
                            </div>
                            </div>
                        </li>
                        <li class="l-section section">
                            <div class="contact">
                            <div class="contact--lockup">
                                <div class="modal">
                                <div class="modal--information">
                                    <p>Iran, Karaj</p>
                                    <a href="mailto:hitaspnull@gmail.com">hitaspnull@gmail.com</a>
                                    <a href="https://discord.gg/ktqa25TEcC">Discord Community</a>
                                </div>
                                <ul class="modal--options">
                                    <?php foreach($this->contacts as $contact): ?>
                                    <li><a href="<?= $contact->getLink() ?>"><?= $contact->getTitle() ?></a></li>
                                    <?php endforeach?>
                                </ul>
                                </div>
                            </div>
                            </div>
                        </li>
                        <li class="l-section section">
                            <div class="hire">
                            <h2>You want us to do</h2>
                            <!-- checkout formspree.io for easy form setup -->
                            <form method="post" class="work-request">
                                <div class="work-request--options">
                                <span class="options-a">
                                    <input id="opt-1" type="checkbox" value="web developer">
                                    <label for="opt-1">
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 150 111" style="enable-background:new 0 0 150 111;" xml:space="preserve">
                                    <g transform="translate(0.000000,111.000000) scale(0.100000,-0.100000)">
                                        <path d="M950,705L555,310L360,505C253,612,160,700,155,700c-6,0-44-34-85-75l-75-75l278-278L550-5l475,475c261,261,475,480,475,485c0,13-132,145-145,145C1349,1100,1167,922,950,705z"/>
                                    </g>
                                    </svg>
                                    Web Developer
                                    </label>
                                    <input id="opt-2" type="checkbox" value="graphic design">
                                    <label for="opt-2">
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 150 111" style="enable-background:new 0 0 150 111;" xml:space="preserve">
                                    <g transform="translate(0.000000,111.000000) scale(0.100000,-0.100000)">
                                        <path d="M950,705L555,310L360,505C253,612,160,700,155,700c-6,0-44-34-85-75l-75-75l278-278L550-5l475,475c261,261,475,480,475,485c0,13-132,145-145,145C1349,1100,1167,922,950,705z"/>
                                    </g>
                                    </svg>
                                    Graphic Design
                                    </label>
                                    <input id="opt-3" type="checkbox" value="motion design">
                                    <label for="opt-3">
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 150 111" style="enable-background:new 0 0 150 111;" xml:space="preserve">
                                    <g transform="translate(0.000000,111.000000) scale(0.100000,-0.100000)">
                                        <path d="M950,705L555,310L360,505C253,612,160,700,155,700c-6,0-44-34-85-75l-75-75l278-278L550-5l475,475c261,261,475,480,475,485c0,13-132,145-145,145C1349,1100,1167,922,950,705z"/>
                                    </g>
                                    </svg>
                                    Motion Design
                                    </label>
                                </span>
                                <span class="options-b">
                                    <input id="opt-4" type="checkbox" value="ux design">
                                    <label for="opt-4">
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 150 111" style="enable-background:new 0 0 150 111;" xml:space="preserve">
                                    <g transform="translate(0.000000,111.000000) scale(0.100000,-0.100000)">
                                        <path d="M950,705L555,310L360,505C253,612,160,700,155,700c-6,0-44-34-85-75l-75-75l278-278L550-5l475,475c261,261,475,480,475,485c0,13-132,145-145,145C1349,1100,1167,922,950,705z"/>
                                    </g>
                                    </svg>
                                    UX Design
                                    </label>
                                    <input id="opt-5" type="checkbox" value="webdesign">
                                    <label for="opt-5">
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 150 111" style="enable-background:new 0 0 150 111;" xml:space="preserve">
                                    <g transform="translate(0.000000,111.000000) scale(0.100000,-0.100000)">
                                        <path d="M950,705L555,310L360,505C253,612,160,700,155,700c-6,0-44-34-85-75l-75-75l278-278L550-5l475,475c261,261,475,480,475,485c0,13-132,145-145,145C1349,1100,1167,922,950,705z"/>
                                    </g>
                                    </svg>
                                    Webdesign
                                    </label>
                                    <input id="opt-6" type="checkbox" value="marketing">
                                    <label for="opt-6">
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 150 111" style="enable-background:new 0 0 150 111;" xml:space="preserve">
                                    <g transform="translate(0.000000,111.000000) scale(0.100000,-0.100000)">
                                        <path d="M950,705L555,310L360,505C253,612,160,700,155,700c-6,0-44-34-85-75l-75-75l278-278L550-5l475,475c261,261,475,480,475,485c0,13-132,145-145,145C1349,1100,1167,922,950,705z"/>
                                    </g>
                                    </svg>
                                    Marketing
                                    </label>
                                </span>
                                </div>
                                <div class="work-request--information">
                                <div class="information-name">
                                    <input id="name" type="text" spellcheck="false">
                                    <label for="name"">Name</label>
                                </div>
                                <div class="information-email">
                                    <input id="email" type="email" spellcheck="false" >
                                    <label for="email">Email</label>
                                </div>
                                </div>
                                <input type="submit" value="Send Request">
                            </form>
                            </div>
                        </li>
                        </ul>
                    </div>
                    </div>
                </div>
                <?php $this->getOuterNav() ?>
                </div>
                <?php $this->getFooter() ?>
                <?php $this->getScripts() ?>
                </body>
            </html>
        <?php
    }

}