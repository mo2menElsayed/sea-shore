<div class="form-group">
    <label class="form-label">{{ __('Title') }}</label>
    <input type="text" name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control" placeholder="{{ __('Title') }}">
</div>

<div class="form-group">
    <label class="form-label">{{ __('Subtitle') }}</label>
    <textarea name="subtitle" class="form-control" placeholder="{{ __('Subtitle') }}" rows="3">{{ Arr::get($attributes, 'subtitle') }}</textarea>
</div>

<div class="form-group">
    <label class="form-label">{{ __('Number products per page') }}</label>
    <input type="number" name="per_page" value="{{ Arr::get($attributes, 'per_page', 12) }}" class="form-control" placeholder="{{ __('Number products per page') }}">
</div>

<div class="form-group">
    <label class="form-label">{{ __('Select categories') }}</label>
    <select class="select-full" name="category_ids[]" multiple>
        @include('core/base::forms.partials.nested-select-option', [
             'options' => $categories,
             'indent' => null,
             'selected' => array_filter(explode(',', Arr::get($attributes, 'category_ids'))),
         ])
    </select>
    {{ Form::helper(__('Leave categories empty if you want to show products from all categories.')) }}
</div>

<div class="form-group">
    <label class="form-label">{{ __('Select product collections') }}</label>
    <select class="select-full" name="collection_ids[]" multiple>
        @foreach($collections as $collection)
            <option value="{{ $collection->id }}" @selected(in_array($collection->id, array_filter(explode(',', Arr::get($attributes, 'collection_ids')))))>{{ $collection->name }}</option>
        @endforeach
    </select>
    {{ Form::helper(__('Leave collections empty if you want to show products from all collections.')) }}
</div>
