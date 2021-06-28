<?php


class Orcamento
{
    private $connect;

    public function __construct($conn)
    {
        $this->connect = $conn;
    }

    function selected( $value  ){
        return $value;
    }



}