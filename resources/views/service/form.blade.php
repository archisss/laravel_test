<div class="form-group">
    <label for="name">Name</label>
    <input type="name" class="form-control" name="name" value="{{ isset($service->name) ? $service->name : old('name') }}">
    {!! $errors->first('name', '<span class="alert-danger">:message</span>') !!}
</div>

<div class="form-group d-flex flex-column">
    <label for="status">Status</label>
    <div class="form-check form-check-inline">
    @if(!isset($service->status))
    <input class="form-check-input" type="radio" name="status" id="status" value="1">
    @else
        <input class="form-check-input" type="radio" name="status" id="status" value="1" {{ ($service->status=="1")? "checked" : "" }}>
    @endif
    
    <label class="form-check-label" for="status">
        Active
    </label>
    </div>
    <div class="form-check form-check-inline">
    @if(!isset($service->status))
    <input class="form-check-input" type="radio" name="status" id="status" value="0" checked>
    @else
    <input class="form-check-input" type="radio" name="status" value="0" {{ ($service->status=="0")? "checked" : "" }}>
    @endif
    
    <label class="form-check-label" for="status">
        Unactive
    </label>
    </div>
</div>
