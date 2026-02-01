 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>
 <body>


@if(session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
@endif

<form action="{{ route('products-store') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="form-group">
  <label>Title</label>
  <input type="text"
         name="title"
         class="form-control @error('title') is-invalid @enderror"
         value="{{ old('title') }}">
  @error('title')
    <span class="invalid-feedback">{{ $message }}</span>
  @enderror
</div>

<div class="form-group">
  <label>Description</label>
  <textarea name="description"
            class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
</div>

<div class="form-group">
  <label>Image</label>
  <input type="file"
         name="image"
         class="form-control @error('image') is-invalid @enderror">
</div>

<div class="form-group">
  <label>Quantity</label>
  <input type="number"
         name="quantity"
         class="form-control"
         value="{{ old('quantity') }}">
</div>

<div class="form-group">
  <label>Cost</label>
  <input type="number"
         step="0.01"
         name="cost"
         class="form-control"
         value="{{ old('cost') }}">
</div>

<button type="submit" class="btn btn-primary">Save Product</button>
</form>
    
 </body>
 </html>