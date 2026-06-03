@php $student = $student ?? null; @endphp

<div class="student-profile-layout mb-6 rounded-2xl border border-white/10 bg-white/5 p-6">
    <x-student-photo :student="$student" />
    <div class="student-profile-info">
        <h3 class="text-lg font-semibold text-white">Student Photo</h3>
        <p class="mt-1 text-sm text-white/60">
            Upload a clear portrait photo. This will appear on the student profile, list, and dashboard.
        </p>
    </div>
</div>

<div class="grid gap-6 sm:grid-cols-2">
    <div class="sm:col-span-2">
        <label class="mb-2 block text-sm font-medium text-white/80">Full Name</label>
        <input type="text" name="full_name" value="{{ old('full_name', $student?->full_name) }}" required class="glass-input">
        @error('full_name')<p class="mt-1 text-sm text-red-300">{{ $message }}</p>@enderror
    </div>

    <div class="sm:col-span-2">
        <label class="mb-2 block text-sm font-medium text-white/80">Address</label>
        <textarea name="address" rows="3" required class="glass-input">{{ old('address', $student?->address) }}</textarea>
        @error('address')<p class="mt-1 text-sm text-red-300">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="mb-2 block text-sm font-medium text-white/80">Email</label>
        <input type="email" name="email" value="{{ old('email', $student?->email) }}" required class="glass-input">
        @error('email')<p class="mt-1 text-sm text-red-300">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="mb-2 block text-sm font-medium text-white/80">Phone</label>
        <input type="text" name="phone" value="{{ old('phone', $student?->phone) }}" required class="glass-input">
        @error('phone')<p class="mt-1 text-sm text-red-300">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="mb-2 block text-sm font-medium text-white/80">Gender</label>
        <select name="gender" required class="glass-input">
            <option value="">Select gender</option>
            @foreach(['male', 'female', 'other'] as $gender)
                <option value="{{ $gender }}" @selected(old('gender', $student?->gender) === $gender)>
                    {{ ucfirst($gender) }}
                </option>
            @endforeach
        </select>
        @error('gender')<p class="mt-1 text-sm text-red-300">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="mb-2 block text-sm font-medium text-white/80">Date of Birth</label>
        <input type="date" name="date_of_birth" value="{{ old('date_of_birth', $student?->date_of_birth?->format('Y-m-d')) }}" required class="glass-input">
        @error('date_of_birth')<p class="mt-1 text-sm text-red-300">{{ $message }}</p>@enderror
    </div>
</div>
