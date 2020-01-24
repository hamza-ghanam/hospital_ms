<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Contact extends Model
{
    use SoftDeletes, Sortable;

    public $sortable = ['full_name', 'phone', 'specialization', 'mobile', 'code', 'address', 'national_num'];
}
