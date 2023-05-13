<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\QueryException;

class UserController extends Controller
{
    public function indexlanding()
    {
        $user = User::all();
        $posts = Post::with('user')->simplePaginate(5);
        return view('landing.pages.about', 
        [

        'user' => $user,
        'post' => $posts,
    ]);
    }

    public function indexadmin()
    {
        $user = User::all();
        return view('admin.pages.user', ['user' => $user]);
    }

    public function store(Request $request)
    {
  


        $request->validate([
            'name' => 'required|max:30',
            'tag' => 'required|max:30',
            'desc' => 'required|max:1000',
            'phone' => 'required|numeric',
            'address' => 'required|max:255',
            'email' => 'required|email|max:255|unique:tb_user,email',
            'password' => 'required|min:8|max:255',
            'repassword' => 'required|min:8|max:255|same:password',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'name.max' => 'Nama tidak boleh lebih dari 30 karakter',
            'tag.required' => 'Tag tidak boleh kosong',
            'tag.max' => 'Tag tidak boleh lebih dari 30 karakter',
            'desc.required' => 'Deskripsi tidak boleh kosong',
            'desc.max' => 'Deskripsi tidak boleh lebih dari 255 karakter',
            'phone.required' => 'Nomor telepon tidak boleh kosong',
            'phone.numeric' => 'Nomor telepon harus berupa angka',
            'address.required' => 'Alamat tidak boleh kosong',
            'address.max' => 'Alamat tidak boleh lebih dari 255 karakter',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'email.max' => 'Email tidak boleh lebih dari 255 karakter',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password tidak boleh kurang dari 8 karakter',
            'password.max' => 'Password tidak boleh lebih dari 255 karakter',
            'repassword.required' => 'Password tidak boleh kosong',
            'repassword.min' => 'Password tidak boleh kurang dari 8 karakter',
            'repassword.max' => 'Password tidak boleh lebih dari 255 karakter',
            'repassword.same' => 'Password tidak sama',
            'image.required' => 'Gambar tidak boleh kosong',
            'image.image' => 'Gambar harus berupa gambar',
            'image.mimes' => 'Gambar harus berupa jpeg, png, jpg',
            'image.max' => 'Gambar tidak boleh lebih dari 2MB',
        ]);



        $fileNameImage = time() . '.' . $request->image->extension();
        $request->image->move(public_path('admin/foto/user/'), $fileNameImage);;

        $user = new User;
        $user->name = $request->name;
        $user->tag = $request->tag;
        $user->desc = $request->desc;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->image = $fileNameImage;
        $user->save();
        return redirect()->intended('/user')->with('create', 'berhasil menambahkan');
    }

