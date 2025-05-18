<?php

namespace App\DataTables;

use App\Helpers\DataTableHelper;
use App\Models\Work;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\App;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class WorksDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $locale = app()->getLocale();

        return (new EloquentDataTable($query))
            ->editColumn('image', function ($work) {
                return view('dashboard.works.media', [
                    'file' => $work->image,
                    'type' => $work->type
                ])->render();
            })
            ->addColumn('service_name', fn($work) =>
            optional($work->service)->{"title_{$locale}"} // safe accessor
            )
            ->editColumn('created_at', fn($work) =>
            $work->created_at->format('Y-m-d H:i')
            )
            ->addColumn('action', fn($work) =>
            view('dashboard.works.actions', [
                'id' => $work->id,
                'routeEdit' => 'work.edit',
                'routeDelete' => 'work.destroy',
            ])->render()
            )
            ->rawColumns(['image', 'action']) // Don't forget image here
            ->filterColumn('created_at', fn($query, $keyword) =>
            $query->whereDate('created_at', $keyword) // better than LIKE for dates
            )
            ->filterColumn('service_name', function ($query, $keyword) use ($locale) {
                $query->whereHas('service', function ($q) use ($locale, $keyword) {
                    $q->where("title_{$locale}", 'like', '%' . $keyword . '%');
                });
            })
            ->orderColumn('created_at', fn($query, $order) =>
            $query->orderBy('created_at', $order)
            )
            ->orderColumn('service_name', function ($query, $order) use ($locale) {
                $column = "services.title_{$locale}";
                $query->join('services', 'works.service_id', '=', 'services.id')
                    ->orderBy($column, $order)
                    ->select('works.*'); // Keep it scoped to works table
            });
    }


    /**
     * Get the query source of dataTable.
     */
    public function query(Work $model): QueryBuilder
    {
        return $model->newQuery()
            ->with('service') // prevent N+1 query problem
            ->select(['id' ,'type', 'service_id', 'image', 'created_at']);
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
    return [
        Column::make('id')
            ->title(__('dataTable.id')), // Translate the title
        Column::make('image')
            ->title(__('dataTable.image'))
            ->exportable(false)
            ->printable(false)
            ->orderable(false)
            ->searchable(false)
            ->addClass('text-center align-middle'),
        Column::make('service_name')
            ->title(__('dataTable.service_name')) // Translate the title
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
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Works_' . date('YmdHis');
    }
}
