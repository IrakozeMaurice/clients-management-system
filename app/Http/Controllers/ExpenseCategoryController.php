<?php

namespace App\Http\Controllers;

use App\Expense;
use App\ExpenseCategory;
use Illuminate\Http\Request;

class ExpenseCategoryController extends Controller
{

    public function index()
    {
        $expenseCategories = ExpenseCategory::all();
        return view('backend.finance.expense_categories.index', compact('expenseCategories'));
    }


    public function create()
    {
        return view('backend.finance.expense_categories.create');
    }


    public function store()
    {
        $attributes = $this->validateExpenseCategory();
        ExpenseCategory::create($attributes);
        return redirect('/expenseCategories');
    }

    public function show(ExpenseCategory $expenseCategory)
    {
        return view('backend.finance.expense_categories.show', compact('expenseCategory'));
    }

    public function edit(ExpenseCategory $expenseCategory)
    {
        return view('backend.finance.expense_categories.edit', compact('expenseCategory'));
    }

    public function update(ExpenseCategory $expenseCategory)
    {
        $attributes = $this->validateExpenseCategory();
        $expenseCategory->update($attributes);
        return redirect('/expenseCategories');
    }

    public function destroy(ExpenseCategory $expenseCategory)
    {
        $expenseCategory->delete();
        return redirect('/expenseCategories');
    }

    protected function validateExpenseCategory()
    {
        return request()->validate(
            [
                'categoryName' => ['required', 'min:2'],
                'description' => ['required', 'min:3'],
            ]
        );
    }
}
