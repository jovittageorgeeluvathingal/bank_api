<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
     // Insert data
     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'name' => 'required|string',
             'email' => 'required|email|unique:customers,email',
             'account_number' => 'required|string|unique:customers,account_number',
             'amount' => 'required|numeric',
         ]);
 
         $customer = new Customer();
         $customer->name = $validatedData['name'];
         $customer->email = $validatedData['email'];
         $customer->account_number = $validatedData['account_number'];
         $customer->amount = $validatedData['amount'];
         $customer->save();
 
         return response()->json(['message' => 'Customer created successfully'], 201);
     }
 
     // View all data
     public function index()
     {
         $customers = Customer::all();
         return response()->json($customers);
     }
 
     // View data by ID
     public function show($id)
     {
         $customer = Customer::find($id);
         if (!$customer) {
             return response()->json(['message' => 'Customer not found'], 404);
         }
         return response()->json($customer);
     }
 
     // Update data
     public function update(Request $request, $id)
     {
         $validatedData = $request->validate([
             'name' => 'required|string',
             'email' => 'required|email|unique:customers,email,' . $id,
             'account_number' => 'required|string|unique:customers,account_number,' . $id,
             'amount' => 'required|numeric',
         ]);
 
         $customer = Customer::find($id);
         if (!$customer) {
             return response()->json(['message' => 'Customer not found'], 404);
         }
 
         $customer->name = $validatedData['name'];
         $customer->email = $validatedData['email'];
         $customer->account_number = $validatedData['account_number'];
         $customer->amount = $validatedData['amount'];
         $customer->save();
 
         return response()->json(['message' => 'Customer updated successfully'], 200);
}
}