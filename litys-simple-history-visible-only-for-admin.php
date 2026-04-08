<?php
/*
Plugin Name: LityS Simple History
Plugin URI: https://github.com/litys/mu-plugins
Description: Adjusting the free version of simple history plugin
Version: 1.0.0
Author: LityS
Author URI: https://github.com/litys
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html
*/

if ( ! defined( 'ABSPATH' ) ) exit;

class litys_Simple_History {
  public function __construct() {
    add_filter( 'simple_history/full_stealth_mode_enabled', array( &$this, 'restrict_to_admins_only' ) );
  }

  /**
   * Restrict access for users
   *
   * @return bool
   */
  public function restrict_to_admins_only(): bool {
    if ( ! current_user_can( 'manage_options' ) ) {
      return true;
    }

    return false;
  }
}

new litys_Simple_History();