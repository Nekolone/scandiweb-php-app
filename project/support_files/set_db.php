<?php

function msl(){
    return new mysqli('localhost:3306', 'root', '', 'shopdb');
}