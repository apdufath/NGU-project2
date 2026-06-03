<?php

namespace App\Services;

use App\Models\Student;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class StudentService
{
    public function paginate(array $filters = []): LengthAwarePaginator
    {
        $query = Student::query();

        if (! empty($filters['search'])) {
            $search = $filters['search'];
            $query->where(function ($q) use ($search) {
                $q->where('student_id', 'like', "%{$search}%")
                    ->orWhere('full_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        $sortField = $filters['sort'] ?? 'created_at';
        $sortDirection = $filters['direction'] ?? 'desc';

        $allowedSorts = ['student_id', 'full_name', 'email', 'phone', 'created_at', 'date_of_birth'];

        if (! in_array($sortField, $allowedSorts, true)) {
            $sortField = 'created_at';
        }

        if (! in_array($sortDirection, ['asc', 'desc'], true)) {
            $sortDirection = 'desc';
        }

        return $query->orderBy($sortField, $sortDirection)
            ->paginate(10)
            ->withQueryString();
    }

    public function create(array $data, ?UploadedFile $photo = null): Student
    {
        $data['student_id'] = $this->generateStudentId();

        if ($photo) {
            $data['photo'] = $this->storePhoto($photo);
        }

        return Student::create($data);
    }

    public function update(Student $student, array $data, ?UploadedFile $photo = null): Student
    {
        if ($photo) {
            $this->deletePhoto($student);
            $data['photo'] = $this->storePhoto($photo);
        }

        $student->update($data);

        return $student->fresh();
    }

    public function delete(Student $student): void
    {
        $this->deletePhoto($student);
        $student->delete();
    }

    protected function generateStudentId(): string
    {
        $year = now()->format('Y');
        $latest = Student::where('student_id', 'like', "STU-{$year}-%")
            ->orderByDesc('student_id')
            ->value('student_id');

        $sequence = 1;

        if ($latest && preg_match('/STU-\d{4}-(\d+)/', $latest, $matches)) {
            $sequence = (int) $matches[1] + 1;
        }

        return sprintf('STU-%s-%04d', $year, $sequence);
    }

    protected function storePhoto(UploadedFile $photo): string
    {
        return $photo->store('students', 'public');
    }

    protected function deletePhoto(Student $student): void
    {
        if ($student->photo && Storage::disk('public')->exists($student->photo)) {
            Storage::disk('public')->delete($student->photo);
        }
    }
}
