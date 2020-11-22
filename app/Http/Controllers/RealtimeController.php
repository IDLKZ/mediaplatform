<?php

namespace App\Http\Controllers;

use App\Models\ForumCategory;
use App\Models\ForumComment;
use App\Models\ForumDiscussion;
use App\Models\ForumPost;
use Brian2694\Toastr\Facades\Toastr;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Http\Request;

class RealtimeController extends Controller
{
    public function index()
    {
        $categories = ForumCategory::all();
        $discussions = ForumDiscussion::with(['user', 'category', 'post'])->orderBy('created_at', 'desc')->paginate(5);
        return view('realtime.index', compact('categories', 'discussions'));
    }

    public function addDiscussion(Request $request)
    {
        $this->validate($request, ['title' => 'required', 'description' => 'required']);
        $topic = ForumDiscussion::createDiscussion($request);
        $post = ForumPost::add($topic, $request->get('description'));
        if ($post) {
            Toastr::success('Ваша тема успешно создана!','Урааа!');
            return redirect()->back();
        } else {
            Toastr::warning('Что-то пошло не так!','Упс..!');
            return redirect()->back();
        }
    }

    public function singleCategory($slug)
    {
        $_SESSION['route'] = $slug;
        $categories = ForumCategory::all();
        $discussions = ForumDiscussion::where('chatter_category_id', $slug)->with(['user', 'category', 'post'])->orderBy('created_at', 'desc')->paginate(5);
        return view('realtime.index', compact('categories', 'discussions'));
    }

    public function singlePost($alias)
    {
        $_SESSION['route'] = $alias;
        $discussion = ForumDiscussion::where('slug', $alias)->with(['post', 'category', 'user'])->first();
        $comments = ForumComment::where('chatter_post_id', $discussion->post->id)->with(['user', 'post'])->paginate(10);
        // Home
        Breadcrumbs::for('forum', function ($trail) {
            $trail->push('Обсуждения', route('forums'));
        });
        // Courses
        Breadcrumbs::for('category', function ($trail, $category) {
            $trail->parent('forum');
            $trail->push($category->name, route('singleCategory', $category->id));
        });
        // Home > Courses > [Course]
        Breadcrumbs::for('post', function ($trail, $post) {
            $trail->parent('category', $post->category);
            $trail->push($post->title, route('singlePost', $post->slug));
        });
        return view('realtime.single-post', compact('discussion', 'comments'));
    }

    public function sendComment(Request $request)
    {
        $this->validate($request, ['description' => 'required']);
        ForumComment::add($request);
        return redirect()->back();

    }
}
