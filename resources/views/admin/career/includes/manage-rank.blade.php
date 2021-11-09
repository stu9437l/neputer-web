@extends('admin.include.layout')

@section('title', 'Career::Manage Order')

@section('content')
    <div class="main-content">

        @include('admin.include.breadcrumb', [
            'base_route' => $base_route.'.index',
            'page' => 'Manage Rank'
        ])

        <div class="page-content">

            @include('admin.include.page-header', [
                'page' => 'Manage Rank',
                'title' => $panel,
                'view' => 'Manage Rank',
            ])

            <div class="row">
                <div class="col-xs-12">
                    @include('admin.include.display_flash_data')
                    {!! Form::open(['url' => route($base_route.'.sort-rank'), 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                    <div class="table-responsive">
                        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="center">
                                    Sort
                                </th>
                                <th>Career Section</th>
                            </tr>
                            </thead>

                            <tbody id="table-tbody">
                            @foreach($data['career'] as $key => $career)
                                <tr>
                                    <td class="center">
                                        <label>
                                            <i class="icon-sort"></i>
                                        </label>
                                    </td>
                                    <td>
                                        <p>{{ $career }}</p>
                                        {!! Form::hidden('careerIds[]', $key, ['class' => 'form-control']) !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div><!-- /.table-responsive -->
                    @include('admin.include.submitButton')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_scripts')
    @include('admin.include.jquery_sortable')
@endsection
