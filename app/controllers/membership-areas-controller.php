<?php
class Membership_Areas_Controller {

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



}

?>