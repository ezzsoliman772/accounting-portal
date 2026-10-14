<?php

namespace App\Http\Controllers;

class ServiceController extends Controller
{

//---------------------------------------------------------
    // menu page/services
//---------------------------------------------------------  

public function index()
    {
        $services = [
            (object) ['id' => 'svc_001', 'name' => 'Quarterly VAT Filing — Q2 2026', 'client' => 'Nile Trading Co.', 'status' => 'Completed', 'remaining' => 0, 'due_date' => '15 Jul 2026', 'assigned_to' => 'Reda Ragab'],
            (object) ['id' => 'svc_002', 'name' => 'Annual Financial Statement Preparation', 'client' => 'Nile Trading Co.', 'status' => 'Overdue', 'remaining' => 6000, 'due_date' => '30 Sept 2026', 'assigned_to' => 'Karim Nabil'],
            (object) ['id' => 'svc_003', 'name' => 'Commercial Registry Renewal', 'client' => 'Nile Trading Co.', 'status' => 'Overdue', 'remaining' => 2000, 'due_date' => '20 Aug 2026', 'assigned_to' => 'Karim Nabil'],
            (object) ['id' => 'svc_004', 'name' => 'Corporate Tax Return 2025', 'client' => 'Nile Trading Co.', 'status' => 'Overdue', 'remaining' => 0, 'due_date' => '30 Apr 2026', 'assigned_to' => 'Reda Ragab'],
            (object) ['id' => 'svc_005', 'name' => 'Payroll Compliance Review', 'client' => 'Nile Trading Co.', 'status' => 'Overdue', 'remaining' => 1750, 'due_date' => '15 Aug 2026', 'assigned_to' => 'Reda Ragab'],
            (object) ['id' => 'svc_006', 'name' => 'Business License Application', 'client' => 'Nile Trading Co.', 'status' => 'Cancelled', 'remaining' => 1500, 'due_date' => '01 Jun 2026', 'assigned_to' => 'Reda Ragab'],
            (object) ['id' => 'svc_007', 'name' => 'Quarterly VAT Filing — Q3 2026', 'client' => 'Alexandria Textiles SAE', 'status' => 'In Progress', 'remaining' => 2000, 'due_date' => '15 Oct 2026', 'assigned_to' => 'Karim Nabil'],
            (object) ['id' => 'svc_008', 'name' => 'Payroll Compliance Review — Aug 2026', 'client' => 'Alexandria Textiles SAE', 'status' => 'Overdue', 'remaining' => 2800, 'due_date' => '10 Aug 2026', 'assigned_to' => 'Reda Ragab'],
        ];

        return view('services.index', compact('services'));
    }

    //---------------------------------------------------------
    //service page/services/{id}
    //---------------------------------------------------------
    public function show($id)
    {
// status map by id 
        $statusMap = [
            'svc_001' => 'Completed',
            'svc_002' => 'Overdue',
            'svc_003' => 'Overdue',
            'svc_004' => 'Overdue',
            'svc_005' => 'Overdue',
            'svc_006' => 'Cancelled',
            'svc_007' => 'In Progress',
            'svc_008' => 'Overdue',
            'svc_011' => 'Overdue',
        ];
        $status = $statusMap[$id] ?? 'Pending Documents';

        //  Service data 
        $service = (object) [
            'id'           => $id,
            'name'         => 'Personal / Corporate Tax Support 2025',
            'client_id'    => 'cli_004',
            'client_name'  => 'Ahmed Hassan',
            'category'     => 'Tax Filing',
            'status'       => $status,
            'total'        => 4000,
            'paid'         => 2000,
            'remaining'    => 2000,
            'due_date'     => '01 Sept 2026',
            'assigned_to'  => 'adm_001',
        ];

        // Document requests 
        $documentRequests = [
            (object) [
                'name'         => 'Audited financials',
                'status'       => 'Pending',
                'requested_at' => '12 Jul 2026, 11:30',
            ],
        ];

        //  Uploaded files 
        $uploadedFiles = [
            (object) [
                'filename'    => 'bank_statement_q2.pdf',
                'uploaded_by' => 'Client',
                'uploaded_at' => '15 Apr 2026, 11:00',
            ],
        ];

        //  Required documents 
        $requiredDocuments = ['Sales invoices', 'Purchase invoices', 'Bank statement'];

        // Status history 
        $statusHistory = [
            (object) ['from' => '—',                  'to' => 'Pending Documents', 'at' => '01 Apr 2026, 11:00', 'by' => 'Reda Ragab'],
            (object) ['from' => 'Pending Documents',  'to' => 'In Progress',       'at' => '05 Apr 2026, 13:30', 'by' => 'Reda Ragab'],
            (object) ['from' => 'In Progress',        'to' => 'Completed',         'at' => '10 Jul 2026, 17:15', 'by' => 'Reda Ragab'],
        ];

        // Payment history
        $paymentHistory = [
            (object) ['date' => '20 Apr 2026', 'amount' => 4500, 'method' => 'InstaPay', 'attachment' => 'instapay_nile_apr.png', 'created_by' => 'Reda Ragab'],
        ];

        // Team members 
        $teamMembers = [
            (object) ['id' => 'adm_001', 'label' => 'Reda Ragab · Super Admin'],
            (object) ['id' => 'adm_002', 'label' => 'Karim Nabil · Team Lead'],
            (object) ['id' => 'adm_003', 'label' => 'Nour El-Masry · Senior Accountant'],
            (object) ['id' => 'adm_004', 'label' => 'Youssef Adel · Junior Accountant'],
        ];

        // Change Status Logic 
        $isStatusLocked = in_array($service->status, ['Completed', 'Cancelled']);

        $availableStatuses = [
            'pending_documents' => 'Pending Documents',
            'in_progress'       => 'In Progress',
            'under_review'      => 'Under Review',
            'completed'         => 'Completed',
            'on_hold'           => 'On Hold',
            'cancelled'         => 'Cancelled',
        ];

        $isOverdue = $service->status === 'Overdue';

        return view('services.show', compact(
            'service',
            'documentRequests',
            'uploadedFiles',
            'requiredDocuments',
            'statusHistory',
            'paymentHistory',
            'teamMembers',
            'isStatusLocked',
            'availableStatuses',
            'isOverdue'
        ));
    }
}