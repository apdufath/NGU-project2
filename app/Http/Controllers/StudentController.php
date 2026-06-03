<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StoreStudentRequest;
use App\Http\Requests\Student\UpdateStudentRequest;
use App\Models\Student;
use App\Services\StudentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function __construct(
        protected StudentService $studentService
    ) {}

    public function index(Request $request): View
    {
        $this->authorize('viewAny', Student::class);

        $students = $this->studentService->paginate([
            'search' => $request->query('search'),
            'sort' => $request->query('sort'),
            'direction' => $request->query('direction'),
        ]);

        return view('students.index', compact('students'));
    }

    public function create(): View
    {
        $this->authorize('create', Student::class);

        return view('students.create');
    }

    public function store(StoreStudentRequest $request): RedirectResponse
    {
        $this->studentService->create(
            $request->safe()->except('photo'),
            $request->file('photo')
        );

        return redirect()
            ->route('students.index')
            ->with('success', 'Student registered successfully.');
    }

    public function show(Student $student): View
    {
        $this->authorize('view', $student);

        return view('students.show', compact('student'));
    }

    public function edit(Student $student): View
    {
        $this->authorize('update', $student);

        return view('students.edit', compact('student'));
    }

    public function update(UpdateStudentRequest $request, Student $student): RedirectResponse
    {
        $this->studentService->update(
            $student,
            $request->safe()->except('photo'),
            $request->file('photo')
        );

        return redirect()
            ->route('students.show', $student)
            ->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student): RedirectResponse
    {
        $this->authorize('delete', $student);

        $this->studentService->delete($student);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }
}
