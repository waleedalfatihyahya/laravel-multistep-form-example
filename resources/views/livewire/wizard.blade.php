<div>
    @if(!empty($successMsg))
    <div class="alert alert-success">
        {{ $successMsg }}
    </div>
    @endif
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="multi-wizard-step">
                <a href="#step-1" type="button"
                    class="btn {{ $currentStep != 1 ? 'btn-default' : 'btn-primary' }}">1</a>
                <p>Step 1</p>
            </div>
            <div class="multi-wizard-step">
                <a href="#step-2" type="button"
                    class="btn {{ $currentStep != 2 ? 'btn-default' : 'btn-primary' }}">2</a>
                <p>Step 2</p>
            </div>
            <div class="multi-wizard-step">
                <a href="#step-3" type="button"
                    class="btn {{ $currentStep != 3 ? 'btn-default' : 'btn-primary' }}"
                    disabled="disabled">3</a>
                <p>Step 3</p>
            </div>
        </div>
    </div>
    <div class="row setup-content {{ $currentStep != 1 ? 'display-none' : '' }}" id="step-1">
        <div class="col-md-12">
            <h3> Step 1</h3>
            <div class="form-group">
                <label for="title">Name:</label>
                <input type="text" wire:model="name" class="form-control" id="taskTitle">
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="description">phone:</label>
                <input type="text" wire:model="phone" class="form-control" id="phone" />
                @error('phone') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="email">email :</label>
                <textarea type="text" wire:model="email" class="form-control"
                    id="email">{{{ $email ?? '' }}}</textarea>
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>
            <button class="btn btn-primary nextBtn btn-lg pull-right" wire:click="firstStepSubmit"
                type="button">Next</button>
        </div>
    </div>
    <div class="row setup-content {{ $currentStep != 2 ? 'display-none' : '' }}" id="step-2">
        <div class="col-md-12">
            <h3> Step 2</h3>
            <div class="form-group">
                <label for="description">gender</label><br />
                <label class="radio-inline"><input type="radio" wire:model="gender" value="1"
                        {{{ $gender == '1' ? "checked" : "" }}}> male</label>
                <label class="radio-inline"><input type="radio" wire:model="gender" value="0"
                        {{{ $gender == '0' ? "checked" : "" }}}> female</label>
                @error('gender') <span class="error">{{ $message }}</span> @enderror
            </div>
            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button"
                wire:click="secondStepSubmit">Next</button>
            <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(1)">Back</button>
        </div>
    </div>
    <div class="row setup-content {{ $currentStep != 3 ? 'display-none' : '' }}" id="step-3">
        <div class="col-md-12">
            <h3> Step 3</h3>
            <table class="table">
                <tr>
                    <td>name</td>
                    <td><strong>{{$name}}</strong></td>
                </tr>
                <tr>
                    <td>phone</td>
                    <td><strong>{{$phone}}</strong></td>
                </tr>
                <tr>
                    <td>gender</td>
                    <td><strong>{{$gender ? 'male' : 'female'}}</strong></td>
                </tr>
                <tr>
                    <td>email:</td>
                    <td><strong>{{$email}}</strong></td>
                </tr>
            </table>
            <button class="btn btn-success btn-lg pull-right" wire:click="submitForm" type="button">Finish!</button>
            <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(2)">Back</button>
        </div>
    </div>
</div>
