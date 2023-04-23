
<div class="form-group">
    <h5>Select All</h5>
    <fieldset>
        <legend>
            <label class="kt-checkbox">

                <input type="checkbox"  id="select-all" title="Select All" />

{{--                <input type="checkbox" class="checkAll" @if(isset($item) && $item->hasAllDirectPermissions(['add_roles'])) checked @endif>--}}
                <span class="first"></span>
            </label>
        </legend>

    </fieldset>
</div><div class="form-group">
    <h5>Permissions</h5>
    <fieldset>
        <legend>
            <label class="kt-checkbox">
                <input type="checkbox" class="checkAll"
                       @if(isset($item) && $item->hasAllDirectPermissions(['add_roles'])) checked @endif>
                <span class="first"></span>
            </label>
        </legend>
        <div class="row">
            <div class="col-md-6 mb-4">
                <label class="kt-checkbox">
                    <input name="permissions[]" class="checkbox" value="add_roles" type="checkbox"
                           @if(isset($item) && $item->hasPermissionTo('add_roles')) checked @endif>@lang('Add / Edit')
                    <span></span>
                </label>
            </div>

        </div>
    </fieldset>
</div>

<div class="form-group">
    <h5>@lang('Partners')</h5>
    <fieldset>
        {{--        show_partners--}}
        {{--        add_partners--}}
        <legend>
            <label class="kt-checkbox">
                <input type="checkbox" class="checkAll"
                       @if(isset($item) && $item->hasAllDirectPermissions(['show_partners' , 'add_partners'])) checked @endif>
                <span class="first"></span>
            </label>
        </legend>
        <div class="row">
            <div class="col-md-6 mb-4">
                <label class="kt-checkbox">
                    <input name="permissions[]" class="checkbox" value="show_partners" type="checkbox"
                           @if(isset($item) && $item->hasPermissionTo('show_partners')) checked @endif> @lang('Show')
                    <span></span>
                </label>
            </div>

            <div class="col-md-6 mb-4">
                <label class="kt-checkbox">
                    <input name="permissions[]" class="checkbox" value="add_partners" type="checkbox"
                           @if(isset($item) && $item->hasPermissionTo('add_partners')) checked @endif> @lang('Add & Edit')
                    <span></span>
                </label>
            </div>

        </div>
    </fieldset>
</div>

<div class="form-group">
    <h5>@lang('Partners')</h5>
    <fieldset>
        {{--        show_promotional-emails--}}
        {{--        add_promotional-emails--}}
        <legend>
            <label class="kt-checkbox">
                <input type="checkbox" class="checkAll"
                       @if(isset($item) && $item->hasAllDirectPermissions(['show_promotional-emails' , 'add_promotional-emails'])) checked @endif>
                <span class="first"></span>
            </label>
        </legend>
        <div class="row">
            <div class="col-md-6 mb-4">
                <label class="kt-checkbox">
                    <input name="permissions[]" class="checkbox" value="show_promotional-emails" type="checkbox"
                           @if(isset($item) && $item->hasPermissionTo('show_promotional-emails')) checked @endif> @lang('Show')
                    <span></span>
                </label>
            </div>

            <div class="col-md-6 mb-4">
                <label class="kt-checkbox">
                    <input name="permissions[]" class="checkbox" value="add_promotional-emails" type="checkbox"
                           @if(isset($item) && $item->hasPermissionTo('add_promotional-emails')) checked @endif> @lang('Add & Edit')
                    <span></span>
                </label>
            </div>

        </div>
    </fieldset>
</div>

<div class="form-group">
    <h5>Admins</h5>
    <fieldset>
        <legend>
            <label class="kt-checkbox">
                <input type="checkbox" class="checkAll"
                       @if(isset($item) && $item->hasAllDirectPermissions(['show_admins' , 'add_admins'])) checked @endif>
                <span class="first"></span>
            </label>
        </legend>
        <div class="row">
            <div class="col-md-6 mb-4">
                <label class="kt-checkbox">
                    <input name="permissions[]" class="checkbox" value="show_admins" type="checkbox"
                           @if(isset($item) && $item->hasPermissionTo('show_admins')) checked @endif> @lang('show')
                    <span></span>
                </label>
            </div>
            <div class="col-md-6 mb-4">
                <label class="kt-checkbox">
                    <input name="permissions[]" class="checkbox" value="add_admins" type="checkbox"
                           @if(isset($item) && $item->hasPermissionTo('add_admins')) checked @endif>@lang('Add / Edit')
                    <span></span>
                </label>
            </div>

        </div>
    </fieldset>
</div>
<div class="form-group">
    <h5>sliders</h5>
    <fieldset>
        <legend>
            <label class="kt-checkbox">
                <input type="checkbox" class="checkAll"
                       @if(isset($item) && $item->hasAllDirectPermissions(['show_sliders' , 'add_sliders'])) checked @endif>
                <span class="first"></span>
            </label>
        </legend>
        <div class="row">
            <div class="col-md-6 mb-4">
                <label class="kt-checkbox">
                    <input name="permissions[]" class="checkbox" value="show_sliders" type="checkbox"
                           @if(isset($item) && $item->hasPermissionTo('show_sliders')) checked @endif> @lang('show')
                    <span></span>
                </label>
            </div>
            <div class="col-md-6 mb-4">
                <label class="kt-checkbox">
                    <input name="permissions[]" class="checkbox" value="add_sliders" type="checkbox"
                           @if(isset($item) && $item->hasPermissionTo('add_sliders')) checked @endif>@lang('Add / Edit')
                    <span></span>
                </label>
            </div>

        </div>
    </fieldset>
