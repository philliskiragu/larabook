<?php 
$I = new FunctionalTester($scenario);
$I->am('a larabook member');
$I->wantTo('login to my larabook account');

$I->signIn();
$I->seeInCurrentUrl('/statuses');
$I->see('Post a status');
//$I->assertTrue(Auth::check());


