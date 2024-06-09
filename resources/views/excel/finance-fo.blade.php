<table style="text-align: center" class="table table-hover table-bordered">
                <thead style="vertical-align: middle">
                <tr>
                        <th rowspan="3" class="border-gray-200">Tanggal Checkin</th>
                        <th rowspan="3" class="border-gray-200">ID Bill</th>
                        <th colspan="6" class="border-gray-200">Down Payment</th>
                        <th colspan="6" class="border-gray-200">Pelunasan</th>
                        <th rowspan="3" class="border-gray-200">Tanggal Pembayaran DP</th>
                        <th rowspan="3" class="border-gray-200">Tanggal Lunas</th>
                        <th rowspan="3" class="border-gray-200">Catatan</th>
                    </tr>
                    <tr>
                        <th rowspan="2" class="border-gray-200">Cash</th>
                        <th colspan="4" class="border-gray-200">Non Cash</th>
                        <th rowspan="2" class="border-gray-200">OTA</th>
                        <th rowspan="2">Cash</th>
                        <th colspan="4" class="border-gray-200">Non Cash</th>
                        <th rowspan="2" class="border-gray-200">OTA</th>
                    </tr>
                    <tr>
                        <th class="border-gray-200">Transfer</th>
                        <th class="border-gray-200">Card</th>
                        <th class="border-gray-200">QRIS</th>
                        <th class="border-gray-200">VA</th>
                        <th class="border-gray-200">Transfer</th>
                        <th class="border-gray-200">Card</th>
                        <th class="border-gray-200">QRIS</th>
                        <th class="border-gray-200">VA</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Item -->
                    @foreach($roomIncome as $roomIncomes)
                    <tr>
                        <td><span class="fw-normal">{{ \Carbon\Carbon::parse($roomIncomes->Payment->Reservation->reservation_start_date ?? '')   }}</span></td>
                        <td><span class="fw-normal">{{ $roomIncomes->Payment->Reservation->reservation_code ?? '' }}</span></td>
                            @if($roomIncomes->payment_method_id == 1)
                                <td><span class="fw-normal">Rp. {{ $roomIncomes->payment_detail_value }}</span></td> <!-- DP CASH Payment -->
                                <td><span class="fw-normal">-</span></td>
                                <td><span class="fw-normal">-</span></td>
                                <td><span class="fw-normal">-</span></td>
                                <td><span class="fw-normal">-</span></td>
                                <td><span class="fw-normal">-</span></td>
                                @if($roomIncomes->payment->payment_status == 'Lunas + DP 1')
                                    @if($roomIncomes->payment_detail_status == 'DP')
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id == 1) <!-- Lunas Cash !-->
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 12 && $roomIncomes->payment->paymentPaid->payment_method_id <= 16) <!-- Lunas Trasnfer !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 2 && $roomIncomes->payment->paymentPaid->payment_method_id <= 11) <!-- Lunas Card !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 17 && $roomIncomes->payment->paymentPaid->payment_method_id <= 21) <!-- Lunas Qris !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 30 && $roomIncomes->payment->paymentPaid->payment_method_id <= 38) <!-- Lunas VA !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 22 && $roomIncomes->payment->paymentPaid->payment_method_id <= 29) <!-- Lunas OTA !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                        @endif
                                    @else 
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                    @endif
                                @elseif($roomIncomes->payment->payment_status == 'Lunas + DP 2')
                                    @if($roomIncomes->payment_detail_status == 'DP 2')
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id == 1) <!-- Lunas Cash !-->
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 12 && $roomIncomes->payment->paymentPaid->payment_method_id <= 16) <!-- Lunas Trasnfer !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 2 && $roomIncomes->payment->paymentPaid->payment_method_id <= 11) <!-- Lunas Card !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 17 && $roomIncomes->payment->paymentPaid->payment_method_id <= 21) <!-- Lunas Qris !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 30 && $roomIncomes->payment->paymentPaid->payment_method_id <= 38) <!-- Lunas VA !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 22 && $roomIncomes->payment->paymentPaid->payment_method_id <= 29) <!-- Lunas OTA !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                        @endif
                                    @else 
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                    @endif
                                @else
                                    <td><span class="fw-normal">-</span></td>
                                    <td><span class="fw-normal">-</span></td>
                                    <td><span class="fw-normal">-</span></td>
                                    <td><span class="fw-normal">-</span></td>
                                    <td><span class="fw-normal">-</span></td>
                                    <td><span class="fw-normal">-</span></td>
                                @endif
                            @endif
                        @if($roomIncomes->payment_method_id >= 12 && $roomIncomes->payment_method_id <= 16) <!-- DP TRANSFER Payment -->
                                <td><span class="fw-normal">-</span></td>
                                <td><span class="fw-normal">Rp. {{ $roomIncomes->payment_detail_value }}</span></td>
                                <td><span class="fw-normal">-</span></td>
                                <td><span class="fw-normal">-</span></td>
                                <td><span class="fw-normal">-</span></td>
                                <td><span class="fw-normal">-</span></td>
                                @if($roomIncomes->payment->payment_status == 'Lunas + DP 1')
                                    @if($roomIncomes->payment_detail_status == 'DP')
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id == 1) <!-- Lunas Cash !-->
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 12 && $roomIncomes->payment->paymentPaid->payment_method_id <= 16) <!-- Lunas Trasnfer !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 2 && $roomIncomes->payment->paymentPaid->payment_method_id <= 11) <!-- Lunas Card !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 17 && $roomIncomes->payment->paymentPaid->payment_method_id <= 21) <!-- Lunas Qris !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 30 && $roomIncomes->payment->paymentPaid->payment_method_id <= 38) <!-- Lunas VA !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 22 && $roomIncomes->payment->paymentPaid->payment_method_id <= 29) <!-- Lunas OTA !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                        @endif
                                    @else 
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                    @endif
                                @elseif($roomIncomes->payment->payment_status == 'Lunas + DP 2')
                                    @if($roomIncomes->payment_detail_status == 'DP 2')
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id == 1) <!-- Lunas Cash !-->
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 12 && $roomIncomes->payment->paymentPaid->payment_method_id <= 16) <!-- Lunas Trasnfer !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 2 && $roomIncomes->payment->paymentPaid->payment_method_id <= 11) <!-- Lunas Card !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 17 && $roomIncomes->payment->paymentPaid->payment_method_id <= 21) <!-- Lunas Qris !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 30 && $roomIncomes->payment->paymentPaid->payment_method_id <= 38) <!-- Lunas VA !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 22 && $roomIncomes->payment->paymentPaid->payment_method_id <= 29) <!-- Lunas OTA !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                        @endif
                                    @else 
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                    @endif
                                @else
                                    <td><span class="fw-normal">-</span></td>
                                    <td><span class="fw-normal">-</span></td>
                                    <td><span class="fw-normal">-</span></td>
                                    <td><span class="fw-normal">-</span></td>
                                    <td><span class="fw-normal">-</span></td>
                                    <td><span class="fw-normal">-</span></td>
                                @endif
                            @endif
                        @if($roomIncomes->payment_method_id >= 2 && $roomIncomes->payment_method_id <= 11) <!-- DP CARD Payment -->
                                <td><span class="fw-normal">-</span></td>
                                <td><span class="fw-normal">-</span></td>
                                <td><span class="fw-normal">Rp. {{ $roomIncomes->payment_detail_value }}</span></td>
                                <td><span class="fw-normal">-</span></td>
                                <td><span class="fw-normal">-</span></td>
                                <td><span class="fw-normal">-</span></td>
                                @if($roomIncomes->payment->payment_status == 'Lunas + DP 1')
                                    @if($roomIncomes->payment_detail_status == 'DP')
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id == 1) <!-- Lunas Cash !-->
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 12 && $roomIncomes->payment->paymentPaid->payment_method_id <= 16) <!-- Lunas Trasnfer !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 2 && $roomIncomes->payment->paymentPaid->payment_method_id <= 11) <!-- Lunas Card !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 17 && $roomIncomes->payment->paymentPaid->payment_method_id <= 21) <!-- Lunas Qris !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 30 && $roomIncomes->payment->paymentPaid->payment_method_id <= 38) <!-- Lunas VA !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 22 && $roomIncomes->payment->paymentPaid->payment_method_id <= 29) <!-- Lunas OTA !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                        @endif
                                    @else 
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                    @endif
                                @elseif($roomIncomes->payment->payment_status == 'Lunas + DP 2')
                                    @if($roomIncomes->payment_detail_status == 'DP 2')
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id == 1) <!-- Lunas Cash !-->
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 12 && $roomIncomes->payment->paymentPaid->payment_method_id <= 16) <!-- Lunas Trasnfer !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 2 && $roomIncomes->payment->paymentPaid->payment_method_id <= 11) <!-- Lunas Card !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 17 && $roomIncomes->payment->paymentPaid->payment_method_id <= 21) <!-- Lunas Qris !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 30 && $roomIncomes->payment->paymentPaid->payment_method_id <= 38) <!-- Lunas VA !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 22 && $roomIncomes->payment->paymentPaid->payment_method_id <= 29) <!-- Lunas OTA !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                        @endif
                                    @else 
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                    @endif
                                @else
                                    <td><span class="fw-normal">-</span></td>
                                    <td><span class="fw-normal">-</span></td>
                                    <td><span class="fw-normal">-</span></td>
                                    <td><span class="fw-normal">-</span></td>
                                    <td><span class="fw-normal">-</span></td>
                                    <td><span class="fw-normal">-</span></td>
                                @endif
                            @endif
                        @if($roomIncomes->payment_method_id >= 17 && $roomIncomes->payment_method_id <= 21) <!-- DP QRIS Payment -->
                                <td><span class="fw-normal">-</span></td>
                                <td><span class="fw-normal">-</span></td>
                                <td><span class="fw-normal">-</span></td>
                                <td><span class="fw-normal">Rp. {{ $roomIncomes->payment_detail_value }}</span></td>
                                <td><span class="fw-normal">-</span></td>
                                <td><span class="fw-normal">-</span></td>
                                @if($roomIncomes->payment->payment_status == 'Lunas + DP 1')
                                    @if($roomIncomes->payment_detail_status == 'DP')
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id == 1) <!-- Lunas Cash !-->
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 12 && $roomIncomes->payment->paymentPaid->payment_method_id <= 16) <!-- Lunas Trasnfer !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 2 && $roomIncomes->payment->paymentPaid->payment_method_id <= 11) <!-- Lunas Card !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 17 && $roomIncomes->payment->paymentPaid->payment_method_id <= 21) <!-- Lunas Qris !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 30 && $roomIncomes->payment->paymentPaid->payment_method_id <= 38) <!-- Lunas VA !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 22 && $roomIncomes->payment->paymentPaid->payment_method_id <= 29) <!-- Lunas OTA !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                        @endif
                                    @else 
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                    @endif
                                @elseif($roomIncomes->payment->payment_status == 'Lunas + DP 2')
                                    @if($roomIncomes->payment_detail_status == 'DP 2')
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id == 1) <!-- Lunas Cash !-->
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 12 && $roomIncomes->payment->paymentPaid->payment_method_id <= 16) <!-- Lunas Trasnfer !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 2 && $roomIncomes->payment->paymentPaid->payment_method_id <= 11) <!-- Lunas Card !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 17 && $roomIncomes->payment->paymentPaid->payment_method_id <= 21) <!-- Lunas Qris !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 30 && $roomIncomes->payment->paymentPaid->payment_method_id <= 38) <!-- Lunas VA !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 22 && $roomIncomes->payment->paymentPaid->payment_method_id <= 29) <!-- Lunas OTA !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                        @endif
                                    @else 
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                    @endif
                                @else
                                    <td><span class="fw-normal">-</span></td>
                                    <td><span class="fw-normal">-</span></td>
                                    <td><span class="fw-normal">-</span></td>
                                    <td><span class="fw-normal">-</span></td>
                                    <td><span class="fw-normal">-</span></td>
                                    <td><span class="fw-normal">-</span></td>
                                @endif
                            @endif
                        @if($roomIncomes->payment_method_id >= 22 && $roomIncomes->payment_method_id <= 29) <!-- DP OTA Payment -->
                                <td><span class="fw-normal">-</span></td>
                                <td><span class="fw-normal">-</span></td>
                                <td><span class="fw-normal">-</span></td>
                                <td><span class="fw-normal">-</span></td>
                                <td><span class="fw-normal">-</span></td>
                                <td><span class="fw-normal">Rp. {{ $roomIncomes->payment_detail_value }}</span></td>
                                @if($roomIncomes->payment->payment_status == 'Lunas + DP 1')
                                    @if($roomIncomes->payment_detail_status == 'DP')
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id == 1) <!-- Lunas Cash !-->
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 12 && $roomIncomes->payment->paymentPaid->payment_method_id <= 16) <!-- Lunas Trasnfer !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 2 && $roomIncomes->payment->paymentPaid->payment_method_id <= 11) <!-- Lunas Card !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 17 && $roomIncomes->payment->paymentPaid->payment_method_id <= 21) <!-- Lunas Qris !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 30 && $roomIncomes->payment->paymentPaid->payment_method_id <= 38) <!-- Lunas VA !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 22 && $roomIncomes->payment->paymentPaid->payment_method_id <= 29) <!-- Lunas OTA !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                        @endif
                                    @else 
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                    @endif
                                @elseif($roomIncomes->payment->payment_status == 'Lunas + DP 2')
                                    @if($roomIncomes->payment_detail_status == 'DP 2')
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id == 1) <!-- Lunas Cash !-->
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 12 && $roomIncomes->payment->paymentPaid->payment_method_id <= 16) <!-- Lunas Trasnfer !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 2 && $roomIncomes->payment->paymentPaid->payment_method_id <= 11) <!-- Lunas Card !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 17 && $roomIncomes->payment->paymentPaid->payment_method_id <= 21) <!-- Lunas Qris !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 30 && $roomIncomes->payment->paymentPaid->payment_method_id <= 38) <!-- Lunas VA !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 22 && $roomIncomes->payment->paymentPaid->payment_method_id <= 29) <!-- Lunas OTA !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                        @endif
                                    @else 
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                    @endif
                                @else
                                    <td><span class="fw-normal">-</span></td>
                                    <td><span class="fw-normal">-</span></td>
                                    <td><span class="fw-normal">-</span></td>
                                    <td><span class="fw-normal">-</span></td>
                                    <td><span class="fw-normal">-</span></td>
                                    <td><span class="fw-normal">-</span></td>
                                @endif
                            @endif
                            @if($roomIncomes->payment_method_id >= 30 && $roomIncomes->payment_method_id <= 38) <!-- DP VA Payment -->
                                <td><span class="fw-normal">-</span></td>
                                <td><span class="fw-normal">-</span></td>
                                <td><span class="fw-normal">-</span></td>
                                <td><span class="fw-normal">-</span></td>
                                <td><span class="fw-normal">Rp. {{ $roomIncomes->payment_detail_value }}</span></td>
                                <td><span class="fw-normal">-</span></td>
                                @if($roomIncomes->payment->payment_status == 'Lunas + DP 1')
                                    @if($roomIncomes->payment_detail_status == 'DP')
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id == 1) <!-- Lunas Cash !-->
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 12 && $roomIncomes->payment->paymentPaid->payment_method_id <= 16) <!-- Lunas Trasnfer !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 2 && $roomIncomes->payment->paymentPaid->payment_method_id <= 11) <!-- Lunas Card !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 17 && $roomIncomes->payment->paymentPaid->payment_method_id <= 21) <!-- Lunas Qris !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 30 && $roomIncomes->payment->paymentPaid->payment_method_id <= 38) <!-- Lunas VA !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 22 && $roomIncomes->payment->paymentPaid->payment_method_id <= 29) <!-- Lunas OTA !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                        @endif
                                    @else 
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                    @endif
                                @elseif($roomIncomes->payment->payment_status == 'Lunas + DP 2')
                                    @if($roomIncomes->payment_detail_status == 'DP 2')
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id == 1) <!-- Lunas Cash !-->
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 12 && $roomIncomes->payment->paymentPaid->payment_method_id <= 16) <!-- Lunas Trasnfer !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 2 && $roomIncomes->payment->paymentPaid->payment_method_id <= 11) <!-- Lunas Card !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 17 && $roomIncomes->payment->paymentPaid->payment_method_id <= 21) <!-- Lunas Qris !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 30 && $roomIncomes->payment->paymentPaid->payment_method_id <= 38) <!-- Lunas VA !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                        @endif
                                        @if($roomIncomes->payment->paymentPaid->payment_method_id >= 22 && $roomIncomes->payment->paymentPaid->payment_method_id <= 29) <!-- Lunas OTA !-->
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">-</span></td>
                                            <td><span class="fw-normal">Rp. {{ $roomIncomes->payment->paymentPaid->payment_paid_value }}</span></td>
                                        @endif
                                    @else 
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                        <td><span class="fw-normal">-</span></td>
                                    @endif
                                @else
                                    <td><span class="fw-normal">-</span></td>
                                    <td><span class="fw-normal">-</span></td>
                                    <td><span class="fw-normal">-</span></td>
                                    <td><span class="fw-normal">-</span></td>
                                    <td><span class="fw-normal">-</span></td>
                                    <td><span class="fw-normal">-</span></td>
                                @endif
                            @endif
                        <td><span class="fw-normal">{{ \Carbon\Carbon::parse($roomIncomes->updated_at ?? '')->timezone('Asia/Bangkok') }}</span></td>
                        @if($roomIncomes->payment->payment_status == 'Lunas + DP 1')
                            @if($roomIncomes->payment_detail_status == 'DP')
                                <td><span class="fw-normal">{{ \Carbon\Carbon::parse($roomIncomes->payment->paymentPaid->updated_at ?? '')->timezone('Asia/Bangkok') }}</span></td>
                            @else
                                <td><span class="fw-normal">-</span></td>
                            @endif
                        @endif
                        @if($roomIncomes->payment->payment_status == 'Lunas + DP 2')
                            @if($roomIncomes->payment_detail_status == 'DP 2')
                                <td><span class="fw-normal">{{ \Carbon\Carbon::parse($roomIncomes->payment->paymentPaid->updated_at ?? '')->timezone('Asia/Bangkok') }}</span></td>
                            @else
                                <td><span class="fw-normal">-</span></td>
                            @endif
                        @endif
                        <td><span class="fw-normal">-</span></td>
                    </tr>
                    @endforeach
                    <!-- Item -->
                </tbody>
            </table>