<?php

namespace App\Services;

use App\Http\Requests\ExpenseFilterRequest;
use App\Models\Expense;

class ExpenseService
{
    //Объединила create и store тк без view
    public function store(array $data)
    {

        $expense = Expense::create([
            'amount' => $data['amount'],
            'category' => $data['category'],
            'description' => $data['description'],
            'date' => $data['date'],
        ]);

        return $expense;
    }

    public function index()
    {
        $expense = Expense::all()
            ->sortByDesc('date');
        $general = Expense::sum('amount');

        return [
            'expenses' => $expense,
            'total' => $general,
        ];
    }

    public function show($id)
    {
        $expense = Expense::where('id', $id)
            ->firstOrFail();

        return $expense;
    }

    public function update($id, array $data)
    {
        $expense = Expense::where('id', $id)
            ->update($data);

        return $expense;
    }

    public function destroy($id)
    {
        $expense = Expense::where('id', $id)
            ->delete();

        return $expense;
    }

    public function filter(array $data)
    {
        $query = Expense::query();

        if (isset($data['category'])) {
            $query->where('category', $data['category']);
        }
        if (isset($data['date'])) {
            if ($data['date'] === 'week') {
                $query->where('date', '>=', now()->subWeek());
            }
            if ($data['date'] === 'month') {
                $query->where('date', '>=', now()->subMonth());
            }
        }

        return $query->get();
    }

    public function export_csv()
    {
        $expenses = Expense::all()
            ->sortByDesc('date');

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="expenses.csv"',
        ];

        //Вызываем анонимную функцию которая на лету создаст csv
        $callback = function() use ($expenses) {
            $file = fopen('php://output', 'w');

            fputcsv($file, ['ID', 'Amount', 'Category', 'Description', 'Date']);

            foreach ($expenses as $expense) {
                fputcsv($file, [
                    $expense->id,
                    $expense->amount,
                    $expense->category,
                    $expense->description,
                    $expense->date,
                ]);
            }

            fclose($file);
        };

        //Чтобы браузер сразу скачал файл
        return response()->stream($callback, 200, $headers);
    }
    public function limit_set(array $limits)
    {
        foreach ($limits as $month => $limit) {
            [$yearNum, $monthNum] = explode('-', $month);

            Expense::whereYear('date', $yearNum)
                ->whereMonth('date', $monthNum)
                ->update(['budget' => $limit]);
        }
    }
    public function limit_check()
    {
        $expenses = Expense::whereYear('date', now()->year)
            ->whereMonth('date', now()->month)
            ->get();

        foreach ($expenses as $expense) {
            $expense->budget = $expense->budget == NULL ? 0 : $expense->budget;
        }

        $month_budget = $expenses
            ->first()
            ->budget;

        $total = $expenses->sum('amount');

        if ($total > $month_budget) {
            return [
                'over_limit' => true,
                'excess' => $total - $month_budget,
                'total' => $total,
                'budget' => $month_budget,
            ];
        }
        return false;
    }

}
