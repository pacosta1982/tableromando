<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingresados extends Model
{
    protected $table = 'project_has_expedientes';

    //protected $primaryKey = 'DptoId';

    //protected $connection = 'sqlsrvsecond';

    public function getProyecto() {
        return $this->hasOne('App\Models\Project','id','project_id');
    }

    public function getPostulantes() {
        return $this->hasMany('App\Models\ProjectHasPostulantes', 'project_id', 'project_id');
    }
}
