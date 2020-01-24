<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class ThankMsg extends Model
{
    use SoftDeletes, Sortable;

    public $sortable = ['body', 'created_at'];

}
