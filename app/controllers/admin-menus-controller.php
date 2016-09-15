<?php

class Admin_Menus_Controller {

  public static function create_menus() {
    $icon = 'http://orig03.deviantart.net/ac5a/f/2012/104/9/4/94c812fcbd992e914150123e21cb5d5a-d4w3rqa.png';

    // Define plugin sidebar menu
    add_menu_page( 'Hotmembers 3.0', 'Hotmembers 3.0', 'manage_options', 'hm3_main_menu', array('Admin_Menus_Controller', 'main_menu'), $icon, 98 );
    add_submenu_page( 'hm3_main_menu', 'Áreas de Membros', 'Áreas de Membros', 'manage_options', 'hm3_main_menu', array('Admin_Menus_Controller', 'membership_areas_index') );
    add_submenu_page( 'hm3_main_menu', 'Configurações', 'Configurações', 'manage_options', 'hm3_settings', array('Admin_Menus_Controller', 'settings') );
    add_submenu_page( 'hm3_main_menu', 'Ajuda', 'Ajuda', 'manage_options', 'hm3_help', array('Admin_Menus_Controller', 'help') );

    // Define plugin pages withou menus
    add_submenu_page( '', 'Adicionar Área de Membros', 'Adicionar Área de Membros', 'manage_options', 'hm3_membership_areas_add', array('Admin_Menus_Controller', 'membership_areas_add') );
    add_submenu_page( '', 'Editar Área de Membros', 'Editar Área de Membros', 'manage_options', 'hm3_membership_areas_show', array('Admin_Menus_Controller', 'membership_areas_show') );
    add_submenu_page( '', 'Excluir Área de Membros', 'Excluir Área de Membros', 'manage_options', 'hm3_membership_areas_delete', array('Admin_Menus_Controller', 'membership_areas_delete') );
  }

  public static function main_menu() {
  }

  public static function membership_areas_index() {
    $dir = dirname(dirname(__FILE__));
    include($dir  . "/views/membership-areas/index.php");
  }

  public static function settings() {
    $dir = dirname(dirname(__FILE__));
    include($dir  . "/views/settings.php");
  }

  public static function help() {
    $dir = dirname(dirname(__FILE__));
    include($dir  . "/views/help.php");
  }

  public static function membership_areas_add() {
    $dir = dirname(dirname(__FILE__));
    include($dir  . "/views/membership-areas/add.php");
  }

  public static function membership_areas_show() {
    $dir = dirname(dirname(__FILE__));
    include($dir  . "/views/membership-areas/show.php");
  }

  public static function membership_areas_delete() {
    $dir = dirname(dirname(__FILE__));
    include($dir  . "/views/membership-areas/delete.php");
  }
}

?>