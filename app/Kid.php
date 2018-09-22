<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kid extends Model
{

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'identification', 'age','relationship','ethnicity','gender','risk',
  ];


}
