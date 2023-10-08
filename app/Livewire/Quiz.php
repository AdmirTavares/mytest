<?php

namespace App\Livewire;

use Livewire\Attributes\Rule;
use Livewire\Component;
use App\Models\Save;


class Quiz extends Component
{
    public $questions = [];
    public $selectedResponse = null;
    public $selectedOptions = [];
    public $TextFildeVisibilite = false;
    public $textfield = '';

    public function createquiz($number,$question,$option){
        if (auth()->check()) {
        Save::create([
            'number' => $number,
            'question' => $question,
            'answer' => $option,
            'user_id' => auth()->user()->id
        ]);
    }}

    public function RadioSave($number, $question, $option)
    {

        $aux = Save::where('number', $number)->get();
        if ($aux->isEmpty() || $aux == NULL) {
            $this->createquiz($number,$question,$option);

        } else {
            Save::where('number', $number)->update([
                'answer' => $option,
            ]);
        }
    }
    public function textfieldsave()
    {
    }


    public function verificar()
    {
        foreach ($this->selectedOptions as $questionNumber => $questionData) {
            foreach ($questionData as $question => $options) {
                foreach ($options as $option => $value) {
                    if ($value === true) {
                        $registroExistente = Save::where([
                            'number' => $questionNumber,
                            'question' => $question,
                            'answer' => $option,
                            'user_id' => auth()->user()->id,
                        ])->first();
                        if (!$registroExistente) {
                            $this->createquiz($questionNumber,$question,$option);
                        }
                        $this->reset();
                    } else {
                        Save::where('number', $questionNumber)->delete();
                        $this->reset();
                    }
                }
            }
        }
       
    }



    public function validateSelection($questionNumber, $option)
    {
        if (isset($this->selectedOptions[$questionNumber][$option])) {
            $this->selectedOptions[$questionNumber]['selected'] = true;
        } else {
            $this->selectedOptions[$questionNumber]['selected'] = false;
        }

        foreach ($this->questionData as $question) {
            if (!isset($this->selectedOptions[$question['number']]['selected']) || !$this->selectedOptions[$question['number']]['selected']) {
                $this->addError('selectedOptions', 'Selecione pelo menos uma opção em cada pergunta.');
                return;
            }
        }
    }

    protected function loadQuestionsFromJson()
    {
        $jsonPath = resource_path('json/quiz.json');
        if (file_exists($jsonPath)) {
            $jsonContent = file_get_contents($jsonPath);
            $data = json_decode($jsonContent, true);
            if (isset($data['questions'])) {
                $this->questions = $data['questions'];
            }
        }
    }


    public function render()
    {
        $questions =  $this->loadQuestionsFromJson();
        return view('livewire.quiz', compact('questions'));
    }
}
