<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ResponseService;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Scheme;
use App\Assessor;

class LandingPageController extends Controller
{
    use ResponseService;

    public function getAllScheme()
    {
        $schemes = Scheme::orderBy('name')->limit(5)->get();

        foreach ($schemes as $scheme) {
            $scheme->count_unit = $scheme->unit()->count();
        }

        return $this->responseOk($schemes);
    }

    public function getSingleScheme($id)
    {
        try {
            $scheme = Scheme::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return $this->responseNotFound("Scheme not found");
        }
        $scheme->count_unit = $scheme->unit()->count();
        return $this->responseOk($scheme);
    }

    public function getAllAsesor()
    {
        $asesors = Assessor::orderBy('name')->get();

        foreach ($asesors as $asesor) {
            $asesor->count_scheme = $asesor->asesorScheme()->count();
        }

        return $this->responseOk($asesors);
    }

    public function getSingleAsesor($id)
    {
        try {
            $asesor = Assessor::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return $this->responseNotFound("Asesor not found");
        }
        $asesor->count_scheme = $asesor->asesorScheme()->count();
        return $this->responseOk($asesor);
    }
}
