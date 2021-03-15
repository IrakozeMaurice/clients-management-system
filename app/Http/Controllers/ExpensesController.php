<?php

namespace App\Http\Controllers;

use App\Expense;
use App\ExpenseCategory;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{

    public function index()
    {
        $expenses = Expense::all();
        return view('backend.finance.expenses.index', compact('expenses'));
    }

    public function create()
    {
        return view('backend.finance.expenses.create');
    }

    public function store()
    {
        $attributes = $this->validateExpense();
        $attributes['expense_category_id'] = (int)$attributes['expense_category_id'];
        $attributes['amount'] = (int)$attributes['amount'];
        Expense::create($attributes);
        return redirect('/expenses');
    }

    public function show(Expense $expense)
    {
        return view('backend.finance.expenses.show', compact('expense'));
    }

    public function edit(Expense $expense)
    {
        return view('backend.finance.expenses.edit', compact('expense'));
    }

    public function update(Expense $expense)
    {
        $attributes = $this->validateExpense();
        $attributes['expense_category_id'] = (int)$attributes['expense_category_id'];
        $attributes['amount'] = (int)$attributes['amount'];
        $expense->update($attributes);
        return redirect('/expenses');
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect('/expenses');
    }

    protected function validateExpense()
    {
        return request()->validate(
            [
                'expense_category_id' => ['required'],
                'name' => ['required', 'min:2'],
                'description' => ['required'],
                'amount' => ['required'],
            ]
        );
    }
}
