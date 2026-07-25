@php
    $permissions = \Spatie\Permission\Models\Permission::where('guard_name', 'admin')->get();
    $groups = [];
    $actionLabels = [
        'show' => __('Show'),
        'add' => __('Add / Edit'),
        'edit' => __('Edit'),
        'delete' => __('Delete'),
        'manage' => __('Manage'),
    ];
    $groupLabels = [
        'promotional-emails' => __('Promotional Emails'),
        'manage_pages' => __('Site Pages'),
        'manage_faqs' => __('FAQ'),
        'add_roles' => __('Permissions'),
        'businesses' => __('Businesses'),
        'cities' => __('Cities'),
        'countries' => __('Countries'),
        'contacts' => __('Inbox'),
        'settings' => __('Settings'),
    ];
    foreach ($permissions as $perm) {
        $name = $perm->name;
        if (preg_match('/^(show|add|edit|delete)_(.+)$/', $name, $m)) {
            $action = $m[1];
            $resource = $m[2];
            $groups[$resource]['label'] = $groupLabels[$resource] ?? ucwords(str_replace(['-', '_'], ' ', $resource));
            $groups[$resource]['permissions'][] = $perm;
        } else {
            $groups[$name]['label'] = $groupLabels[$name] ?? ucwords(str_replace(['-', '_'], ' ', $name));
            $groups[$name]['permissions'][] = $perm;
        }
    }
@endphp

<div class="form-group">
    <h5>@lang('Select All')</h5>
    <fieldset>
        <legend>
            <label class="kt-checkbox">
                <input type="checkbox" id="select-all" title="@lang('Select All')" />
                <span class="first"></span>
            </label>
        </legend>
    </fieldset>
</div>

@foreach($groups as $key => $group)
    @php
        $permNames = collect($group['permissions'])->pluck('name')->all();
        $actionTypes = [];
        foreach ($group['permissions'] as $p) {
            if (preg_match('/^(show|add|edit|delete)_/', $p->name, $m)) {
                $actionTypes[] = $m[1];
            }
        }
        $actionTypes = array_unique($actionTypes);
    @endphp
    <div class="form-group">
        <h5>{{ $group['label'] }}</h5>
        <fieldset>
            <legend>
                <label class="kt-checkbox">
                    <input type="checkbox" class="checkAll"
                           @if(isset($item) && count($permNames) && $item->hasAllDirectPermissions(...$permNames)) checked @endif>
                    <span class="first"></span>
                </label>
            </legend>
            <div class="row">
                @foreach($group['permissions'] as $perm)
                    @php
                        $label = $perm->name;
                        if (preg_match('/^(show|add|edit|delete)_/', $perm->name, $m)) {
                            $label = $actionLabels[$m[1]] ?? $perm->name;
                        }
                    @endphp
                    <div class="col-md-6 mb-4">
                        <label class="kt-checkbox">
                            <input name="permissions[]" class="checkbox" value="{{ $perm->name }}" type="checkbox"
                                   @if(isset($item) && $item->hasPermissionTo($perm->name)) checked @endif>
                            {{ $label }}
                            <span></span>
                        </label>
                    </div>
                @endforeach
            </div>
        </fieldset>
    </div>
@endforeach

@push('js')
    <script>
        $(document).ready(function() {
            $('#select-all').click(function() {
                $('.checkbox').prop('checked', this.checked);
            });

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
