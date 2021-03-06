<?php
namespace Hotmembers3;
class Membership_Areas_Controller {

  public static function perform_on_post() {
    $notices = [];
    if( isset($_POST['method'])) {
      switch ($_POST['method']) {
        case 'add':
          echo 'ADD';
          $notices = Membership_Area_Controller_Add::perform($_POST);
          break;

        case 'update':
          echo 'UPDATE';
          $notices = Membership_Area_Controller_Update::perform($_POST);
          break;

        case 'delete':
          echo 'DELETE';
          $notices = Membership_Area_Controller_Delete::perform($_POST);
          break;

        default:
          echo 'OTHER METHOD';
          break;
      }
    }
    else {
      echo 'NO METHOD SET';
    }
    $admin_notices_handler = new Admin_Notices_Handler($notices);
    $admin_notices_handler->display();
  }

  public static function index() {
    global $wpdb;
    $table = Membership_Area::table_name();
    $db_areas = $wpdb->get_results( "SELECT * FROM $table" );

    $areas = [];
    foreach($db_areas as $area) {
      $areas[] = Membership_Area_Model::with_object($area);
    }
    return $areas;
  }

  public static function delete($get) {
    $membership_id = $_GET['id'];
    return Membership_Area::find($membership_id);
  }

  public static function update($get) {
    $membership_id = $_GET['id'];
    return Membership_Area::find($membership_id);
  }
}

?>
