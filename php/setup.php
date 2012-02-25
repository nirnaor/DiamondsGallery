<?php

// load Smarty library
require('../smarty/Smarty.class.php');

// The setup.php file is a good place to load
// required application library files, and you
// can do that right here. An example:
// require('guestbook/guestbook.lib.php');

class Smarty_GuestBook extends Smarty {

   function __construct()
   {

        // Class Constructor.
        // These automatically get set with each new instance.

        parent::__construct();

        $this->setTemplateDir('../templates/');
        $this->setCompileDir('../smarty/templates_c/');
        $this->setConfigDir('../smarty/configs/');
        $this->setCacheDir('../smarty/cache/');

        $this->caching = Smarty::CACHING_LIFETIME_CURRENT;
        $this->assign('app_name', 'Guest Book');
   }




}

require('setup.php');
$smarty = new Smarty_GuestBook();
//** un-comment the following line to show the debug console
//$smarty->debugging = true;
?>

