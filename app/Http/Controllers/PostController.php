<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\SavePostRequest;
use App\Models\PostView;
use Illuminate\Support\Carbon;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10);
        $posts->load('category');
        return view('backend.posts.index', compact('posts'));
    }
    public function create()
    {
        $cates = Category::all();
        return view('backend.posts.add-form', compact('cates'));
    }

    public function store(SavePostRequest $request)
    {
        $model = new Post();
        $model->fill($request->all());
        if ($request->hasFile('image')) {
            $fileName = uniqid() . '_' . $request->image->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('uploads', $fileName, 'public');
            $model->image = 'storage/' . $filePath;
        }
        $model->save();
        return redirect(route('post.index'));
    }

    public function destroy($id)
    {
        Post::destroy($id);
        return redirect(route('post.index'));
    }

    public function edit($id)
    {
        $cates = Category::all();
        $model = Post::find($id);
        if (!$model) return redirect(route('post.index'));
        return view('backend.posts.edit-form', ['model' => $model, 'cates' => $cates]);
    }

    public function update($id, SavePostRequest $request)
    {
        $model = Post::find($id);
        $model->fill($request->all());
        if ($request->hasFile('image')) {
            $fileName = uniqid() . '_' . $request->image->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('uploads', $fileName, 'public');
            $model->image = 'storage/' . $filePath;
        }
        $model->save();
        return redirect(route('post.index'));
    }

    public function detail($id)
    {
        $model = Post::find($id);
        $totalViews = PostView::where('post_id', $id)->sum('views');
        return view('pages.post-detail', ['model' => $model, 'totalViews' => $totalViews]);
    }

    public function tangView(Request $request)
    {
        // 1 ki???m tra xem c?? views c???a s???n ph???m ??ang c???n t??m trong ng??y h??m nay kh??ng ?
        // n???u c?? th?? t??ng view
        // n???u kh??ng c?? th?? t???o m???i v?? add views = 0
        $today = Carbon::yesterday()->format('Y-m-d');
        $postView = PostView::where('post_id', $request->id)
            ->where('created_at', '>=', $today . " 00:00:00")
            ->where('created_at', '<=', $today . " 23:59:59")
            ->first();
        if ($postView) {
            $postView->views += 1;
        } else {
            $postView = new PostView();
            $postView->post_id = $request->id;
            $postView->views = 1;
        }
        $postView->save();
        return response()->json($postView);
    }
    public function publish()
    {
        $this->published_at = now();
        $this->save();
    }
}
