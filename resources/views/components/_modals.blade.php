<!-- Modal Add-->
<div class="modal fade" id="modalAdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddLabel">Add Bank</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="bank-form-send" class="form" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="bank_name" class="form-label">Bank name</label>
                        <input type="text" class="form-control" id="bank_name" name="bank_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="max_loan" class="form-label">Max loan</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="max_loan" name="max_loan" required>
                            <span class="input-group-text">$</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="loan_term" class="form-label">Loan term</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="loan_term" name="loan_term" required>
                            <span class="input-group-text">months</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="interest_rate" class="form-label">Interest rate</label>
                        <input type="number" class="form-control" id="interest_rate" name="interest_rate" required>
                    </div>
                    <div class="mb-3">
                        <label for="min_down_payment" class="form-label">Min down payment</label>
                        <input type="number" class="form-control" id="min_down_payment" name="min_down_payment"
                            required>
                    </div>
                    <button type="button" class="btn btn-add from-send">Add </button>
                </form>
            </div>
        </div>
    </div>
</div>
