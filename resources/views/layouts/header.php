<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Home - Todo's</title>
</head>
<body>

    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="<?php echo $app->getUrl('?view=home') ?>">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo $app->getUrl('?view=new-todo'); ?>">
                        New Todo <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $app->getUrl('?view=logout'); ?>">Logout</a>
                </li>
                </ul>
            </div>
        </nav>
    </div>

    <!-- Page container starts here -->
    <div class="container pt-5">
    <?php
        if (!$isControllerExists) {
            ?>
            <div class="row">
                <div class="alert alert-success" role="alert">
                    There is no controller defined for this view.<br>
                    <a href="<?php echo $app->getUrl("?view={$viewName}&generate=1"); ?>" class="alert-link">
                        Generate Controller
                    </a>
                </div>
            </div>
            <?php
        }

        if (isset($isCreated) && $isCreated) {
            ?>
            <div class="alert alert-success" role="alert">
                    Record successfully created.
                </div>
            <?php
        }
    ?>
