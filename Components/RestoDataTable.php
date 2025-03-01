<?php

namespace Components;

use Models\Resto;
use Shiroyuki\Components\DataTable;

class RestoDataTable extends DataTable
{
    public function __construct()
    {
        $this->modelInstance = new Resto();
    }
}