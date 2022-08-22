<?php
namespace App\Repositories\Eloquent;
use App\Models\xn;
use App\Repositories\EloquentRepository;

class XNRepository extends EloquentRepository
{
    public function getModel()
    {
        return xn::class;
    }
}
?>