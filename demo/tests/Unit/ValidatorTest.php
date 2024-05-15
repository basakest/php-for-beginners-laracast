<?php

use Core\Validator;

it('can validate the length of string', function () {
    expect(Validator::string('hello', 1, 5))->toBeTrue()
        ->and(Validator::string('hello', 7, 11))->toBeFalse();
});

it('can trim the space of string', function () {
    expect(Validator::string('      hello     ', 1, 5))->toBeTrue();
});

it('can validate email', function () {
    expect(Validator::email('1652759879@gmail.com'))->toBeTrue()
        ->and(Validator::email('1652759879'))->toBeFalse();
});

it('can compare two numbers', function () {
    expect(Validator::greaterThan(10, 5))->toBeTrue()
        ->and(Validator::greaterThan(5, 10))->toBeFalse();
});
