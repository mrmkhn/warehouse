<?php

namespace Modules\Article\Models;

use App\Traits\global_scopes;
use Illuminate\Database\Eloquent\Model;
use Modules\ACL\Traits\PermissionRelations;

class Article extends Model
{
    protected $fillable = [
     'name','stock'
    ];}
