@include('admin.include.header')
@include('admin.include.sidebar')
@include('admin.include.navbar')

<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Orders List</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="container">
                    @php
                    $tables = range(1, 20); // Show 20 tables for demonstration
                    $groupedOrders = $orders->groupBy('table_id');
                    @endphp
                    <div class="row">
                        @foreach ($tables as $index => $table_id)
                        @php
                        $tableOrders = $groupedOrders[$table_id] ?? collect();
                        $hasOrders = $tableOrders->isNotEmpty();
                        $waiterName = $hasOrders ? $waiters[$tableOrders->first()->waiter_id]->name ?? 'N/A' : 'N/A';
                        $totalAmount = $tableOrders->sum('total_amount');
                        $orderIds = $hasOrders ? $tableOrders->pluck('id')->toArray() : []; // Get order IDs for the table
                        $classes = $hasOrders ? 'seat selected' : 'seat unselected';
                        $statusText = $hasOrders ? 'Occupied' : 'Available';
                        @endphp
                        <div class="seat {{ $classes }}" onclick="openModal({{ json_encode($orderIds) }})">
                            <span class="table-number">Table {{ $table_id }}</span>
                            <span class="status">{{ $statusText }}</span>
                            @if($hasOrders)
                            <span>Waiter: {{ $waiterName }}</span>
                            <span>Total: {{ number_format($totalAmount, 2) }}</span>
                            @else

                            @endif
                        </div>
                        @if (($index + 1) % 5 == 0)
                    </div>
                    <div class="row">
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.include.footer')

<!-- Modal for showing orders -->
<div class="modal" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderModalLabel">Select Orders</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Dynamic content for orders will go here -->
                <div id="orderList"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="#" id="proceedToBillingBtn" class="btn btn-primary">Proceed to Billing</a>
            </div>
        </div>
    </div>
</div>

<script>
    function openModal(orderIds) {
        // Display orders in the modal
        var orderListElement = document.getElementById('orderList');
        orderListElement.innerHTML = ''; // Clear any previous content

        // Fetch the order details (use an example order list, replace it with actual order data)
        var orderDetails = @json($orders); // Assuming you pass order data in JSON format

        // For each order, create a checkbox with amount and bill number
        orderIds.forEach(function(orderId) {
            var order = orderDetails.find(order => order.id === orderId); // Find the order by its ID
            if (order) {
                var div = document.createElement('div');
                div.classList.add('checkbox-item'); // Optional: for styling

                // Create label
                var label = document.createElement('label');
                label.textContent = 'Amount: ' + order.total_amount + ' |  ';

                // Create checkbox
                var checkbox = document.createElement('input');
                checkbox.type = 'checkbox';
                checkbox.value = order.id;
                checkbox.name = 'orders[]'; // We use "orders[]" to send an array of selected orders

                // Append the checkbox to the label, then the label to the container div
                label.appendChild(checkbox);
                div.appendChild(label);

                // Add the div to the modal body
                orderListElement.appendChild(div);
            }
        });

        // Show the modal
        $('#orderModal').modal('show');

        // Update the Proceed to Billing button
        var proceedButton = document.getElementById('proceedToBillingBtn');
        proceedButton.onclick = function() {
            var selectedOrders = [];
            // Collect all selected order IDs
            var checkboxes = document.querySelectorAll('input[name="orders[]"]:checked');
            checkboxes.forEach(function(checkbox) {
                selectedOrders.push(checkbox.value);
            });

            if (selectedOrders.length > 0) {
                // Redirect to billing page with selected order IDs
                var url = 'https://billingmark.com/cafe/public/billing/combined/' + selectedOrders.join(',');
                window.location.href = url;
            } else {
                alert('Please select at least one order.');
            }
        };
    }
</script>

<style>
    /* Styles for Modal and Table */
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        text-align: center;
    }

    .container {
        margin: 10px auto;
        width: 100%;
        max-width: 1200px;
    }

    .row {
        display: flex;
        justify-content: center;
        margin-bottom: 5px;
        flex-wrap: wrap;
    }

    .seat {
        background-color: #3e4a52;
        height: 150px;
        width: 150px;
        margin: 8px;
        border-radius: 15px;
        cursor: pointer;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        transition: transform 0.3s, box-shadow 0.3s;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.4);
        text-align: center;
    }

    .seat.selected {
        background-color: #d32f2f;
        border: 3px solid #ff5e5e;
    }

    .seat.unselected {
        background-color: #388e3c;
        border: 3px solid #81c784;
    }

    .seat:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.6);
    }

    .table-number {
        font-weight: bold;
        font-size: 18px;
        margin-top: 6px;
    }

    .status {
        font-size: 14px;
        margin-top: 2px;
        opacity: 0.9;
    }

    .checkbox-item {
        margin-bottom: 10px;
        /* Add space between checkboxes */
        padding: 5px;
    }

    .checkbox-item label {
        font-size: 14px;
        display: flex;
        align-items: center;
    }

    .checkbox-item input {
        margin-right: 10px;
    }
</style>