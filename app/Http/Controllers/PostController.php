<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;



class PostController extends Controller
{
    public function indexpostlanding()
    {
        $user = User::all();
        $posts = Post::with('user')->simplePaginate(5);
        return view(
            'landing.pages.blog',
            [
                'post' => $posts,
                'user' => $user

            ]
        );
    }

    public function detailpostlanding($id)
    {
        $post = Post::with('user')->where('id', $id)->first();
        return view(
            'landing.pages.detail-blog',
            [
                'post' => $post
            ]
        );
    }

    public function indexadmin()
    {
        $user = User::all();
        $posts = Post::with('user')->get();
        return view(
            'admin.pages.post',
            [
                'post' => $posts,
                'user' => $user
            ]
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'sub' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'desc' => 'required',
            'id_user' => 'required'
        ], [
            'judul.required' => 'Judul tidak boleh kosong',
            'sub.required' => 'Sub Judul tidak boleh kosong',
            'image.required' => 'Gambar tidak boleh kosong',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg',
            'image.max' => 'Ukuran gambar maksimal 2MB',
            'desc.required' => 'Deskripsi tidak boleh kosong',
            'id_user.required' => 'User tidak boleh kosong'
        ]);

        $fileNameImage = time() . '.' . $request->image->extension();
        $request->image->move(public_path('admin/foto/post/'), $fileNameImage);;

        Post::create([
            'judul' => $request->judul,
            'sub' => $request->sub,
            'image' => $fileNameImage,
            'desc' => $request->desc,
            'id_user' => $request->id_user
        ]);

        return redirect('/post')->with('create', 'Data Berhasil Ditambahkan');
    }

    public function updatepost(Request $request, $id)
    {
        if ($request->image == null) {
            $request->validate([
                'judul' => 'required',
                'sub' => 'required',
                'desc' => 'required',
                'id_user' => 'required'
            ], [
                'judul.required' => 'Judul tidak boleh kosong',
                'sub.required' => 'Sub Judul tidak boleh kosong',
                'desc.required' => 'Deskripsi tidak boleh kosong',
                'id_user.required' => 'User tidak boleh kosong'
            ]);

            $post = Post::find($id);
            $post->judul = $request->judul;
            $post->sub = $request->sub;
            $post->desc = $request->desc;
            $post->id_user = $request->id_user;
            $post->save();

            return redirect('/post')->with('update', 'Data Berhasil Diubah');
        } else {
            $request->validate([
                'judul' => 'required',
                'sub' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'desc' => 'required',
                'id_user' => 'required'
            ], [
                'judul.required' => 'Judul tidak boleh kosong',
                'sub.required' => 'Sub Judul tidak boleh kosong',
                'image.required' => 'Gambar tidak boleh kosong',
                'image.image' => 'File harus berupa gambar',
                'image.mimes' => 'Format gambar harus jpeg, png, jpg',
                'image.max' => 'Ukuran gambar maksimal 2MB',
                'desc.required' => 'Deskripsi tidak boleh kosong',
                'id_user.required' => 'User tidak boleh kosong'
            ]);

            $deleteimg = Post::where('id', $id)->first();
            File::delete(public_path('admin/foto/post') . '/' . $deleteimg->image);

            $fileNameImage = time() . '.' . $request->image->extension();
            $request->image->move(public_path('admin/foto/post/'), $fileNameImage);;

            $post = Post::find($id);
            $post->judul = $request->judul;
            $post->sub = $request->sub;
            $post->image = $fileNameImage;
            $post->desc = $request->desc;
            $post->id_user = $request->id_user;
            $post->save();

            return redirect('/post')->with('update', 'Data Berhasil Diubah');
        }
    }

    public function deletepost($id)
    {

        $deleteimg = Post::where('id', $id)->first();
        File::delete(public_path('admin/foto/post') . '/' . $deleteimg->image);

        $post = Post::find($id);
        $post->delete();

        return redirect('/post')->with('delete', 'Data Berhasil Dihapus');
    }
}
