
    <div class="card-body">
        <div id="smartWizardCheck" wire:ignore>
            <ul class="card-header">
                @foreach ($questions as $questionData)
                <li><a wire:ignore href="#checkStep{{ $questionData['number'] }}">Step {{ $questionData['number']
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
                                    <input requ wire:key="{{ $questionData['number'] }}" type="radio"
                                    name="options{{ $questionData['number'] }}" value="{{ $questionData['answerTextfield'] }}"
                                    >
                                <div class="card-body">
                                    <div class="text-center">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">With textarea</span>
                                            </div>
                                            <textarea class="form-control" aria-label="With textarea"></textarea>
                                        </div>
                                        <p class="list-item-heading mb-1">{{ $questionData['answerTextfield'] }}</p>
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
                                        <label>
                                            <input type="checkbox" wire:key="{{ $questionData['number'] }}"
                                                wire:model="selectedOptions.{{ $questionData['number'] }}.{{ $option }}">
                                            {{ $option }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
            <script>
                function validateRequiredRadios() {
                    var requiredRadios = document.querySelectorAll('input[type="radio"][required]');
                    for (var i = 0; i < requiredRadios.length; i++) {
                        if (requiredRadios[i].checked) {
                            return true; // Pelo menos um radio marcado
                        }
                    }
                    alert('Por favor, marque pelo menos uma opção obrigatória.');
                    return false; // Nenhum radio marcado
                }
            </script>
        </div>
    </div>

