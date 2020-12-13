<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{

    //home view with Members data
    public function index()
    {
        $member_data=Member::all();
        $edit=false;
        return view('home', ['members'=>$member_data, 'edit'=>$edit]);
    }

    //create Member
    public function create_user(Request $form_data)
    {
        
        $form_data-> validate([
            'name'=>'required',
            'email'=>'required|unique:members',
            'cell'=>'numeric|unique:members'
        ]);
        Member::insert([
            'name'=>$form_data->name,
            'email'=>$form_data->email,
            'cell'=>$form_data->cell,
            'role'=>$form_data->role,
            'address'=>$form_data->address,
        ]);
        return redirect()->back()->with('message','ADD Member Successfully');
    }

    //single user id
    public function edit_form($id)
    {
        $member_data=Member::all();
        $edit_member_data= Member::find($id);
        $edit=true;
        return view('home', ['members'=>$member_data, 'edit_member_data'=>$edit_member_data, 'edit'=>$edit]);
    }


    //update Member
    public function update_user(Request $form_data)
    {
        Member::find($form_data->id)->update([
            'name'=>$form_data->name,
            'email'=>$form_data->email,
            'cell'=>$form_data->cell,
            'role'=>$form_data->role,
            'address'=>$form_data->address,
        ]);
        return redirect()->back()->with('message','Member Update Successfully');
    }




    //delete Member
    public function delete_user(Request $user_id)
    {
        $user_id;
        Member::find($user_id->id)->delete();
        return redirect()->back()->with('message','User Delete successfully');
    }
}

