<?php

print_r($this->getData());
$result=$this->getData();

foreach ($result['user'] as $result2){

    print_r($result2['category']);


}

?>