<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        // payment reminders for overdue services
        $overdueServices = [
            (object) ['id' => 'svc_002', 'label' => 'Annual Financial Statement Preparation · EGP 6,000'],
            (object) ['id' => 'svc_003', 'label' => 'Commercial Registry Renewal · EGP 2,000'],
            (object) ['id' => 'svc_005', 'label' => 'Payroll Compliance Review · EGP 1,750'],
            (object) ['id' => 'svc_006', 'label' => 'Business License Application · EGP 1,500'],
            (object) ['id' => 'svc_007', 'label' => 'Quarterly VAT Filing — Q3 2026 · EGP 2,000'],
            (object) ['id' => 'svc_008', 'label' => 'Payroll Compliance Review — Aug 2026 · EGP 2,800'],
            (object) ['id' => 'svc_011', 'label' => 'Personal / Corporate Tax Support 2025 · EGP 2,000'],
            (object) ['id' => 'svc_012', 'label' => 'Business License Application · EGP 1,500'],
        ];

        // Notifications list 
        $notifications = [
            (object) [
                'id'            => 'notif_001',
                'date'          => '05 Apr 2026, 13:30',
                'client'        => 'Nile Trading Co.',
                'type'          => 'Status change',
                'type_key'      => 'status_change',
                'service_id'    => 'svc_001',
                'message'       => 'Your Quarterly VAT Filing is now In Progress',
                'delivery'      => 'Sent',
                'status'        => 'Read',
            ],
            (object) [
                'id'            => 'notif_002',
                'date'          => '01 Aug 2026, 13:00',
                'client'        => 'Nile Trading Co.',
                'type'          => 'Document request',
                'type_key'      => 'document_request',
                'service_id'    => 'svc_003',
                'message'       => 'Please upload: Current CR copy',
                'delivery'      => 'Sent',
                'status'        => 'Unread',
            ],
            (object) [
                'id'            => 'notif_003',
                'date'          => '05 Aug 2026, 12:00',
                'client'        => 'Nile Trading Co.',
                'type'          => 'Payment reminder',
                'type_key'      => 'payment_reminder',
                'service_id'    => 'svc_002',
                'message'       => 'EGP 6,000 remaining on Annual Financial Statement Preparation',
                'delivery'      => 'Sent',
                'status'        => 'Unread',
            ],
            (object) [
                'id'            => 'notif_004',
                'date'          => '02 Aug 2026, 12:00',
                'client'        => 'Alexandria Textiles SAE',
                'type'          => 'Document request',
                'type_key'      => 'document_request',
                'service_id'    => 'svc_008',
                'message'       => 'Please upload: Payroll register',
                'delivery'      => 'Sent',
                'status'        => 'Unread',
            ],
            (object) [
                'id'            => 'notif_005',
                'date'          => '28 Jul 2026, 17:05',
                'client'        => 'Cairo Medical Center',
                'type'          => 'Status change',
                'type_key'      => 'status_change',
                'service_id'    => 'svc_009',
                'message'       => 'Commercial Registry Renewal 2026 is now Under Review',
                'delivery'      => 'Sent',
                'status'        => 'Read',
            ],
            (object) [
                'id'            => 'notif_006',
                'date'          => '10 Aug 2026, 11:00',
                'client'        => 'Ahmed Hassan',
                'type'          => 'Payment reminder',
                'type_key'      => 'payment_reminder',
                'service_id'    => 'svc_011',
                'message'       => 'EGP 2,000 remaining on Personal / Corporate Tax Support 2025',
                'delivery'      => 'Failed',
                'status'        => 'Unread',
            ],
        ];

        // filter types for the dropdown
        $typeOptions = [
            'all'              => 'All',
            'status_change'    => 'Status change',
            'document_request' => 'Document request',
            'payment_reminder' => 'Payment reminder',
        ];

        return view('notifications.index', compact(
            'overdueServices',
            'notifications',
            'typeOptions'
        ));
    }
}
