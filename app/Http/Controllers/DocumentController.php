<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentController extends Controller
{
    
    public function index()
    {
        // Document requests 
        $documentRequests = [
            (object) [
                'id'            => 'doc_001',
                'name'          => 'Current CR copy',
                'client_name'   => 'Nile Trading Co.',
                'service_id'    => 'svc_003',
                'service_name'  => 'Commercial Registry Renewal',
                'status'        => 'Pending',
                'requested_at'  => '01 Aug 2026, 13:00',
            ],
            (object) [
                'id'            => 'doc_002',
                'name'          => 'Lease contract',
                'client_name'   => 'Nile Trading Co.',
                'service_id'    => 'svc_003',
                'service_name'  => 'Commercial Registry Renewal',
                'status'        => 'Pending',
                'requested_at'  => '01 Aug 2026, 13:00',
            ],
            (object) [
                'id'            => 'doc_003',
                'name'          => 'Payroll register',
                'client_name'   => 'Alexandria Textiles SAE',
                'service_id'    => 'svc_008',
                'service_name'  => 'Payroll Compliance Review — Aug 2026',
                'status'        => 'Pending',
                'requested_at'  => '02 Aug 2026, 12:00',
            ],
            (object) [
                'id'            => 'doc_004',
                'name'          => 'Employee contracts',
                'client_name'   => 'Alexandria Textiles SAE',
                'service_id'    => 'svc_008',
                'service_name'  => 'Payroll Compliance Review — Aug 2026',
                'status'        => 'Pending',
                'requested_at'  => '02 Aug 2026, 12:00',
            ],
            (object) [
                'id'            => 'doc_005',
                'name'          => 'Audited financials',
                'client_name'   => 'Ahmed Hassan',
                'service_id'    => 'svc_011',
                'service_name'  => 'Personal / Corporate Tax Support 2025',
                'status'        => 'Pending',
                'requested_at'  => '12 Jul 2026, 11:30',
            ],
        ];

        // Uploaded files  
        $uploadedFiles = [
            (object) [
                'id'           => 'file_001',
                'filename'     => 'bank_statement_q2.pdf',
                'client_name'  => 'Nile Trading Co.',
                'service_id'   => 'svc_001',
                'service_name' => 'Quarterly VAT Filing — Q2 2026',
                'uploaded_by'  => 'Client',
                'uploaded_at'  => '15 Apr 2026, 11:00',
            ],
            (object) [
                'id'           => 'file_002',
                'filename'     => 'cash_receipt_june.jpg',
                'client_name'  => 'Nile Trading Co.',
                'service_id'   => 'svc_002',
                'service_name' => 'Annual Financial Statement Preparation',
                'uploaded_by'  => 'Reda Ragab',
                'uploaded_at'  => '05 Jun 2026, 09:30',
            ],
            (object) [
                'id'           => 'file_003',
                'filename'     => 'instapay_nile_apr.png',
                'client_name'  => 'Nile Trading Co.',
                'service_id'   => 'svc_001',
                'service_name' => 'Quarterly VAT Filing — Q2 2026',
                'uploaded_by'  => 'Reda Ragab',
                'uploaded_at'  => '20 Apr 2026, 14:15',
            ],
        ];

        // avaliable filters 
        $statusOptions = [
            'pending'   => 'Pending',
            'fulfilled' => 'Fulfilled',
            'all'       => 'All',
        ];

        return view('documents.index', compact(
            'documentRequests',
            'uploadedFiles',
            'statusOptions'
        ));
    }
}
