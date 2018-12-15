<?php

// Your controller code goes here

session_destroy();

header('Location:'. $app->getUrl('?view=login'));
