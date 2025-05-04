<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBlogRequest;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class BlogsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('blog_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blogs = Blog::with(['user', 'media', 'blog_comments', 'tags'])->get();

        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        abort_if(Gate::denies('blog_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $tags = Tag::pluck('name', 'id');
        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $blog_comments = Comment::pluck('comment', 'id');
        return view('admin.blogs.create', compact('users', 'tags', 'blog_comments'));
    }

    public function store(StoreBlogRequest $request)
    {
        $blog = Blog::create($request->all());
        $blog->blog_comments()->sync($request->input('blog_comments', []));
        $blog->tags()->sync($request->input('tags', []));
        if ($request->input('photo', false)) {
            $blog->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($request->input('video', false)) {
            $blog->addMedia(storage_path('tmp/uploads/' . basename($request->input('video'))))->toMediaCollection('video');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $blog->id]);
        }
        alert()->success(trans('flash.store.title'), trans('flash.store.body'));
        return redirect()->route('admin.blogs.index');
    }

    public function edit(Blog $blog)
    {
        abort_if(Gate::denies('blog_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $blog_comments = Comment::pluck('comment', 'id');
        $tags = Tag::pluck('name', 'id');
        $blog->load('user', 'blog_comments', 'tags');
        return view('admin.blogs.edit', compact('blog', 'blog_comments', 'tags', 'users'));
    }

    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $blog->update($request->all());
        $blog->blog_comments()->sync($request->input('blog_comments', []));
        $blog->tags()->sync($request->input('tags', []));
        if ($request->input('photo', false)) {
            if (!$blog->photo || $request->input('photo') !== $blog->photo->file_name) {
                if ($blog->photo) {
                    $blog->photo->delete();
                }
                $blog->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($blog->photo) {
            $blog->photo->delete();
        }

        if ($request->input('video', false)) {
            if (!$blog->video || $request->input('video') !== $blog->video->file_name) {
                if ($blog->video) {
                    $blog->video->delete();
                }
                $blog->addMedia(storage_path('tmp/uploads/' . basename($request->input('video'))))->toMediaCollection('video');
            }
        } elseif ($blog->video) {
            $blog->video->delete();
        }
        alert()->success(trans('flash.update.title'), trans('flash.update.body'));
        return redirect()->route('admin.blogs.index');
    }

    public function show(Blog $blog)
    {
        abort_if(Gate::denies('blog_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $blog->load('user', 'blog_comments', 'tags');
        return view('admin.blogs.show', compact('blog'));
    }

    public function destroy(Blog $blog)
    {
        abort_if(Gate::denies('blog_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blog->delete();
        alert()->success(trans('flash.destroy.title'), trans('flash.destroy.body'));
        return back();
    }

    public function massDestroy(MassDestroyBlogRequest $request)
    {
        $blogs = Blog::find(request('ids'));

        foreach ($blogs as $blog) {
            $blog->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('blog_create') && Gate::denies('blog_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Blog();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
