<?php

namespace App\Http\Controllers;

use App\Models\CommentDiscussion;
use App\Models\CommentMemberWork;
use App\Models\CommentMentorWork;
use App\Models\Discussion;
use App\Models\Event;
use App\Models\Lesson;
use App\Models\MemberWork;
use App\Models\ParticipantAnswer;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\QuizParticipant;
use App\Models\Registration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        return view('user.dashboard');
    }

    // Event
    public function event()
    {
        $events = Event::orderBy('created_at', 'desc')->where('status', 'active')->get();
        return view('user.event', compact('events'));
    }
    public function eventShow($slug)
    {
        $event = Event::where('slug', $slug)->first();
        // Cek Apakah Sudah Pernah Daftar
        $check = Registration::where('user_id', auth()->user()->id)->where('event_id', $event->id)->first();
        if ($check) {
            $statusPendaftaran = '1';
        } else {
            $statusPendaftaran = '0';
        }
        return view('user.event-show', compact('event', 'statusPendaftaran'));
    }

    public function eventRegister(Request $request)
    {
        $event = Event::where('id', $request->event_id)->first();
        $user = User::where('id', auth()->user()->id)->first();
        $data = [
            'event_id' => $event->id,
            'user_id' => $user->id,
            'motivation' => $request->motivation,
        ];
        Registration::create($data);
        return redirect()->back()->with('success', 'Berhasil Mendaftar');
    }

    // Registration
    public function registration()
    {
        $registrations = Registration::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        return view('user.registration', compact('registrations'));
    }

    // Member Work
    public function memberWork()
    {
        $memberWorks = MemberWork::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        return view('user.member-work', compact('memberWorks'));
    }

    // Member Work Create
    public function memberWorkCreate()
    {
        return view('user.member-work-create');
    }
    public function memberWorkStore(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required',
            'content' => 'required',
            'user_id' => 'required',
        ]);
        $memberWork = new MemberWork();
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            // Menggunakan storage untuk menyimpan gambar
            $photo->storeAs('member-work', $photoName, 'public');
            $memberWork->photo = $photoName;
        }
        $slug = Str::slug($request->title);
        $memberWork->slug = $slug;
        $memberWork->title = $request->title;
        $memberWork->user_id = $request->user_id;
        $memberWork->content = $request->content;
        $memberWork->status = 'draft';
        $memberWork->save();
        return redirect()->route('user.member-work')->with('success', 'Berhasil Menambahkan Karya Anggota');
    }

    // Member Work Edit
    public function memberWorkEdit($id)
    {
        $memberWork = MemberWork::where('id', $id)->first();
        return view('user.member-work-edit', compact('memberWork'));
    }
    public function memberWorkUpdate(Request $request)
    {
        $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required',
            'content' => 'required',
        ]);
        $memberWork = MemberWork::where('id', $request->id)->first();
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            // Menggunakan storage untuk menyimpan gambar
            $photo->storeAs('member-work', $photoName, 'public');
            $memberWork->photo = $photoName;
        }
        $memberWork->title = $request->title;
        $memberWork->content = $request->content;
        $memberWork->status = 'draft';
        $memberWork->save();
        return redirect()->route('user.member-work')->with('success', 'Berhasil Mengubah Karya Anggota');
    }
    public function memberWorkDestroy($id)
    {
        $memberWork = MemberWork::where('id', $id)->first();
        Storage::delete('member-work/' . $memberWork->photo);
        $memberWork->delete();
        return redirect()->route('user.member-work')->with('success', 'Berhasil Menghapus Karya Anggota');
    }

    public function diskusiStore(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'user_id' => 'required',
        ]);
        $diskusi = new Discussion();
        $diskusi->content = $request->content;
        $diskusi->user_id = $request->user_id;
        $diskusi->save();

        return redirect()->back()->with('success', 'Diskusi Berhasil Di Publish');
    }
    public function diskusiShow($id)
    {
        $comments = CommentDiscussion::where('discussion_id', $id)->orderBy('created_at', 'desc')->get();
        $diskusi = Discussion::where('id', $id)->first();
        return view('diskusi-show', compact('diskusi', 'comments'));
    }

    public function commentDiscussionStore(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'user_id' => 'required',
            'discussion_id' => 'required',
        ]);
        $comment = new CommentDiscussion();
        $comment->content = $request->content;
        $comment->user_id = $request->user_id;
        $comment->discussion_id = $request->discussion_id;
        $comment->save();

        return redirect()->back()->with('success', 'Komentar Berhasil Di Publish');
    }
    // Comment Mentor Work
    public function commentMentorWorkStore(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'user_id' => 'required',
            'mentor_work_id' => 'required',
        ]);
        $comment = new CommentMentorWork();
        $comment->content = $request->content;
        $comment->user_id = $request->user_id;
        $comment->mentor_work_id = $request->mentor_work_id;
        $comment->save();

        return redirect()->back()->with('success', 'Komentar Berhasil Di Publish');
    }

    // Comment Member Work
    public function commentMemberWorkStore(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'user_id' => 'required',
            'member_work_id' => 'required',
        ]);
        $comment = new CommentMemberWork();
        $comment->content = $request->content;
        $comment->user_id = $request->user_id;
        $comment->member_work_id = $request->member_work_id;
        $comment->save();

        return redirect()->back()->with('success', 'Komentar Berhasil Di Publish');
    }

    // Lesson
    public function lesson()
    {
        $lesson = Lesson::orderBy('created_at', 'desc')->get();
        return view('user.lesson', compact('lesson'));
    }

    public function lessonShow($id)
    {
        $lesson = Lesson::where('id', $id)->first();
        return view('user.lesson-show', compact('lesson'));
    }

    // Quiz
    public function quiz()
    {
        $participants = QuizParticipant::all();
        $quizzes = Quiz::orderBy('created_at', 'desc')->get();
        return view('user.quiz', compact('quizzes', 'participants'));
    }
    public function quizWelcome($slug)
    {
        $quiz = Quiz::where('slug', $slug)->first();
        // Cek Apakah Sudah Pernah Mengerjakan Quiz
        $participant = QuizParticipant::where('user_id', auth()->user()->id)->where('quiz_id', $quiz->id)->first();
        if ($participant) {
            $status = '1';
        } else {
            $status = '0';
        }
        return view('user.quiz-welcome', compact('quiz', 'status', 'participant'));
    }
    public function quizShow($slug)
    {
        $quiz = Quiz::where('slug', $slug)->first();
        // Cek Apakah Sudah Pernah Mengerjakan Quiz
        $participant = QuizParticipant::where('user_id', auth()->user()->id)->where('quiz_id', $quiz->id)->first();
        if ($participant) {
            if ($participant->end_time) {
                return redirect()->route('user.quiz.welcome', $slug)->with('error', 'Anda Sudah Mengerjakan Quiz Ini');
            }
        } else {
            // Add New Participant
            $participant = new QuizParticipant();
            $participant->user_id = auth()->user()->id;
            $participant->quiz_id = $quiz->id;
            $participant->start_time = now();
            $participant->score = 0;
            $participant->save();
        }
        $questions = Question::where('quiz_id', $quiz->id)->get();
        $usageTime = now()->diffInMinutes($participant->start_time);
        $participantAnswer = ParticipantAnswer::where('quiz_id', $quiz->id)->where('quiz_participant_id', $participant->id)->get();
        return view('user.quiz-show', compact('quiz', 'questions', 'participant', 'usageTime', 'participantAnswer'));
    }
    public function quizSubmit(Request $request)
    {
        $request->validate([
            'quiz_id' => 'required',
            'quiz_participant_id' => 'required',
        ]);
        $questions = Question::where('quiz_id', $request->quiz_id)->get();
        foreach ($questions as $question) {
            // Cek Apakah Sudah Pernah Menjawab
            $check = ParticipantAnswer::where('quiz_id', $request->quiz_id)->where('quiz_participant_id', $request->quiz_participant_id)->where('question_id', $question->id)->first();
            if (!$check) {
                $answer = new ParticipantAnswer();
                $answer->quiz_id = $request->quiz_id;
                $answer->quiz_participant_id = $request->quiz_participant_id;
                $answer->question_id = $question->id;
                $answer->answer = $request->{$question->id};
               
                // is_correct
                if ($question->correct_answer == $answer->answer) {
                    $answer->is_correct = true;
                } else {
                    $answer->is_correct = false;
                }
                // Update Score
                
                $answer->save();
                if($answer)
                {
                    $participant = QuizParticipant::where('id', $request->quiz_participant_id)->first();
                    $score = $participant->score;
                    // Hitung Jumlah Jawaban Benar
                    $correctAnswer = ParticipantAnswer::where('quiz_id', $request->quiz_id)->where('quiz_participant_id', $request->quiz_participant_id)->where('is_correct', true)->count();
                    $participant->score = $correctAnswer;
                    
                    $participant->save();
                }
            } else {
                $check->answer = $request->{$question->id};
                
                // is_correct
                if ($question->correct_answer == $check->answer) {
                    $check->is_correct = true;
                } else {
                    $check->is_correct = false;
                }
                
                $check->save();
                if($check)
                {
                    $participant = QuizParticipant::where('id', $request->quiz_participant_id)->first();
                    $score = $participant->score;
                    // Hitung Jumlah Jawaban Benar
                    $correctAnswer = ParticipantAnswer::where('quiz_id', $request->quiz_id)->where('quiz_participant_id', $request->quiz_participant_id)->where('is_correct', true)->count();
                    $participant->score = $correctAnswer;
                    
                    $participant->save();

                    // Tambahkan Waktu Selesai
                    $participant->end_time = now();
                    $participant->save();
                }
            }
        }
        return redirect()->route('user.quiz')->with('success', 'Quiz Berhasil Di Submit');
    }
    
}
