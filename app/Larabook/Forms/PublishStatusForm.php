<?php
    /**
     * $Company
     * Date: 06/09/16
     * @author: ${Name}
     */


    namespace Larabook\Forms;


    use Laracasts\Validation\FormValidator;

    class PublishStatusForm extends FormValidator
    {
        /*
       * validation rules for publish status form
       */
        protected $rules = [
            'body' => 'required'
        ];
    }