<?php
/**
 * @file
 * SN Tracking Block
 */

namespace Drupal\sn_tracking\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides SN Tracking block
 *
 *  @Block(
 *    id = "sn_tracking_block",
 *    admin_label = @Translation("SN Tracking"),
 *    category = @Translation("Blocks")
 *  )
 */
class SNTracking extends BlockBase {

  public function build() {

    $default_code = \Drupal::state()->get('SNTrack_code');

    $output['code'] = [
      '#markup' =>  base64_decode($default_code),
      '#allowed_tags' => ['script'],
    ];
    return $output;
    //return array('#markup' =>  base64_decode($default_code));
    //return array('#plain_text' =>  $default_code);
  }

}
