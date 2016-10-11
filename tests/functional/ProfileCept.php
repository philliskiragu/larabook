<?php

    $I = new FunctionalTester($scenario);
    $I->am('a Larabook Member');
    $I->wantTo('View my profile');

    $I->signIn();
    $I->postAStatus('My new Status.');

    $I->click('Your Profile');
    $I->seeCurrentUrlEquals('/@Foobar');

    $I->see('My new status.');