    public function updateuser(Request $request, $id)
    {
   


        if ($request->image == null && $request->password == null) {
            $request->validate([
                'name' => 'required|max:30',
                'tag' => 'required|max:30',
                'desc' => 'required|max:1000',
                'phone' => 'required|numeric',
                'address' => 'required|max:255',
                'email' => 'required|email|max:255|unique:tb_user,email,' . $id,
            ], [
                'name.required' => 'Nama tidak boleh kosong',
                'name.max' => 'Nama tidak boleh lebih dari 30 karakter',
                'tag.required' => 'Tag tidak boleh kosong',
                'tag.max' => 'Tag tidak boleh lebih dari 30 karakter',
                'desc.required' => 'Deskripsi tidak boleh kosong',
                'desc.max' => 'Deskripsi tidak boleh lebih dari 255 karakter',
                'phone.required' => 'Nomor telepon tidak boleh kosong',
                'phone.numeric' => 'Nomor telepon harus berupa angka',
                'address.required' => 'Alamat tidak boleh kosong',
                'address.max' => 'Alamat tidak boleh lebih dari 255 karakter',
                'email.required' => 'Email tidak boleh kosong',
                'email.email' => 'Email tidak valid',
                'email.max' => 'Email tidak boleh lebih dari 255 karakter',
                'email.unique' => 'Email sudah terdaftar',
            ]);

            $user = User::find($id);
            $user->name = $request->name;
            $user->tag = $request->tag;
            $user->desc = $request->desc;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->email = $request->email;
            $user->save();
            return redirect()->intended('/user')->with('update', 'berhasil update');
        } elseif ($request->image == null) {
            $request->validate([
                'name' => 'required|max:30',
                'tag' => 'required|max:30',
                'desc' => 'required|max:1000',
                'phone' => 'required|numeric',
                'address' => 'required|max:255',
                'email' => 'required|email|max:255|unique:tb_user,email,' . $id,
                'password' => 'required|min:8|max:255',
                'repassword' => 'required|min:8|max:255|same:password',
            ], [
                'name.required' => 'Nama tidak boleh kosong',
                'name.max' => 'Nama tidak boleh lebih dari 30 karakter',
                'tag.required' => 'Tag tidak boleh kosong',
                'tag.max' => 'Tag tidak boleh lebih dari 30 karakter',
                'desc.required' => 'Deskripsi tidak boleh kosong',
                'desc.max' => 'Deskripsi tidak boleh lebih dari 255 karakter',
                'phone.required' => 'Nomor telepon tidak boleh kosong',
                'phone.numeric' => 'Nomor telepon harus berupa angka',
                'address.required' => 'Alamat tidak boleh kosong',
                'address.max' => 'Alamat tidak boleh lebih dari 255 karakter',
                'email.required' => 'Email tidak boleh kosong',
                'email.email' => 'Email tidak valid',
                'email.max' => 'Email tidak boleh lebih dari 255 karakter',
                'email.unique' => 'Email sudah terdaftar',
                'password.required' => 'Password tidak boleh kosong',
                'password.min' => 'Password tidak boleh kurang dari 8 karakter',
                'password.max' => 'Password tidak boleh lebih dari 255 karakter',
                'repassword.required' => 'Password tidak boleh kosong',
                'repassword.min' => 'Password tidak boleh kurang dari 8 karakter',
                'repassword.max' => 'Password tidak boleh lebih dari 255 karakter',
                'repassword.same' => 'Password tidak sama',

            ]);

            $user = User::find($id);
            $user->name = $request->name;
            $user->tag = $request->tag;
            $user->desc = $request->desc;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect()->intended('/user')->with('update', 'berhasil update');
        } elseif ($request->password == null) {
            $request->validate([
                'name' => 'required|max:30',
                'tag' => 'required|max:30',
                'desc' => 'required|max:1000',
                'phone' => 'required|numeric',
                'address' => 'required|max:255',
                'email' => 'required|email|max:255|unique:tb_user,email,' . $id,
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ], [
                'name.required' => 'Nama tidak boleh kosong',
                'name.max' => 'Nama tidak boleh lebih dari 30 karakter',
                'tag.required' => 'Tag tidak boleh kosong',
                'tag.max' => 'Tag tidak boleh lebih dari 30 karakter',
                'desc.required' => 'Deskripsi tidak boleh kosong',
                'desc.max' => 'Deskripsi tidak boleh lebih dari 255 karakter',
                'phone.required' => 'Nomor telepon tidak boleh kosong',
                'phone.numeric' => 'Nomor telepon harus berupa angka',
                'address.required' => 'Alamat tidak boleh kosong',
                'address.max' => 'Alamat tidak boleh lebih dari 255 karakter',
                'email.required' => 'Email tidak boleh kosong',
                'email.email' => 'Email tidak valid',
                'email.max' => 'Email tidak boleh lebih dari 255 karakter',
                'email.unique' => 'Email sudah terdaftar',
                'image.required' => 'Gambar tidak boleh kosong',
                'image.image' => 'Gambar tidak valid',
                'image.mimes' => 'Gambar harus berformat jpeg, png, jpg',
                'image.max' => 'Gambar tidak boleh lebih dari 2MB',
            ]);

            $update = User::where('id', $id)->first();
            File::delete(public_path('admin/foto/user') . '/' . $update->image);

            $fileNameImage = time() . '.' . $request->image->extension();
            $request->image->move(public_path('admin/foto/user/'), $fileNameImage);

            $user = User::find($id);
            $user->image = $fileNameImage;
            $user->name = $request->name;
            $user->tag = $request->tag;
            $user->desc = $request->desc;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->email = $request->email;
            $user->save();
            return redirect()->intended('/user')->with('update', 'berhasil update');
        } else {
            $request->validate([
                'name' => 'required|max:30',
                'tag' => 'required|max:30',
                'desc' => 'required|max:1000',
                'phone' => 'required|numeric',
                'address' => 'required|max:255',
                'email' => 'required|email|max:255|unique:tb_user,email,' . $id,
                'password' => 'required|min:8|max:255',
                'repassword' => 'required|min:8|max:255|same:password',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ], [
                'name.required' => 'Nama tidak boleh kosong',
                'name.max' => 'Nama tidak boleh lebih dari 30 karakter',
                'tag.required' => 'Tag tidak boleh kosong',
                'tag.max' => 'Tag tidak boleh lebih dari 30 karakter',
                'desc.required' => 'Deskripsi tidak boleh kosong',
                'desc.max' => 'Deskripsi tidak boleh lebih dari 255 karakter',
                'phone.required' => 'Nomor telepon tidak boleh kosong',
                'phone.numeric' => 'Nomor telepon harus berupa angka',
                'address.required' => 'Alamat tidak boleh kosong',
                'address.max' => 'Alamat tidak boleh lebih dari 255 karakter',
                'email.required' => 'Email tidak boleh kosong',
                'email.email' => 'Email tidak valid',
                'email.max' => 'Email tidak boleh lebih dari 255 karakter',
                'email.unique' => 'Email sudah terdaftar',
                'password.required' => 'Password tidak boleh kosong',
                'password.min' => 'Password tidak boleh kurang dari 8 karakter',
                'password.max' => 'Password tidak boleh lebih dari 255 karakter',
                'repassword.required' => 'Password tidak boleh kosong',
                'repassword.min' => 'Password tidak boleh kurang dari 8 karakter',
                'repassword.max' => 'Password tidak boleh lebih dari 255 karakter',
                'repassword.same' => 'Password tidak sama',
                'image.required' => 'Gambar tidak boleh kosong',
                'image.image' => 'Gambar tidak valid',
                'image.mimes' => 'Gambar harus berformat jpeg, png, jpg',
                'image.max' => 'Gambar tidak boleh lebih dari 2MB',
            ]);

            $update = User::where('id', $id)->first();
            File::delete(public_path('admin/foto/user') . '/' . $update->image);

            $fileNameImage = time() . '.' . $request->image->extension();
            $request->image->move(public_path('admin/foto/user/'), $fileNameImage);

            $user = User::find($id);
            $user->image = $fileNameImage;
            $user->name = $request->name;
            $user->tag = $request->tag;
            $user->desc = $request->desc;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();

            return redirect()->intended('/user')->with('update', 'berhasil update');
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::find($id);
            $user->delete();
            File::delete(public_path('admin/foto/user') . '/' . $user->image);
            return redirect()->intended('/user')->with('delete', 'berhasil delete');
        } catch (QueryException $e) {

            if ($e->getCode() === '23000') {

                return redirect()->intended('/user')->with('gagal', 'gagal delete');
            }
        }
    }
}
