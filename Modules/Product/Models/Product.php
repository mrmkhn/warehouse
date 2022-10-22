<?php

namespace Modules\Product\Models;

use App\Traits\global_scopes;
use Illuminate\Database\Eloquent\Model;
use Modules\ACL\Traits\PermissionRelations;

class Product extends Model
{

    protected $fillable = [
       'name', 'price'
    ];}
