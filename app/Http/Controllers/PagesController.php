<?php

namespace App\Http\Controllers;

use App\Models\Register;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;
use RealRashid\SweetAlert\Facades\Alert ;
class PagesController extends Controller
{
    //
    public function register(){
        
        $client = new Client(); //GuzzleHttp\Client
        $url = "http://demo73.energeek.co.id/energeek-frontend-test/public/api/select_list/job?search";
        $url2 = "http://demo73.energeek.co.id/energeek-frontend-test/public/api/select_list/skill?search=";

        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);
        $response2 = $client->request('GET', $url2, [
            'verify'  => false,
        ]);

        $job = json_decode($response->getBody());
        $job = $job->data->jobs;
        $skill = json_decode($response2->getBody());
        $skill = $skill->data->skills;
        return view('register', compact('job', 'skill'));
    }
    public function registerPost(Request $request){
        // $register =  $request -> validate([
        //     'job' => 'required',
        //     'telepon' => 'required|unique:registers',
        //     'email' => 'required|email|unique:registers',
        //     'tahun' => 'required',
        //     'skill' => 'required'
        // ]);
        // $x = DB::table('registers')->select('*');
        // if ($x->where('telepon', $request->get('telepon'))) {
        //     # code...
        //     Alert::error('Gagal', 'Email atau nomor telepon pernah dipakai');
        //     return redirect()->route('register');

        // }
        // else{
        $register = new Register;
        if ($register::where('telepon', $request->get('telepon'))->exists() || $register::where('email', $request->get('email'))->exists()) {
            Alert::error('Gagal', 'Email atau Nomer Telepon anda pernah dipakai');
            return redirect()->route('register');
        }
        else{
            $register-> jabatan = $request->get('job');
            $register-> telepon = $request->get('telepon');
            $register-> email = $request->get('email');
            $register-> tahun = $request->get('tahun');
            $register-> skill = implode(" ", $request->get('skill'));
            $register->save();
            Alert::success('Berhasil', 'Lamaran Berhasil Dikirim');
            return redirect()->route('register');
        }
        // }
    }
}
