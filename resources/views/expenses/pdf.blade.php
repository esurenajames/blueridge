<!DOCTYPE html>
<html>
<head>
    <title>Expenses Report</title>
    <style>
        /* Add your styles here for the PDF layout */
        body {
            font-family: 'DejaVu Sans', 'Arial Unicode MS', Arial, sans-serif; 
        }
        h1 {
            text-align: center;
            font-size: 24px;
        }
        span {
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left; /* Default alignment for text */
        }
        td.number {
            text-align: right; /* Right-align numbers */
        }
        th {
            background-color: #f2f2f2;
        }
        .section-header {
            background-color: #f2f2f2;
            font-weight: bold;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Summary of Income and Expenditure {{ date('Y') }}</h1>
    <table>
        <thead>
            <tr>
                <th>Object of Expenditure</th>
                <th>Proposed Budget</th>
                <th>1st Half<br><span>(Jan-June)</span></th>
                <th>2nd Half<br><span>(July-Dec)</span></th>
                <th>YTD</th>
                <th>Balance</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($expensesData as $expense)
                @if ($loop->first || $expense->section_name != $expensesData[$loop->index - 1]->section_name)
                    <tr class="section-header">
                        <td colspan="6">{{ $expense->section_name }}</td>
                    </tr>
                @endif
                <tr>
                    <td>{{ $expense->object_of_expenditure }}</td>
                    <td class="number">₱{{ number_format($expense->proposed_budget, 2) }}</td>
                    <td class="number">₱{{ number_format($expense->jan + $expense->feb + $expense->mar + $expense->apr + $expense->may + $expense->jun, 2) }}</td>
                    <td class="number">₱{{ number_format($expense->jul + $expense->aug + $expense->sept + $expense->oct + $expense->nov + $expense->dec, 2) }}</td>
                    <td class="number">₱{{ number_format($expense->ytd, 2) }}</td>
                    <td class="number">₱{{ number_format($expense->balance, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
