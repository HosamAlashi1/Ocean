<?php

namespace App\DataTables;

use App\Helpers\DataTableHelper;
use App\Models\Service;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ServicesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($service) {
                return view('components.datatable.actions', [
                    'routeEdit'   => 'services.edit',
                    'routeDelete' => 'services.destroy',
                    'id'          => $service->id,
                    'name'        => $service->localized_title, // ⬅️ use accessor instead of inline logic
                ])->render(); // ⬅️ always use ->render() to avoid deferred view processing
            })
            ->addColumn('image', fn($service) =>
            view('components.datatable.image', ['photo' => $service->image])->render()
            )
            ->addColumn('show_on_recent_work', fn($service) =>
            view('dashboard.services.status', [
                'service' => $service,
                'type'    => 'show_on_recent_work',
                'route'   => 'update-recent_work-status'
            ])->render()
            )
            ->addColumn('show_on_our_service', fn($service) =>
            view('dashboard.services.status', [
                'service' => $service,
                'type'    => 'show_on_our_service',
                'route'   => 'update-our_service-status'
            ])->render()
            )
            ->editColumn('created_at', fn($service) => $service->created_at->format('Y-m-d H:i'))
            ->filterColumn('created_at', function ($query, $keyword) {
                $query->whereDate('created_at', $keyword); // ✅ more efficient and index-friendly
            })
            ->orderColumn('created_at', fn($query, $order) =>
            $query->orderBy('created_at', $order)
            )
            ->rawColumns(['action', 'image', 'show_on_recent_work', 'show_on_our_service']); // ✅ include all rendered HTML columns
    }


    /**
     * Get the query source of dataTable.
     */
    public function query(Service $model): QueryBuilder
    {
        return $model->newQuery()
            ->select([
                'id',
                'title_ar',
                'title_en',
                'desc_ar',
                'desc_en',
                'image',
                'show_on_our_service',
                'show_on_recent_work',
                'created_at'
            ]);
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
        $locale = App::getLocale(); // Avoid calling App::getLocale() multiple times

        return [
            Column::make('id')
                ->title(__('dataTable.id'))
                ->addClass('text-center align-middle'),

            Column::make('image')
                ->title(__('dataTable.image'))
                ->exportable(false)
                ->printable(false)
                ->orderable(false)
                ->searchable(false)
                ->addClass('text-center align-middle'),

            Column::make("title_{$locale}")
                ->title(__('dataTable.name'))
                ->addClass('text-center align-middle'),

            Column::make('show_on_our_service')
                ->title(__('dataTable.show_on_our_service'))
                ->addClass('text-center align-middle'),

            Column::make('show_on_recent_work')
                ->title(__('dataTable.show_on_recent_work'))
                ->addClass('text-center align-middle'),

            Column::make("desc_{$locale}")
                ->title(__('dataTable.description'))
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
        return 'Services_' . date('YmdHis');
    }
}
