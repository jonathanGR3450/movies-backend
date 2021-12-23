@csrf
<h1 class="display-4">Pelicula</h1>
{{-- {{ dd($categories) }} --}}
<div class="form-group">
    <label for="name">Nombres</label>
    <input type="text" class="form-control bg-light shadow-sm @error('name') is-invalid @else border-0  @enderror"
    id="name" name="name" placeholder="Nombre..." value="{{ old('name', $movie->name) }}">
    @error('name')
        <span role="alert" class="invalid-feedback">
            {!! $errors->first('name', '<strong>:message</strong>') !!}
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="release_date">Fecha de publicacion</label>
    <input type="date" class="form-control bg-light shadow-sm @error('release_date') is-invalid @else border-0  @enderror"
    id="release_date" name="release_date" placeholder="Fecha de publicacion..." value="{{ old('release_date', $movie->release_date) }}">
    @error('release_date')
        <span role="alert" class="invalid-feedback">
            {!! $errors->first('release_date', '<strong>:message</strong>') !!}
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="producer">Productora</label>
    <input type="text" class="form-control bg-light shadow-sm @error('producer') is-invalid @else border-0  @enderror"
    id="producer" name="producer" placeholder="Productora..." value="{{ old('producer', $movie->producer) }}">
    @error('producer')
        <span role="alert" class="invalid-feedback">
            {!! $errors->first('producer', '<strong>:message</strong>') !!}
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="author_id">Autor</label>
    <select class="form-control" id="author_id" name="author_id">
        <option></option>
        @foreach ($authors as $author)
            <option value="{{ $author->id }}" {{ $movie->present()->getAuthorSelected($author->id) }} >{{ $author->name }}</option>
        @endforeach
    </select>
    @error('author_id')
        <span role="alert" class="invalid-feedback">
            {!! $errors->first('author_id', '<strong>:message</strong>') !!}
        </span>
    @enderror
</div>

  <div class="form-group">
    <label for="category_id">Categoria</label>
    <select class="form-control" id="category_id" name="category_id">
        <option></option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ $movie->present()->getCategorySelected($category->id) }} >{{ $category->name }}</option>
        @endforeach
    </select>
    @error('category_id')
        <span role="alert" class="invalid-feedback">
            {!! $errors->first('category_id', '<strong>:message</strong>') !!}
        </span>
    @enderror
  </div>

<input type="submit" class="btn btn-primary btn-lg btn-block" value="{{ $btnText }}">