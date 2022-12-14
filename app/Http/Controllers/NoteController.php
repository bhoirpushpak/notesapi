<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NoteController extends Controller
{
    public function create_slug($string){
        $slug=  preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($string));
        $note = Note::where('note_title','=',$string)->count();
        if($note == 0){
            return $slug;
        }else{
            return $slug.'-'.$note;
        }

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(['status'=>false,'message'=>'Check your API request']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create()
    {
        $notes =  Note::orderBy('_id', 'desc')->paginate(30);

        if($notes->isEmpty()){
            return response()->json(['status'=>false,'message'=>'No notes available']);
        }

        return response()->json(['status'=>true,'response'=>$notes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'note_title' => 'required|max:255',
            'note_content' => 'required',
        ]);
        $note = new Note();
        $note->note_title = $request->note_title;
        $note->note_content = $request->note_content;
        $note->note_slug = $this->create_slug($request->note_title);
        if($note->save()){
            return response()->json(['status'=>true,'response'=>$note]);
        }else{
            return response()->json(['status'=>false,'message'=>'something went wrong']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($note)
    {

        $notes =  Note::where('note_slug',$note)->first();

        if(empty($notes)){
            return response()->json(['status'=>false,'message'=>'Note not found']);
        }

        return response()->json(['status'=>true,'response'=>$notes]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($note)
    {
        $notes =  Note::find($note);

        if(empty($notes)){
            return response()->json(['status'=>false,'message'=>'Note not found']);
        }

        return response()->json(['status'=>true,'response'=>$notes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request,$note_id)
    {
        $this->validate($request, [
            'note_title' => 'required|max:255',
            'note_content' => 'required',
        ]);

        $note = Note::find($note_id);
        if(empty($note)){
            return response()->json(['status'=>false,'message'=>'Note not found']);
        }
        $note->note_title = $request->note_title;
        $note->note_content = $request->note_content;
        $note->note_slug = $this->create_slug($request->note_title);
        if($note->save()){
            return response()->json(['status'=>true,'response'=>$note]);
        }else{
            return response()->json(['status'=>false,'message'=>'something went wrong']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($note_id)
    {
        $result = Note::where('_id', $note_id)->delete();
        if($result){
            return response()->json(['status'=>true,'message'=>'Note Deleted']);
        }else{
            return response()->json(['status'=>false,'message'=>'Note not found']);
        }
    }
}
