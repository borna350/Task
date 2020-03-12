<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Track;
use Barryvdh\DomPDF\Facade as PDF;
use Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $profile = Profile::where('user_id',  $id)->first();
        return view('profile.index')->with('profile', $profile);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadCv()
    {
        $id = Auth::user()->id;

        $profile = Profile::where('user_id',  $id)->first();
         $pdf = PDF::loadView('profile.download', ['profile' => $profile]);
         $filename = time();
         $track = Track::create([
             'user_id' => $id,
             'cv_pdf' => 'CV/'.$filename .'.pdf'
         ]);
         return $pdf->save(public_path('CV/'.$filename .'.pdf'))->stream($id.'.pdf');
        // return view('profile.test')->with('profile', $profile);
    }
    public function create()
    {
       
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = new Profile;
        $user_id = Auth::user()->id;
        $input->user_id = $user_id;  
        $input->uni_name = $request->uni_name;
        $input->dept_name = $request->dept_name;
        $input->start_year = $request->start_year;
        $input->pass_year = $request->pass_year;
        $input->org_name = $request->org_name;
        $input->designation = $request->designation;
        $input->contact_number = $request->contact_number;
        $input->address = $request->address;
        $input->duration = $request->duration;
        $input->responsibilities = $request->responsibilities;
        $input->exam_title = $request->exam_title;
        $input->major = $request->major;
        $input->result = $request->result;
        $input->save();
        return redirect('/home');
    }

   //public function cvStore(Request $request)
   // {
      //  $filename = time().'.'.request()->cv_pdf->getClientOriginalExtension();
     //   request()->cv_pdf->move(public_path('CV'), $filename);

        //$input->cv_pdf=$filename;

   // }
//
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('profile.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile=Profile::find($id);
        return view('profile.edit')->with('profile',$profile);
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
        $profile=Profile::find($id);
        $user_id = Auth::user()->id;
        $profile->user_id = $user_id;  
        $profile->uni_name = $request->uni_name;
        $profile->dept_name = $request->dept_name;
        $profile->start_year = $request->start_year;
        $profile->pass_year = $request->pass_year;
        $profile->org_name = $request->org_name;
        $profile->designation = $request->designation;
        $profile->contact_number = $request->contact_number;
        $profile->address = $request->address;
        $profile->duration = $request->duration;
        $profile->responsibilities = $request->responsibilities;
        $profile->exam_title = $request->exam_title;
        $profile->major = $request->major;
        $profile->result = $request->result;
        $profile->save();
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function cvFormat(){
        
        $id = Auth::user()->id;
        
        $profile = Profile::where('user_id',  $id)->first();
        return view('profile.cv')->with('profile', $profile);
    }
}
