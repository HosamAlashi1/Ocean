<?php

namespace App\DataTables;

use App\Helpers\DataTableHelper;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\App;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TagsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {

        return (new EloquentDataTable($query))
            ->editColumn('created_at', fn($tag) =>
            $tag->created_at->format('Y-m-d H:i')
            )
            ->addColumn('action', fn($tag) =>
            view('dashboard.tags.actions', [
                'id' => $tag->id,
                'routeEdit' => 'tags.edit',
                'routeDelete' => 'tags.destroy',
            ])->render()
            )
            ->rawColumns([ 'action'])
            ->filterColumn('created_at', fn($query, $keyword) =>
            $query->whereDate('created_at', $keyword) // better than LIKE for dates
            )
            ->orderColumn('created_at', fn($query, $order) =>
            $query->orderBy('created_at', $order)
            );
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Tag $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
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
     */
    public function getColumns(): array
    {
        $locale = App::getLocale();

        return [
            Column::make('id')
                ->title(__('dataTable.id'))
                ->addClass('text-center align-middle'),

            Column::make("title_{$locale}")
                ->title(__('dataTable.title'))
                ->addClass('text-center align-middle'),

            Column::make('created_at')
                ->title(__('dataTable.created_at'))
                ->addClass('text-center align-middle'),

            Column::computed('action')
                ->title(__('dataTable.action'))
                ->exportable(false)
                ->printable(false)
                ->orderable(false)
                ->searchable(false)
                ->addClass('text-center align-middle'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Tags_' . date('YmdHis');
    }
}
