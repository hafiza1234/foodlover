form action="{{ isset($menu) ? url('admin/menus/' . $menu->id) : url('admin/menus/save') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input required type="text" class="form-control" name="name" value="{{ isset($menu) ? $menu->name : '' }}">
    </div>

    <div class="mb-3">
        <label for="fodd_id" class="form-label">Select Food</label>
        <input type="text" class="form-control" name="food_id" value="{{ isset($menu) ? $menu->food_id : ''}}">
    </div>

    <div class="mb-3">
        <label for="type" class="form-label">Menu Type</label>
        <input type="text" class="form-control" name="type" value="{{ isset($menu) ? $menu->type : ''}}">
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input required type="number" class="form-control" name="price" min=0 value="{{ isset($menu) ? $menu->price : ''}}">
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Select Image</label>
        <input class="form-control" type="file" id="image">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control">{{ isset($menu) ? $menu->food_id : ''}}</textarea>
    </div>
    <input type="submit" value="Save Menu" class="btn btn-primary">
</form>