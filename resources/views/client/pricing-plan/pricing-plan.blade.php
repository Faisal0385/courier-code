@extends('client.master-layout')

@section('content')
    <div class="container-fluid p-4 m-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="mb-3 fw-semibold">Pricing Plan</h5>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Parcel Type</th>
                                <th>Pickup Location</th>
                                <th>Delivery Location</th>
                                <th>Weight</th>
                                <th>Delivery Time</th>
                                <th class="text-end">Price</th>
                                <th class="text-end">Fulfillment charges apply if selected.</th>
                            </tr>
                        </thead>

                        <tbody>
                            <!-- Inside Dhaka → Inside Dhaka -->
                            <tr>
                                <td>Parcel</td>
                                <td>Inside Dhaka</td>
                                <td>Inside Dhaka</td>
                                <td>0-0.2 Kg</td>
                                <td>Standard Delivery</td>
                                <td class="text-end">৳ 60.00</td>
                                <td class="text-end">* Fulfillment charges will be added</td>
                            </tr>
                            <tr>
                                <td>Parcel</td>
                                <td>Inside Dhaka</td>
                                <td>Inside Dhaka</td>
                                <td>0.2-0.5 Kg</td>
                                <td>Standard Delivery</td>
                                <td class="text-end">৳ 60.00</td>
                                <td class="text-end">* Fulfillment charges will be added</td>
                            </tr>
                            <tr>
                                <td>Parcel</td>
                                <td>Inside Dhaka</td>
                                <td>Inside Dhaka</td>
                                <td>0.5-1 Kg</td>
                                <td>Standard Delivery</td>
                                <td class="text-end">৳ 70.00</td>
                                <td class="text-end">* Fulfillment charges will be added</td>
                            </tr>
                            <tr>
                                <td>Parcel</td>
                                <td>Inside Dhaka</td>
                                <td>Inside Dhaka</td>
                                <td>1-1.5 Kg</td>
                                <td>Standard Delivery</td>
                                <td class="text-end">৳ 90.00</td>
                                <td class="text-end">* Fulfillment charges will be added</td>
                            </tr>
                            <tr>
                                <td>Parcel</td>
                                <td>Inside Dhaka</td>
                                <td>Inside Dhaka</td>
                                <td>1.5-2 Kg</td>
                                <td>Standard Delivery</td>
                                <td class="text-end">৳ 90.00</td>
                                <td class="text-end">* Fulfillment charges will be added</td>
                            </tr>

                            <!-- Inside Dhaka → Suburbs -->
                            <tr>
                                <td>Parcel</td>
                                <td>Inside Dhaka</td>
                                <td>Suburbs</td>
                                <td>0-0.2 Kg</td>
                                <td>Standard Delivery</td>
                                <td class="text-end">৳ 80.00</td>
                                <td class="text-end">* Fulfillment charges will be added</td>
                            </tr>
                            <tr>
                                <td>Parcel</td>
                                <td>Inside Dhaka</td>
                                <td>Suburbs</td>
                                <td>0.2-0.5 Kg</td>
                                <td>Standard Delivery</td>
                                <td class="text-end">৳ 80.00</td>
                                <td class="text-end">* Fulfillment charges will be added</td>
                            </tr>
                            <tr>
                                <td>Parcel</td>
                                <td>Inside Dhaka</td>
                                <td>Suburbs</td>
                                <td>0.5-1 Kg</td>
                                <td>Standard Delivery</td>
                                <td class="text-end">৳ 100.00</td>
                                <td class="text-end">* Fulfillment charges will be added</td>
                            </tr>
                            <tr>
                                <td>Parcel</td>
                                <td>Inside Dhaka</td>
                                <td>Suburbs</td>
                                <td>1-1.5 Kg</td>
                                <td>Standard Delivery</td>
                                <td class="text-end">৳ 130.00</td>
                                <td class="text-end">* Fulfillment charges will be added</td>
                            </tr>
                            <tr>
                                <td>Parcel</td>
                                <td>Inside Dhaka</td>
                                <td>Suburbs</td>
                                <td>1.5-2 Kg</td>
                                <td>Standard Delivery</td>
                                <td class="text-end">৳ 130.00</td>
                                <td class="text-end">* Fulfillment charges will be added</td>
                            </tr>

                            <!-- Inside Dhaka → Outside Dhaka -->
                            <tr>
                                <td>Parcel</td>
                                <td>Inside Dhaka</td>
                                <td>Outside Dhaka</td>
                                <td>0-0.2 Kg</td>
                                <td>Standard Delivery</td>
                                <td class="text-end">৳ 110.00</td>
                                <td class="text-end">* Fulfillment charges will be added</td>

                            </tr>
                            <tr>
                                <td>Parcel</td>
                                <td>Inside Dhaka</td>
                                <td>Outside Dhaka</td>
                                <td>0.2-0.5 Kg</td>
                                <td>Standard Delivery</td>
                                <td class="text-end">৳ 110.00</td>
                                <td class="text-end">* Fulfillment charges will be added</td>

                            </tr>
                            <tr>
                                <td>Parcel</td>
                                <td>Inside Dhaka</td>
                                <td>Outside Dhaka</td>
                                <td>0.5-1 Kg</td>
                                <td>Standard Delivery</td>
                                <td class="text-end">৳ 130.00</td>
                                <td class="text-end">* Fulfillment charges will be added</td>

                            </tr>
                            <tr>
                                <td>Parcel</td>
                                <td>Inside Dhaka</td>
                                <td>Outside Dhaka</td>
                                <td>1-1.5 Kg</td>
                                <td>Standard Delivery</td>
                                <td class="text-end">৳ 170.00</td>
                                <td class="text-end">* Fulfillment charges will be added</td>

                            </tr>
                            <tr>
                                <td>Parcel</td>
                                <td>Inside Dhaka</td>
                                <td>Outside Dhaka</td>
                                <td>1.5-2 Kg</td>
                                <td>Standard Delivery</td>
                                <td class="text-end">৳ 170.00</td>
                                <td class="text-end">* Fulfillment charges will be added</td>

                            </tr>

                            <!-- Same pattern continues exactly as your list -->
                            <!-- Outside Dhaka → Different City -->
                            <tr>
                                <td>Parcel</td>
                                <td>Outside Dhaka</td>
                                <td>Outside Dhaka (Different City)</td>
                                <td>0-0.2 Kg</td>
                                <td>Standard Delivery</td>
                                <td class="text-end">৳ 120.00</td>
                                <td class="text-end">* Fulfillment charges will be added</td>

                            </tr>
                            <tr>
                                <td>Parcel</td>
                                <td>Outside Dhaka</td>
                                <td>Outside Dhaka (Different City)</td>
                                <td>0.2-0.5 Kg</td>
                                <td>Standard Delivery</td>
                                <td class="text-end">৳ 120.00</td>
                                <td class="text-end">* Fulfillment charges will be added</td>

                            </tr>
                            <tr>
                                <td>Parcel</td>
                                <td>Outside Dhaka</td>
                                <td>Outside Dhaka (Different City)</td>
                                <td>0.5-1 Kg</td>
                                <td>Standard Delivery</td>
                                <td class="text-end">৳ 145.00</td>
                                <td class="text-end">* Fulfillment charges will be added</td>

                            </tr>
                            <tr>
                                <td>Parcel</td>
                                <td>Outside Dhaka</td>
                                <td>Outside Dhaka (Different City)</td>
                                <td>1-1.5 Kg</td>
                                <td>Standard Delivery</td>
                                <td class="text-end">৳ 180.00</td>
                                <td class="text-end">* Fulfillment charges will be added</td>

                            </tr>
                            <tr>
                                <td>Parcel</td>
                                <td>Outside Dhaka</td>
                                <td>Outside Dhaka (Different City)</td>
                                <td>1.5-2 Kg</td>
                                <td>Standard Delivery</td>
                                <td class="text-end">৳ 180.00</td>
                                <td class="text-end">* Fulfillment charges will be added</td>

                            </tr>

                            <!-- Same Day Delivery -->
                            <tr>
                                <td>Parcel</td>
                                <td>Inside Dhaka (Dhaka Metro City Only)</td>
                                <td>Inside Dhaka (Dhaka Metro City Only)</td>
                                <td>0-0.2 Kg</td>
                                <td>Same Day Delivery</td>
                                <td class="text-end">৳ 120.00</td>
                                <td class="text-end">* Fulfillment charges will be added</td>
                            </tr>
                            <tr>
                                <td>Parcel</td>
                                <td>Inside Dhaka (Dhaka Metro City Only)</td>
                                <td>Inside Dhaka (Dhaka Metro City Only)</td>
                                <td>0.2-0.5 Kg</td>
                                <td>Same Day Delivery</td>
                                <td class="text-end">৳ 120.00</td>
                                <td class="text-end">* Fulfillment charges will be added</td>
                            </tr>
                            <tr>
                                <td>Parcel</td>
                                <td>Inside Dhaka (Dhaka Metro City Only)</td>
                                <td>Inside Dhaka (Dhaka Metro City Only)</td>
                                <td>0.5-2 Kg</td>
                                <td>Same Day Delivery</td>
                                <td class="text-end">৳ 150.00</td>
                                <td class="text-end">* Fulfillment charges will be added</td>
                            </tr>
                        </tbody>
                    </table>
                </div>



                <!-- Notes -->
                <div class="mt-3 small text-muted">
                    <ul class="mb-0">
                        <li>Extra delivery charge may apply.</li>
                        <li>Weight limit: max 20kg per parcel.</li>
                        <li>Same Day Delivery available only in Dhaka Metro City.</li>
                        <li>Price may change during promotional offers.</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
@endsection
