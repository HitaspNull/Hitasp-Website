<?php

require './vendor/autoload.php';
use Web\Classes\Request;
use Web\Exceptions\DoesNotExsistException;
use Web\Exceptions\NotFoundException;
use Web\Templates\ErrorPage;
use Web\Templates\MainPage;
use Web\Templates\NotFoundPage;
use Web\Templates\SingleAboutPage;
use Web\Templates\SinglePage;

try{
    $request = new Request();
switch($request->get('action')){
    case 'single':
        $page = new SinglePage;
        break;
    case 'singleabout':
        $page = new SingleAboutPage;
        break;
    case null:
        $page = new MainPage;
        break;
    default:
        throw new NotFoundException('Page not found!');
}
} catch(DoesNotExsistException | NotFoundException $exception){
    $page = new NotFoundPage($exception->getMessage());
} catch(Exception $exception){
    $page = new ErrorPage($exception->getMessage());
} finally{
    $page->renderPage();
}
