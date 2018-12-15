<?php

class Todo
{
    protected $id;

    protected $title;

    protected $description;

    protected $completed;


    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function makeItCompleted()
    {
        $this->completed = 1;
    }


    public function isCompleted()
    {
        return $this->completed;
    }


}
