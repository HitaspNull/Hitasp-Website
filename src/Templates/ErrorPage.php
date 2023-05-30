<?php

namespace Web\Templates;

class ErrorPage extends Template{
    private $message;

    public function __construct($message){
        parent::__construct();
        $this->message = $message;
        $this->title = $this->setting->getTitle() . ' - 404 Page Not found!';
    }


    public function renderPage(){
        ?>
            <!DOCTYPE html>
            <html lang="en">
                <?php $this->getErrorHead() ?>
                <body>
                    <div id="notfound">
                        <div class="notfound">
                            <div class="notfound-404">
                                <h1>Oops!</h1>
                            </div>
                            <h2>404 - Page not found</h2>
                            <p>The page you are looking for might have been removed had its name changed or is temporarily unavailable.</p>
                            <a href="<?= url('index.php') ?>">Go To Homepage</a>
                        </div>
                    </div>
                </body>
            </html>
        <?php
    }
}