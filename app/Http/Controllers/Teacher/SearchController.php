<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Examination;
use App\Models\Materials;
use App\Models\Question;
use App\Models\ReviewQuestion;
use App\Models\Subscriber;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function subscriber(){
        return view("teacher.search.subscriber");
    }

    public function subscriberResult(Request $request){
        $this->validate($request,["query"=>"required|min:1"]);
        $searchterm = $request->input('query');
        $searchResults = User::where('name','LIKE','%'.$searchterm.'%')->whereIn("id",Subscriber::where("author_id",Auth::id())->pluck("user_id")->toArray() )->with("role")->paginate(15);
        $searchResults->appends(['query' => $searchterm]);
        return view("teacher.search.subscriber",compact("searchResults","searchterm"));
    }

    public function media(){
        return view("teacher.search.media");
    }

    public function mediaResult(Request $request){
        $this->validate($request,["query"=>"required|min:1","type"=>"required"]);
        $searchterm = $request->input('query');
        $searchtype = $request->input('type');
        switch ($searchtype) {
            case "course" :
                $searchResults = Course::where('title','LIKE','%'.$searchterm.'%')->where("author_id",Auth::id())->with(["author","language"])->paginate(15);
                $searchResults->appends(['type' => $searchtype]);
                $searchResults->appends(['query' => $searchterm]);
                return view("teacher.search.media",compact("searchResults","searchterm","searchtype"));
            case "video" :
                $searchResults = Video::where('title','LIKE','%'.$searchterm.'%')->whereIn("id",Auth::user()->videos->pluck("id")->toArray())->with(["course","examination"])->paginate(15);
                $searchResults->appends(['type' => $searchtype]);
                $searchResults->appends(['query' => $searchterm]);
                return view("teacher.search.media",compact("searchResults","searchterm","searchtype"));
            case "material" :
                $searchResults = Materials::where('title','LIKE','%'.$searchterm.'%')->where("author_id",Auth::id())->with(["video"])->paginate(15);
                $searchResults->appends(['type' => $searchtype]);
                $searchResults->appends(['query' => $searchterm]);
                return view("teacher.search.media",compact("searchResults","searchterm","searchtype"));
            case "examination" :
                $searchResults = Examination::where('title','LIKE','%'.$searchterm.'%')->where("author_id",Auth::id())->with(["video","quiz","review","author"])->paginate(15);
                $searchResults->appends(['type' => $searchtype]);
                $searchResults->appends(['query' => $searchterm]);
                return view("teacher.search.media",compact("searchResults","searchterm","searchtype"));
            default:
                return abort(404);
        }
    }

    public function question(){
        return view("teacher.search.question");
    }

    public function questionResult(Request  $request){
        $this->validate($request,["query"=>"required|min:1","type"=>"required"]);
        $searchterm = $request->input('query');
        $searchtype = $request->input('type');
        switch ($searchtype) {
            case "quiz" :
                $searchResults = Question::where('question','LIKE','%'.$searchterm.'%')->whereIn("id",Auth::user()->questions->pluck("id")->toArray())->with("quiz")->paginate(15);
                $searchResults->appends(['type' => $searchtype]);
                $searchResults->appends(['query' => $searchterm]);
                return view("teacher.search.question",compact("searchResults","searchterm","searchtype"));
            case "review" :
                $searchResults = ReviewQuestion::where('question','LIKE','%'.$searchterm.'%')->whereIn("id",Auth::user()->review_questions->pluck("id")->toArray())->with("review")->paginate(15);
                $searchResults->appends(['type' => $searchtype]);
                $searchResults->appends(['query' => $searchterm]);
                return view("teacher.search.question",compact("searchResults","searchterm","searchtype"));
            default:
                return abort(404);
        }
    }




}
