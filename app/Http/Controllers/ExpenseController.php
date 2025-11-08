<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpenseBudgetRequest;
use App\Http\Requests\ExpenseFilterRequest;
use App\Models\Expense;
use App\Services\ExpenseService;
use Illuminate\Http\Request;
use App\Http\Requests\ExpenseRequest;

class ExpenseController extends Controller
{
    protected $service;
    public function __construct(ExpenseService $service){
        $this->service = $service;
    }
    public function store(ExpenseRequest $request){
        $expenses = $request->validated();
        $this->service->store($expenses);

        return response()->json([
            'message' => 'New expense has been added',
        ]);
    }
    public function index(){
        $expenses = $this->service->index();
        $limit = $this->service->limit_check();

        return response()->json([
            'expenses' => $expenses['expenses'],
            'total' => $expenses['total'],
            'limit' => $limit,
        ]);
    }
    public function show($id){

        $expense = $this->service->show($id);

        return response()->json([$expense]);
    }
    public function update(ExpenseRequest $request, $id){

        if(!Expense::find($id)) {
            return response()->json([
                'message' => 'Expense ID doesnt exist',
            ]);
        }

        $expenses = $request->validated();
        $this->service->update($id, $expenses);

        return response()->json([
            'message' => 'Expense has been updated',
        ]);
    }
    public function destroy($id){
        $this->service->destroy($id);

        return response()->json([
            'message' => 'Expense has been deleted',
        ]);
    }
    public function filter(ExpenseFilterRequest $request){
        $filter = $request->validated();
        $expenses = $this->service->filter($filter);

        return response()->json([
            'expenses' => $expenses,
        ]);
    }
    public function export_csv(){

        return $this->service->export_csv();
    }
    public function limit_set(ExpenseBudgetRequest $request){
        $limits = $request->validated();
        $this->service->limit_set($limits);

        return response()->json([
            'message' => 'Budgets successfully updated for each month',
            'data' => $limits,
        ]);
    }
    public function limit_check(){
        $limit = $this->service->limit_check();

        return $limit;
    }
}
