<?php

namespace Modules\Product\Models;

use App\Traits\global_scopes;
use Illuminate\Database\Eloquent\Model;
use Modules\ACL\Traits\PermissionRelations;
use Modules\Product\Traits\ProductRelations;

class Product extends Model
{
  use ProductRelations;
    protected $fillable = [
       'name', 'price'
    ];}
