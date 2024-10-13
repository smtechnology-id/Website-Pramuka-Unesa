@extends('layouts.app')

@section('active_quiz', 'active-page')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3> <a href="{{ route('admin.quiz') }}" class="btn btn-sm btn-primary" style="float: right">Back</a> Add Question for <span class="text-primary">{{ $quiz->title }}</span></h3>
                <div class="row">
                    <div class="col-12">
                        <table class="table">
                            <tr>
                                <td>Code Quiz</td>
                                <td>:</td>
                                <td><span class="badge bg-outline-primary" style="font-size: 14px; color: #000">{{ $quiz->code_quiz }}</span></td>
                            </tr>
                            <tr>
                                <td>Quiz Title</td>
                                <td>:</td>
                                <td>{{ $quiz->title }}</td>
                            </tr>
                            <tr>
                                <td>Quiz Code</td>
                                <td>:</td>
                                <td>{{ $quiz->code_quiz }}</td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td>:</td>
                                <td>{!! $quiz->description !!}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td><span style="font-size: 14px" class="badge bg-{{ $quiz->status == 'publish' ? 'success' : 'warning' }}">{{ $quiz->status }}</span></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-12">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addQuestionModal">
                            Add Question
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="addQuestionModal" tabindex="-1" aria-labelledby="addQuestionModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.quiz-question.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
                                            <div class="form-group mb-3">
                                                <label for="">Question</label>
                                                <textarea name="question" id="editor" cols="30" rows="10" class="form-control" required style="overflow:scroll; max-height:300px"></textarea>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="">Image</label>
                                                <input type="file" name="image" class="form-control">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="">Answer A</label>
                                                <input type="text" name="answer_a" class="form-control" required>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="">Answer B</label>
                                                <input type="text" name="answer_b" class="form-control" required>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="">Answer C</label>
                                                <input type="text" name="answer_c" class="form-control" required>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="">Answer D</label>
                                                <input type="text" name="answer_d" class="form-control" required>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="">Answer E</label>
                                                <input type="text" name="answer_e" class="form-control">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="">Correct Answer</label>
                                                <select name="correct_answer" id="" class="form-select" required>
                                                    <option value="">Select Correct Answer</option>
                                                    <option value="answer_a">Answer A</option>
                                                    <option value="answer_b">Answer B</option>
                                                    <option value="answer_c">Answer C</option>
                                                    <option value="answer_d">Answer D</option>
                                                    <option value="answer_e">Answer E</option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-3">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Question</th>
                                        <th>Image</th>
                                        <th>Answer A</th>
                                        <th>Answer B</th>
                                        <th>Answer C</th>
                                        <th>Answer D</th>
                                        <th>Answer E</th>
                                        <th>Correct Answer</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($questions as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{!! $item->question !!}</td>
                                            <td>
                                                @if ($item->image)
                                                    <img src="{{ asset('storage/questions/' . $item->image) }}" alt="" style="width: 100px">
                                                @else
                                                    <span class="badge bg-danger">No Image</span>
                                                @endif
                                            </td>
                                            <td>{{ $item->answer_a }}</td>
                                            <td>{{ $item->answer_b }}</td>
                                            <td>{{ $item->answer_c }}</td>
                                            <td>{{ $item->answer_d }}</td>
                                            <td>{{ $item->answer_e }}</td>
                                            <td>@if ($item->correct_answer == 'answer_a')
                                                A
                                            @elseif ($item->correct_answer == 'answer_b')
                                                B
                                            @elseif ($item->correct_answer == 'answer_c')
                                                C
                                            @elseif ($item->correct_answer == 'answer_d')
                                                D
                                            @elseif ($item->correct_answer == 'answer_e')
                                                E
                                            @endif</td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editQuestionModal{{ $item->id }}">
                                                    Edit
                                                </button>
                                                
                                                <!-- Modal -->
                                                <div class="modal fade" id="editQuestionModal{{ $item->id }}" tabindex="-1" aria-labelledby="editQuestionModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editQuestionModalLabel">Edit Question</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('admin.quiz-question.update') }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                                    <div class="form-group mb-3">
                                                                        <label for="">Question</label>
                                                                        <textarea name="question" id="editor" cols="30" rows="10" class="form-control" required style="overflow:scroll; max-height:300px">{!! $item->question !!}</textarea>
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="">Image</label>
                                                                        <input type="file" name="image" class="form-control">
                                                                        @if ($item->image)
                                                                            <img src="{{ asset('storage/questions/' . $item->image) }}" alt="" style="width: 100px">
                                                                        @endif
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="">Answer A</label>
                                                                        <input type="text" name="answer_a" class="form-control" value="{{ $item->answer_a }}" required>
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="">Answer B</label>
                                                                        <input type="text" name="answer_b" class="form-control" value="{{ $item->answer_b }}" required>
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="">Answer C</label>
                                                                        <input type="text" name="answer_c" class="form-control" value="{{ $item->answer_c }}" required>
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="">Answer D</label>
                                                                        <input type="text" name="answer_d" class="form-control" value="{{ $item->answer_d }}" required>
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="">Answer E</label>
                                                                        <input type="text" name="answer_e" class="form-control" value="{{ $item->answer_e }}">
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="">Correct Answer</label>
                                                                        <select name="correct_answer" id="" class="form-select" required>
                                                                            <option value="">Select Correct Answer</option>
                                                                            <option value="answer_a" {{ $item->correct_answer == 'answer_a' ? 'selected' : '' }}>Answer A</option>
                                                                            <option value="answer_b" {{ $item->correct_answer == 'answer_b' ? 'selected' : '' }}>Answer B</option>
                                                                            <option value="answer_c" {{ $item->correct_answer == 'answer_c' ? 'selected' : '' }}>Answer C</option>
                                                                            <option value="answer_d" {{ $item->correct_answer == 'answer_d' ? 'selected' : '' }}>Answer D</option>
                                                                            <option value="answer_e" {{ $item->correct_answer == 'answer_e' ? 'selected' : '' }}>Answer E</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                              
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ route('admin.quiz-question.destroy', $item->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection