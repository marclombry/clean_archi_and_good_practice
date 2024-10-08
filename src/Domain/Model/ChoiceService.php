<?php 
namespace Src\Domain\Model;

class ChoiceService{
    public function __construct(private $services){}
    public function getChoiceData(){
        return $this->services;
    }

    public function setChoiceData(array $services) : void {
        if (!empty($services)) {
            $this->services = $services;
        } else {
            throw new InvalidArgumentException('services is empty.');
        }
    }
}
