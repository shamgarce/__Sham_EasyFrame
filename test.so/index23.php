<?php
/*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 *     development  //开发模式
 *     testing      //测试模式
 *     production   //发布模式
 * NOTE: 如果要更改,同步更修改下面的error_reporting
 */
define('ENVIRONMENT', 'development');
/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 */

if (defined('ENVIRONMENT'))
{
    switch (ENVIRONMENT)
    {
        case 'development':
            error_reporting(E_ALL && ~Notice);
            break;
        case 'testing':
        case 'production':
            error_reporting(0);
            break;
        default:
            exit('The application environment is not set correctly.');
    }
}

/*
 *---------------------------------------------------------------
 * SYSTEM FOLDER NAME
 *---------------------------------------------------------------
 *  C 目录
 */
$system_path = 'C';

/*
 *---------------------------------------------------------------
 * APPLICATION FOLDER NAME
 *---------------------------------------------------------------
 * A 目录
 */
$application_folder = 'Measy';

/*
 * ---------------------------------------------------------------
 * C 路径的预处理
 * ---------------------------------------------------------------
 */
if (realpath($system_path) !== FALSE)
{
    $system_path = realpath($system_path).'/';
}
// ensure there's a trailing slash
$system_path = rtrim($system_path, '/').'/';

// Is the system path correct?
if ( ! is_dir($system_path))
{
    exit("Your system folder path does not appear to be set correctly. Please open the following file and correct this: ".pathinfo(__FILE__, PATHINFO_BASENAME));
}

/*
 * -------------------------------------------------------------------
 *  Now that we know the path, set the main path constants
 * -------------------------------------------------------------------
 */
// The name of THIS file  文件名
define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

// The PHP file extension
// this global constant is deprecated.
define('EXT', '.php');

// Path to the system folder
define('BASEPATH', str_replace("\\", "/", $system_path));

// Path to the front controller (this file)
define('FCPATH', str_replace(SELF, '', __FILE__));


// Name of the "system folder"
define('SYSDIR', trim(strrchr(trim(BASEPATH, '/'), '/'), '/'));

// The path to the "application" folder
if (is_dir($application_folder))
{
    define('APPPATH', $application_folder.'/');
}
else
{
    if ( ! is_dir(BASEPATH.$application_folder.'/'))
    {
        exit("Your application folder path does not appear to be set correctly. Please open the following file and correct this: ".SELF);
    }

    define('APPPATH', BASEPATH.$application_folder.'/');
}

/*掉出数据看看* /

ENVIRONMENT           :=>   development
$system_path          :=>   E:\www\slim-API\test.so\C/
$application_folder   :=>   Measy
SELF                  :=>   index23.php
EXT                   :=>   .php
BASEPATH              :=>   E:/www/slim-API/test.so/C/
FCPATH                :=>   E:\www\slim-API\test.so\
SYSDIR                :=>   C
APPPATH               :=>   Measy/

/*
 * --------------------------------------------------------------------
 * LOAD THE BOOTSTRAP FILE
 * --------------------------------------------------------------------
 * And away we go...
 */
require_once BASEPATH.'core/Easy.php';
echo 1;
/* End of file index.php */
/* Location: ./index.php */





