<?php

namespace App\DataTables;

use App\Helpers\DataTableHelper;
use App\Models\Blog;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\App;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BlogsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $locale = App::getLocale();

        return (new EloquentDataTable($query))
            ->addColumn('action', function ($blog) use ($locale) {
                return view('components.datatable.actions', [
                    'id' => $blog->id,
                    'routeEdit' => 'blog.edit',
                    'routeDelete' => 'blog.destroy',
                    'name' => $locale === 'ar' ? $blog->title_ar : $blog->title_en,
                ])->render(); // ✅ use render() for performance
            })
            ->addColumn('image', fn($blog) =>
            view('components.datatable.image', ['photo' => $blog->image])->render()
            )
            ->addColumn('tags', function ($blog) use ($locale) {
                if ($blog->tags->isEmpty()) {
                    return '<span class="text-muted">-</span>';
                }

                return $blog->tags->map(function ($tag) use ($locale) {
                    $name = $locale === 'ar' ? $tag->title_ar : $tag->title_en;
                    return '<span class="badge bg-primary me-1">' . e($name) . '</span>';
                })->implode(' ');
            })
            ->editColumn('created_at', fn($blog) => $blog->created_at->format('Y-m-d H:i'))
            ->rawColumns(['image', 'action', 'tags']) // ✅ include tags & image
            ->filterColumn('created_at', fn($query, $keyword) =>
            $query->whereDate('created_at', $keyword) // ✅ index friendly
            )
            ->filterColumn('tags', function ($query, $keyword) use ($locale) {
                $query->whereHas('tags', function ($q) use ($keyword, $locale) {
                    $q->where("title_$locale", 'like', "%$keyword%");
                });
            })
            ->orderColumn('created_at', fn($query, $order) =>
            $query->orderBy('created_at', $order)
            );
    }


    /**
     * Get the query source of dataTable.
     */
    public function query(Blog $model): QueryBuilder
    {
        return $model->newQuery()
            ->with('tags') // ✅ eager load
            ->select(['id', 'image', 'title_ar', 'title_en', 'by', 'date', 'created_at']);
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

            Column::make('image')
                ->title(__('dataTable.image'))
                ->exportable(false)
                ->printable(false)
                ->orderable(false)
                ->searchable(false)
                ->addClass('text-center align-middle'),

            Column::make("title_{$locale}")
                ->title(__('dataTable.title'))
                ->addClass('text-center align-middle'),

            Column::make('by')
                ->title(__('dataTable.by'))
                ->addClass('text-center align-middle'),

            Column::make('date')
                ->title(__('dataTable.date'))
                ->addClass('text-center align-middle'),

            Column::make('tags')
                ->title(__('dataTable.tags'))
                ->addClass('text-center align-middle')
                ->orderable(false)
                ->searchable(true), // ✅ disable unless indexed properly

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
        return 'Blogs_' . date('YmdHis');
    }
}
