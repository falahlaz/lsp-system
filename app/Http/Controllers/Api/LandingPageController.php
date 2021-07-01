<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ResponseService;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Tuk;
use App\News;
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
        $scheme->count_unit = $scheme->unit()->get();
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

    public function getAllTuk()
    {
        $allTuk = Tuk::where('status', 1)->orderBy('name')->get();

        return $this->responseOk($allTuk);
    }

    public function getSingleTuk($id)
    {
        try {
            $tuk = Tuk::findOrFail($id);
        } catch(ModelNotFoundException $e) {
            return $this->responseNotFound("Tuk not found");
        }

        return $this->responseOk($tuk);
    }

    public function getAllNews()
    {
        $allNews = News::select("id", "title", "image")
                    ->where("is_show", 1)
                    ->where("is_active", 1)
                    ->limit(5)
                    ->get();
        
        foreach ($allNews as $news) {
            $url = url("images/news")."/".$news->image;
            $news->image_url = $url;
        }

        return $this->responseOk($allNews);
    }

    public function getSingleNews($id)
    {
        try {
            $news = News::find($id);
        } catch(ModelNotFoundException $e) {
            return $this->reponseNotFound("Tuk not found");
        }

        $url = url("images/news")."/".$news->image;
        $news->image_url = $url;

        return $this->responseOk($news);
    }
}
