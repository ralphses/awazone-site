<div class="container-fluid">

    {{-- <div class="row"> --}}
        {{-- <div class="col-6"> --}}
            <div class="card">
                <h2 class="card-header mt-0 font-size-16">Transfer Funds</h2>
                <div class="card-body">
                    <h3 class="card-title">Send money to this account</h3>
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <tbody>
                                <tr>
                                    <td style="width: 30%"><strong>Account Number</strong></td>
                                    <td style="width: 70%">{{ $account->accountNumber }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 30%"><strong>Customer Name</strong></td>
                                    <td style="width: 70%">{{ $account->customerName }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 30%"><strong>Bank</strong></td>
                                    <td style="width: 70%">{{ $account->bank }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <a href="{{ route('aibopay.dashboard') }}" class="btn btn-primary">Done</a>
                </div>
            </div>
        {{-- </div> --}}
        <!-- end col -->
    {{-- </div> --}}
    <!-- end row -->

</div>