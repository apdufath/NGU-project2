@php $student = $student ?? null; @endphp

<div class="flex flex-col items-center gap-4 sm:flex-row sm:items-start">
    <x-student-photo :student="$student" />
    <div class="flex-1 w-full">
        <label class="mb-2 block text-sm font-medium text-white/80">Profile Photo</label>
        <input type="file" name="photo" id="photo" accept="image/jpeg,image/png,image/webp"
               class="block w-full text-sm text-white/70 file:mr-4 file:rounded-lg file:border-0 file:bg-brand-500 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-white hover:file:bg-brand-400">
        @error('photo')<p class="mt-1 text-sm text-red-300">{{ $message }}</p>@enderror
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
