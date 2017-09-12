<?php
/**
  * @file
  * Contains \Drupal\SNTrack\Form\SNTrackForm
  */

namespace Drupal\sn_tracking\Form;

use Drupal\Core\Database\Database;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\Entity\Node;


/**
  *  Provides SNTrack Email form
  */
class SNTrackingForm extends FormBase {

  public function getFormId() {
    return 'SNTrack_email_form';
  }

  /**
    * (@inheritdoc)
    */
  public function buildForm(array $form, FormStateInterface $form_state) {

    // $query = \Drupal::entityQuery('node', 'n')
    //            ->condition('type', 'webform', '=');

    // $nodes = entity_load_multiple('node', $query->execute());

    // foreach ($nodes as $nid => $value) {
    //   $node = Node::load($nid);
    //   // dpm($node);
    //   $checkboxes[$node->id()] = $node->title->value;
    // }

    $default_code = \Drupal::state()->get('SNTrack_code');

    foreach ($checkboxes as $key => $value) {
      if (in_array($key, $SNTrack_webforms)) {
        $checked[] = $key;
      }
    }

    $form['sntrack_content'] = array(
      '#title' => t('Tracking Code'),
      '#type' => 'textarea',
      '#default_value' => base64_decode($default_code),
      '#description' => t('Mongoose Tracking Code Block'),
      '#required' => FALSE
    );
    $form['submit'] = array(
        '#type' => 'submit',
        '#value' => t('Submit')
      );

    return $form;

  }

  /**
    * (@inheritdoc)
    */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $code = $form_state->getValue('sntrack_content');
    \Drupal::state()->set('SNTrack_code', base64_encode($code));
  }

}
