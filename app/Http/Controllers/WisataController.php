<?php

namespace App\Http\Controllers;

use App\Models\wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class WisataController extends Controller
{
    public function index()
    {
        $wisata = wisata::all();
        return response()->json([
            'success' => true,
            'message' => 'Daftar data wisata',
            'data' => $wisata
        ], 200);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'thumbnail' => 'required|mimes:jpg,png,jpeg',
            'rate' => 'required',
            'location' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $thumbnail = $request->file('thumbnail')->store('public/thumbnail');
        $thumbnailPath = str_replace('public/', '', $thumbnail);

        try {
            DB::beginTransaction();
            $wisata = wisata::create([
                'title' => $request->title,
                'thumbnail' => $thumbnailPath,
                'rate' => $request->rate,
                'location' => $request->location,
            ]);
            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'wisata Failed to Save',
            ], 409);
        }
        return response()->json([
            'success' => true,
            'message' => 'wisata succesfully created',
            'data' => $wisata
        ], 200);
    }
}

//    public function show($id)
//    {
//        $wisata = \App\Models\wisata::where('id', $id)->first();
//
//        return response()->json([
//            'success' => true,
//            'message' => 'Detail Data wisata',
//            'data' => $wisata
//        ], 200);
//    }

//    public function update(Request $request, $id)
//    {
//        $validator = Validator::make($request->all(), [
//            'title' => 'required',
//            'thumbnail' => 'required',
//            'rate' => 'required',
//            'location' => 'required',
//        ]);
//
//        if ($validator->fails()) {
//            return response()->json($validator->errors(), 400);
//        }
//
//        $wisata = \App\Models\wisata::where('id', $id)->first();
//
//        if ($wisata) {
//            $wisata->update([
//                'title' => $request->title,
//                'thumbnail' => $
