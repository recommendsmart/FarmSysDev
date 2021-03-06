<?php

namespace Drupal\cbo_organization;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form handler for the organization edit forms.
 */
class OrganizationForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $organization = $this->entity;
    $insert = $organization->isNew();
    $organization->save();
    $organization_link = $organization->link($this->t('View'));
	$t_args = ['%title' => $organization->link($organization->label())];
    

    if ($insert) {
      drupal_set_message($this->t('Organization %title has been created.', $t_args));
    }
    else {
      drupal_set_message($this->t('Organization %title has been updated.', $t_args));
    }
  }

}
