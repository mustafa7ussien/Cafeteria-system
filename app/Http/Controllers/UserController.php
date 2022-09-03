<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use PHPUnit\Framework\Constraint\FileExists;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view("admin.users.index",["users"=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $users = User::all();
        return  view("admin.users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_data = $request->all();
        if($request->file("image")){
            $image = $request->file("image");
            $imagename = implode(".", [date("YmdHis"), $image->getClientOriginalName()]);
            $destinationpath = "userimages/";
            $image->move($destinationpath, $imagename);
            $user_data["image"]=$imagename;
        }
        User::create($user_data);
        return  to_route("users.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // $users = User::all();
        return view("admin.users.edit", ["user"=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $inputdata = $request->all();
        if ($request->file("image")) {
            $this->deleteImage($user);
            $new_image = $request->file("image");
            $imagename = implode(".",
                [date('YmdHis'), $inputdata["name"], $new_image->getClientOriginalExtension()]);
            $dstentaiton_path = "userimages/";
            $new_image->move($dstentaiton_path, $imagename);
            $inputdata["image"] = $imagename;
        }

        $user->update($inputdata);
        return to_route("users.index", $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(File::exists(public_path("userimages/$user->image"))){
            File::delete(public_path("userimages/$user->image"));
        }
     //    dump($product);
    $user->delete();
    return to_route("users.index");
    }

    private function  deleteImage(User $user){
        if(File::exists(public_path("userimages/$user->image"))){
            File::delete(public_path("userimages/$user->image"));
        }
    }
}
