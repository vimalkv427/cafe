<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


<style>
    .date-filter-group {
        display: flex;
        gap: 10px;
        align-items: end;
        margin-bottom: 15px;
    }

    .date-filter-group label {
        font-weight: 600;
        font-size: 14px;
        margin-bottom: 4px;
    }

    .date-filter-group input[type="date"] {
        padding: 6px 10px;
        border: 1px solid #ced4da;
        border-radius: 5px;
        font-size: 14px;
        width: 100%;
    }

    @media (max-width: 768px) {
        .date-filter-group {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>
@include('admin.include.header')
@include('admin.include.sidebar')
@include('admin.include.navbar')

<div class="content-page">
    <div class="container-fluid">
        <!-- Success Message -->
        @if(session()->has('success'))
        <div class="alert alert-success" id="successMessage">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('successMessage').style.display = 'none';
            }, 3000);
        </script>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Report List</h4>
                    </div>
                    <!-- <a href="" class="btn btn-primary add-list">
                        <i class="las la-plus mr-3"></i>Add Sale
                    </a> -->
                   <div class="d-flex justify-content-between align-items-center mt-3" style="gap: 20px;">
    <div>
        <h6>Total Sale: &pound;{{ number_format($grandTotal, 2) }}</h6>
    </div>
    <div>
        <h6>Total Quantity: <strong>{{ $totalQuantity }}</strong></h6>
    </div>
</div>



                    <form method="GET" action="{{ route('bill.reports') }}">
                        <div class="date-filter-group d-flex gap-3 align-items-end">
                            <!-- From Date -->
                            <div class="form-group">
                                <label for="from">From:</label>
                                <input type="date" id="from" name="from" value="{{ request('from') }}" class="form-control">
                            </div>

                            <!-- To Date -->
                            <div class="form-group">
                                <label for="to">To:</label>
                                <input type="date" id="to" name="to" value="{{ request('to') }}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="product">Product Item:</label>
                                <select name="product" id="product" class="form-control">
                                    <option value="">-- All Products --</option>
                                    @foreach($products as $product)
                                    <option value="{{ $product->id }}" {{ request('product') == $product->id ? 'selected' : '' }}>
                                        {{ $product->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Product Dropdown (as above) -->

                            <!-- Submit Button -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </form>





                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                    <table id="billTable" class="data-table table mb-0 tbl-server-info">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <th>#</th>
                                <th>Date</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Amount</th>
                                <th>Total Amount</th>
                            </tr>
                        </thead>
                        <tbody class="ligth-body">
                            @php $rowNum = 1; @endphp
                            @foreach($groupedReports as $orderId => $reports)
                            @php
                            $totalAmount = $reports->sum('total_price');
                            $date = \Carbon\Carbon::parse($reports->first()->date)->format('d-m-Y');
                            @endphp

                            @foreach($reports as $report)
                            <tr>
                                <td>{{ $rowNum++ }}</td>
                                <td>{{ $date }}</td>
                                <td>{{ $report->product_name }}</td>
                                <td>{{ $report->quantity }}</td>
                                <td>&pound;{{ number_format($report->total_price, 2) }}</td>
                                <td></td> {{-- Leave empty except last row --}}
                            </tr>
                            @endforeach

                            {{-- Subtotal row --}}
                            <tr style="background-color: #f2f2f2; font-weight: bold;">
                                <td colspan="5" class="text-right">Order Total:</td>
                                <td>&pound;{{ number_format($totalAmount, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>
</div>

@include('admin.include.footer')