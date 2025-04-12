<?php

namespace App\Helpers;

class DataTableHelper
{
    public static function language(): array
    {
        return [
            'search' => __('dataTable.Search'),
            'lengthMenu' => __('dataTable.Show') . ' _MENU_ ' . __('dataTable.Entries'),
            'zeroRecords' => __('dataTable.No matching records found'),
            'info' => __('dataTable.Showing') . ' _START_ ' . __('dataTable.to') . ' _END_ ' . __('dataTable.of') . ' _TOTAL_ ' . __('dataTable.entries'),
            'infoEmpty' => __('dataTable.No records available'),
            'infoFiltered' => __('dataTable.filtered from') . ' _MAX_ ' . __('dataTable.total records'),
            'paginate' => [
                'first' => __('dataTable.First'),
                'last' => __('dataTable.Last'),
                'next' => __('dataTable.Next'),
                'previous' => __('dataTable.Previous'),
            ],
        ];
    }
}
