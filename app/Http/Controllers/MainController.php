<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;

class MainController extends Controller
{
    /**
     *トップページ表示
     *@param
     */
    public function top(Request $request) {
        $user = Auth::user();
        $param = ['user' => $user];
        return view('top', $param);
    }

    /**
     *メインページ表示
     *@param
     */
    public function main() {
        $projects = Project::all();
        return view('main', ['projects' => $projects]);
    }

    /**
     *新規プロジェクト投稿ページ表示
     *@param
     */
    public function newproject() {
        $id = Auth::id();
        return view('newproject', ['id' => $id]);
    }

    /**
     *新規プロジェクト登録
     *@param
     */
    public function storeNewproject(Request $request) {

        $file_name = $request->file('specification')->getClientOriginalName();
        $request->file('specification')->storeAs('public', $file_name);

        $project = new Project;

        $project->user_id = $request->user_id;
        $project->title = $request->title;
        $project->overview = $request->overview;
        $project->skill = $request->skill;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->recruitment = $request->recruitment;
        $project->specification = $file_name;

        \DB::beginTransaction();
        try {
            $project->save();
            \DB::commit();
        }catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
        return redirect(route('main'));
    }

    /**
     *マイページ表示
     *@param
     */
    public function showMypage() {
        return view('mypage');
    }

    /**
     *プロジェクト詳細画面表示
     *@param
     */
    public function project($id) {
        $project = Project::find($id);
        return view('project', ['project' => $project]);
    }
}
