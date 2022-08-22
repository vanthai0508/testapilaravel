<?php
namespace App\Repositories\Eloquent;

use App\Models\cv;
use App\Repositories\EloquentRepository;

class CVRepository extends EloquentRepository
{
    public function getModel()
    {
        return cv::class;
    }
}



?>