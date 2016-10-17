<?php
namespace Hotmembers3;
class HotmembersConnectHotmart{
  /** Request Handler
  * This uses the $POST values to handle hotmart POST connection
  */
  public static function act($post) {
    $status = $post['status'];
    // $hottok = $post['hottok'];
    $email = $post['email'];
    $first_name = $post['first_name'];
    $last_name = $post['last_name'];
    $prod = $post['prod'];
    // $transaction = $post['transaction'];

    $opts = array(
      'prod' => $prod
      // 'hottok' => $hottok
    );
    $memberships = Membership_Area::where($opts);
    if(count($memberships) == 0) {
      echo "<br>no membership area found for specification";
      return;
    }
    foreach ($memberships as $membership) {
      echo "<br>Membership_Area name: $membership->name";
      if (self::is_status_to_add($status)) {
        echo "<br>status is to add";
        $user = get_user_by('email', $email );
        if ($user) {
          echo "<br>user exists on create";
          $user->add_role($membership->slug);
        }
        else {
          echo "<br>user does not exist";
          $pass = wp_generate_password(8, false);
          $userdata = array(
            'user_pass' =>  $pass,
            'user_login' => $email,
            'user_email' => $email,
            'first_name' => $first_name,
            'last_name'  => $last_name,
            'role' => $membership->slug
          );
          wp_insert_user( $userdata );
          // Send email to user with
        }
      }
      elseif(self::is_status_to_remove($status)) {
        echo "<br>status is to remove";
        $user = get_user_by('email', $email );
        if($user) {
          echo "<br>user exists on remove role";
          $user->remove_role($membership->slug);
        }
      }
    }
  }

  private static function is_status_to_add($status) {
    $status_to_add = ['approved', 'completed'];
    return in_array($status, $status_to_add);
  }

  private static function is_status_to_remove($status) {
    $status_to_remove = ['blocked', 'refunded', 'canceled'];
    return in_array($status, $status_to_remove);
  }
}