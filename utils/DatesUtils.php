<?php 
//esta clase sirve para manipular las fechas
namespace utils;

class DatesUtils{

    public static function getCurrentDate(){
        return date("Y-m-d");
    }

    public static function comparerDates($date1, $date2){
        return (strtotime($date1) > strtotime($date2))? true : false;
    }

    public static function comparerWithCurrentDate($date){
        return (strtotime(date("Y-m-d")) > strtotime($date))? true : false;
    }

    public static function addDaysToCurrentDate($numberDays){
        $currentDate = date("Y-m-d");
        $date = new \DateTime($currentDate);
        $date->add(new \DateInterval('P'.$numberDays.'D'));
        return $date->format("Y-m-d");
        // date_add($currentDate, date_interval_create_from_date_string($numberDays." days"));
        // return date_format($currentDate, "Y-m-d");
    }

    public static function addDaysToDate($date, $numberDays){
        date_add($date, date_interval_create_from_date_string($numberDays." days"));
        return date_format($date, "Y-m-d");
    }

    

}