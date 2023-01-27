<?php

namespace App\Http\Controllers\Project;

use App\Helpers\Helperlb;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CRM\Leeds;
use App\Models\Project\ProjectDeal;
use App\Models\Project\ProjectCategory;
use App\Models\User;
use App\Models\Settings\BusinessBranch;
use App\Helpers\Helper;

class ProjectDealController extends Controller
{
    public function addDeal()
    {
        $clients = Leeds::all();
        $businessName = BusinessBranch::all();
        $categories = ProjectCategory::all();
        return view('Project.projectDeal.addDeal')->with('clients', $clients)->with('categories', $categories)->with('businessName', $businessName);
    }
    public function addDealPost(Request $request)
    {
        //        echo"<pre>";
        //        print_r($request->all());
        //        die();
        $project_Id = Helperlb::IdGenerator(new ProjectDeal, 'projectInvoice', 5, 'PJ');
        $validate = $request->validate([
            'start' => 'required',
            'end' => 'required',
            'category' => 'required',
            'client' => 'required',
            'totalAmount' => 'required'
        ]);
        $deal = new ProjectDeal();
        $deal->startDate = $request->start;
        $deal->category = $request->category;
        $deal->endDate = $request->end;
        $deal->projectInvoice = $project_Id;
        $deal->duration = $request->duration;
        $deal->projectName = $request->projectName;
        $deal->branchId = $request->branchId;
        $deal->clientId = $request->client;
        $deal->due = $request->totalAmount - $deal->due;
        $deal->amount = $request->totalAmount;
        $deal->comment = $request->comment;
        $deal->status = "Running";
        $deal->save();
        return  redirect()->route('allDeal')->with('Create_Message', 'Project successfully');
    }
    public function allDeal()
    {
        $deals = ProjectDeal::join('leeds', 'leeds.id', '=', 'project_deals.clientId')->with('type')->with('client')->with('branch')->get();
        $clients = Leeds::all();
        $categories = ProjectCategory::all();
        $businessName = BusinessBranch::all();
        return view('Project.projectDeal.allDeal')->with('deals', $deals)->with('clients', $clients)->with('categories', $categories)->with('businessName', $businessName);

    }
    public function allProjectList()
    {
        $deals = ProjectDeal::join('leeds', 'leeds.id', '=', 'project_deals.clientId')->with('type')->get();
//        dd($deals);
        $clients = Leeds::all();
        $categories = ProjectCategory::all();
        $users = User::all();
        $businessName = BusinessBranch::all();
        return view('Project.allProjectList')->with('deals', $deals)->with('clients', $clients)->with('categories', $categories)->with('users', $users)->with('businessName', $businessName);
    }
    public function DealInfo(Request $request)
    {
        $deal = ProjectDeal::where('id', $request->id)->first();
        return $deal;
    }
    public function dealDelete(Request $request)
    {
        $deal = ProjectDeal::where('id', $request->id)->delete();
        return  redirect()->route('allDeal')->with('message', 'Project successfully Deleted!');
    }
    public function getDeal(Request $request)
    {
        $deal = ProjectDeal::where('clientId', $request->id)->first();
        $clients = Leeds::all();
        $categories = ProjectCategory::all();
        $clientName = Leeds::where('id', $deal->clientId)->first();
        $categoryName = ProjectCategory::where('id', $deal->category)->first();
        return  view('Project.projectDeal.updateDeal')->with('deal', $deal)->with('clients', $clients)->with('categories', $categories)->with('categoryName', $categoryName)->with('clientName', $clientName);
    }
    public function updateDealPost(Request $request)
    {
        $deal = ProjectDeal::where('id', $request->id)->first();
        $deal->startDate = $request->start;
        $deal->endDate = $request->end;
        $deal->duration = $request->duration;
        $deal->category = $request->category;
        $deal->clientId = $request->client;
        $deal->amount = $request->totalAmount;
        $deal->comment = $request->comment;
        $deal->save();
        return  redirect()->route('allDeal')->with('Update_Message', 'Project successfully');
    }
    public function statusUpdate(Request $request)
    {
        $deal = ProjectDeal::where('id', $request->id)->first();
        $deal->Status = $request->status;
        $deal->save();
        return "Successfull";
    }

    public function getProjectNames(){
        $projectNames = ProjectDeal::all();
        return response()->json($projectNames);
    }
}
