<?php

namespace App\Http\Controllers;

use App\Models\MentorWork;
use App\Models\SkuExam;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PembinaController extends Controller
{
    public function index()
    {
        return view('pembina.dashboard');
    }

    public function mentorWork()
    {
        $mentorWork = MentorWork::all();
        return view('pembina.mentor-work', compact('mentorWork'));
    }

    public function mentorWorkCreate()
    {
        $user = User::where('level', 'pembina')->get();
        return view('pembina.mentor-work-create', compact('user'));
    }

    public function mentorWorkStore(Request $request)
    {
        $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'title' => 'required',
            'content' => 'required',
        ]);
        

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->storeAs('mentor-work', $photoName, 'public');
        }
        $status = 'draft';
        $slug = Str::slug($request->title);
        $user = Auth::user();
        $mentorWork = new MentorWork();
        $mentorWork->photo = $photoName;
        $mentorWork->title = $request->title;
        $mentorWork->content = $request->content;
        $mentorWork->status = $status;
        $mentorWork->slug = $slug;
        $mentorWork->user_id = $user->id;
        $mentorWork->save();
        return redirect()->route('pembina.mentor-work')->with('success', 'Mentor Work created successfully');
    }

    public function mentorWorkEdit($id)
    {
        $mentorWork = MentorWork::find($id);
        return view('pembina.mentor-work-edit', compact('mentorWork'));
    }

    public function mentorWorkUpdate(Request $request)
    {
        $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'title' => 'required',
            'content' => 'required',
            
        ]);

        $mentorWork = MentorWork::find($request->id);
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->storeAs('mentor-work', $photoName, 'public');
            $mentorWork->photo = $photoName;
        }
        $mentorWork->title = $request->title;
        $mentorWork->content = $request->content;
        $mentorWork->status = 'draft';
        $mentorWork->save();
        return redirect()->route('pembina.mentor-work')->with('success', 'Mentor Work updated successfully');
    }

    public function mentorWorkDestroy($id)
    {
        $mentorWork = MentorWork::find($id);
        $mentorWork->delete();
        return redirect()->route('pembina.mentor-work')->with('success', 'Mentor Work deleted successfully');
    }

    // SKU
    public function sku()
    {
        $sku = SkuExam::all();
        $user = User::where('level', 'user')->get();
        return view('pembina.sku', compact('user', 'sku'));
    }
    public function skuDetail($id)
    {
        $user = User::find($id);
        $sku = SkuExam::where('user_id', $id)->get();

        $sku_items = [];
        $sku_questions = [
            2 => 'Berani mengajukan saran dan kritik untuk membangun desanya kepada aparat pemerintah setempat',
            3 => 'Dapat mengikuti atau memimpin diskusi racana dan mampu mengambil keputusan',
            4 => 'Dapat mengatasi suatu permasalahan/ perselisihan yang terjadi dalam masyarakat dengan bijak',
            5 => 'Mengikuti pertemuan diracana sekurang- kurangnya 3 kali setiap bulan',
            6 => 'Setia membayar iuran kepada gugusdepannya, dengan uang yang seluruhnya dari usaha sendiri, serta membantu racana dan gugusdepan dalam mengelola administrasi keuangan ',
            7 => 'Dapat membuat tulisan dengan menggunakan Bahasa Indonesia yang baik serta dapat memaparkannya didepan pertemuan',
            8 => 'Mampu membuat perencanaan kegiatan ditingkat racana',
            9 => 'Dapat merencanakan dan memimpin kerja bakti sesuai keperluan masyarakat serta menguasai management penanggulangan bencana berbasis masyarakat',
            10 => 'Telah memahami makna upacara adat di masyarakat dan ikut berperan aktif',
            11 => 'Memahami undang- undang Gerakan pramuka dan dapat menjelaskan AD & ART Gerakan pramuka dalam bentuk tulisan ',
            12 => 'Dapat menjelaskan tentang sejarah kepramukaan Indonesia dan dunia dalam bentuk tulisan',
            13 => 'Dapat menjelaskan tentang penggunaan jam, kompas, tanda-tanda alam serta tata cara pengembaraan kepada regu atau sangga',
            14 => 'Dapat menjelaskan peran pemuda dalam mengisi kemerdekaan dengan bentuk tulisan, mampu menganalisis dan menulis symbol-simbol nasionalisme Indonesia (NKRI, lambing negara, lagu wajib nasional) sesuai UU No. 24 tahun 2009',
            15 => 'Mampu menjelaskan fungsi dan peran Indonesia dalam organisasi ASEAN dan PBB dalam bentuk Tulisan',
            16 => 'Dapat membuat proposal usaha mandiri degan baik dan dapat melakukan kegiatan wirausaha',
            17 => 'Dapat menciptakan mengembangkan peralatan teknologi tepat guna.',
            18 => 'Dapat memberikan penjelasan tentang tali temali dan pioneering kepada pramuka penggalang/ penegak',
            19 => 'Sudah mengikuti kursus pembina pramuka tingkat mahir tingkat dasar',
            20 => 'Mampu mengajarkan olahraga renang gaya bebas kepada orang lain dan menguasai 2 (dua) cabang olahraga salah satunya cabang olahraga beladiri serta dapat menjadi instruktur senam pramuka/ senam kebugaran jasmani (SKJ) ',
            21 => 'Dapat membahas dan menganalisis tentang Kesehatan reproduksi',
            22 => 'Dapat menjadi perwira upacara dan instruktur baris berbaris',
            23 => 'Mampu melakukan penyuluhan tentang penyebab dan cara pencegahan penyakit infeksi, degenerative, dan penyakit yang disebebkan perilaku tidak sehat serta dapat melaksanakan PPGD.',
            24 => 'Melakukan perencanaan dan pengelolaan perkemahan dan/atau pengembaraan 3 hari berturut-turut',
        ];
        for ($i = 2; $i <= 24; $i++) {
            $sku_items[$i] = [
                'no' => $i,
                'question' => $sku_questions[$i]
            ];
        }
        return view('pembina.sku-detail', compact('user', 'sku', 'sku_items'));
    }   

    public function skuApprove($id)
    {
        $sku = SkuExam::find($id);
        $sku->status = 'lulus';
        $sku->save();
        return redirect()->back()->with('success', 'SKU Approved successfully');
    }

    public function skuReject($id)
    {
        $sku = SkuExam::find($id);
        $sku->status = 'tidak lulus';
        $sku->save();
        return redirect()->back()->with('success', 'SKU Rejected successfully');
    }
}
