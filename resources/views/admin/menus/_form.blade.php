<form action="{{ isset($menu) ? url('admin/menus/' . $menu->id) : url('admin/menus/save') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input required type="text" class="form-control" name="name" value="{{ isset($menu) ? $menu->name : '' }}">
    </div>
{{-- 
    <div class="mb-3">
        <label for="fodd_id" class="form-label">Select Food</label>
        <input type="text" class="form-control" name="food_id" value="{{ isset($menu) ? $menu->food_id : ''}}">
    </div> --}}

    <div class="mb-3">
        <label for="type" class="form-label">Menu Type</label>
        <input type="text" list="menu-type" class="form-control" name="type" value="{{ isset($menu) ? $menu->type : ''}}">
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input required type="number" class="form-control" name="price" min=0 value="{{ isset($menu) ? $menu->price : ''}}">
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Select Image</label>
        <input class="form-control" name="image" type="file" id="image" accept="image/*">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control">{{ isset($menu) ? $menu->description : ''}}</textarea>
    </div>
    <input type="submit" value="Save Menu" class="btn btn-primary">
    <a class="btn btn-danger" href="{{ url('admin/menus') }}"> Cancel </a>

</form>

<datalist id="menu-type">
    <option value="Chinese">
    <option value="Fast Food">
    <option value="Home Made">
</datalist>