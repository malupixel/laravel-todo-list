<div>
    <label class="block mb-1">Task Name *</label>
    <input type="text" name="name" value="{{ old('name', $task?->name) }}"
           class="w-full border rounded px-3 py-2" required maxlength="255">
</div>

<div>
    <label class="block mb-1">Description</label>
    <textarea name="description" class="w-full border rounded px-3 py-2">{{ old('description', $task?->description) }}</textarea>
</div>

<div class="grid grid-cols-2 gap-4">
    <div>
        <label class="block mb-1">Priority *</label>
        <select name="priority" class="w-full border rounded px-3 py-2" required>
            @foreach(['low', 'medium', 'high'] as $value)
                <option value="{{ $value }}" {{ old('priority', $task?->priority) === $value ? 'selected' : '' }}>
                    {{ ucfirst($value) }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block mb-1">Status *</label>
        <select name="status" class="w-full border rounded px-3 py-2" required>
            @foreach(['to-do', 'in progress', 'done'] as $value)
                <option value="{{ $value }}" {{ old('status', $task?->status) === $value ? 'selected' : '' }}>
                    {{ ucfirst($value) }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div>
    <label class="block mb-1">Due Date *</label>
    <input type="date" name="due_date" value="{{ old('due_date', $task?->due_date?->format('Y-m-d')) }}"
           class="w-full border rounded px-3 py-2" required>
</div>

@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-2 rounded">
        <ul class="text-sm list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
