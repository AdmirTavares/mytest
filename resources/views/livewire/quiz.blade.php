
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
                                <input wire:key="{{ $questionData['number'] }}" style="" type="radio"
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
                                <input wire:key="{{ $questionData['number'] }}" style="" type="radio"
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
                        <script>
                            document.querySelector('input[name="options{{ $questionData['number'] }}"]:last-of-type').addEventListener('click', function() {
                                var ElementOcult = document.getElementById('ElementOcult');
                
                                if (ElementOcult.style.display === 'none') {
                                   ElementOcult.style.display = 'block';
                                   } else {
                                 ElementOcult.style.display = 'none';
                             }
                            });
                        </script>
                        @endif
                        @endforeach
                        <div  class="col-md-6 mb-4">
                            <div  class="card" style="display:none; "  id="ElementOcult">
                                <div class="card-body">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">With textarea</span>
                                        </div>
                                        <textarea class="form-control" aria-label="With textarea"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
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
        </div>
    </div>


