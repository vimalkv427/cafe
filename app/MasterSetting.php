<?php
namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterSetting extends Model
{
    // use HasFactory;
    
    protected $fillable = ['trial_days'];
}
