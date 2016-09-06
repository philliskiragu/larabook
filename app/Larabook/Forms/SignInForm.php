<?php
/**
 * $Company
 * Date: 06/09/16
 * @author: ${Name}
 */


namespace Larabook\Forms;


use Laracasts\Validation\FormValidator;

class SignInForm extends FormValidator
{
    /*
   * validation rules for sign in form
   */
    protected $rules = [
        'email' => 'required',
        'password' => 'required'
    ];
}