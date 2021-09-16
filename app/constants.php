<?php
namespace App;

use Mockery\Generator\StringManipulation\Pass\ConstantsPass;

class Constants
{
    const Role = [
        'SUPER_ADMIN' => 1,
        'ADMIN' => 2,
        'USER' => 3,
    ];
}

?>