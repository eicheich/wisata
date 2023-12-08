<?php

namespace App\Http\Controllers;

use App\Models\wisata;
use Illuminate\Http\Request;

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

//    public function create(Request $request)
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
//        $wisata = \App\Models\wisata::create([
//            'title' => $request->title,
//            'thumbnail' => $request->thumbnail,
//            'rate' => $request->rate,
//            'location' => $request->location,
//        ]);
//
//        if ($wisata) {
//            return response()->json([
//                'success' => true,
//                'message' => 'wisata berhasil ditambahkan',
//                'data' => $wisata
//            ], 201);
//        } else {
//            return response()->json([
//                'success' => false,
//                'message' => 'wisata gagal ditambahkan',
//            ], 409);
//        }
//    }
//
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
}
