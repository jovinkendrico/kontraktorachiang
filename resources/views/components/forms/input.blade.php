<div class="form-group">
    <label for="{{ $id }}" class="fs-6 fw-bold form-label mt-3">
        <span class="{{ $required }}">{{ $label }}</span>
    </label>

    <input type="{{ $type }}" class="form-control form-control-solid" name="{{ $name }}"
        :id="$id" value="{{ old($value) }}" placeholder="{{ $placeholder }}" />
</div>
