
<!-- modal -->
<div class="modal fade" id="deletePartyModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-light" id="deleteModalLabel">Delete Bill</h5>
                <button type="button" class="close text-danger" data-bs-dismiss="modal" aria-label="Close" onclick="$('#deletePartyModal').modal('hide')">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <strong class="text-primary">Party ID - {{ $id }}</strong> 
                <h4 class="text-primary">Name:- {{ $party_name }}</h4> 
                <strong >Are you sure you want to delete this bill?</strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="$('#deletePartyModal').modal('hide')">Close</button>
                <button type="button" class="btn btn-danger" onclick="$('#deletePartyModal').modal('hide')" wire:click="deleteParty">Delete</button>
            </div>
        </div>
    </div>
</div>
<!-- modal -->