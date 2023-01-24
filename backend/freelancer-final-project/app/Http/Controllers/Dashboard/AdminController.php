<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Jobs\SendBluckEmail;
use App\Models\Category;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {

        return view('admin.index', [
            'count_projects' => Project::count(),
            'freelancers' => User::where('type', 'freelancer')->paginate(),
            'count_clients' => User::where('type', 'client')->count(),
        ]);
    }


    public function sendEmail()
    {
        $freelancers = User::where('type', 'freelancer')->take(5)->get();

//        dd($freelancers->profile->projects_skills->count());
        $job = (new SendBluckEmail($freelancers))
            ->delay(
                now()
                    ->addSeconds(2)
            );

        dispatch($job);

        return redirect()->back()->with('msg', 'Email successfully');

    }


    public function login(Request $request)
    {
        return view('auth.login');
    }

    public function login_store(Request $request)
    {
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/dashboard');
        } else {
            return redirect()->back();
        }
    }
}
