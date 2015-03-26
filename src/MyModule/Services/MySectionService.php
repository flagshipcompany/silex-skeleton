<?php
namespace MyModule\Services;

class MySectionService
{
    protected $title;

    public function __construct($title = 'Mister')
    {
        $this->title = $title;
    }

    public function makeTitle($name)
    {
        return $this->title.' '.$name;
    }
}
