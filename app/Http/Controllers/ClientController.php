<?php

namespace App\Http\Controllers;

class ClientController extends Controller
{
    public function index()
    {
        return view('clients.index');
    }

    public function show(string $id)
    {
        //one array for all clients 
        $clients = [
            'cli_001' => [
                'id'            => 'cli_001',
                'name'          => 'Nile Trading Co.',
                'arabic_name'   => 'شركة النيل للتجارة',
                'email'         => 'info@niletrading.example',
                'phone'         => '+201001234567',
                'type'          => 'Business',
                'cr_number'     => '12345678',
                'status'        => 'active',
                'notes'         => 'VAT-registered, quarterly filer',
                'arabic_notes'  => '',
            ],
            'cli_002' => [
                'id'            => 'cli_002',
                'name'          => 'Alexandria Textiles SAE',
                'arabic_name'   => 'الإسكندرية للمنسوجات',
                'email'         => 'accounts@alxtextiles.example',
                'phone'         => '+201002223334',
                'type'          => 'Business',
                'cr_number'     => 'CR-1002',
                'status'        => 'active',
                'notes'         => '',
                'arabic_notes'  => '',
            ],
            'cli_003' => [
                'id'            => 'cli_003',
                'name'          => 'Cairo Medical Center',
                'arabic_name'   => 'مركز القاهرة الطبي',
                'email'         => 'finance@cairomed.example',
                'phone'         => '+201003334445',
                'type'          => 'Business',
                'cr_number'     => 'CR-1003',
                'status'        => 'active',
                'notes'         => '',
                'arabic_notes'  => '',
            ],
            'cli_004' => [
                'id'            => 'cli_004',
                'name'          => 'Ahmed Hassan',
                'arabic_name'   => 'أحمد حسن',
                'email'         => 'ahmed.hassan@example.com',
                'phone'         => '+201004445556',
                'type'          => 'Individual',
                'cr_number'     => 'NID-29012345678',
                'status'        => 'active',
                'notes'         => '',
                'arabic_notes'  => '',
            ],
            'cli_005' => [
                'id'            => 'cli_005',
                'name'          => 'Old Valley Trading',
                'arabic_name'   => 'وادي القدام للتجارة',
                'email'         => 'ops@oldvalley.example',
                'phone'         => '+201005556667',
                'type'          => 'Business',
                'cr_number'     => 'CR-1005',
                'status'        => 'deactivated',
                'notes'         => '',
                'arabic_notes'  => '',
            ],
        ];

        //chose client by id, if not found, abort with 404
        if (! isset($clients[$id])) {
            abort(404);
        }

        $client = $clients[$id];

        $assignedStaff = [
            ['id' => 1, 'name' => 'Karim Nabil',    'role' => 'Team Lead',         'assigned' => true],
            ['id' => 2, 'name' => 'Nour El-Masry',  'role' => 'Senior Accountant', 'assigned' => false],
            ['id' => 3, 'name' => 'Youssef Adel',   'role' => 'Junior Accountant', 'assigned' => false],
        ];

        $services = [
            ['id' => 'svc_001', 'name' => 'Quarterly VAT Filing — Q2 2026',       'status' => 'completed', 'remaining' => 0,    'due_date' => '15 Jul 2026'],
            ['id' => 'svc_002', 'name' => 'Annual Financial Statement Preparation','status' => 'overdue',  'remaining' => 6000, 'due_date' => '30 Sept 2026'],
            ['id' => 'svc_003', 'name' => 'Commercial Registry Renewal',          'status' => 'overdue',  'remaining' => 2000, 'due_date' => '20 Aug 2026'],
            ['id' => 'svc_004', 'name' => 'Corporate Tax Return 2025',            'status' => 'overdue',  'remaining' => 0,    'due_date' => '30 Apr 2026'],
            ['id' => 'svc_005', 'name' => 'Payroll Compliance Review',            'status' => 'overdue',  'remaining' => 1750, 'due_date' => '15 Aug 2026'],
            ['id' => 'svc_006', 'name' => 'Business License Application',         'status' => 'cancelled','remaining' => 1500, 'due_date' => '01 Jun 2026'],
        ];

        $payments = [
            ['date' => '20 Apr 2026', 'amount' => 4500, 'method' => 'InstaPay',      'attachment' => 'instapay_nile_apr.png'],
            ['date' => '05 Jun 2026', 'amount' => 6000, 'method' => 'Cash',          'attachment' => 'cash_receipt_june.jpg'],
            ['date' => '15 Mar 2026', 'amount' => 8000, 'method' => 'Bank Transfer', 'attachment' => null],
            ['date' => '05 Jul 2026', 'amount' => 1750, 'method' => 'Bank Transfer', 'attachment' => null],
        ];

        $uploadedFiles = [
            ['filename' => 'trial_balance_2026.pdf', 'uploaded_by' => 'Client', 'uploaded_at' => '10 Jun 2026'],
            ['filename' => 'bank_statement_q2.pdf',  'uploaded_by' => 'Client', 'uploaded_at' => '15 Apr 2026'],
        ];

        return view('clients.show', compact(
            'client',
            'assignedStaff',
            'services',
            'payments',
            'uploadedFiles'
        ));
    }
}