<div class="card-body">
    @livewire('modalregister')
    <div id="smartWizardCheck" wire:ignore>
        <ul class="card-header">
            @foreach ($questions as $questionData)
            <li><a style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width: 100px;" wire:ignore
                    href="#checkStep{{ $questionData['number'] }}">Step {{ $questionData['number']
                    }}<br /><small>{{
                        $questionData['question'] }}</small></a></li>
            @endforeach
        </ul>
        <div class="card-body">
            @foreach ($questions as $questionData)
            <div id="checkStep{{ $questionData['number'] }}">
                <h1>{{ $questionData['question'] }}</h1>
                @if ($questionData['Oneselection'])
                <div class="row">
                    @foreach ($questionData['options'] as $option)

                    <div class="col-md-6 mb-4">
                        <label class="card">
                            <input required wire:key="{{ $questionData['number'] }}" style="" type="radio"
                                id="radio{{ $option }}" name="options{{ $questionData['number'] }}"
                                value="{{ $option }}"
                                wire:click="RadioSave('{{ $questionData['number'] }}','{{ $questionData['question'] }}', '{{ $option }}')">
                            <div class="card-body">
                                <div class="text-center">
                                    <p class="list-item-heading mb-1">{{ $option }}</p>
                                </div>
                            </div>
                        </label>
                    </div>

                    @endforeach
                </div>
                @elseif($questionData['textfield'])
                <div class="row">
                    @foreach ($questionData['options'] as $index => $option)

                    <div class="col-md-6 mb-4">
                        <label class="card">
                            <input required wire:key="{{ $questionData['number'] }}" type="radio"
                                name="options{{ $questionData['number'] }}" value="{{ $option }}"
                                wire:click="RadioSave('{{ $questionData['number'] }}','{{ $questionData['question'] }}', '{{ $option }}')">
                            <div class="card-body">
                                <div class="text-center">
                                    <p class="list-item-heading mb-1">{{ $option }}</p>
                                </div>
                            </div>
                        </label>
                    </div>
                    @if ($loop->last)


                    <div class="col-md-6 mb-4">
                        <label class="card">
                            <input wire:key="{{ $questionData['number'] }}" type="radio"
                                name="options{{ $questionData['number'] }}"
                                value="{{ $questionData['answerTextfield'] }}">
                            <div class="card-body">
                                <div class="text-center">
                                    <p class="list-item-heading mb-1">{{ $questionData['answerTextfield'] }}</p>
                                    <div class="input-group">
                                        <textarea type="text" wire:model="textfield" wire:change="textfieldsave"
                                            class="form-control" aria-label="With textarea"> </textarea>
                                    </div>

                                </div>
                            </div>
                        </label>
                    </div>
                    @endif
                    @endforeach
                </div>
                @elseif($questionData['multiple_choice'])
                <div class="row">
                    @foreach ($questionData['options'] as $option)
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <label wire:click='verificar'>
                                        <input type="checkbox" wire:key="{{ $questionData['number'] }}"
                                            wire:model.live="selectedOptions.{{ $questionData['number'] }}.{{ $questionData['question'] }}.{{ $option }}">
                                        {{ $option }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @elseif($questionData['inserir'])


                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-backdrop="static"
                    data-target="#exampleModalRight">Register</button>

                @endif
            </div>
            @endforeach
        </div>
    </div>
    <div wire:poll>
        @livewire('cardpacient')

    </div>

</div>