</div>

<div class="form-group">
   <h5>Users</h5>
   <fieldset>
       <legend>
           <label class="kt-checkbox">
               <input type="checkbox" class="checkAll"
                      @if(isset($item) && $item->hasAllDirectPermissions(['show_users' , 'add_users'])) checked @endif>
               <span class="first"></span>
           </label>
       </legend>
       <div class="row">
           <div class="col-md-6 mb-4">
               <label class="kt-checkbox">
                   <input name="permissions[]" class="checkbox" value="show_users" type="checkbox"
                          @if(isset($item) && $item->hasPermissionTo('show_users')) checked @endif> @lang('show')
                   <span></span>
               </label>
           </div>

           <div class="col-md-6 mb-4">
               <label class="kt-checkbox">
                   <input name="permissions[]" class="checkbox" value="add_users" type="checkbox"
                          @if(isset($item) && $item->hasPermissionTo('add_users')) checked @endif>@lang('Add / Edit')
                   <span></span>
               </label>
           </div>

       </div>
   </fieldset>
</div>
<div class="form-group">
    <h5>Products</h5>
    <fieldset>
        <legend>
            <label class="kt-checkbox">
                <input type="checkbox" class="checkAll"
                       @if(isset($item) && $item->hasAllDirectPermissions(['show_products' , 'add_products'])) checked @endif>
                <span class="first"></span>
            </label>
        </legend>
        <div class="row">
            <div class="col-md-6 mb-4">
                <label class="kt-checkbox">
                    <input name="permissions[]" class="checkbox" value="show_products" type="checkbox"
                           @if(isset($item) && $item->hasPermissionTo('show_products')) checked @endif> @lang('show')
                    <span></span>
                </label>
            </div>

            <div class="col-md-6 mb-4">
                <label class="kt-checkbox">
                    <input name="permissions[]" class="checkbox" value="add_products" type="checkbox"
                           @if(isset($item) && $item->hasPermissionTo('add_products')) checked @endif>@lang('Add / Edit')
                    <span></span>
                </label>
            </div>

        </div>
    </fieldset>
</div>
<div class="form-group">
    <h5>addresses</h5>
    <fieldset>
        <legend>
            <label class="kt-checkbox">
                <input type="checkbox" class="checkAll"
                       @if(isset($item) && $item->hasAllDirectPermissions(['show_addresses' , 'add_addresses'])) checked @endif>
                <span class="first"></span>
            </label>
        </legend>
        <div class="row">
            <div class="col-md-6 mb-4">
                <label class="kt-checkbox">
                    <input name="permissions[]" class="checkbox" value="show_addresses" type="checkbox"
                           @if(isset($item) && $item->hasPermissionTo('show_addresses')) checked @endif> @lang('show')
                    <span></span>
                </label>
            </div>

            <div class="col-md-6 mb-4">
                <label class="kt-checkbox">
                    <input name="permissions[]" class="checkbox" value="add_addresses" type="checkbox"
                           @if(isset($item) && $item->hasPermissionTo('add_addresses')) checked @endif>@lang('Add / Edit')
                    <span></span>
                </label>
            </div>

        </div>
    </fieldset>
</div>
<div class="form-group">
    <h5>services</h5>
    <fieldset>
        <legend>
            <label class="kt-checkbox">
                <input type="checkbox" class="checkAll"
                       @if(isset($item) && $item->hasAllDirectPermissions(['show_services' , 'add_services'])) checked @endif>
                <span class="first"></span>
            </label>
        </legend>
        <div class="row">
            <div class="col-md-6 mb-4">
                <label class="kt-checkbox">
                    <input name="permissions[]" class="checkbox" value="show_services" type="checkbox"
                           @if(isset($item) && $item->hasPermissionTo('show_services')) checked @endif> @lang('show')
                    <span></span>
                </label>
            </div>

            <div class="col-md-6 mb-4">
                <label class="kt-checkbox">
                    <input name="permissions[]" class="checkbox" value="add_services" type="checkbox"
                           @if(isset($item) && $item->hasPermissionTo('add_services')) checked @endif>@lang('Add / Edit')
                    <span></span>
                </label>
            </div>

        </div>
    </fieldset>
</div>

<div class="form-group">
    <h5> site pages </h5>
    <fieldset>
        <legend>
            <label class="kt-checkbox">
                <input type="checkbox" class="checkAll"
                       @if(isset($item) && $item->hasAllDirectPermissions(['manage_pages'])) checked @endif>
                <span class="first"></span>
            </label>
        </legend>
        <div class="row">
            <div class="col-md-6 mb-4">
                <label class="kt-checkbox">
                    <input name="permissions[]" class="checkbox" value="manage_pages" type="checkbox"
                           @if(isset($item) && $item->hasPermissionTo('manage_pages')) checked @endif> Manage Pages
                    <span></span>
                </label>
            </div>

        </div>
    </fieldset>
</div>
@push('js')
    <script>
        $(document).ready(function() {
            // select all checkboxes
            $('#select-all').click(function() {
                $('.checkbox').prop('checked', this.checked);
            });

            // select all checkbox checked if all checkboxes are checked
            $('.checkbox').click(function() {
                if ($('.checkbox:checked').length === $('.checkbox').length) {
                    $('#select-all').prop('checked', true);
                } else {
                    $('#select-all').prop('checked', false);
                }
            });
        });

    </script>
@endpush

