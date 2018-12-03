<?php
$templateParts = array(
    'controller'=>'',
    'header'=> $app->getBasePath('resources/views/layouts/header.php'),
    'page'=>'',
    'footer'=>$app->getBasePath('resources/views/layouts/footer.php'),
);
$isError = '';


if (isset($_GET['view'])) {
    $controllerName = $app->parseControllerName(ucfirst($_GET['view']));
    $viewName = strtolower($_GET['view']);

    $isControllerExists = file_exists(
        $app->generateController($controllerName, @$_GET['generate'])
    );

    $Controller = $app->getBasePath(
        "app/controllers/" . $controllerName ."Controller.php"
    );
    // Check for controllers
    if (file_exists($Controller)) {
        $templateParts['controller'] = $Controller;
    }

    $view = $app->getBasePath(
        "resources/views/". $viewName .".view.php"
    );
    $error = $app->getBasePath(
        "resources/views/errors/404.error.php"
    );
    // check for Views
    if (file_exists($view)) {
        $templateParts['page'] = $view;
    } else {
        $templateParts['page'] = $error;
        $isError = '404';
    }

} else {
    $templateParts['header'] =  $app->getBasePath(
        'resources/views/layouts/welcome-header.php'
    );
    $templateParts['page'] = $app->getBasePath(
        "resources/views/welcome.view.php"
    );
}

foreach($templateParts as $template)
{
    if ($template !== '' & $isError == '') {
        require $template;
    } else {
        switch($isError) {
            case '404' :
                require $app->getViewsDir(). "errors/{$isError}.error.php";
        }
    }
}
