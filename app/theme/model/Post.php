<?php

namespace App\theme\model;

use App\theme\model\contract\BaseModel;

class Post extends BaseModel {

	protected $table = "posts";
	protected $primaryKey = "ID";

}