<div class="form-group">
    <input type="text" name="name" value="{{ old('name') ?? $customer->name }}" class="form-control">
    {{ $errors->first('name') }}
</div>

<div class="form-group">
    <input type="text" name="email" value="{{ old('email') ?? $customer->email }}" class="form-control">
    {{ $errors->first('email') }}
</div>

<div class="form-group">
    <select name="active" id="active" class="form-control">
        <option value="" disabled>Select customer status</option>
        @foreach($customer->activeOptions() as $activeOptionKey => $activeOptionValue)
            <option value="{{ $activeOptionKey }}" {{ $customer->active == $activeOptionValue ? 'selected' : '' }}>{{ $activeOptionValue }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <select name="company_id" id="active" class="form-control">
        <option value="" disabled>Select customer company</option>
        @foreach ($companies as $company)
            <option value="{{ $company->id }}"  {{ $company->id == $customer->company_id ? 'selected' : '' }}>{{ $company->name }}</option>
        @endforeach
    </select>
</div>

@csrf