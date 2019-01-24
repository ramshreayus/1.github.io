<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use DB;
use Session;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organization = DB::table('organizations')->where('created_by',Session::get('userid'))->get();
        $user_invites = DB::table('user_invites')->where('invited_by',Session::get('userid'))->get();
        $blogs = DB::table('blogs')->where('created_by',Session::get('userid'))->get();
        $orders = DB::table('orders')->where('created_by',Session::get('userid'))->get();
        $projects = DB::table('projects')->get();
        $orders = DB::table('orders')->where('created_by',Session::get('userid'))->get();
        $user_invites = DB::table('user_invites')->where('created_by',Session::get('userid'))->get();
        $recentblogs = DB::table('blogs')->skip(0)->take(1)->get();
        $project_funding = DB::table('project_funding')
        ->join('userdetails', 'project_funding.created_by', '=', 'userdetails.id')
        ->where('userdetails.groupid','4')->get();
        $project_donations = DB::table('project_donations')
        ->join('userdetails', 'project_donations.created_by', '=', 'userdetails.id')
        ->where('userdetails.groupid','3')->get();
        $entrepreneurs = DB::table('projects')
        ->join('userdetails', 'projects.created_by', '=', 'userdetails.id')
        ->where('userdetails.groupid','1')->get();
        //print_r($project_donations); exit();
        return view("dashboard.organization",compact("organization","blogs","user_invites","projects","project_donations","project_funding","orders","entrepreneurs","user_invites","recentblogs"));
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
        //print_r($request->all()); exit();
         $org_logo = Input::file('org_logo');
         $org_file = Input::file('org_file');
         $userid = Session::get('userid');
      
        $certificatePath1 = '';
        $certificatePath = '';
       
             $category = implode(',', $request->org_categories) ;
        if($org_logo)
         {
  
              $destinationPath = $_SERVER['DOCUMENT_ROOT'].'/files/logo';           
              $timestamp = str_replace([' ', ':'], '-', date("YmdHis"));
              $namefile = $org_logo->getClientOriginalName();    
              $recfilename1 = preg_replace('/\s+/', '', $namefile);
              $recfilename = $timestamp."_123_".$recfilename1;
              $upload_success = Input::file('org_logo')->move($destinationPath, $recfilename);
              $certificatePath = ('http://'.$_SERVER['HTTP_HOST']."/files/logo/".$recfilename);

         }

        if($org_file)
         {
  
              $destinationPath1 = $_SERVER['DOCUMENT_ROOT'].'/files/documents';           
              $timestamp1 = str_replace([' ', ':'], '-', date("YmdHis"));
              $namefile1 = $org_file->getClientOriginalName();    
              $recfilename1 = preg_replace('/\s+/', '', $namefile1);
              $recfilename1 = $timestamp1."_123_".$recfilename1;
              $upload_success1 = Input::file('org_file')->move($destinationPath1, $recfilename1);
              $certificatePath1 = ('http://'.$_SERVER['HTTP_HOST']."/files/documents/".$recfilename1);

         }
         
         DB::table('organizations')->insert(['name' => $request->org_name,'description' => $request->org_desc,'country' => $request->country,'founded_date' => $request->founded_date,'org_logo' => $certificatePath,'categories' => $category,'org_file' => $certificatePath1,'file_title' => $request->org_file_title,'mission' => $request->org_msg,'created_by' => $userid,'updated_by' => $userid]);
         return redirect('/organization')->with('message', 'Organization Details Added Successfully');
        
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
        //
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
        //print_r($request->all()); exit();
         //$org_logo = Input::file('org_logo');
         $org_file = Input::file('org_file');
         $userid = Session::get('userid');
      
        $certificatePath1 = '';
        $certificatePath = $request->org_logo;
       
        // if($org_logo)
        //  {
  
        //       $destinationPath = $_SERVER['DOCUMENT_ROOT'].'/files/logo';           
        //       $timestamp = str_replace([' ', ':'], '-', date("YmdHis"));
        //       $namefile = $org_logo->getClientOriginalName();    
        //       $recfilename1 = preg_replace('/\s+/', '', $namefile);
        //       $recfilename = $timestamp."_123_".$recfilename1;
        //       $upload_success = Input::file('org_logo')->move($destinationPath, $recfilename);
        //       $certificatePath = ('http://'.$_SERVER['HTTP_HOST']."/files/logo/".$recfilename);

        //  }

        if($org_file)
         {
  
              $destinationPath1 = $_SERVER['DOCUMENT_ROOT'].'/files/documents';           
              $timestamp1 = str_replace([' ', ':'], '-', date("YmdHis"));
              $namefile1 = $org_file->getClientOriginalName();    
              $recfilename1 = preg_replace('/\s+/', '', $namefile1);
              $recfilename1 = $timestamp1."_123_".$recfilename1;
              $upload_success1 = Input::file('org_file')->move($destinationPath1, $recfilename1);
              $certificatePath1 = ('http://'.$_SERVER['HTTP_HOST']."/files/documents/".$recfilename1);

         }
         
             $category = implode(',', $request->org_categories) ;
         DB::table('organizations')->where('id',$id)->update(['name' => $request->org_name,'description' => $request->org_desc,'country' => $request->country,'founded_date' => $request->founded_date,'org_logo' => $certificatePath,'categories' => $category,'org_file' => $certificatePath1,'file_title' => $request->org_file_title,'mission' => $request->org_msg,'created_by' => $userid,'updated_by' => $userid]);
         return redirect('/organization')->with('message', 'Organization Details Added Successfully');
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
}
