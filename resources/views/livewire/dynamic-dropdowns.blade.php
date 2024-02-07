<div>
    <label for="classDropdown">Select Class:</label>
    <select wire:model="selectedClass">
        <option value="">Select a class</option>
        @foreach($classes as $class)
            <option value="{{ $class->id }}">{{ $class->name }}</option>
        @endforeach
    </select>

    <br>

    <label for="sectionDropdown">Select Section:</label>
    <select wire:model="sections">
        <option value="">Select a section</option>
        @foreach($sections as $section)
            <option value="{{ $section->id }}">{{ $section->name }}</option>
        @endforeach
    </select>
</div>
