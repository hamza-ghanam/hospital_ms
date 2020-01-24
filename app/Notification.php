<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Notification extends Model
{
    use SoftDeletes, Sortable;

    public $sortable = ['title', 'body', 'created_at'];
}
