<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pet;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\Pet as PetResource;
use Illuminate\Support\Facades\Response;

class PetController extends Controller
{
    public function addpet(Request $request)
    {
        $pet = new Pet;

        $file_data = $request->image;
        $file_name = 'image_'.time().'.png';
        @list($type, $file_data) = explode(';', $file_data);
          @list(, $file_data)      = explode(',', $file_data);
        if($file_data!=""){
            Storage::disk('google')->put($file_name,base64_decode($file_data));
            $url = Storage::disk('google')->url($file_name,base64_decode($file_data));
        }

        $pet->image = $url;  
        $pet->user_id = $request->user_id;
        $pet->name = $request->name;
        $pet->breed = $request->breed;
        $pet->gender = $request->gender;
        $pet->birthdate = Carbon::parse($request->birthdate)->format('Y.m.d H:i:s');
        $pet->description = $request->description;
        $pet->save();

        if($request->traits != null){
            foreach($request->traits as $key){

                $pet = Pet::find($pet->id);
                $pet->addTraits()->attach($key['id'],['value'=>$key['value']]);

            }
        }

    }

    public function getUserPet($user)
    {
        $pet = Pet::where('user_id','=',$user)->get();
        return PetResource::collection($pet);
    }

    public function getPet($pet)
    {
        $pet = Pet::with('tags','user','traits')->findOrfail($pet);
        return Response::json($pet);
    }

    public function getUserPetCount($user)
    {
        $pet = Pet::where('user_id','=',$user)->count();
        return Response::json($pet);
    }
}
