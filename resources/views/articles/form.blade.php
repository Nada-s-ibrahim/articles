<div class="row mb-4">
    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}:</label>

    <div class="col-md-6">
        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{Request::old('title') ? Request::old('title') : $model->title}}" required autocomplete="title" autofocus>

        @error('title')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="row mb-3">
    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}:</label>

    <div class="col-md-6">
        <textarea class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description" autofocus>{{Request::old('description') ? Request::old('description') : $model->description}}</textarea>

        @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Photo') }}:</label>

    <div class="col-md-6">

        <input name="photo" type="file">
        @error('photo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
