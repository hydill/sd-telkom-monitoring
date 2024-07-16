<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolClass extends Model
{
    use SoftDeletes;

    public $table = 'school_classes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function classLessons()
    {
        return $this->hasMany(Lesson::class, 'class_id', 'id');
    }
    public function classKontens()
    {
        return $this->hasMany(KontenClass::class, 'class_id', 'id');
    }
    public function classSiswa()
    {
        return $this->hasMany(Siswa::class, 'class_id', 'id');
    }
    public function classManage()
    {
        return $this->hasMany(ManageSiswa::class, 'class_id', 'id');
    }
}

// public function classUsers()
// {
//     return $this->hasMany(User::class, 'class_id', 'id');
// }