<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits;
use Illuminate\Support\Facades\Response;
use App\Http\Resources\Traits as TraitsResource;

class TraitController extends Controller
{
    public function getTraits()
    {
        $traits = Traits::get();
        return TraitsResource::collection($traits);
    }
}
