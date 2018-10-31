<?php

namespace MyCourt\Form;

use Zend\Form\Form;

/**
 * Description of CourtForm
 *
 * @author dude
 */
class CourtForm extends Form {

    public function __construct() {
        // Define form name
        parent::__construct('court-form');

        // Set POST method for this form
        $this->setAttribute('method', 'post');

        // (Optionally) set action for this form
        $this->setAttribute('action', '/court/edit');

        $this->add([
            'type' => 'text',
            'name' => 'id',
            'attributes' => [
                'id' => 'id',
                'readonly' => 'true',
                'class' => 'form-control',
            ],
            'options' => [
                'label' => 'ID',
            ],
        ]);

        $this->add([
            'type' => 'text',
            'name' => 'name',
            'attributes' => [
                'id' => 'name',
                'class' => 'form-control',
            ],
            'options' => [
                'label' => 'Name',
            ],
        ]);

        $this->add([
            'type' => 'select',
            'name' => 'is_active',
            'attributes' => [
                'id' => 'is_active',
                'class' => 'form-control',
            ],
            'options' => [
                'label' => 'Status',
                'value_options' => array(
                    '1' => 'ja',
                    '0' => 'nein',
                ),
            ],
        ]);

        // Add the submit button
        $this->add([
            'type' => 'submit',
            'name' => 'submit',
            'attributes' => [
                'value' => 'Speichern',
                'class' => 'form-control',
            ],
        ]);
    }

}
