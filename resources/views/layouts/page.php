<?php
$templateParts = array(
    'controller'=>'',
    'header'=> $app->getBasePath('resources/views/layouts/header.php'),
    'page'=>'',
    'footer'=>$app->getBasePath('resources/views/layouts/footer.php'),
);


if (isset($_GET['view'])) {

    $Controller = $app->getBasePath(
        "app/controllers/".ucfirst($_GET['view'])."Controller.php"
    );
    // Check for controllers
    if (file_exists($Controller)) {
        $templateParts['controller'] = $Controller;
    }

    $view = $app->getBasePath(
        "resources/views/".strtolower($_GET['view']).".view.php"
    );
    $error = $app->getBasePath(
        "resources/views/errors/404.error.php"
    );
    // check for Views
    if (file_exists($view)) {
        $templateParts['page'] = $view;
    } else {
        $templateParts['page'] = $error;
    }

} else {
    $templateParts['page'] = $app->getBasePath(
        "resources/views/welcome.view.php"
    );
}

foreach($templateParts as $template)
{
    if ($template !== '') {
        require $template;
    }
}
