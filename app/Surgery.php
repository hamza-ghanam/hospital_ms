<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Surgery extends Model
{
    use SoftDeletes, Sortable;

    public $sortable = ['name', 'date_', 'time_', 'specialization', 'doctor_name', 'status', 'hall', 'patient_name'];

}
