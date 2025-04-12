<?php

namespace App\DataTables;

use App\Helpers\DataTableHelper;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\App;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AdminsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('action', function ($admin) {
                // Use cached views if possible, and render immediately
                return view('components.datatable.actions', [
                    'id' => $admin->id,
                    'routeEdit' => 'admins.edit',
                    'routeDelete' => 'admins.destroy',
                    'name' => App::getLocale() === 'ar' ? $admin->name_ar : $admin->name_en,
                ])->render(); // render() = faster than returning the View object
            })
            ->editColumn('image', function ($admin) {
                return view('components.datatable.image', ['photo' => $admin->image])->render();
            })
            ->editColumn('created_at', fn($admin) => $admin->created_at->format('Y-m-d H:i'))
            ->rawColumns(['action', 'image']) // Important when using Blade views returning HTML
            ->filterColumn('created_at', function ($query, $keyword) {
                // Better performance with exact date match
                $query->whereDate('created_at', $keyword);
            })
            ->orderColumn('created_at', fn($query, $order) => $query->orderBy('created_at', $order));
    }


    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery()
            ->select(['id', 'name_ar', 'name_en', 'email', 'image', 'created_at']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('datatable')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0, 'desc')
            ->selectStyleSingle()
            ->language(DataTableHelper::language())
            ->lengthMenu([[10, 25, 50, 100], [10, 25, 50, 100]])
            ->addTableClass('table rounded rounded-3 table-hover border');
    }



    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')
                ->title(__('dataTable.id')) // Translate the title
                ->addClass('text-center align-middle'),
            Column::make('image')
                ->title(__('dataTable.image')) // Translate the title
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center align-middle')
                ->orderable(false)
                ->searchable(false),
            Column::make('email')
                ->title(__('dataTable.email')) // Translate the title
                ->addClass('text-center align-middle'),
            Column::make('name_' . (App::getLocale() === 'ar' ? 'ar' : 'en'))
                ->title(__('dataTable.name')) // Translate the title
                ->addClass('text-center align-middle'),
            Column::make('created_at')
                ->title(__('dataTable.created_at')) // Translate the title
                ->addClass('text-center align-middle'),
            Column::computed('action')
                ->title(__('dataTable.action')) // Translate the title
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center align-middle')
                ->orderable(false)
                ->searchable(false),
        ];
    }




    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'admins_' . date('YmdHis');
    }
}
