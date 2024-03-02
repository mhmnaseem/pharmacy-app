<?php

namespace App\Http\Controllers;

use App\Models\Medication;
use Illuminate\Http\Request;

class MedicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view all posts');
        return Medication::All();

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create a post');
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'quantity' => ['required']
        ]);

        $medication = Medication::create([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity
        ]);


        return $medication;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view all posts');

        $medication = Medication::findOrFail($id);

        return $medication;
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
        $this->authorize('update a post');

        $medication = Medication::findOrFail($id);
        $medication->name = $request->name;
        $medication->description = $request->description;
        $medication->quantity = $request->quantity;

        $medication->save();
        return $medication;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete a post');

        $medication = Medication::findOrFail($id);

        $medication->delete();

       return response()->json(['message' => 'Medicine soft deleted successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forceDelete($id)
    {
        $this->authorize('force delete posts');

        $medication = Medication::withTrashed()->where('id', $id);

        $medication->forceDelete();

       return response()->json(['message' => 'Medicine force deleted successfully'], 200);
    }
}
