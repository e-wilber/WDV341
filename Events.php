<?php
// a class file for wdv341_events table
// e-wilber
// 12-03-24

class Event{
    //Properties

    private $eventsID;  //most irl set to private so people can't just go changing variables
    public $eventsName;
    public $eventsDescription;
    private $eventsPresenter;

    //constructor method (doesnt create new object, it sets default values of the properties in the NEW object)

    function _construct(){
        //usually empty-no parameters
        //set default values of the properties of the new object
        $this->eventsID = 0;
        $this->eventsName = "";
        $this->eventsDescription = "";
        $this->eventsPresenter = "";
    }
    //methods
        //setters/getters acessors/mutators
            //setter - takes an input value and applies it to a property
            //getter - returns the value of a property

        function setEventsID($inID){
            $this->eventsID = $inID; //(setter) assign the input value to a property
        }

        function getEventsID(){
            return $this->eventsID; //returns value to the function call
        }

        function setEventsName($inName){
            $this->eventsName = $inName;
        }

        function getEventsName(){
            return $this->eventsName;
        }

        function setEventsDescription($inDesc){
            $this->eventsDescription = $inDesc; //(setter) assign the input value to a property
        }

        function getEventsDescription(){
            return $this->eventsDescription; //returns value to the function call
        }

        function setEventsPresenter($inPresenter){
            $this->eventsPresenter = $inPresenter; //(setter) assign the input value to a property
        }

        function getEventsPresenter(){
            return $this->eventsPresenter; //returns value to the function call
        }

        //processing methods

}