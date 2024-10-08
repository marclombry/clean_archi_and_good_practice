<?php

use Src\Domain\Model\ChoiceService;

function testIsChoiceDataIsNotEmptyAndNotNull(array $data, array $expect)
{
    $choicePerformer = new ChoiceService(['technical','services']);
    $choicePerformer->setChoiceData($data);
    $actualData = $choicePerformer->getChoiceData();

    expect($actualData)->not->toBeEmpty();
    expect($actualData)->not->toContain(null);
    expect($actualData)->toBeArray()->toEqual($expect);
}

describe('user can take an appointment', function() {
    it('choice of the user, has a instance of ChoiceService class', function(){
        $choiceService = new ChoiceService(['technical','services']);
        expect($choiceService)->toBeInstanceOf(ChoiceService::class);
    });

    it('ChoiceService class has getChoiceData method', function(){
        $choiceService = new ChoiceService(['technical','services']);
        $isGetServiceMethodExists = method_exists($choiceService,'getChoiceData');
        expect($isGetServiceMethodExists)->toBe(true);
    });

    it('choice of user is a services and services is an array and not empty and not null', function() {
        testIsChoiceDataIsNotEmptyAndNotNull(['technical','services'],['technical','services']);
    });

    it('choice of user is a performer and performer is an array and not empty and not null', function() {
        testIsChoiceDataIsNotEmptyAndNotNull(['eric','nadège'],['eric','nadège']);
    });

    it('choice of user throw invalidException if data is empty or null', function() {
        $choiceService = new ChoiceService(['']);
        $choice = $choiceService->getChoiceData();
        if(empty($choice) || $choice === [''] || $choice === null) {
            throw new InvalidArgumentException('choice data must not be empty');
        }
    })->throws(InvalidArgumentException::class);
});