<?php

namespace App\Http\Controllers\Admin\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

use App\User;
use App\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!\Session::has("id_user")) return redirect()->route("login");
        $data["user"] = User::find(\Session::get("id_user"));
        $data["news"] = News::select("id", "title")->where("is_active", 1)->orderBy("created_at", "desc")->get();
        return view("admin.berita.index", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!\Session::has("id_user")) return redirect()->route("login");
        $request->validate([
            "title" => "required",
            "body" => "required",
            "image" => "required",
        ]);

        $image = $request->image;
        $imageName = time()."_".$image->getClientOriginalName();
        $image->move(public_path("images/news"), $imageName);

        $isShow = 0;
        $showedNews = News::where("is_show", 1)->get()->count();
        if ($showedNews <= 5) $isShow = 1;

        $id_user = \Session::get("id_user");
        News::create([
            "id_user" => $id_user,
            "title" => $request->title,
            "body" => $request->body,
            "image" => $imageName,
            "is_show" => $isShow,
        ]);

        return redirect()->back()->with("success", "Data successfully added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!\Session::has("id_user")) return redirect()->route("login");
        $data["user"] = User::find(\Session::get("id_user"));
        $data["news"] = News::find($id);
        return view("admin.berita.edit", compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!\Session::has("id_user")) return redirect()->route("login");
        $request->validate([
            "title" => "required",
            "body" => "required"
        ]);

        $news = News::find($id);
        $oldImage = $news->image;

        if ($request->hasFile("image")) {
            $image = $request->image;
            $imageName = time()."_".$image->getClientOriginalName();
            $imagePath = public_path("images/news/");
            $image->move($imagePath, $imageName);

            if (File::exists($imagePath.$imageName)) {
                File::delete($imagePath.$oldImage);
            }
        } else {
            $imageName = $oldImage;
        }

        $news->update([
            "title" => $request->title,
            "body" => $request->body,
            "image" => $imageName
        ]);

        return redirect()->back()->with("success", "Data successfully updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::find($id)->delete();
        return redirect()->back()->with("success", "Data successfully deleted!");
    }
}
