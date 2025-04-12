<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\ContactMessagesDataTable;
use App\Http\Controllers\Controller;
use App\Models\ContactMessage;

class ContactMessageController extends Controller
{
    public function index(ContactMessagesDataTable $dataTable)
    {
        return $dataTable->render('dashboard.contact_messages.index');
    }

    public function destroy(ContactMessage $customer)
    {
        $customer->delete();
        return response()->json('success');
    }
}
