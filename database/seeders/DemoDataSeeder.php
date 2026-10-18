<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Service;
use App\Models\ServiceCatalog;
use App\Models\Payment;
use App\Models\User;
use App\Models\Organization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DemoDataSeeder extends Seeder
{
    public function run(): void
    {
        $organization = Organization::firstOrCreate(
            ['slug' => 'fathalla-accounting'],
            [
                'public_id' => (string) Str::uuid(),
                'name' => 'Fathalla Accounting',
                'status' => 'active',
                'default_currency' => 'EGP',
            ]
        );
        
        $orgId = $organization->id;

        $users = collect([
            ['Reda Ragab', 'reda@fathalla.example'],
            ['Karim Nabil', 'karim@fathalla.example'],
            ['Nour El-Masry', 'nour@fathalla.example'],
            ['Youssef Adel', 'youssef@fathalla.example'],
        ])->mapWithKeys(function (array $row) use ($orgId) {
            $user = User::firstOrCreate(
                ['email' => $row[1], 'organization_id' => $orgId], 
                [
                    'organization_id' => $orgId, 
                    'public_id' => (string) Str::uuid(),
                    'name' => $row[0],
                    'password' => Hash::make('ChangeMe-Immediately-123!'),
                    'status' => 'active',
                ]
            );
            return [$row[0] => $user];
        });

        $clients = [
            ['company','Nile Trading Co.','cli_001'],
            ['company','Alexandria Textiles SAE','cli_002'],
            ['company','Cairo Medical Center','cli_003'],
            ['individual','Ahmed Hassan','cli_004'],
            ['company','Old Valley Trading','cli_005'],
        ];

        $clientModels = [];
        foreach ($clients as [$type, $name, $legacyCode]) {
            $clientModels[$legacyCode] = Client::firstOrCreate(
                ['name' => $name, 'organization_id' => $orgId],
                [
                    'organization_id' => $orgId, 
                    'public_id' => (string) Str::uuid(), 
                    'type' => $type, 
                    'status' => $name === 'Old Valley Trading' ? 'deactivated' : 'active', 
                    'created_by' => $users['Reda Ragab']->id, 
                    'extra_data' => ['legacy_code' => $legacyCode]
                ]
            );
        }

        $catalogRows = [
            ['Quarterly VAT Filing',4500,'quarterly','Tax Filing'],
            ['Annual Financial Statement Preparation',12000,'annual','Accounting'],
            ['Commercial Registry Renewal',2000,'annual','Legal'],
            ['Corporate Tax Return',8000,'annual','Tax Filing'],
            ['Payroll Compliance Review',3000,'monthly','Payroll'],
            ['Business License Application',1500,'one_time','Legal'],
        ];

        $catalogs = [];
        foreach ($catalogRows as [$name, $cost, $frequency, $category]) {
            $catalogs[$name] = ServiceCatalog::firstOrCreate(
                ['name' => $name, 'organization_id' => $orgId],
                [
                    'organization_id' => $orgId, 
                    'public_id' => (string) Str::uuid(), 
                    'default_cost' => $cost, 
                    'currency_code' => 'EGP', 
                    'frequency' => $frequency, 
                    'category' => $category, 
                    'is_active' => true
                ]
            );
        }

       
        $samples = [
            ['Quarterly VAT Filing — Q2 2026', 'cli_001', 'Quarterly VAT Filing', 'completed', 4500, 4500, '2026-04-01', '2026-06-30'],
            ['Annual Financial Statement Preparation', 'cli_001', 'Annual Financial Statement Preparation', 'in_progress', 12000, 6000, '2026-01-01', '2026-09-30'],
            ['Personal / Corporate Tax Support 2025', 'cli_004', null, 'in_progress', 5000, 3000, '2026-01-01', '2026-08-31'],
        ];

        foreach ($samples as [$name, $clientCode, $catalogName, $status, $total, $paid, $start, $due]) {
            $service = Service::firstOrCreate(
                ['name' => $name, 'client_id' => $clientModels[$clientCode]->id, 'organization_id' => $orgId],
                [
                    'organization_id' => $orgId, 
                    'public_id' => (string) Str::uuid(),
                    'catalog_id' => $catalogName ? $catalogs[$catalogName]->id : null,
                    'category' => $catalogName ? $catalogs[$catalogName]->category : 'Tax Support',
                    'status' => $status,
                    'total_amount' => $total,
                    'paid_amount' => 0,
                    'currency_code' => 'EGP',
                    'frequency' => $catalogName ? $catalogs[$catalogName]->frequency : 'one_time',
                    'start_date' => $start,
                    'due_date' => $due,
                    'assigned_to' => $users['Nour El-Masry']->id,
                    'created_by' => $users['Reda Ragab']->id,
                ]
            );

            if ($paid > 0 && ! Payment::where('idempotency_key', 'demo-opening-'.$service->public_id)->exists()) {
                Payment::create([
                    'organization_id' => $orgId, 
                    'service_id' => $service->id,
                    'client_id' => $service->client_id,
                    'amount' => $paid,
                    'currency_code' => 'EGP',
                    'method' => 'bank_transfer',
                    'status' => 'posted',
                    'payment_date' => $start,
                    'idempotency_key' => 'demo-opening-'.$service->public_id,
                    'created_by' => $users['Reda Ragab']->id,
                ]);
                $service->update(['paid_amount' => $paid]);
            }
        }
    }
}