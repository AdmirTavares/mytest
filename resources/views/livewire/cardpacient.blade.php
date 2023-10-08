<div class="row" wire:poll> 
@foreach ($getpacient as $pacient)
<div class="col-md-6 col-sm-6 col-lg-4 col-12 mb-4">
    <div class="card d-flex flex-row">
        <a class="d-flex" href="#">
            <div class="rounded-circle m-4 align-self-center list-thumbnail-letters">
              {{ strtoupper(substr($pacient->name, 0, 1).substr($pacient->surname, 0, 1))}}
            </div>
        </a>
        <div class=" d-flex flex-grow-1 min-width-zero">
            <div
                class="card-body pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                <div class="min-width-zero">
                    <a href="#">
                        <p class="list-item-heading mb-1 truncate">{{strtoupper($pacient->name)}}</p>
                    </a>
                    <p class="mb-2 text-muted text-small">{{strtoupper($pacient->name)}}</p>
                    <button wire:click="delete('{{$pacient->id}}')" type="button" class="btn btn-xs btn-outline-primary ">delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
</div>
