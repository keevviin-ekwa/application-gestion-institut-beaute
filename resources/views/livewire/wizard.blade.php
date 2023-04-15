<div>
    @foreach($user as $u)
        {{$u->nom}}
    @endforeach
    <div id="stepper1" class="bs-stepper">
        <div class="bs-stepper-header">
            <div class="step" data-target="#test-l-1">
                <a href="#step-1">
                    <button class="step-trigger">
                        <span class="bs-stepper-circle">1</span>
                        <span class="bs-stepper-label">Informations du client</span>
                    </button>
                </a>
            </div>
            <div class="line"></div>
            <div class="step" data-target="#test-l-2">
                <a href="#step-2">
                    <button class="step-trigger">
                        <span class="bs-stepper-circle">2</span>
                        <span class="bs-stepper-label">Jour</span>
                    </button>
                </a>
            </div>
            <div class="line"></div>
            <div class="step" data-target="#test-l-3">
                <button class="step-trigger">
                    <span class="bs-stepper-circle">3</span>
                    <span class="bs-stepper-label">Validate</span>
                </button>
            </div>
            <div class="line"></div>
            <div class="step" data-target="#test-l-1">
                <a href="#step-1">
                    <button class="step-trigger">
                        <span class="bs-stepper-circle">1</span>
                        <span class="bs-stepper-label">Informations du client</span>
                    </button>
                </a>
            </div>
        </div>
        <div class="bs-stepper-content" >
{{$currentStep}}
                <div id="test-l-1" class="{{ $currentStep != 1 ? 'd-none' : '' }}" id="step-1">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nom du client</label>
                        <input type="text" wire:keydown="search" wire:model="name" class="form-control" id="exampleInputEmail1" placeholder="Enter email" />
                    </div>
                    <button class="btn btn-primary" wire:click="firstStepSubmit" >Suivant</button>
                </div>

                <div id="test-l-1" class="{{ $currentStep != 2 ? 'd-none' : '' }}" id="step-2">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nom de l'employé</label>
                        <input type="text" wire:model="name" class="form-control" id="exampleInputEmail1" placeholder="Enter email" />
                    </div>
                    <button class="btn btn-primary" wire:click="firstStepSubmit" >Suivant</button>
                </div>
        </div>
    </div>
</div>
