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

    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();
        return response()->json('success');
    }

    public function markAllAsRead()
    {
        ContactMessage::where('is_read', false)->update(['is_read' => true]);
        return response()->json(['success' => true]);
    }

}
