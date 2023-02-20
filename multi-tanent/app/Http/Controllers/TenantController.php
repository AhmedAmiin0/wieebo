<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTenantRequest;
use App\Models\Tenant;
use App\Models\User;

class TenantController extends Controller
{
    public function index()
    {
        $tenants =  Tenant::with('domains')->get();
        return view('welcome', compact('tenants'));
    }
    public function store(StoreTenantRequest $request)
    {
        $host = $request->getHost();
        try {
            $tenant = Tenant::create([
                'id' => $request->tenant,
            ]);
            $tenant->domains()->create([
                'domain' => $request->tenant .  '.' . $host
            ]);

            $tenant->run(function () use ($request) {
                User::create([
                    'name' => $request->tenant,
                    'email' => 'admin@' . $request->tenant . '.' . $request->getHost(),
                    'password' => bcrypt('password'),
                ]);
            });

            return redirect()->route('tenant.index')->with('success', 'Tenant created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $tenant = Tenant::findOrFail($id);
            $tenant->delete();
            return redirect()->back()->with('success', 'Tenant deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
