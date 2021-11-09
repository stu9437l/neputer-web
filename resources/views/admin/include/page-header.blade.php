<div class="page-header">
    <h1>
        {{ $title }} Manager
        <small>
            <i class="icon-double-angle-right"></i>
            {{ $page }}
        </small>
        @isset($base_route)
            @if($page == 'View')
                <div class="pull-right">
                    <a href="{{ route($base_route.'.edit', $id) }}" class="btn btn-primary btn-sm"><i
                                class="icon icon-edit"></i> Edit</a>
                </div>
            @endif
            @if($page == 'List' || $page == 'Edit' ||$page == 'View')
                <div class="pull-right" style="margin-right: 3px;">
                    <a href="{{ route($base_route.'.create') }}" class="btn btn-primary btn-sm"><i
                                class="icon icon-plus"></i> Add</a>
                </div>
            @endif

            @if($page == 'Add' ||$page == 'Edit' ||$page == 'View' || $page == 'Manage Rank')
                <div class="pull-right" style="margin-right: 3px;">
                    <a href="{{ route($base_route.'.index') }}" class="btn btn-primary btn-sm"><i
                                class="icon icon-list"></i> List</a>
                </div>
            @endif

        @endisset


    </h1>

</div><!-- /.page-header -->