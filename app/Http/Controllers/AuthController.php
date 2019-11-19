<?php

namespace App\Http\Controllers;

use App\Model\Opd;
use App\Model\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    public function viewLogin()
    {
        return view("login", [
            "title" => "Login user"
        ]);
    }

    public function viewRegister()
    {
        $opdBelumTerpakai = DB::table("opd")
            ->leftJoin("public.user", "opd.id", "=", "public.user.id_opd")
            ->where("public.user.id_opd", "=", null)
            ->get("opd.*");

        // dd($opdBelumTerpakai);

        return view("register", [
            "title" => "Register user untuk opd",
            "opd_belum_pakai" => $opdBelumTerpakai
        ]);
    }


    public function viewBuatOpd()
    {
        return view("buat_opd", [
            'title' => "Tambah opd baru"
        ]);
    }


    public function submitBuatOpd(Request $req)
    {
        try {
            $newOpd = new Opd();
            $newOpd->nama_opd = $req->nama_opd;
            $newOpd->save();


            return redirect()
                ->back()
                ->with("pesan", "Tambah opd berhasil");
        } catch (Exception $ex) {
            return redirect()
                ->back()
                ->with("pesan", "Tambah opd gagal {$ex->getMessage()}");
        }
    }


    public function submitLogin(Request $req)
    {
        try {
            $getUser = User::where("username", $req->username)->first();

            if (!$getUser) {
                throw new Exception("Error, username atau password salah");
            }

            $isValid = Hash::check($req->password, $getUser->password);
            if (!$isValid) {
                throw new Exception("Error, username atau password salah");
            }

            $req->session()->put("is_login", true);
            $idOpd = $getUser->id_opd;

            if ($idOpd) {
                $req->session()->put("is_opd", true);
                $req->session()->put("id_opd", $idOpd);
            } else {
                $req->session()->put("is_admin", true);
            }

            return redirect()->route("beranda");
        } catch (Exception $ex) {
            return redirect()
                ->back()
                ->with("pesan", $ex->getMessage());
        }
    }

    public function submitRegister(Request $req)
    {
        try {
            $newUser = new User();

            $newUser->username = $req->username;
            $newUser->password = Hash::make($req->password);
            $newUser->id_opd = $req->id_opd;

            $newUser->save();

            return redirect()
                ->back()
                ->with("pesan", "berhasil mendaftarkan user untuk opd");
        } catch (Exception $ex) {
            return redirect()
                ->back()
                ->with("pesan", "Gagal, mendaftarkan user untuk opd");
        }
    }


    public function logout(Request $req)
    {
        $req->session()->flush();
        return redirect()
            ->route("view_login")
            ->with("pesan", "Anda berhasil logout");
    }

    public function list_admin()
    {
        $get_user = User::all()->where("id_opd", "!=", null);

        return \view('opd.list_admin', ['title' => 'List Admin'], \compact('get_user'));
    }
}
