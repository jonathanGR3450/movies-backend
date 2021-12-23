@csrf
<h1 class="display-4">Autor</h1>
<div class="form-group">
    <label for="name">Nombres</label>
    <input type="text" class="form-control bg-light shadow-sm @error('name') is-invalid @else border-0  @enderror"
    id="name" name="name" placeholder="Nombre..." value="{{ old('name', $author->name) }}">
    @error('name')
        <span role="alert" class="invalid-feedback">
            {!! $errors->first('name', '<strong>:message</strong>') !!}
        </span>
    @enderror
</div>
<input type="submit" class="btn btn-primary btn-lg btn-block" value="{{ $btnText }}">