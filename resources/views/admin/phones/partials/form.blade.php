<div class="row form-center">
    <div class="w-100 form-font">

        <div class="form-group">
            <label for="phone">@lang('admin_phone.phone')</label>
            <input type="text" class="form-control" name="phone" placeholder="@lang('admin_phone.phone')"
                   value="{{$phone->phone ?? ""}}">
        </div>

        <div class="form-group">
            <label for="last_name">@lang('admin_phone.lastName')</label>

            <input type="text" class="form-control" name="last_name" placeholder="@lang('admin_phone.lastName')"
                   value="{{$phone->last_name ?? ""}}">
        </div>

        @if (count($errors))
            <div class="form-group">
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <input class="btn btn-primary" type="submit" value="@lang('admin_phone.save')">
    </div>
</div>
