<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\SubscribersDataTable;
use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{

    public function index(SubscribersDataTable $dataTable)
    {
        return $dataTable->render('dashboard.subscribers.index');
    }

    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();
        return response()->json('success');
    }

    public function markAllAsRead()
    {
        Subscriber::where('is_read',0)->update(['is_read' => 1]);
        return response()->json(['success' => true]);
    }

}
