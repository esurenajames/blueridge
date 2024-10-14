<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quotation PDF</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @page {
            size: A4 landscape; /* Set page size to landscape */
            margin: 20px; /* Margin around the content */
        }

        body {
            font-family: 'DejaVu Sans', 'Arial Unicode MS', Arial, sans-serif; 
        }

        .table-container {
            overflow-x: auto; /* Allow horizontal scrolling if necessary */
            
        }

        table {
            width: 100%; /* Full width for the table */
            border-collapse: collapse; /* Ensure borders are collapsed */
        }

        th, td {
            border: 1px solid black; /* Black border for cells */
            padding: 8px; /* Padding for cells */
            text-align: center; /* Center align text */
            vertical-align: middle; /* Vertically center text */
        }

        th {
            background-color: #f2f2f2; /* Light gray background for header */
        }

        .small-text {
            font-size: 14px; /* Smaller text for certification */
            text-align: left; /* Left align the certification text */
            margin-top: 0; /* Remove top margin */
        }

        .blank-row {
            height: 30px; /* Increased height for blank rows */
        }

        .signatures {
            margin-top: 40px; /* Add some margin on top */
            font-size: 14px;
            padding-top: 10px; /* Add padding to the top */
            border-collapse: collapse; /* Ensure borders are collapsed */
            width: 100%; /* Full width for the table */
        }

        .signature {
            text-align: left; /* Align text to the left */
            padding: 0 10px; /* Add padding for spacing */
            border: 1px solid white; /* Set border color to white */
        }

    </style>
</head>
<body class="font-sans">
    <p class="text-center font-bold text-lg" style="text-align:center; font-weight:bold; margin-bottom:24; margin-top:40; font-size:11;">ABSTRACT OF CANVASS</p>
    <p style="margin-bottom:0; font-size:11;">
        BARANGAY BLURIDGE B,<br>
        QUEZON CITY, DISTRICT III
    </p>

    <!-- Table Container -->
    <div class="table-container">
        <!-- Main Table for Description of Articles and Quotations -->
        <table class="border mb-2 text-sm" style="font-size: 14px;">
            <thead>
                <tr>
                    <th>ITEM</th>
                    <th>QTY</th>
                    <th>UNIT</th>
                    @foreach($quotations->unique('company_name') as $quotation)
                        <th>
                            {{ $quotation->company_name }}<br>{{ $quotation->company_address }}
                        </th>
                    @endforeach
                    <th>AWARDED TO:</th> <!-- New column for Awarded To -->
                </tr>
            </thead>
            <tbody>
                @foreach($quotations->groupBy('item_description') as $itemDescription => $group)
                    <tr>
                        <td>{{ $loop->iteration }}</td> <!-- Item number -->
                        <td>{{ $group->sum('qty') }}</td> <!-- Combined qty without unit -->
                        <td>{{ $group->first()->unit }}</td> <!-- Unit from the first entry -->

                        @foreach($quotations->unique('company_name') as $company)
                            @php
                                // Get the unit price for the current company and item
                                $quotation = $group->where('company_name', $company->company_name)->first();
                            @endphp
                            <td>
                                @if($quotation)
                                    {{ $quotation->item_description }}<br>₱{{ number_format($quotation->unit_price, 2) }}
                                @endif
                            </td>
                        @endforeach
                        <td>
                            @php
                                // Find the company where item_status is 1
                                $awardedQuotation = $group->firstWhere('item_status', 1);
                            @endphp
                            @if($awardedQuotation)
                                <strong>{{ $awardedQuotation->company_name }}</strong><br>
                                {{ $awardedQuotation->company_address }}
                            @else
                                
                            @endif
                        </td>
                    </tr>
                @endforeach
                
                <!-- Empty Rows to Increase Table Size -->
                @for ($i = 0; $i < 4; $i++)
                    <tr class="blank-row">
                        <td></td>
                        <td></td>
                        <td></td>
                        @foreach($quotations->unique('company_name') as $company)
                            <td></td>
                        @endforeach
                        <td></td>
                    </tr>
                @endfor

                <!-- Total Row -->
                <tr>
                    <td></td>
                    <td></td>
                    <td colspan=""><strong>TOTAL</strong></td>
                    @foreach($quotations->unique('company_name') as $company)
                        <td style="text-align:right;">
                            @php
                                $totalAmount = $quotations->where('company_name', $company->company_name)->sum('amount');
                            @endphp
                            ₱{{ number_format($totalAmount, 2) }}
                        </td>
                    @endforeach
                    <td></td> <!-- Empty cell for Awarded To in total row -->
                </tr>
            </tbody>
        </table>
    </div>

    <p class="small-text">
        We hereby certify that the foregoing is the abstract of price quotation, and the award is hereby made to:  
        <strong>
            @if(isset($awardedQuotation))
                {{ $awardedQuotation->company_name }}
            @else
                
            @endif
        </strong>
    </p>

    <!-- Signatures Section in a Table -->
    <table class="signatures" style="width: 100%;">
        <tr>
            <td class="signature">
                <p>Prepared By:</p>
                <br>
                <p>Rovie Rose M. Bernavie</p>
                <p style="margin-top:-8;">Barangay Secretary</p>
            </td>
            <td class="signature">
                <p>Approved By:</p>
                <br>
                <p>Michelle V. Meniano</p>
                <p style="margin-top:-8;">Barangay Treasurer/Requesting Official</p>
            </td>
            <td class="signature">
                <p>Noted By:</p>
                <br>
                <p style="font-weight:bold;">ESPERANZA CASTRO-LEE</p>
                <p style="margin-top:-8;">Punong Barangay</p>
            </td>
        </tr>
    </table>

</body>
</html>
