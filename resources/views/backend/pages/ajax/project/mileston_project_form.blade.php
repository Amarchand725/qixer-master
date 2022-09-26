@for($i=1; $i<=$number_of_milestone; $i++)
    <div class="row mt-2">
        <div class="col-sm-12 mt-2"><label for=""><u><i class="fa fa-right-arrow"></i> Milestone.No#. {{ $i }}</u></label></div>
        <div class="col-sm-12 mt-2">
            <label for="milestone">Milestone Name <span class="text-danger">*</span></label>
            <input type="text" id="milestone" class="form-control" name="milestone_names[]" required placeholder="Enter milestone name">
            <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>
        <div class="col-sm-6 mt-2">
            <label for="milestone_cost">Milestone Cost($) <span class="text-danger">*</span></label>
            <input type="number" id="milestone_cost" class="form-control milestone_cost" required name="milestone_costs[]" placeholder="Enter milestone cost">
            <span class="text-danger">{{ $errors->first('milestone_cost') }}</span>
        </div>
        <div class="col-sm-6 mt-2">
            <label for="milestone_service_provider">Milestone Service Provider <span class="text-danger">*</span></label>
            <select name="milestone_service_providers[]" id="milestone_service_provider" required class="form-control">
                <option value="" selected>Select service provider</option>
                @foreach ($sellers as $seller)
                    <option value="{{ $seller->id }}">{{ $seller->name }}</option>
                @endforeach
            </select>
            <span class="text-danger">{{ $errors->first('milestone_service_provider') }}</span>
        </div>
        <div class="col-sm-6 mt-2">
            <label for="milestone_service_provider_seller_cost">Milestone Service Provider/ Seller Cost <span class="text-danger">*</span></label>
            <input type="number" id="milestone_service_provider_seller_cost" required class="form-control milstone_service_provider_cost" name="milestone_service_provider_costs[]" placeholder="Enter service provider seller cost">
            <span class="text-danger">{{ $errors->first('milestone_service_provider_seller_cost') }}</span>
        </div>
        <div class="col-sm-6 mt-2">
            <label for="milestone_timeframe">Timeframe (days)<span class="text-danger">*</span></label>
            <input type="number" id="milestone_timeframe" required class="form-control" name="milestone_timeframes[]" placeholder="Enter timeframe (days)">
            <span class="text-danger">{{ $errors->first('milestone_timeframe') }}</span>
        </div>
        <div class="col-sm-6 mt-2">
            <label for="milestone_attachment">Attachment <span class="text-danger">*</span></label>
            <input type="file" name="milestone_attachments[]" required id="milestone_attachment" class="form-control">
            <span class="text-danger">{{ $errors->first('milestone_attachment') }}</span>
        </div>
        <div class="col-sm-6 mt-2">
            <label for="mile_status">Status</label>
            <select name="milestone_statuses[]" id="mile_status" class="form-control">
                <option value="0" selected>Pending</option>
                <option value="1">Started</option>
                <option value="2">Completed</option>
            </select>
        </div>
        <div class="col-sm-12 mt-2">
            <label for="milestone_description">Description</label>
            <textarea name="milestone_descriptions[]" id="milestone_description" class="form-control" cols="30" rows="5" placeholder="Enter milestone_description"></textarea>
            <span class="text-danger">{{ $errors->first('milestone_description') }}</span>
        </div>
    </div>
@endfor