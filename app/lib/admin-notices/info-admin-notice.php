<?php
namespace Hotmembers3;
class Info_Admin_Notice {
  public static function display($message) {
    Admin_Notice::display('notice-info', $message);
  }
}
