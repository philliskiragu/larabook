<?php

    $I = new FunctionalTester($scenario);
    $I->am('guest');
    $I->wantTo('sign up for a Larabook account');

    $I->amOnPage('/');
    $I->click('Sign Up!');
    $I->seeCurrentUrlEquals('/register');

    $I->fillfield('Username:', 'JohnDoe');
    $I->fillfield('Email:', 'john@example.com');
    $I->fillfield('Password:', 'demo');
    $I->fillfield('Password Confirmation:', 'demo');
    $I->click('Sign Up');

    $I->seeCurrentUrlEquals('');
    $I->see('Welcome to Larabook');
    $I->seeRecord('users', [
        'username' => 'JohnDoe'
    ]);

    $I->seeAuthentication();

    $I->assertTrue(Auth::check());




