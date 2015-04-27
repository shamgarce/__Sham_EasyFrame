<?php

define('CI_VERSION', '2.2.1');

/**
 * CodeIgniter Branch (Core = TRUE, Reactor = FALSE)
 * @var boolean
 *
 */
define('CI_CORE', FALSE);

/*
 * ------------------------------------------------------
 *  Load the global functions
 * ------------------------------------------------------
 */
//require(BASEPATH.'core/Common.php');              //通用函数

/*
 * ------------------------------------------------------
 *  Load the framework constants
 * ------------------------------------------------------
 */
if (defined('ENVIRONMENT') AND file_exists(APPPATH.'config/'.ENVIRONMENT.'/constants.php'))
{
    require(APPPATH.'config/'.ENVIRONMENT.'/constants.php');
}
else
{
    require(APPPATH.'config/constants.php');
}

/*
 * ------------------------------------------------------
 *  Define a custom error handler so we can log PHP errors
 * ------------------------------------------------------
 */
set_error_handler('_exception_handler');

if ( ! is_php('5.3'))
{
    @set_magic_quotes_runtime(0); // Kill magic quotes
}
