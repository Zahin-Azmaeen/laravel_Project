<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class SampleController extends Controller
{
    function index()
    {
        return view('login');
    }
    function registration()
    {
        return view('registration');
    }
    function validate_registration(Request $request)
    {
        $request->validate([
            'FirstName' => 'required',
            'LastName' => 'required',
            'UserName' => 'required',
            'Email' => 'required|email|unique:users',
            'Password' => 'required|min:5|max:18',
            'Phone' => 'required||numeric|digits:11|unique:users',
            'Skills' => 'required',
            'Gender' => 'required',
            'image' => 'required',
        ]);
        $path = $request->file('image')->store('public/images');
        $post = new User;
        $post->FirstName = $request->FirstName;
        $post->LastName = $request->LastName;
        $post->UserName = $request->UserName;
        $post->email = $request->Email;
        $post->password = Hash::make($request->Password);
        $post->Phone = $request->Phone;
        $post->Gender = $request->Gender;
        $post->Skills = implode(',', $request['Skills']);
        $post->image = $path;
        $post->save();

        return redirect('login')->with('success', 'Registration Completed, now you can login');
    }

    function validate_login(Request $request)
    {

        if (
            Auth::attempt(['UserName' => request('email'), 'password' => request('password')]) ||
            Auth::attempt(['email' => request('email'), 'password' => request('password')]) ||
            Auth::attempt(['Phone' => request('email'), 'password' => request('password')])
        ) {
            return redirect('dashboard');
        }
        return redirect('login')->with('success', 'Login details are not valid');
    }

    function dashboard()
    {
        if (Auth::check()) {

            $user = Auth::user()->id;

            $data =  User::where('id', $user)->first();
            // dd($data);
            return view('dashboard', compact('data'));
        }

        return redirect('login')->with('success', 'you are not allowed to access');
    }

    function logout()
    {
        Session::flush();

        Auth::logout();

        return Redirect('login');
    }
    public function editData($id = null)
    {
        $user = Auth::user()->id;

        $data =  User::where('id', $user)->first();
        return view('editdata', compact('data'));
    }
    public function editModalData($id = null)
    {
        $user = Auth::user()->id;

        $data =  User::where('id', $user)->first();
        return view('editmodel', compact('data'));
    }
    public function storeEditData(Request $request, $id)
    {
        $request->validate([
            'FirstName' => 'required',
            'LastName' => 'required',
            'UserName' => 'required',
            //'Email' => 'required|email',
            //'Password' => 'required|min:5|max:18',
            'Phone' => 'required|numeric|digits:11|unique:users',
            'Skills' => 'required',
            'Gender' => 'required'
        ]);
        $user = User::find($id);
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            ]);
            $path = $request->file('image')->store('public/images');
            $user->image = $path;
        }
        if ($request->filled('Password')) {
            $request->validate([
                'Password' => 'required|min:5|max:18'
            ]);
            $user->password = Hash::make($request->Password);
        }

        $user->FirstName = $request->FirstName;
        $user->LastName = $request->LastName;
        $user->UserName = $request->UserName;
        //$user->email = $request->Email;
        // $user->password = Hash::make($request->Password);
        $user->Phone = $request->Phone;
        $user->Gender = $request->Gender;
        $user->Skills = implode(',', $request['Skills']);
        $user->save();

        return redirect('dashboard')
            ->with('success', 'User has been updated successfully.');
    }
}
