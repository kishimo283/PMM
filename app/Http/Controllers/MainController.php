<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Project;
use App\Models\Comment;
use App\User;

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
     *企業トップページ表示
     *@param
     */
    public function companyTop(Request $request) {
        return view('companytop');
    }

    /**
     *メインページ表示
     *@param
     */
    public function main() {
        if(!Auth::check()) {
            return redirect(route('top'));
        }
        $user = Auth::user();
        $projects = Project::all();
        return view('main', ['projects' => $projects, 'user' => $user]);
    }

    /**
     *新規プロジェクト投稿ページ表示
     *@param
     */
    public function newproject() {
        if(!Auth::check()) {
            return redirect(route('top'));
        }
        $id = Auth::id();
        return view('newproject', ['id' => $id]);
    }

    /**
     *新規プロジェクト登録
     *@param
     */
    public function storeNewproject(Request $request) {

        if(!Auth::check()) {
            return redirect(route('top'));
        }

        $this->validate(
            $request, [
                'title' => 'required|string|max:30',
                'overview' => 'required|string|max:1000',
                'skill' => 'required|string|max:100',
                'start_date' => 'required',
                'end_date' => 'required',
                'recruitment' => 'required',
                'specification' => 'required',
            ],[
                'title.required' => 'タイトルは必須です',
                'title.string' => 'タイトルは文字列を入力してください',
                'title.max:30' => 'タイトルは30文字以下です',
                'overview.required' => '概要は必須です',
                'overview.string' => '概要は文字列を入力してください',
                'overview.max:1000' => '概要は1000文字以下です',
                'skill.required' => 'スキルは必須です',
                'skill.string' => 'スキルは文字列を入力してください',
                'skill.max:100' => 'スキルは100文字以下です',
                'start_date.required' => '開始日を入力してください',
                'end_date.required' => '終了日を入力してください',
                'recruitment.required' => '人数を入力してください',
                'specification.required' => '仕様書を添付してください',
            ]
        );

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
    public function showMypage($id) {
        /*if(!Auth::check()) {
            return redirect(route('top'));
        }*/
        $user = User::find($id);
        $param = ['user' => $user];
        $projects = $user->projects()->orderBy('created_at','desc')->get();
        return view('mypage', $param, ['projects' => $projects]);
    }

    /**
     *プロジェクト詳細画面表示
     *@param
     */
    public function project($id) {
        if(!Auth::check()) {
            return redirect(route('top'));
        }
        $user = Auth::user();
        $project = Project::find($id);
        $originater = User::find($project->user_id);
        $comments = $project->comments()->orderBy('created_at','desc')->get();
        return view('project', ['project' => $project, 'comments' => $comments, 'user' => $user, 'originater' => $originater]);
    }

    /**
     *プロジェクト編集画面
     *
     */
    public function showEditProject($id) {
        if(!Auth::check()) {
            return redirect(route('top'));
        }
        $user = Auth::user();
        $project = Project::find($id);
        return view('editproject', ['project' => $project, 'user' => $user]);
    }

    /**
     *プロジェクト更新
     *
     */
    public function updateProject(Request $request) {
        if(!Auth::check()) {
            return redirect(route('top'));
        }
        $inputs = $request->all();

        \DB::beginTransaction();
        try {
            $project = Project::find($inputs['id']);
            $project->fill([
                'title' => $request['title'],
                'overview' => $request['overview'],
                'skill' => $request['skill'],
                'start_date' => $request['start_date'],
                'end_date' => $request['end_date'],
                'recruitment' => $request['recruitment'],
                'status' => $request['status'],
                'link' => $request['link'],
                'price' => $request['price'],
            ]);
            $project->save();
            \DB::commit();
        }catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }

        return redirect(route('main'));
    }

    /**
     *完成プロジェクト表示
     *@param
     */
    public function completeProject() {
        if(!Auth::check()) {
            return redirect(route('top'));
        }
        $user = Auth::user();
        $projects = DB::table('projects')->where('status', '完了')->get();
        return view('completeproject', ['projects' => $projects, 'user' => $user]);
    }

    /**
     *完成プロジェクト詳細画面表示
     *@param
     */
    public function showComplete ($id) {
        if(!Auth::check()) {
            return redirect(route('top'));
        }
        $user = Auth::user();
        $project = Project::find($id);
        $originater = User::find($project->user_id);
        $comments = $project->comments()->orderBy('created_at','desc')->get();
        return view('showcomplete', ['project' => $project, 'comments' => $comments, 'user' => $user, 'originater' => $originater]);
    }

    /**
     *コメント投稿機能
     *
     */
    public function comment(Request $request) {
        if(!Auth::check()) {
            return redirect(route('top'));
        }
        $comment = new Comment;
        $comment->user_id = $request->user_id;
        $comment->project_id = $request->project_id;
        $comment->body = $request->body;
        \DB::beginTransaction();
        try {
            $comment->save();
            \DB::commit();
        }catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
        return redirect()->back();
    }

    /**
     *コメント削除機能
     *
     */
    public function CommentDestroy($id) {
        if(!Auth::check()) {
            return redirect(route('top'));
        }
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->back();
    }

    /**
     *マイページ編集画面表示
     *@param
     */
    public function showEditMypage() {
        if(!Auth::check()) {
            return redirect(route('top'));
        }
        $user = Auth::user();
        $param = ['user' => $user];
        return view('editmypage', $param);
    }

    /**
     *マイページ更新機能
     *
     */
    public function updateMypage(Request $request) {
        if(!Auth::check()) {
            return redirect(route('top'));
        }

        if(is_null($request->photo)) {
            $file_name = null;
        }else {
            $file_name = $request->file('photo')->getClientOriginalName();
            $request->file('photo')->storeAs('public/photos', $file_name);
        }

        \DB::beginTransaction();
        try {
            $user = Auth::user();
            $user->fill([
                'name' => $request['name'],
                'email' => $request['email'],
                'photo' => $file_name,
                'introduction' => $request['introduction'],
            ]);
            $user->save();
            \DB::commit();
        }catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }

        return redirect(route('main'));
    }

    /**
     *企業側完成プロジェクト表示
     *@param
     */
    public function companyCompleteProject() {
        $user = Auth::user();
        $projects = DB::table('projects')->where('status', '完了')->get();
        return view('companycompleteproject', ['projects' => $projects, 'user' => $user]);
    }

    /**
     *企業側完成プロジェクト詳細画面表示
     *@param
     */
    public function showCompanyComplete ($id) {
        $project = Project::find($id);
        $originater = User::find($project->user_id);
        $comments = $project->comments()->orderBy('created_at','desc')->get();
        return view('showcompanycomplete', ['project' => $project, 'comments' => $comments, 'originater' => $originater]);
    }
}
