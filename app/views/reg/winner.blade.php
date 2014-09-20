<form class="form-horizontal">
    <div class="form-group">
        <label class="control-label col-sm-3">Name:</label>
        <div class="col-sm-8">
            <input class="form-control" value="{{$reg->customer->name}}">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3">Email:</label>
        <div class="col-sm-8">
            <input class="form-control" value="{{$reg->customer->email}}">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-3">Phone:</label>
        <div class="col-sm-8">
            <input class="form-control" value="{{$reg->customer->phone}}">
        </div>
    </div><div class="form-group">
        <label class="control-label col-sm-3">Address:</label>
        <div class="col-sm-8">
            <textarea class="form-control">{{$reg->customer->address}}</textarea>
        </div>
    </div>
</form>