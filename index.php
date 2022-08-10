<?php

$mainPosition = __DIR__;

require_once("{$mainPosition}\bootstrap\Env.php");
require_once("{$mainPosition}\helper\help.php");

Env::execute();
dd(env("DB_HOST"));